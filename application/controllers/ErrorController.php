<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorController extends CI_Controller {

	public function page_missing()
	{
		$dados = array(
			'heading'=>'Ups pagina não encontrada :/',
			'message'=>"Verifique a URL, parece que não existe!!!</h2><br> 
			Se você a digitou, tome um café respire e faça direito e veio de um link desabafe com 
			o administrador no e-mail:"
		);
		$this->load->view('errores/error_404.php',$dados); // atualizar o painel para que puxe a rota dinamica da tabela preferencias do banco.
		
	}
}
