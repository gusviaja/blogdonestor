<?php

class PostModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
            //$this->load->helper('debug');
    }

//AJAX PARA LISTAR POSTS, CONSUMIDO POR EXEMPLO NO DATA TABLE
public function lista_posts($post_status = 4){
    $query = "select tbl_posts.post_url,tbl_posts.post_content,tbl_posts.post_id,tbl_posts.post_title, tbl_posts.post_coverurl, 
    tbl_posts.date_updated, tbl_subcategories.subcategory_name,
    tbl_user.user_name, tbl_status.status_name from tbl_posts 
    left join tbl_subcategories on tbl_posts.post_subcategory_id = tbl_subcategories.subcategory_id
    left join tbl_user on tbl_posts.post_editor_id = tbl_user.user_id
    left join tbl_status on tbl_posts.post_status = tbl_status.status_id
    where tbl_posts.post_status < $post_status";
     $list_posts = $this->db->query($query)->result_array();
   
    
 

    //debug($list_posts);

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

/* $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
$this->db->query($sql, array(3, 'live', 'Rick')); */

public function altera_status($post_id){

    $query = "select post_status from tbl_posts where post_id = ?";

    if(!$post =  $this->db->query($query,array($post_id) ) ):
            return FALSE;
    else:
        $post = $post->row();
        //debug($post);
        $post_status = $post->post_status;
   
        if($post_status == "1"):
            $return_pos = "inativo";
            $query = "UPDATE tbl_posts SET post_status = 2 WHERE post_id = ?";
        elseif($post_status == "2"):
            $return_pos = "ativo";
            $query = "UPDATE tbl_posts SET post_status = 1 WHERE post_id = ?";
            
        endif;
/*        
 */        if( $return = $this->db->query($query,array($post_id) ) ):
          
            return $return_pos;
        else:
            return FALSE;
        endif;
    endif;
   
}

public function salva_post($dataset){
    //dd($dataset);
    $verifica_se_existe_post = $this->busca_post_em_duplicidade($dataset );
    //dd($verifica_se_existe_post);
    if(!$verifica_se_existe_post):
        try {
            
            $retorno = $this->db->insert('tbl_posts', $dataset);
            return $retorno;
                
        } catch (\Throwable $th) {
            //capturar erro, salvar em arquivo e enviar para o suporte
            // echo $th->getMessage();
            return false;
        }
    else:
        return FALSE;
    endif;

  


   
   


}

public function busca_post($post_id = null, $subcategory_id = null){

 if( $post_id !== null and $subcategory_id == null):
    $query = "select * from tbl_posts where post_id = ? order by post_title ASC";
    $post = $this->db->query($query, array('post_id'=>$post_id));
 elseif ( $post_id == null and $subcategory_id == null ):
    $query = "select * from tbl_posts order by post_title ASC";
    $post = $this->db->query($query);
 elseif($subcategory_id !== null && $post_id !== null):
    $query = "select * from tbl_posts where post_id = ? and post_subcategory_id = ? order by post_title ASC";
    $post = $this->db->query($query, array('post_id'=>$post_id,'post_subcategory_id'=>$subcategory_id));
elseif($post_id == null and $subcategory_id !== null):
     $query = "select * from tbl_posts where post_subcategory_id = ? order by post_title ASC";
     $post = $this->db->query($query, array('post_subcategory_id'=>$subcategory_id));
else:
    return FALSE;
endif;  
//dd($post);

    if($post):
       // dd($post);
        return $post->row_array();
    else:

        return FALSE;
    endif;
}


public function atualiza_post($dataset){
    
$verifica_se_existe_post = $this->busca_post( $dataset['post_title'] );

if(!$verifica_se_existe_post):
    $tbl = 'tbl_posts';
    $post_id = $dataset['post_id'];
    unset($dataset['post_id']);
    unset($dataset['post_editor_id']);
    $this->db->where('post_id', $post_id);
    

    if( $this->db->update($tbl, $dataset)):
        return TRUE;
    else:
        return FALSE;
    endif;

else:
    return FALSE;
endif;   
   
}

public function elimina_post($post_id){
    $tbl = 'tbl_posts';
    //verifico que nao exista outro post com o mesmo titulo, mesmo eliminado, lembrando que 
    // removi o unique do campo post_title para poder ter na tabela n registros com o mesmo
    //titulo desde que apenas um esteja ativo, todo o resto pode ter sido eliminado no pasado
    if ($title = $this->busca_post($post_id)['post_title'] ):
        $title = 'old_'.$title;
        $campos = array(
            'post_status'=>3,
            'post_title'=>$title
        );
            $this->db->where("post_id", $post_id);
        
            if( $this->db->update($tbl, $campos)):

                return TRUE;
            else:
                return FALSE;
            endif;
    else:
        return FALSE;
    endif;

}

public function busca_post_em_duplicidade($dataset){

    $this->db->where('post_title',$dataset['post_title']);
    $this->db->where('post_subcategory_id',$dataset['post_subcategory_id']);
    $this->db->where('post_status <',3);

    if( $return = $this->db->get('tbl_posts')->row_array()):
        return TRUE;
    else:
        return FALSE;
    endif;
}

}