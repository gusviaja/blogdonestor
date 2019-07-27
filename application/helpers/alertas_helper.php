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
    if($ci->session->flashdata()):
    if($ci->session->flashdata('success')):
       echo "<div class='alert alert-success alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button><p class=text-center>".$ci->session->flashdata('success').
       "</p></div>";
      
     elseif($ci->session->flashdata('danger')):
        echo "<div class='alert alert-danger alert-dismissible' role='alert'> <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button><p class=text-center>".$ci->session->flashdata('danger').
        "</p></div>";
     endif;
      	
    endif;
 }
