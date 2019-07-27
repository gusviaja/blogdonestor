<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {


	public function __construct(){
        parent::__construct();
		$this->load->model(array("PostModel","SubcategoriasModel"));
		$this->load->helper('string');
       
    }

    /*
    
    */
    //====================================================//
	//-----------------FUNCOES RESTFULL-------------------//
	//====================================================//
    public function lista_posts(){
		
		$obj = new \stdClass;
	$lista_posts = $this->PostModel->lista_posts(3);
	
    
		$obj->draw = '1';
		$obj->recordsTotal = $lista_posts['recordsTotal'];
		$obj->recordsFiltered = $lista_posts['recordsFiltered'];
		$obj->data =  $lista_posts['data'];
		
		echo json_encode($obj);
	}

	public function form_cria_post(){
		$subc = $this->SubcategoriasModel->lista_subcategorias(2);
		if($subc['data']):
			//dd($subc['data']);
			$this->load->template('admin/form_cria_post',$subc);
		else:
			$this->session->set_flashdata('danger',"Para criar um post deve primeiro criar as categorias e subcategorias do portal");
			redirect(base_url('admin'));
		endif;
		
	}

	//para mostrar o conteudo do post na tela usar htmlspecialchars
	//
	public function salva_post(){
		$dados = $this->input->post();
		$dados['post_editor_id'] = $_SESSION['user_id'];
		$dados['post_title'] = addslashes(strip_tags($dados['post_title']));
		$dados['post_content'] = addslashes(htmlentities($dados['post_content']));
		//usa helper para criar url
		 //monta_url($dados['post_title']);
		 //$dados['post_url'] = 'sem url preg_match por enquanto';
		 $dados['post_url'] = Name($dados['post_title']);

		// caso o usuario nao salve foto de capa do post
		if($_FILES['post_coverurl']['name'] === ""):
			$dados['post_coverurl'] = 'dist'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'posts'.
			DIRECTORY_SEPARATOR.'capa_sem_imagem.jpg';
		else:
			// caso o usuario salve foto de capa do post
			$tmp_name =  $_FILES['post_coverurl']['tmp_name'];
			$type = substr( $_FILES['post_coverurl']['type'],6 );
			$size = $_FILES['post_coverurl']['size'];

			// valido o formato da imagem debe ser jpg e menor que 7MB o limite do apache para upload
			if($type !== "jpg" and $type !== "jpeg" and $size > 70000):
				
				$this->session->set_flashdata("danger","A imagem de capa debe ser jpg de no máximo 7MB, se precissar compacte-a, 
				recomendamos <a href='https://compressjpeg.com/pt/'  target='_blank' alt='Comprimir imagem'> esta ferramenta </a>");
				redirect(base_url('admin/cria/post'));
			endif;

			
			$date = date('d-m-Y');
			$post_path = 'dist'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'posts'.DIRECTORY_SEPARATOR.$date;
			$nome_capa = 'capa-'.$dados['post_url'].".".$type;
			$dados['post_coverurl'] = $post_path.DIRECTORY_SEPARATOR.$nome_capa;

			// se nao existir a pasta de posts para esta data, a crio
			cria_pasta($post_path);

			move_uploaded_file($tmp_name,$dados['post_coverurl']);
				
		
			//dd($dados);
		endif;
		//dd($dados);
		// feito todo o trabalho de criar url, pasta e/ou salvar imagem da capa
		// no server, agora salvar o post
		if(!$post_inserido  = $this->PostModel->salva_post($dados) ):
			//se nao conseguiu salvar o post remover arquivo da pasta criada
			unlink($dados['post_coverurl']);
			
			
			$this->session->set_flashdata("danger",	ERROR);
				redirect(base_url('admin'));
		else:
			$this->session->set_flashdata("success",SUCESSO);
				redirect(base_url('admin'));
		endif;

		
		

	}

	
	public function form_edita_post(){

		$post_id = $this->uri->segment(4);
		
		if(!$categorias = $this->SubcategoriasModel->lista_subcategorias()):
			$this->session->set_flashdata("danger",	ERROR);
				redirect(base_url('admin'));
		endif;

		if(!$post['data'] = $this->PostModel->busca_post($post_id)):
			
			$this->session->set_flashdata("danger",	ERROR);
				redirect(base_url('admin'));
		else:
			
			$post['categorias'] = $categorias;
			//dd($post);
			$this->load->template('admin/form_edita_post',$post);
		endif;
	}

	public function atualiza_post(){
		$dados = $this->input->post();
	
		//verificar de adicionar campo na tabela, para saber quem 
		// atualizou o post, pode ser diferente de quem criou
		$dados['post_editor_id'] = $_SESSION['user_id'];
		$dados['post_title'] = addslashes(strip_tags($dados['post_title']));
		$dados['post_content'] = addslashes(htmlentities($dados['post_content']));
		//usa helper para criar url
		 //monta_url($dados['post_title']);
		 //$dados['post_url'] = 'sem url preg_match por enquanto';
		 $dados['post_url'] = Name($dados['post_title']);

		// caso o usuario nao salve foto de capa do post
		if($_FILES['post_coverurl']['name'] !== ""):
		
			// caso o usuario salve foto de capa do post
			$tmp_name =  $_FILES['post_coverurl']['tmp_name'];
			$type = substr( $_FILES['post_coverurl']['type'],6 );
			$size = $_FILES['post_coverurl']['size'];

			// valido o formato da imagem debe ser jpg e menor que 7MB o limite do apache para upload
			if($type !== "jpg" and $type !== "jpeg" and $size > 70000):
				
				$this->session->set_flashdata("danger","A imagem de capa debe ser jpg de no máximo 7MB, se precissar compacte-a, 
				recomendamos <a href='https://compressjpeg.com/pt/'  target='_blank' alt='Comprimir imagem'> esta ferramenta </a>");
				redirect(base_url('admin/cria/post'));
			endif;

			
			$date = date('d-m-Y');
			$post_path = 'dist'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'posts'.DIRECTORY_SEPARATOR.$date;
			$nome_capa = 'capa-'.$dados['post_url'].".".$type;
			$dados['post_coverurl'] = $post_path.DIRECTORY_SEPARATOR.$nome_capa;

			// se nao existir a pasta de posts para esta data, a crio
			cria_pasta($post_path);

			move_uploaded_file($tmp_name,$dados['post_coverurl']);
				
		
			//dd($dados);
		endif;
		//dd($dados);
		// feito todo o trabalho de criar url, pasta e/ou salvar imagem da capa
		// no server, agora salvar o post
		if(!$post_atualizado  = $this->PostModel->atualiza_post($dados) ):
			//se nao conseguiu salvar o post remover arquivo da pasta criada
			
			// trabalhar de guardar a imagem atual em uma pasta alternativa, e
			// caso deu erro na atualização do post voltar a img anterior
			
			$this->session->set_flashdata("danger",	ERROR);
				redirect(base_url('admin'));
		else:
			$this->session->set_flashdata("success",SUCESSO);
				redirect(base_url('admin'));
		endif;
	}

	public function elimina_post(){

		$post_id = $this->uri->segment(4);

		if(!$post_eliminado  = $this->PostModel->elimina_post($post_id) ):
			//se nao conseguiu salvar o post remover arquivo da pasta criada
			
			// trabalhar de guardar a imagem atual em uma pasta alternativa, e
			// caso deu erro na atualização do post voltar a img anterior
			
			$data = array('retorno'=>'Erro processando o pedido tente mais tarde');
			
		else:
			$data = array('retorno'=>'Operação realizada com sucesso');
		

		endif;

		echo json_encode($data,true);
	}


}