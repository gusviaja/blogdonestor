<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CategoriesController extends CI_Controller {


	public function __construct(){
        parent::__construct();
        $this->load->model(array("CategoriesModel","SubcategoriasModel"));
       $this->load->helper(array("preferencias"));
    }

    public function lista(){
        if( !$lista['retorno'] = $this->CategoriesModel->lista() ):
            $lista['retorno'] = 'Sem resultados disponíveis';
            echo json_encode($lista,true);
        else:
            echo json_encode($lista,true);
        endif;
    }

    public function salva(){
        
        $dataset = $this->input->post();
        $dataset['category_name'] = Name($dataset['category_name']);

        if( !$categoria_salva = $this->CategoriesModel->salva($dataset) ):
            $retorno['retorno'] = 'Sem resultados disponíveis';
           
        else:
            $retorno['retorno'] = 'Categoria salva com sucesso';
            
        endif;
        echo json_encode($retorno,true);
    }

    public function busca(){
        $category_id = $this->uri->segment(4);
        if( !$categoria_achada = $this->CategoriesModel->busca($category_id) ):
            $retorno['retorno'] = 'Sem resultados disponíveis';
           
        else:
            $retorno['retorno'] = $categoria_achada;
            
        endif;
        echo json_encode($retorno,true);
    }

    public function deleta(){
        $category_id = $this->input->post('category_id');
        if( !$categoria_deletada = $this->CategoriesModel->deleta($category_id) ):
            $retorno['retorno'] = 'Erro processando seu pedido';
           
        else:
            $retorno['retorno'] = 'Pedido processado com sucesso';
            
        endif;
        echo json_encode($retorno,true);

    }

    public function form_cria_categorias(){
        
         $dados['categorias'] = $this->CategoriesModel->lista();
         $dados['subcategorias'] = $this->SubcategoriasModel->lista_categorias();

         dd($dados);


    }

}