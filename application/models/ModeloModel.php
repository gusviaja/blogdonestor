<?php

class ModeloModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
            $this->tbl = "tbl_";
    }


    public function lista($category_status = 3){
        
        

        if( $lista = $this->db->get($this->tbl)->result_array() ):
            return TRUE;
        else:
            return FALSE;
        endif;

    }

    public function busca($category_id){
       
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

        $this->db->where('','');

        if($item_editado = $this->db->update($this->tbl,$dataset) ):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function deleta($category_id){

        $this->db->where("","");

        if( $item_deltado = $this->db->delete($this->tbl) ):
            return TRUE;
        else:
            return FALSE;
        endif;

    }












}