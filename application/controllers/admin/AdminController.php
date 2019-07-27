<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model(array("UserModel","ChamadasModel","AdminModel","PostModel","SubcategoriasModel"));
       $this->load->helper(array("preferencias"));
    }



	public function index()
	
	{
		$template = 'admin/admin_panel.php';
		$dados = $this->load_resume();
		//echo json_encode($dados);
		$this->load->template($template,$dados);
	}

	public function form_login(){
	
			$this->load->template("admin/form_login");
	}
	
	public function logar(){
	
		$dados = $this->input->post();
		$email = trim($dados["user_email"]);
		$pass = trim($dados["user_pass"]);
		
		$hash = password_hash($pass,PASSWORD_DEFAULT);
		
		if($retorno = $this->UserModel->buscaUsuario($email) ):
			
			$pass_db = $retorno->user_pass;
			$ok = password_verify($pass,$pass_db);

			if($ok):
				$usuario_logado = array (
					"user_id" =>$retorno->user_id,
					"user_name" => $retorno->user_name,
					"user_email"=>$retorno->user_email,
					"user_level" => $retorno->user_level,
					"user_ip"=>$_SERVER["REMOTE_ADDR"],
					
				);
				
				
				
				$this->session->set_userdata($usuario_logado);
				
				//echo 'logou e carregou sessao';
				$this->session->set_flashdata("success",'logado com sucesso');
				redirect(base_url("admin"));
			else:
				//echo 'NAO logou, SENHA ERRADA OU INCORRETA';
				$this->session->set_flashdata("danger",DADOS_INCORRETOS);
				redirect(base_url("entrar"));
			endif;
		else:
			$frase = " $email --  ".EMAIL_INEXISTENTE;
			$this->session->set_flashdata('danger',$frase);
			redirect(base_url("entrar"));
		
		endif;

			
		
		//echo "$email e $pass e $hash";die;
	}

	public function sair(){
		$this->session->sess_destroy();
		redirect("entrar");
	}

	public function recuperar_senha_form(){
		$this->load->view('admin/form_recuperar_senha');
	}

	public function gerar_e_enviartoken(){
		if($email = strip_tags($this->input->post("inputEmail")) ):
			//$rdm = random_int(1,500);
			$secret = 'bobesponja';
			$rdm = $email.$secret;
			$token = addslashes(md5($rdm));
			
			//dd($token);
			if($emailNoBanco = $this->UserModel->pedido_recuperar_senha($email,$token)):
				//ate aqui o model salvou o token na tabela de reset
				//então enviar email para o usuario e informar na tela
			 	$this->load->library('email');
				//dd($email);
				$this->email->from('adelerdobatista@gmail.com', 'Adelerdo Batista');
				$this->email->to($email);
				$this->email->cc('gusviaja@hotmail.com');

				$this->email->subject('Recuperação de token | BlogDoNestor');
				//$this->email->message('Seu token de acesso: '.$token);
				$array_token = array('token'=>$token);
				$message = $this->load->view('emails/reset_token',$array_token,TRUE);
				//dd($message);
				$this->email->message('Seu token de acesso: '.$token);
				//dd($this->email);
				try {
					$this->email->send();

				} catch (\Throwable $th) {
					//throw $th->getMessage();
					$error = $this->email->print_debugger(array('headers'));
					var_dump($error);
				} 


				///APROVEITAR PARA EXPLICAR A IMPORTANCIA DE QUE UMA ATIVIDADE
				//COMO ENVIO DE EMAIL FIQUE EM FILA, PARA NAO DEMORAR O 
				//CARREGAMENTO DA PAGINA.
				$this->session->set_flashdata('success',SUCESSO);
				redirect('entrar');
			else:
				$this->session->set_flashdata('danger',ERROR);
				redirect('login/recuperar');
			endif;
			
		else:
			$frase = " $email -- ".EMAIL_INEXISTENTE;
			$this->session->set_flashdata('danger',$frase);
			redirect('login/recuperar');
		endif;

	}

	public function lista_preferencias(){

		
		$obj = json_encode($preferencias);
		echo $obj;
	}

	public function form_lista_preferencias(){

		//$dados = $preferencias;
		$this->load->template('admin/form_lista_preferencias');
	}


	public function salva_preferencias(){
		$post = $this->input->post();

		//dd($post);
		$filename = 'application/helpers/preferencias_helper.php';
		$fopen = fopen($filename,"w+");

		$conteudo = '<?php
		
		
		function get_preferencias(string $key){
			
			$preferencias = array(
				"site_title" =>"'.$post["title"].'",
				"description" =>"'.$post["description"].'",
				"author" => "Ni Sistemas | desenvolvimento de sistemas web 
				em São Paulo com pagamento em ate 12x",
				"email_contato" =>"'.$post["email_contato"].'",
		
			);

			if(array_key_exists($key,$preferencias)):
				echo trim($preferencias[$key]);
				return;
			else:
				$arr = array($key => "Preferencia não existe no sistema");
				echo $arr[$key];
			endif;
			
		}
		
		
		';
		
		
		if( fwrite($fopen,$conteudo) ):
			fclose($fopen);
			redirect(base_url('admin'));
		else:
			redirect(base_url('admin/form/lista/preferencias'));
		endif;
		

	}

	public function debug(){
		$conteudo = file_get_contents('debugs'.DIRECTORY_SEPARATOR.'debug.txt',__DIR__);
		echo $conteudo;
	}


	//==========================ALTERAR PASSWORD==================//
	///////////////////////////////////////////////////////////////
	public function valida_token_alterar_password(){
		$input_token = $this->uri->segment(3);
		if(!$token_valid = $this->UserModel->verifica_token($input_token)):
			$this->session->set_flashdata('danger',TOKEN_INVALIDO);
			redirect('login/recuperar');
		else:
			$email = $token_valid->user_email;
			$this->load->view('admin/form_alterar_password',array('email'=>$email));
		endif;
	}

		public function novo_password(){
			$inputPass = strip_tags($this->input->post("inputPassword1"));
			/* --------------------------------------------------------------*/
			$input_user_email = $this->input->post("input_user_email");
			$novoPass = password_hash($inputPass,PASSWORD_DEFAULT);
			if($result = $this->UserModel->reset_password($input_user_email,$novoPass)):
				redirect('admin');
			else:
				$this->session->set_flashadata('danger','error processando pedido');
				redirect('admin');
			endif;
			/* 
			dd($inputPass." ".$input_user_email."AGORA SALVAR A NOVA SENHA,
			REMOVER REGISTRO DA TABELA RESET E ENVIAR EMAIL, NAO FOI VALIDADA 
			DATA DE EXPIRAÇÃO DO TOKEN AINDA"); */

			//
		}


		public function altera_status(){
			$element = $this->uri->segment(3);
			$element = strtolower($element);

			switch ($element) {
				case "post":
				$post_id = $this->uri->segment(4);
				
					if(!$alterado = $this->PostModel->altera_status($post_id)):
						
						$response = array('data'=>ERROR);
					echo json_encode($response);
				//	redirect(base_url('admin'));
				else:
					//$response = array('data'=>SUCESSO);
					$response = array('data'=>"$alterado");
					echo json_encode($response);
				endif;
					break;
					
				case 'chamada':
					$chamada_id = $this->uri->segment(4);
					if(!$alterado = $this->ChamadasModel->altera_status($chamada_id)):
						$response = array('data'=>ERROR);
						echo json_encode($response);
					//	redirect(base_url('admin'));
					else:
						//$response = array('data'=>SUCESSO);
						$response = array('data'=>"$alterado");
						echo json_encode($response);
					endif;
						break;

				case 'subcategory':
				$subcategory_id = $this->uri->segment(4);
			//	debug($subcategory_id);
				if(!$alterado = $this->SubcategoriasModel->altera_status($subcategory_id)):
						
					$response = array('data'=>ERROR);
					echo json_encode($response);
				//	redirect(base_url('admin'));
				else:
					//$response = array('data'=>SUCESSO);
					$response = array('data'=>"$alterado");
					echo json_encode($response);
				endif;
				//debug($response);
					break;

				case 'user':
					$user_id = $this->uri->segment(4);
					if(!$alterado = $this->UserModel->altera_status($user_id)):
							
						$response = array('data'=>ERROR);
						echo json_encode($response);
					//	redirect(base_url('admin'));
					else:
						//$response = array('data'=>SUCESSO);
						$response = array('data'=>"$alterado");
						echo json_encode($response);
					endif;
						break;
				
				default:
					
					break;
			}
		} 

	//====================================================//
	//------------FUNCOES PRIVADAS-----------------------//
	//==================================================//
	private function load_resume(){
		
		$resume['qtd_posts'] = $this->PostModel->conta_posts();
		$resume['qtd_subcategorias'] = $this->SubcategoriasModel->conta_subcategorias();
		$resume['qtd_usuarios'] = $this->UserModel->conta_usuarios();
		$resume['qtd_chamadas'] = $this->ChamadasModel->conta_chamadas();
		
		return $resume;
	}
}