<?php

class PostModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

//AJAX PARA LISTAR POSTS, CONSUMIDO POR EXEMPLO NO DATA TABLE
public function lista_posts(){
    $query = "select tbl_posts.post_title, tbl_posts.post_content, tbl_posts.post_coverurl, 
    tbl_posts.date_updated, tbl_subcategories.subcategory_name,
    tbl_user.user_name, tbl_status.status_name from tbl_posts 
    left join tbl_subcategories on tbl_posts.post_subcategory_id = tbl_subcategories.subcategory_id
    left join tbl_user on tbl_posts.post_editor_id = tbl_user.user_id
    left join tbl_status on tbl_posts.post_status = tbl_status.status_id";
     $list_posts = $this->db->query($query)->result_array();
   
    $return['data'] = $list_posts;
    $return['recordsTotal'] = count($list_posts);
    $return['recordsFiltered'] = count($list_posts);

    return $return;
}


//update tbl_posts set post_coverurl = 'dist/img/posts/20190621/estrutura_basica_de_uma_pagina.jpg';

public function conta_posts(){

    $this->db->where('post_status', '1');
    $this->db->from('tbl_posts');
    $qtd_posts = $this->db->count_all_results();
    $return = $qtd_posts;

    return $return;
}

}