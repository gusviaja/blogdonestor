<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Import the PHPMailer class into the global namespace
use \PHPMailer\PHPMailer\PHPMailer;
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
//date_default_timezone_set('Etc/UTC');


class AdminController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model(array("UserModel","ChamadasModel","AdminModel","PostModel","SubcategoriasModel"));
       
    }



	public function index()
	
	{
		
		$template = 'admin/admin_panel.php';
		$dados = $this->load_resume();

		//echo json_encode($dados);
		$this->load->template($template,$dados);
	}

	public function form_login(){
	
			$this->load->view("admin/form_login");
	}
	
	public function logar(){
	
		$dados = $this->input->post();
		$email = trim($dados["inputEmail"]);
		$pass = $dados["inputPassword"];
		$hash = password_hash($pass,PASSWORD_DEFAULT);
		
		if($retorno = $this->UserModel->buscaUsuario($email) ):

			$pass_db = $retorno->user_pass;
			$ok = password_verify($pass,$pass_db);

			if($ok):
				$usuario_logado = array (
					"id" =>$retorno->user_id,
					"nome" => $retorno->user_name,
					"email"=>$retorno->user_email,
					"nivel" => $retorno->user_level,
					"ip"=>$_SERVER["REMOTE_ADDR"],
					
				);
				
					
				
				$this->session->set_userdata($usuario_logado);
				redirect(base_url("admin"));
			else:
				
				$this->session->set_flashdata("danger",DADOS_INCORRETOS);
				redirect("entrar");
			endif;
		else:
			$this->session->set_flashdata("danger",EMAIL_INEXISTENTE);
			redirect("entrar");
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
			$this->session->set_flashdata('danger',EMAIL_INEXISTENTE);
			redirect('login/recuperar');
		endif;

	}

	public function lista_preferencias(){

		$preferencias = array(
			"title"=>"titulo del blog",
			"subtitle"=>"subtitulo del blog",
			"description"=>"descripcao del blog",

	);
		$obj = json_encode($preferencias);
		echo $obj;
	}

	public function form_lista_preferencias(){

		$dados = array(
			
			"title"=>"titulo del blog",
			"subtitle"=>"subtitulo del blog",
			"description"=>"descripcao del blog",

		);
		$this->load->template('admin/form_lista_preferencias',$dados);
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