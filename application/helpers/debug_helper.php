<?php

function dd($coisa){
    $type = gettype($coisa);
    echo "<h2>Arquivo: <small>".$_SERVER['SCRIPT_FILENAME']."</small></h2>";

    echo"<p>Tipo de estrutura: $type</pre><br>";
    switch ($type){

        case 'array':
        
        if (count($coisa) > 0):
            echo "<pre";
                print_r($coisa);
                
            echo "</pre>";
            die;
        else:
            var_dump($coisa);
            die;
        endif;
        break;

    default:
    echo '<pre>';
    var_dump($coisa);
    echo '</pre>';
    die;

    }
     
}