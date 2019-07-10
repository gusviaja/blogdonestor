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
                            <form role="form">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Tag Title</label>
                                <input type="text" name="input_title" class="form-control" value="<?php preferencias('title') ?>" required>
                              </div>
                             
                            
                              <!-- textarea -->
                              <div class="form-group">
                                <label>Tag Description</label>
                                <textarea class="form-control" maxlength="200" name="input_description"  rows="2" col="14" required>

                                <?php preferencias('description') ?> 
                                </textarea>
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