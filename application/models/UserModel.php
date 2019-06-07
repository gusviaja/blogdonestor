<?php

class UserModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

public function buscaUsuario($email){
   
    $this->db->select('*');
    $this->db->where("user_email",$email);
    $this->db->from('tbluser');
    
    if( $user = $this->db->get()->last_row() ):
        return $user;
    else:
        return FALSE;
    endif;
    
   
}

public function buscaCategoriasGerentes(){

    $this->db->select('categorias.id,categorias.ativa,categorias.name_categoria,categorias.gerente_id,users.name');
    $this->db->from('categorias');
    $this->db->order_by('categorias.name_categoria');
    $this->db->join('users', 'categorias.gerente_id = users.id');
    
    return $categorias = $this->db->get()->result_array();

    

    // echo "<pre>";var_dump($categorias);echo "</pre>";
}




}