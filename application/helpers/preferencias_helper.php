<?php
		
		
		function get_preferencias(string $key){
			
			$preferencias = array(
				"site_title" =>"Blog do Nestor | Desenvolvimento Web gratuito",
				"description" =>"
                                Blog do Nestor oferece cursos de analista program'ador web fullstack totalmente gratis !!! ",
				"author" => "Ni Sistemas | desenvolvimento de sistemas web 
				em São Paulo com pagamento em ate 12x",
				"email_contato" =>"gusviaja@gmail.com",
		
			);

			if(array_key_exists($key,$preferencias)):
				echo trim($preferencias[$key]);
				return;
			else:
				$arr = array($key => "Preferencia não existe no sistema");
				echo $arr[$key];
			endif;
			
		}
		
		
		