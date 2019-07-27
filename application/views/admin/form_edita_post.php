
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

      <?php 
      
      include_once("layout/nav.php") ?>

      <div class="content-wrapper">
        <div class="container">
      
                  <div class="box box-warning">
                          <div class="box-header with-border">
                            <h3 class="box-title text-center"><span class="badge">Edição de post </span> </h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <form role="form" enctype="multipart/form-data" method="post" action="<?=base_url('admin/atualiza/post')?>">
                              <!-- text input -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="post_title">Titulo: </label>
                                        <input required name="post_title" type="text" class="form-control input-lg" placeholder="Titulo do post" maxlength="100" 
                                        value="<?php echo stripslashes($data['post_title'])?>">
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
                                                foreach ($categorias['data'] as $c) {
                                                    if ($c["subcategory_id"] === $data['post_subcategory_id']):
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
                             <div class="thumbnail">
                             <?php $cover = $data["post_coverurl"] ?>
                                <img src='<?=base_url("$cover") ?>' width='120' height='120' alt="capa do post">
                                

                                </div>               
                                 <label for= "post_cover_url">Foto de capa</label>
                                            <input type="file" class="form-control" name="post_coverurl" >
                                        </div>
                                            
                                    </div><!-- end col -->
                             </div> <!-- end row  -->  
                             
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <input type=hidden name = "post_id" value="<?=$this->uri->segment(4)?>">
                                        <label for= "post_content">Conteudo do artigo </label>

                                        <textarea class="ckeditor" name="post_content" id="post_content" rows="30" 
                                         cols="80" required>
                                            <?php echo html_entity_decode($data['post_content']) ?>
                                        </textarea>
                                    <div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                              <button type="submit" class="btn btn-primary">Alterar</button>
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
  