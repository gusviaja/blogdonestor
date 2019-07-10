
<?php

class SubcategoriasModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }



//===========LISTA AS SUBCATEGORIAS DOS POSTS====================//
public function lista_subcategorias(){
    $query = "select tbl_subcategories.subcategory_name, tbl_categories.category_name,
    tbl_status.status_name from tbl_subcategories left join tbl_categories 
    on tbl_subcategories.category_id = tbl_categories.category_id 
    left join tbl_status on tbl_subcategories.subcategory_status = tbl_status.status_id 
    order by tbl_subcategories.subcategory_name";

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


}
   