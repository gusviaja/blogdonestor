<?php
function preferencias($key){

    $preferencias = array(
        "title" => "Blog do Nestor",
        "description" => "Blog do Nestor oferece cursos gratuitos de programação web, cursos gratuitos de programação back end e front end",
        "author" => "Ni Sistemas | desenvolvimento de sistemas web em São Paulo com pagamento em ate 12x",

    );




    if(array_key_exists($key,$preferencias)):
        echo trim($preferencias[$key]);
        return;
    else:
        $arr = array($key => "Preferencia não existe no sistema");
        echo $arr[$key];
    endif;
}
?>