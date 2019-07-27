<?php

function cria_pasta($path){
        if(!is_dir($path)):
				mkdir($path,0775);
		endif;

}
