<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChamadasController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model(array("ChamadasModel"));
       
    }
    
    //====================================================//
	//-----------------FUNCOES RESTFULL-------------------//
	//====================================================//

    public function lista_chamadas(){
		$lista_chamadas = $this->ChamadasModel->lista_chamadas();
		echo json_encode($lista_chamadas);
	}

}