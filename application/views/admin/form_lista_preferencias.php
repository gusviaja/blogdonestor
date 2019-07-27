</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

      <?php include_once("layout/nav.php") ?>

      <div class="content-wrapper">
        <div class="container">
      
                  <div class="box box-warning">
                          <div class="box-header with-border">
                            <h3 class="box-title">Preferencias do blog</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <form role="form" method="post" action="<?=base_url('admin/salva/preferencias')?>">
                              <!-- text input -->
                              <div class="form-group">
                                <label for='title'>Tag Title</label>
                                <input type="text" name="title" class="form-control" value="<?php get_preferencias('site_title') ?>" required>
                              </div>
                             
                            
                              <!-- textarea -->
                              <div class="form-group">
                                <label>Tag Description</label>
                                <textarea class="form-control" maxlength="200" name="description"  rows="2" col="14" required>

                                <?php trim(get_preferencias('description')) ?> 
                                </textarea>
                              </div>
                              <div class="form-group">
                                <label for='email_contato'>Email de contato</label>
                                <input type="email" name="email_contato" class="form-control" value="<?php get_preferencias('email_contato') ?>" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


      </div>
  <!-- /. contain-wrapper-->
  </div>
   <!-- /. container-->
   </div>