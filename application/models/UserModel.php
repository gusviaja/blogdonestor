<?php

class UserModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

    public function buscaUsuario($email){
    
        $query = "select * from tbl_user where user_email = '$email' and user_status = 1";
        $query = $this->db->query($query);
        if( $user = $query->last_row() ):
            return $user;
        else:
            return FALSE;
        endif;    
    
    }

//FUNCAO PARA RECUPERAR SENHA
public function pedido_recuperar_senha($email,$token){
    
    $query = "select user_email from tbl_user where user_email = '$email'";

    if($email_bd = $this->db->query($query)->row()):
        $data_exp = new DateTime();
        $periodo = new DateInterval("P1D");
       // $data_exp->format('Y-m-d H:i:s');
        $data_exp->add($periodo);
        $data_expires = $data_exp->format('Y-m-d H:i:s');
        $query = "select * from tbl_reset_password where user_email = '$email'";
        $exists_in_reset = $this->db->query($query)->result_array();
        //var_dump( count($exists_in_reset));die;
        if( count ($exists_in_reset) > 0):
            $query = "UPDATE tbl_reset_password SET 
            reset_pass_token = '$token', date_expires ='$data_expires' 
            where user_email = '$email'";
        else:
            $query = "INSERT into tbl_reset_password (user_email, 
                    reset_pass_token,date_expires) values 
                    ('$email','$token','$data_expires')";
        endif;
            
        if( !$this->db->query($query) ):
            return FALSE;
        else:
            return TRUE;
        endif;
    else:
        return FALSE;
    endif;
}

public function verifica_token($input_token){
    $query = "SELECT * from tbl_reset_password where reset_pass_token = '$input_token'";
   // dd($query);
    if(!$result = $this->db->query($query)->row()):
        return FALSE;
    else:
        return $result;
    endif;
}

//LEMBRAR DE TROCAR ESTAS DUAS QUERYS POR TRANSACTION, OU REALIZAR TRIGER NA TABELA, OU VER PROCEDURES
public function reset_password($email,$password){
    $query1 = "UPDATE tbl_user SET user_pass = '$password' WHERE user_email = '$email' AND user_status = 1";
    $query2 = "DELETE FROM tbl_reset_password where user_email = '$email'";

    $this->db->trans_start();
        $this->db->query($query1);
        $this->db->query($query2);
    if(!$this->db->trans_complete()):
        return FALSE;   
    else:
        return TRUE;
    endif;

    
}
/* "dist'/img'/usuarios'/1'/fotoperfil.jpg" */
public function mostra_perfil($id){
    $query = "select tbl_user.user_id, tbl_user.user_email, tbl_user.user_img_path,
    tbl_user.user_name, tbl_user.user_pass,tbl_user.date_created, 
    tbl_user.date_updated, tbl_user_level.level_name,
    tbl_status.status_name from tbl_user inner join tbl_user_level on tbl_user.user_level = 
    tbl_user_level.level_id inner join tbl_status on tbl_user.user_status = tbl_status.status_id
    where tbl_user.user_id = '$id' and tbl_user.user_status = 1";

    if( $result = $this->db->query($query)->row() ):
        return $result;
    else:
        return FALSE;
    endif;
}

public function atualiza_perfil($dataset){
    dd($dataset);
}
///////////////////////////////////////////////////////////////////////////

public function conta_usuarios(){
    $this->db->where('user_status', '1');
    $this->db->from('tbl_user');
    $qtd_usr = $this->db->count_all_results();
    $return = $qtd_usr;

return $return;
}



//AJAX PARA LISTAR USUARIOS, CONSUMIDO POR EXEMPLO NO DATA TABLE

public function lista_usuarios(){

    $query = "select tbl_user.user_name, tbl_user.user_email, tbl_status.status_name, tbl_user_level.level_name
    from tbl_user left join tbl_status on tbl_user.user_status = tbl_status.status_id 
    left join tbl_user_level on tbl_user.user_level = tbl_user_level.level_id";
$list_usuarios = $this->db->query($query)->result_array();
$return['data'] = $list_usuarios;
$return['recordsTotal'] = count($list_usuarios);
$return['recordsFiltered'] = count($list_usuarios);
return $return;

}


}