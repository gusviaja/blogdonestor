<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include_once('layout/nav.php') ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

    
        <section class="content">
                <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" id="painelPosts" onmouseover="mostra_painel_posts()">
            <div class="inner">
              <h3><?=$qtd_posts?></h3>

              <p>Posts criados</p>
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
              <h3><?=$qtd_subcategorias?></h3>

              <p>Sub-categorias</p>
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
              <h3><?= $qtd_usuarios?></h3>

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
              <h3><?=$qtd_chamadas?></h3>

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
                          <th>Subcategoria</th>
                          <th>Categoria pai</th>
                          <th>Status</th>
                          
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
                  <th>Splash</th>
                  <th>Titulo</th>
                  <th>Subcategoria</th>
                  <th>Atualizado em</th>
                  <th>Criado por</th>
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