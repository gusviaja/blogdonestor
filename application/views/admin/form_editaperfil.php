<style>
	.badge-success{
		background-color:green !important;
		padding:10px !important;
	}

	.ion-ribbon-a{
		color:#f39c12 !important;
    }
    
    .flutuante{
        position:relative;
        top:30px;
        left:220px;
        
    }
    
    .perfil-header{
        background-color:#fceaea !important;
        margin-bottom:30px;
    }
</style>

<div class="container">
    <?php alertas() ?>
    <div class="row perfil-header"> <!-- first row -->
        <div class="col-md-3"></div> <!-- col1 -->
        
        <div class='col-md-3 '> <!-- col2 -->
            <?= "$level_name<br>"?>
            <?= "$status_name<br>"?>
        </div>

        <div class='col-md-3 '>  <!-- col3 -->
        <?php

            $path = base_url().$user_img_path;
            echo " <img class='img img-circle' src='$path' alt='Imagem de perfil' 
            width='125' hright='125'>";?><br>
        <form action="<?=base_url('admin/usuario/alteraimagem')?>" method="post" enctype="multipart/form-data">
            <input type="file" class="form-control" name="inputFile">
            <button class="btn btn-sm" type="submit">alterar imagem</button>
        </form>
       
    </div>
        
        <div class="col-md-3"></div> <!-- col4 -->

    
    </div> <!-- end row1 -->

    <div class="row"> <!-- second row -->
            <div class="col-md-3">
            </div> <!-- col1 -->

            <div class='col-md-6'> <!-- principal col2 -->
                <form method="post" action="<?=base_url('admin/usuario/atualizaperfil')?>">
                    <input name='inputId' type='hidden' value="<?=$user_id?> " >
                    <div class="form-group">
                        <label for="inputName">Nome:</label>
                        <input name="inputName" class="form-control input-lg" value="<?=$user_name?>"> 
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">Email:</label>
                        <input  name="inputEmail" class="form-control input-lg"  value="<?=$user_email?>"> 
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Salvar</button>
                </form>
            </div> <!-- end col principal -->

            <div class="col-md-3">
            </div> <!-- col3 -->
        
        </div> <!-- end row2  --> 
        
</div> <!-- end container -->
