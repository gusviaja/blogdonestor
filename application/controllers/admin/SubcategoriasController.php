<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubcategoriasController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model(array("SubcategoriasModel"));
       
    }
    //====================================================//
	//-----------------FUNCOES RESTFULL-------------------//
    //====================================================//
    
    public function lista_subcategorias(){

		$obj = new \stdClass;
		$lista_categorias = $this->SubcategoriasModel->lista_subcategorias();

		$obj->draw = '1';
		$obj->recordsTotal = $lista_categorias['recordsTotal'];
		$obj->recordsFiltered = $lista_categorias['recordsFiltered'];
		$obj->data =  $lista_categorias['data'];
		
		echo json_encode($obj);
	}
	
	public function qtd_posts_por_subcategoria(){
		$query = 'select count(tbl_posts.post_title), tbl_subcategories.subcategory_name 
		from tbl_posts inner join tbl_subcategories on tbl_posts.post_subcategory_id 
		= tbl_subcategories.subcategory_id group by tbl_subcategories.subcategory_name';
	}


}
// insert into tbl_posts (post_title, post_subcategory_id, post_content, post_editor_id, post_coverurl) values('Principais tags do bloco header',1,'Aqui colocar todo o texto referente a este post',1,'dist/img/posts/20190624/principais_tags_do_bloco_header.jpg');