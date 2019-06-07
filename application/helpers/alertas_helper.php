<?php

function alerta($constante){

   $htmlAlerta = "<div class='alert alert-danger' role='alert'>
   $constante!
 </div>";
    return $htmlAlerta;

}
function sucesso($constante){

    $htmlSucesso = '<div class="row"><div class="md-4></div><div class="alert alert-success text-center" role="alert"> <i class="material-icons">
    info
    </i> <span>'.$constante.'</span></div>';
     return $htmlSucesso;
 
 }
