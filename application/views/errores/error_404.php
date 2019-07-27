<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="<?=base_url('dist/img/favicon_blogodonestor.gif')?>"/>
	<link rel="author" <?= get_preferencias('description')?>/>

    <title><?= get_preferencias('title')?></title>
	<style>
	header{}
	header h1{color:white !important;}
	header h3{color:brown !important;}

	header p{color:grey !important;}
	footer {margin-top:50px !important;}
	</style>
  </head>
  <body>
  <div class="jumbotron jumbotron-fluid">
	<div class="container p-3">
	<header m-3>
		<h1 class="display-4 bg-danger text-center p-3"><strong><?php echo $heading; ?><strong></h1>
		<h3 class="lead text-center"><?php echo $message; echo get_preferencias('email_contato') ?></h3>
	</header>	
	<br>
	<footer>
	<a href="<?= base_url('admin')?>" alt="ir para home">Ir para Home...</a>
	</footer>
	</div>
  		
</div>

  

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>







	
