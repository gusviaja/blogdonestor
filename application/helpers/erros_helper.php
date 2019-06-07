	
    <?php
    $CI = get_instance();
    

        function mostra_erro(){
    
            if($CI->session->flashdata()):

				if($CI->session->flashdata('success')):
					$mensagem = sucesso($CI->session->flashdata('success'));
					
				elseif($CI->session->flashdata('danger')):
					$mensagem = alerta($CI->session->flashdata('danger'));
				endif;
				echo $mensagem;	
		    endif;
    
    }
    