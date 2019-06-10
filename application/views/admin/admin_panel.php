<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?=base_url('admin')?>" class="navbar-brand"><b>Gerenciar</b>Blog</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
			<!-- <li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li> -->
			<li class=""><a href="#">Dashboard</a></li> 
            <li><a href="#">Mailing List</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
				  
			 	<li><a href="#">Categorias</a></li>
				<li><a href="#">Posts</a></li>
				<li class="divider"></li>
                <li><a href="#">Destaque</a></li>
				<li class="divider"></li>
                <li><a href="#">Preferencias Site</a></li>
              
                
         
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Removi Messages: style can be found in dropdown.less-->
           
            <!-- /.messages-menu -->

            <!-- Removi Notifications Menu -->
         
            <!-- Removi a li Tasks Menu -->
           
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="/dist/img/fotoperfil.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?=$_SESSION['nome']?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="/dist/img/fotoperfil.jpg" class="img-circle" alt="User Image">

                  <p>
				  <?=$_SESSION['nome']?>
                    <small><strong>Nivel</strong><?=$_SESSION['nivel']?></small>
                  </p>
                </li>
                <!-- Eliminei a li de Menu Body -->
	
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?=base_url('perfil')?>" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?=base_url('sair')?>" class="btn btn-default btn-flat">Sair</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Gerenciamento do CMS
          <small>Posts, categorias, preferências, destaque e lista de suscriptores.</small>
        </h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol> -->
      </section>

      <!-- Main content -->
      <section class="content">
       
        
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Caixa em Blanco</h3>
          </div>
          <div class="box-body">
            Conteudo aqui
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
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