
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

      <?php include_once("layout/nav.php") ?>

      <div class="content-wrapper">
        <div class="container">
      
                  <div class="box box-warning">
                          <div class="box-header with-border">
                            <h3 class="box-title">Criação de post</h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url('admin/salva/post')?>">
                              <!-- text input -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="post_title">Titulo: </label>
                                        <input required name="post_title" type="text" class="form-control input-lg" placeholder="Titulo do post" maxlength="100">
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="post_subcategory_id">Escolha um sub-categoria </label>
                                                <select required class="form-control " name="post_subcategory_id">
                                                    
                                                    <?php
                                                $i = 0;
                                                    foreach ($data as $c) {
                                                        if ($i = 1):
                                                            echo "<option selected value='".$c["subcategory_id"]."' name='subcategory_id'>". $c["subcategory_name"]." </option>";
                                                        else:
                                                            echo "<option value='".$c["subcategory_id"]."' name='subcategory_id'>". $c["subcategory_name"]." </option>";
                                                        endif;
                                                    
                                                        $i++;
                                                    }
                                                ?>
                                                
                                                </select>
                                        </div> <!-- form group -->
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for= "post_cover_url">Foto de capa</label>
                                            <input type="file" class="form-control" name="post_coverurl" >
                                        </div>
                                            
                                    </div><!-- end col -->
                             </div> <!-- end row  -->  
                             
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for= "post_content">Conteudo do artigo </label>
                                        <textarea class="ckeditor" name="post_content" id="post_content" rows="30" cols="80" required>

                                        </textarea>
                                    <div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                              <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                          
                    </div>
                          <!-- /.box-body -->
                 </div>
                 <!-- /.box box-warning-->


             </div> 
            <!-- container -->
        </div>
         <!-- /. contain-wrapper-->
  
   <!-- /. wrapper-->
   </div>
  