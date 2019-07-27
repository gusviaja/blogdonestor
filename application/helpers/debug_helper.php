<?php

function dd($coisa){
    $type = gettype($coisa);
    echo "<h2>Arquivo: <small>".$_SERVER['SCRIPT_FILENAME']."</small></h2>";

    echo"<p>Tipo de estrutura:<strong>".strtoupper($type)."</strong><br>";
    /* switch ($type){

        case 'array':
        $q = count($coisa);
        echo "<h3>Quantidade de items: $q</h3><br>";
        if (count($coisa) > 0):
           echo "<ul>";
            foreach ($coisa as $key => $value) {
              
                echo "<li><p><strong>Item</strong> $key <strong>valor:</strong> $value </p></li>";
            }
            echo "</ul>";
            die;
        else:
            echo "<h3>Trata-se de um array vazio: $q</h3><br>";
            die;
        endif;
        break;

    default: */
    echo '<pre>';
    var_dump($coisa);
    echo '</pre>';
    die;

    //}
     
}

function debug($element){
    $folder = 'debugs';
    
    if(!is_dir($folder)):
        mkdir($folder,0775);
    endif;
    /* if( gettype($element) !== 'string' ):
        $element = json_encode($element,true);
    endif; */
    $el = json_encode($element);
    $filename = $folder.DIRECTORY_SEPARATOR.'debug.txt';
    $fopen = @fopen($filename,'w+');
    $data = date('d/m/Y H:i:s')."\r\n";
    fwrite( $fopen,$data.$el);
    fclose($fopen);
    die;

}