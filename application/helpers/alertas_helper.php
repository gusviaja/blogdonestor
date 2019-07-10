<?php

function alerta($constante){

   $htmlAlerta = "<div class='alert alert-danger' role='alert'>
   UPPS :/ $constante!
 </div>";
    return $htmlAlerta;

}
function sucesso($constante){

    $htmlSucesso = "<div class='row'>
    <div class='md-4'>
    </div>
    <div class='alert alert-success text-center' role='alert'>  OTIMO!!! - $constante</div>";
     return $htmlSucesso;
 
 }

 function alertas(){
     $ci = get_instance();
    if($ci->session->flashdata('success')):
       echo "<div class='alert alert-success'>".$ci->session->flashdata('success').
       "</div>";
      
     elseif($ci->session->flashdata('danger')):
        echo "<div class='alert alert-danger'>".$ci->session->flashdata('danger').
        "</div>";
     endif;
      	

 }
