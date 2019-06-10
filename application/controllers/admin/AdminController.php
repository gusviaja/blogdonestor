<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
        parent::__construct();
        $this->load->model(array("UserModel"));
       
    }



	public function index()
	
	{
		$template = 'admin/admin_panel.php';

		$this->load->template($template);
	}

	public function form_login(){
		/* if($this->session->has_userdata("nome")):
			redirect("/");
		else: */
			$this->load->view("admin/form_login");
		//endif;
	}
	
	public function logar(){
	/* 	foreach ($_SESSION as $s => $value) {
			echo "<pre>";
			echo $s."===>".$value;echo "</pre>";
		}
		die; */
		$dados = $this->input->post();
		$email = trim($dados["inputEmail"]);
		$pass = $dados["inputPassword"];
		$hash = password_hash($pass,PASSWORD_DEFAULT);
		
		if($retorno = $this->UserModel->buscaUsuario($email) ):

			$pass_db = $retorno->user_pass;
			$ok = password_verify($pass,$pass_db);

			if($ok):
				$usuario_logado = array (
					"nome" => $retorno->user_nome,
					"email"=>$retorno->user_email,
					"nivel" => $retorno->user_nivel,
					"ip"=>$_SERVER["REMOTE_ADDR"],
					
				);
				
					
				
				$this->session->set_userdata($usuario_logado);
				
				$this->session->set_flashdata("success",$retorno->user_nome." logado com sucesso");
				$this->load->template('admin/admin_panel');
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
}