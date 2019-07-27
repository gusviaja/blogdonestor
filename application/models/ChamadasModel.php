<?php

class ChamadasModel extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }

//LISTAR CHAMADAS CTOA, CONSUMIDO POR EXEMPLO NO DATA TABLE

public function lista_chamadas(){

    $query = "select tbl_chamadas.chamada_id, tbl_chamadas.chamada_title,
    tbl_chamadas.chamada_subtitle, tbl_chamadas.chamada_link,
    tbl_chamadas.chamada_cover_path, tbl_status.status_name from tbl_chamadas 
    left join tbl_status on tbl_chamadas.chamada_status = tbl_status.status_id";
    $query = $this->db->query($query)->result_array();

    if($query):

        $return['data'] = $query;
        $return['recordsTotal'] = count($query);
        $return['recordsFiltered'] = count($query);
    return $return;
    
    else:
        return FALSE;
    endif;
    
        
        
}

public function conta_chamadas(){
    $this->db->where('chamada_status', '1');
    $this->db->from('tbl_chamadas');
    $qtd_chamadas = $this->db->count_all_results();
    $return = $qtd_chamadas;

    return $return;
}

public function altera_status($chamada_id){
   

    $query = "select chamada_status from tbl_chamadas where chamada_id = ?";

    if(!$chamada =  $this->db->query($query,array($chamada_id) ) ):
            return FALSE;
    else:
       
        $chamada = $chamada->row();
        $chamada_status = (int) $chamada->chamada_status;
       // dd($chamada_status);
        if($chamada_status === 1):
            $return_status = 'inativo';
            $query = "UPDATE tbl_chamadas SET chamada_status = 2 WHERE chamada_id = ?";
        
            elseif($chamada_status === 2):
                $return_status = 'ativo';
            $query = "UPDATE tbl_chamadas SET chamada_status = 1 WHERE chamada_id = ?";
            
        endif;
        
        if( $this->db->query($query,array($chamada_id) ) ):
            return  $return_status;
        else:
            return FALSE;
        endif;
    endif;
   
}


}