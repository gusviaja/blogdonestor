<?php

/* function auth(){

    
    $CI =&_get_instance();

    $primeiro_segmento = $CI->uri->segment(1);
    if( $primeiro_segmento = "admin" && !($CI->session->has_userdata("usuario_logado")) ):
        redirect("/");
    endif;
}


 */

  function auth(){
    
    
    $CI =& get_instance();

    $primeiro_segmento = $CI->uri->segment(1);
  
   //var_dump($primeiro_segmento === "entrar");
  // var_dump(isset($_SESSION["user_name"]));
   //die; 
   /*  echo $primeiro_segmento; echo "<br>";
    foreach ($_SESSION as $s => $value) {
        echo "<pre>";
        echo $s."===>".$value;echo "</pre>";
    } */
   
    if( trim($primeiro_segmento) === "entrar" && isset($_SESSION["user_name"]) ): //TRUE TRUE
        //echo " quis acessar admin sem estar logado";die;
       redirect(base_url("admin"));
    endif;

    if( trim($primeiro_segmento) === "admin" && !isset($_SESSION["user_name"]) ): //TRUE TRUE
        //echo " quis acessar admin sem estar logado";die;
       redirect(base_url("entrar"));
    endif;

    if( trim($primeiro_segmento) === "api" && !isset($_SESSION["user_name"]) ): //TRUE TRUE
        //echo " quis acessar admin sem estar logado";die;
        $return = array("data"=>"Necessita estar logado para acessar dados");
        echo json_encode($return);
        exit;
    endif;
}
