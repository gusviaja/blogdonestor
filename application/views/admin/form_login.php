
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog do Nestor Painel de login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../dist/css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
  
 
    <form class="form-signin" method="post" action="<?=base_url('logar')?>">
      <div class="text-center mb-4">
        <?php if($this->session->flashdata()):

          if($this->session->flashdata('success')):
            $mensagem = sucesso($this->session->flashdata('success'));
            
          elseif($this->session->flashdata('danger')):
            $mensagem = alerta($this->session->flashdata('danger'));
          endif;
          echo $mensagem;	
          endif;
        ?>
        <img class="mb-4" src="../../dist/img/logo_painel.gif" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Administração</h1>
        <p>Acesse com suas credenciais para gerenciar o CMS.  
          <a href="https://caniuse.com/#feat=css-placeholder-shown">Dúvidas, contate o desenvolvedor aqui.</a></p>
      </div>

      <div class="form-label-group">
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
    
      <p class="mt-5 mb-3 text-muted text-center">&copy; <?=TITULO_SITE?> 2018-2019</p>
    </form>
  </body>
</html>
