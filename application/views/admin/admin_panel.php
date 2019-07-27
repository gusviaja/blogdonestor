<style>
  thead{
    background-color:black;
    color:white;
  }
 /*  .h3,.h4{margin-top:10px !important;} */
  .label_verde{background-color:green; font-size:1.5em; 
  border-radius:5px;padding:1px 0; vertical-align:middle;}

  .label_verde a{color:white;}
  #spinner{
          position:relative;
          left: 48%;
          top: 10px;
          z-index: 80;
          width:90px;
          height:90px;
        }
  #spinner-modal{
        position:relative;
          left: 48%;
          top: 10px;
          z-index: 80;
          width:90px;
          height:90px;
  }
  #qtd_posts,#qtd_usuarios,#qtd_subcategorias,#qtd_chamadas
  {
    color:#fff !important;
  }
  @media screen and (max-width: 1025px) {
  
    .atalhos{
      display:none;
    } 
  
  }

.atalhos{
    position:fixed;
    top:150px;
    left:10px;
    z-index:2000;
    width:100px;
    height:auto;
  }
  .div_atalhos{
    padding:5px; border: 3px solid #c5cad1 !important;
    border-radius:50%; 
    margin-bottom:12px;
    width:60px;
    box-shadow: 2px 5px 8px 2px #888888;
    
  }
  ul.ul_atalhos>li{list-style:none;}
  div.div_atalhos.posts{background-color:#00c0ef;}
  div.div_atalhos.subcategorias{background-color:#38d6bd;}
  div.div_atalhos.usuarios{background-color:#f39c12;}
  div.div_atalhos.chamadas{background-color:#b50cad;}
  div.div_atalhos a{color:white !important; font-size:28px;}
  div.div_atalhos span{color:white !important; font-size:28px;}
  
</style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php alertas();


?>
<?php include_once('layout/nav.php') ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
        
  <div id="atalhos" class="atalhos">
        <ul class="ul_atalhos">
        <li><div class="div_atalhos posts text-center" data-toggle="tooltip" data-placement="right" title="Criar Post"><a href="<?=base_url('admin/cria/post')?>">+</a></div><li>
        <li><div class="div_atalhos subcategorias text-center" data-toggle="tooltip" data-placement="right" title="Criar Subcategoria" onclick="toggle_form_subcategorias()"><span>+</span></div><li>
        <li><div class="div_atalhos usuarios text-center" data-toggle="tooltip" data-placement="right" title="Criar Usuario"><a href="<?=base_url('admin/cria/usuarios')?>">+</a></div><li>
        
        <li><div class="div_atalhos chamadas text-center data-toggle="tooltip" data-placement="right" title="Criar Chamada""><a href="<?=base_url('admin/cria/chamadas')?>">+</a></div><li>
        </ul>
      </div>

    <div id="spinner">
      <img src="<?=base_url('dist/img/spinner.gif')?>" alt="aguardando">
      <small class="text-center"><strong>Aguardando...<strong></small>
    </div>
    
    <div class="container">


<!-- ________________________________ -->
     <!----------MODAL CATEGORIAS --------->
    <!---------------------------------------->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal_categorias">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

      <!-- //SPINNER -->
         <div id="spinner-modal" hidden>
          <img src="<?=base_url('dist/img/spinner.gif')?>" alt="aguardando">
          <small class="text-center"><strong>Aguardando...<strong></small>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Criar Categoria</h4>
      </div> <!-- END MODAL HEADER -->
      <div class="modal-body">
        <div class=row>
           <div class="col-md-6">
            <div class="form-group">
            <label for="multiple_categorias">Cagtegorias existentes</label>
              <select multiple class="form-control" id="multiple_categorias" disabled>

              </select>
            </div>
          </div>
            <div class="col-md-6">
                <form id="form_cria_categoria">
                <div class="form-group">
                        <label for="category_name">Nome: </label>
                        <input class="form-control" type="text" id="cat_name" name="cat_name" maxlength="50">

               </div>

                    
                </form>
            </div>
        </div> <!-- END ROW -->
      </div> <!-- END MODAL BODY -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary"  onclick="salvar_categoria(event)">Salvar Categoria</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



     <!-- ________________________________ -->
     <!--------- FIM MODAL CATEGORIAS --------->
    <!---------------------------------------->







     <!-- ________________________________ -->
     <!----------MODAL SUBCAEGORIAS --------->
    <!---------------------------------------->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal_subcategorias">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
    <!-- //SPINNER -->
      <div id="spinner-modal" hidden>
        <img src="<?=base_url('dist/img/spinner.gif')?>" alt="aguardando">
        <small class="text-center"><strong>Aguardando...<strong></small>
     </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Criar Subcategoria</h4>
      </div>
      <div class="modal-body">
        <div class=row>
            <div class="col-md-8 col-md-offset-2">
                <form id="form_cria_subcategoria">
                <div class="form-group">
                        <label for="subcategoria_name">Nome: </label>
                        <input class="form-control" type="text" id="subcategory_name" name="subcategory_name" maxlength="50">

                    </div>

                    <div class="form-group">
                        <label for="categoria_name">Pertence a categoria:  </label>
                        <select class="form-control" id="category_id" name="category_id">
                            
                        </select>

                    </div>
                </form>
            </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary"  onclick="salvar_subcategoria(event)">Salvar Subcategoria</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



     <!-- ________________________________ -->
     <!--------- FIM MODAL SUBCAEGORIAS --------->
    <!---------------------------------------->


        <section class="content">
                <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" id="painelPosts" onmouseover="mostra_painel_posts()">
            <div class="inner">
              <h3 id="qtd_posts"><?=$qtd_posts?></h3>

              <p>Posts ativos</p>
            </div>
            <div class="icon">
              <i class="ion-android-list"></i>
            </div>
            <a href="#" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-mar" id="painelCategorias" onmouseover="mostra_painel_categorias()">
            <div class="inner">
              <h3 id="qtd_subcategorias"><?=$qtd_subcategorias?></h3>

              <p>Sub-categorias ativas</p>
            </div>
            <div class="icon">
              <i class="ion-ios-pricetags-outline"></i>
            </div>
            <a href="#" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow" id="painelAdm" onmouseover="mostra_painel_painelAdm()">
            <div class="inner">
              <h3 id="qtd_usuarios"> <?= $qtd_usuarios?></h3>

              <p>Administradores</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i> 
            <!--  <i class="fas fa-bars"></i>-->
            </div>
            <a href="#" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-uva" id="painelCToA" onmouseover="mostra_painel_ctoa()">
            <div class="inner">
              <h3 id="qtd_chamadas"><?=$qtd_chamadas?></h3>

              <p>Chamadas de destaque</p>
            </div>
            <div class="icon">
              <i class="ion-card"></i>
            </div>
            <a href="#" class="small-box-footer">Ver mais <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
      <div class="col-xs-12">
        <!-- DIV DE CATEGORIAS-->
              <div class="box" id="subcategorias">
                    <div class="box-header bg-mar">
                      <h3 class="box-title">Todas as subcategorias criadas - <strong>ativas = <?=$qtd_subcategorias?></strong></h3>
                      
                    </div>
                    <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-dark table-hover table-striped" id='tbl_subcategorias'>
                  <thead>
                    <tr>
                          <th>Subcategoria_id</th>
                          <th>Subcategoria</th>
                          <th>Categoria pai</th>
                          <th>Status</th>
                          <th>Ações</th>
                          
                    </tr>
                  </thead>
                <tbody>
                
              </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
               <!-- /.box -->
        
               <!-- DIV DE ADMINISTRADORES -->
               <div class="box" id="administradores">
                    <div class="box-header bg-yellow">
                      <h3 class="box-title">Administradores do sistema</h3>

                   
                      
                    </div>
                    <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id="tbl_usuarios">
                  <thead>
                   <tr>
                      <th>Id</th> 
                      <th>Imagem de Perfil</th>
                      <th>Usuario</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Permissão</th>
                    </tr>
                  </thead>
                <tbody>
              
              </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
               <!-- /.box -->

            
        <!-- DIV POSTS-->
        <div class="box" id="posts">
            <div class="box-header bg-aqua">
              <h3 class="box-title">Post criados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tbl_posts" class="table table-responsive table-bordered table-striped ">
                <thead>
                <tr>
                <th>ID</th>
                  <th>Splash</th>
                  <th>Titulo</th>
                  <th>Subcategoria</th>
                  <th>Atualizado em</th>
                  <th>Criado por</th>
                  <th>Status</th>
                  <th>Ações</th>
                  <th>Conteudo</th>
                  <th>URL</th>
                </tr>
                </thead>
                <tbody>
                
            
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box DE DIV POSTS -->


  <!-- DIV CTOA CHAMADA BANNER PRINCIPAL-->
              
                 <div class="box" id="ctoa">
                    <div class="box-header bg-uva">
                      <h3 class="box-title">Chamadas criadas</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
              <table id="tbl_chamadas" class="table table-responsive table-bordered table-striped ">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Titulo</th>
                  <th>Subtitulo</th>
                  <th>Imagem</th>
                  <th>Link</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                
            
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
              </div>
               <!-- /.box -->



        </div>
      </div>
        </section>

    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>CMS Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2016 <a href="https://adminlte.io">Blog do Nestor</a>.</strong> Todos os direitos reservados.
    </div>
    <!-- /.container -->
  </footer>
</div>

<!-- ./wrapper -->

<script>

$('#form_cria_').on('hidden.bs.modal', function (e) {
  // do something...
})

</script>