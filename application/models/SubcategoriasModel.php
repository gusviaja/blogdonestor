
<?php

class SubcategoriasModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
            $this->tbl = 'tbl_subcategories';
    }



//===========LISTA AS SUBCATEGORIAS DOS POSTS====================//
public function lista_subcategorias($cat_status = 4){
    $query = "select tbl_subcategories.subcategory_id, tbl_subcategories.subcategory_name, tbl_categories.category_name,
    tbl_status.status_name from tbl_subcategories left join tbl_categories 
    on tbl_subcategories.category_id = tbl_categories.category_id 
    left join tbl_status on tbl_subcategories.subcategory_status = tbl_status.status_id 
    where tbl_subcategories.subcategory_status < $cat_status order by tbl_subcategories.subcategory_name ASC";

    $list_subcategories = $this->db->query($query)->result_array();
    //$list_subcategories = $this->db->get("tbl_subcategories")->result_array();

    $return['data'] = $list_subcategories;
    $return['recordsTotal'] = count($list_subcategories);
    $return['recordsFiltered'] = count($list_subcategories);
    return $return;


}

public function conta_subcategorias(){
    $this->db->where('subcategory_status', '1');
    $this->db->from('tbl_subcategories');
    $qtd_subcategories = $this->db->count_all_results();
    $return = $qtd_subcategories;

    return $return;
}

public function altera_status($subcategory_id){

    $query = "select subcategory_status from tbl_subcategories where subcategory_id = ?";

    if(!$subc =  $this->db->query($query,array($subcategory_id) ) ):
            return FALSE;
    else:
        $subc = $subc->row();
        $subc_status = $subc->subcategory_status;
        //debug(gettype($subc_status));
        if($subc_status == "1"):
            $return_subc = "inativo";
            $query = "UPDATE tbl_subcategories SET subcategory_status = 2 WHERE subcategory_id = ?";
        elseif($subc_status == "2"):
             $return_subc = "ativo";
            $query = "UPDATE tbl_subcategories SET subcategory_status = 1 WHERE subcategory_id = ?";
            
        endif;
        
        if( $exec = $this->db->query($query,array($subcategory_id) ) ):
            
            return  $return_subc;

        else:
            return FALSE;
        endif;
    endif;



}

public function lista_categorias($cat_status = 4){
    $table = 'tbl_categories';
    $this->db->where( "category_status <",$cat_status); 
    $categorias = $this->db->get($table);
    //dd($categorias);
   if( !$categorias = $this->db->get($table)->result_array() ):
    return FALSE;
   else:
    return $categorias;
   endif; 

}

public function salva_subcategoria($dataset){
    $table = 'tbl_subcategories';
    
    
    if( !$this->db->insert($table,$dataset) ):
            return FALSE;
    else:
            return TRUE;
    endif;
}

public function elimina($subcategory_id){
    
    if($subc_eliminada = $this->db->delete($this->tbl,array('subcategory_id'=>$subcategory_id))):
        return TRUE;
    else:
        return FALSE;
    endif;
}


}
   