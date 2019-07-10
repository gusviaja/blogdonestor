<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model(array("PostModel"));
       
    }

    /*
    
    */
    //====================================================//
	//-----------------FUNCOES RESTFULL-------------------//
	//====================================================//
    public function lista_posts(){
		
		$obj = new \stdClass;
		$lista_posts = $this->PostModel->lista_posts();
    
       
    
    /*
        foreach ($lista_posts['data'] as $r) {
            //$r['post _coverurl'] =  "<img class='img img-responsive' src=''></img>";
            $valor = base_url().$r['post_coverurl'];
           // var_dump($r['post_coverurl']) ;
            $r['post_coverurl'] = '<img src='.$valor.'>';
           // var_dump($r['post_coverurl']) ;
        }
    */
    
		$obj->draw = '1';
		$obj->recordsTotal = $lista_posts['recordsTotal'];
		$obj->recordsFiltered = $lista_posts['recordsFiltered'];
		$obj->data =  $lista_posts['data'];
		
		echo json_encode($obj);
	}

}