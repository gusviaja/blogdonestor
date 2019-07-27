<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubcategoriasController extends CI_Controller {


	public function __construct(){
        parent::__construct();
		$this->load->model(array("SubcategoriasModel","PostModel"));
       
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


	public function lista_categorias(){

		if( !$categorias = $this->SubcategoriasModel->lista_categorias() ):

			$data = array('categorias'=>'Sem categorias disponíveis');

		else:

			$data = array('categorias'=>$categorias);

		endif;
		
		echo json_encode($data,true);

	}

	public function salva_subcategory(){

		$dados['category_id'] = $this->input->post('category_id');
		$dados['subcategory_name'] = Name($this->input->post('subcategory_name'));

		if(!$dados['category_id'] OR !$dados['subcategory_name']):
			$data = array('retorno'=>'Preencher todos os campos do formulario');
			
		else:
			if( !$subcsalva = $this->SubcategoriasModel->salva_subcategoria($dados) ):

				$data = array('retorno'=>'Erro processando o pedido tente mais tarde');
	
			else:
				$data = array('retorno'=>'Operação realizada com sucesso');
				
	
			endif;
		
		endif;
		
		echo json_encode($data,true);
		
		
		//dd($dados['category_id'].$dados['subcategory_name']);
	}

	public function elimina_subcategory(){

		$subcategory_id = $this->uri->segment(4);
		$tem_posts = $this->PostModel->busca_post(null,$subcategory_id);

		if($tem_posts):
			$data = array('retorno'=>'Não pode eliminar sub-categorias que tem posts, pode sim desativala para não criar novos posts usando-a');
		
		else:
			if(!$subcategory_eliminado  = $this->SubcategoriasModel->elimina($subcategory_id) ):
				//se nao conseguiu salvar o post remover arquivo da pasta criada
				
				// trabalhar de guardar a imagem atual em uma pasta alternativa, e
				// caso deu erro na atualização do post voltar a img anterior
				
				$data = array('retorno'=>'Erro processando o pedido tente mais tarde');
				
			else:
				$data = array('retorno'=>'Operação realizada com sucesso');
			
	
			endif;
		endif;

		

		echo json_encode($data,true);
	}

}
// insert into tbl_posts (post_title, post_subcategory_id, post_content, post_editor_id, post_coverurl) values('Principais tags do bloco header',1,'Aqui colocar todo o texto referente a este post',1,'dist/img/posts/20190624/principais_tags_do_bloco_header.jpg');