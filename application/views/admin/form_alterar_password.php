
<!doctype html>
<html lang="pt-br">
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
    <form class="form-signin" method="post" action="<?=base_url('novo/password')?>">
      <div class="text-center mb-4">
          <input type="hidden" name="input_user_email" value="<?=$email?>">
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
        <p>Crie uma nova senha.  
          <a href="https://caniuse.com/#feat=css-placeholder-shown">Dúvidas, contate o desenvolvedor aqui.</a></p>
      </div>

      <div class="form-label-group">
        <input type="password" name="inputPassword1" id="inputPassword1" class="form-control" placeholder="Nova senha" required>
        <label for="inputPassword1">Senha</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="inputPassword2" id="inputPassword2" class="form-control" placeholder="Repita senha" required>
        <label for="inputPassword2">Repita Senha</label>
      </div>

      
      <button class="btn btn-lg btn-primary btn-block" >Salvar</button>
    
      <p class="mt-5 mb-3 text-muted text-center">&copy; <?=TITULO_SITE?> 2018-2019</p>
    </form>
    <script src="../../dist/js/jquery.min.js"> </script>

    <script>

     
          $('.btn').click(function(event){

            event.preventDefault();
                  let p1 = $("#inputPassword1").val();
                  let p2 = $("#inputPassword2").val();

                  if (p1 !== p2){
                    alert('Ambas senhas devem ser iguais');
                  }else{
                    $('form').submit();
                  }
          })
                  
    
     
        

     
    </script>


    </body>
</html>
