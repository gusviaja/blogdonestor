<?php

class CategoriesModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
            $this->tbl = "tbl_categories";
    }


    public function lista($category_status = 3){

         $this->db->where('category_status <=',$category_status);

        if( $lista = $this->db->get($this->tbl)->result_array() ):
            return $lista;
        else:
            return FALSE;
        endif;

    }

    public function busca($category_id, $category_status = 3){

       $this->db->where('category_status <=',$category_status);
       $this->db->where('category_id',$category_id);

        if( $item = $this->db->get($this->tbl)->row_array() ):
            return $item;
        else:
            return FALSE;
        endif;
    }

    public function salva($dataset){

        
        if( $item_salvo = $this->db->insert($this->tbl,$dataset) ):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function edita($dataset){

        $this->db->where('category_id',$dataset['category_id']);

        if($item_editado = $this->db->update($this->tbl,$dataset) ):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function deleta($category_id){
       

        if( $item_deltado = $this->db->delete($this->tbl,array('category_id' => $category_id) ) ):
            return TRUE;
        else:
            return FALSE;
        endif;

    }












}