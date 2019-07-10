

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model(array("UserModel"));
       
	}
	
	public function form_edita_perfil(){
		if( $id = $this->uri->segment(3)):
			$usuario = $this->UserModel->mostra_perfil($id);
			unset($usuario->user_pass);
			$usuario->user_img_path = str_replace("'","",$usuario->user_img_path);
			$usuario->status_name = strtoupper($usuario->status_name);
			switch ($usuario->status_name) {
				
				case 'ATIVO':
					$usuario->status_name = "<h3 class='badge badge-success'>$usuario->status_name</h3>";
					break;

				case 'INATIVO':
					$usuario->status_name = "<h3 class='badge badge-warning'>$usuario->status_name</h3>";
					break;
				case 'DELETADO':
					$usuario->status_name = "<h3 class='badge badge-danger'>$usuario->status_name</h3>";
					break;
				
				default:
				$usuario->status_name = "<h3 class='badge badge-info'>$usuario->status_name</h3>";
				break;
			}

			switch ($usuario->level_name) {
				case 'admin':
				$usuario->level_name = "<h2><i class='ion-ribbon-a'>$usuario->level_name</i></h2>";
					break;
				
				default:
				$usuario->level_name = "<i class='fa-id-card-alt'>$usuario->level_name</i>";
			
				break;
			}
			



			//dd($usuario);
			$this->load->template("admin/form_editaperfil",$usuario,0);
		else:
			$this->session->set_flashdata("danger",EMAIL_INEXISTENTE);
			redirect('admin');
		endif;
		
		
	}

	//limitar tamanho de upload conforme apache
	// permitir somente jpg? verificar isto
	public function form_edita_imagem(){
		if($_FILES):
			$files = $_FILES['inputFile'];
			$name = $files['name']; 
			$size = $files['size'];
			$type = substr($files['type'],6);
			$tmp_name = $files['tmp_name'];
			$new_name = 'fotoperfil.jpg';
			$size = $files['size'];
	
			 $id = $_SESSION['id']; 
			 $path_img = 'dist'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.
			 'usuarios'.DIRECTORY_SEPARATOR.$id;
			//dd($path_img);
			
			if($type !== 'jpg' &&  $type !== 'jpeg'):
				$this->session->set_flashdata("danger","formato da imagem 
				$type não aceito");
				redirect("admin/editaperfil/$id");
			endif;

			if($size > 7000):
				$this->session->set_flashdata("danger","Tamanho da imagem 
				$size acima do limite, se precissar recortar uma imagem recomendamos 
				<a href='https://www.befunky.com/pt/recursos/cortar-foto/' alt='Befunky'>Befunky aqui</a>");
				redirect("admin/editaperfil/$id");
			endif;

			if( is_dir( $path_img )): 
				move_uploaded_file($tmp_name,$path_img.DIRECTORY_SEPARATOR.$new_name);
				echo 'com sucesso';
			else:
				mkdir($path_img,0775);
				move_uploaded_file($tmp_name,$path_img.DIRECTORY_SEPARATOR.$new_name);
			endif;
		
		endif;
		//echo "$tmp_name ---   $name ----  e tipo: $type";
	}

	public function atualiza_perfil(){
		$dataset = $this->input->post();
		//dd($dataset);
		
		if( !$perfil_atualizado = $this->UserModel->atualiza_perfil($dataset) ):
			$this->session->set_flashdata("danger",ERROR);
				redirect("admin/editaperfil/$id");
		else:
			$this->session->set_flashdata("success",SUCESSO);
				redirect("admin");
		endif;
	}

    //====================================================//
	//-----------------FUNCOES RESTFULL-------------------//
    //====================================================//
    //update tbl_posts set post_coverurl = "<a href='http://blogdonestor.com.br/dist/img/posts/20190621/estrutura_basica_de_uma_pagina.jpg' target='_blank'> ver imagem</a>";
	public function lista_usuarios(){
		$obj = new \stdClass;
		$lista_usuarios = $this->UserModel->lista_usuarios();

		$obj->draw = '1';
		$obj->recordsTotal = $lista_usuarios['recordsTotal'];
		$obj->recordsFiltered = $lista_usuarios['recordsFiltered'];
		$obj->data =  $lista_usuarios['data'];
		
		echo json_encode($obj);
	}


}