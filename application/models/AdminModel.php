<?php

class AdminModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

public function loadResume(){

$enabled = 1;
$limit = 30;
$offset = 0;



$this->db->where('user_status', $enabled);
$this->db->from('tbl_user');
$qtd_usr = $this->db->count_all_results();
$return['qtd_usuarios'] = $qtd_usr;

$this->db->where('subcategory_status', $enabled);
$this->db->from('tbl_subcategories');
$qtd_subcategories = $this->db->count_all_results();
$return['qtd_subcategories'] = $qtd_subcategories;

$this->db->where('post_status', $enabled);
$this->db->from('tbl_posts');
$qtd_posts = $this->db->count_all_results();
$return['qtd_posts'] = $qtd_posts;

$this->db->where('chamada_status', '1');
$this->db->from('tbl_chamadas');
$qtd_chamadas = $this->db->count_all_results();
$return['qtd_chamadas'] = $qtd_chamadas;

}

}