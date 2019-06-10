<?php
Class MY_Loader extends CI_Loader{
	
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code

        }

        public function template($nomeDoTemplate,$dados = null)
        {
                //$dados['usuariostored']=carregaDadosUser();
           
        	$this->view('admin/layout/cabecalho.php', $dados);
                $this->view($nomeDoTemplate,$dados);
                $this->view('admin/layout/footer.php');
        }

        public function theme_template($nomeDoTemplate,$dados = null)
        {
                //$dados['usuariostored']=carregaDadosUser();
           
        	$this->view("themes".DIRECTORY_SEPARATOR."padrao".DIRECTORY_SEPARATOR."layout/cabecalho.php", $dados);
                $this->view($nomeDoTemplate,$dados);
                $this->view("themes".DIRECTORY_SEPARATOR."padrao".DIRECTORY_SEPARATOR."layout/footer.php");
        }
        
}
?>