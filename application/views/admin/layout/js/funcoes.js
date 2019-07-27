function mostra_painel_posts(){
 
    $('#posts').show()
    $('#subcategorias').hide();
    $('#administradores').hide();
    $('#ctoa').hide();
} 

function mostra_painel_categorias(){
    
    $('#posts').hide();
    $('#subcategorias').show();
    $('#administradores').hide();
    $('#ctoa').hide();
 }

 function mostra_painel_painelAdm(){
    $('#posts').hide();
    $('#subcategorias').hide();
    $('#administradores').show();
    $('#ctoa').hide();
 }

 function mostra_painel_ctoa(){
    $('#posts').hide();
    $('#subcategorias').hide();
    $('#administradores').hide();
    $('#ctoa').show();
 }

function desativapost(um,dos){
    //alert(um+'--e--'+dos);
   

    const jqxhr = $.get( `http://blogdonestor.com/api/alterastatus/${um}/${dos}`, function() {
      $("#spinner").show();
         })
         .done(function(data) {
          
            let objdata = JSON.parse(data);

            if (objdata.data === "ativo") {
                let achei = $(`.desativapost_${dos}`);
                achei.text( "ativo" );
               let qtd1 = $('#qtd_posts').text();
               qtd1 = parseInt(qtd1) + 1;
             
               $('#qtd_posts').text(qtd1);
            }
            else if (objdata.data === "inativo") {
               let achei = $(`.desativapost_${dos}`);
               achei.text( "inativo" );
               let qtd2 = $('#qtd_posts').text();
              
               qtd2 = parseInt(qtd2) - 1;
              $('#qtd_posts').text(qtd2);
            }

         })

         .fail(function() {
           
            alert( "Error processando o pedido, tente novamente" );
            
         })
         .always(function() {
            //alert( "finished" );
            $("#spinner").hide('slow');
            mostra_painel_posts();
            
         });
 }

 function desativasubcategory(type,element){
    
        //console.log(type+'--e--'+element);
    
        const jqxhr = $.get( `http://blogdonestor.com/api/alterastatus/${type}/${element}`, function() {
          $("#spinner").show();
             })
             .done(function(data) {
                let objdata = JSON.parse(data);
    
                console.log(data);
                if (objdata.data === "ativo") {
                    let achei = $(`.desativasubcategory_${element}`);
                    achei.text( "ativo" );
                   let qtd1 = $('#qtd_subcategorias').text();
                   qtd1 = parseInt(qtd1) + 1;
                 
                   $('#qtd_subcategorias').text(qtd1);
                }
                else if (objdata.data === "inativo") {
                   let achei = $(`.desativasubcategory_${element}`);
                   achei.text( "inativo" );
                   let qtd2 = $('#qtd_subcategorias').text();
                  
                   qtd2 = parseInt(qtd2) - 1;
                  $('#qtd_subcategorias').text(qtd2);
                }
    
             })
    
             .fail(function() {
               
                alert( "Error processando o pedido, tente novamente" );
                
             })
             .always(function() {
               
                $("#spinner").hide('slow');
                mostra_painel_categorias();
                
             });
    
 }
 function desativachamada(type,element){
    
    //console.log(type+'--e--'+element);

    const jqxhr = $.get( `http://blogdonestor.com/api/alterastatus/${type}/${element}`, function() {
      $("#spinner").show();
         })
         .done(function(data) {
            let objdata = JSON.parse(data);
            
            //console.log(data);
            if (objdata.data === "ativo") {
                let achei = $(`.desativachamada_${element}`);
                achei.text( "ativo" );
               let qtd1 = $('#qtd_chamadas').text();
               qtd1 = parseInt(qtd1) + 1;
             
               $('#qtd_chamadas').text(qtd1);
            }
            else if (objdata.data === "inativo") {
               let achei = $(`.desativachamada_${element}`);
               achei.text( "inativo" );
               let qtd2 = $('#qtd_chamadas').text();
              
               qtd2 = parseInt(qtd2) - 1;
              $('#qtd_chamadas').text(qtd2);
            }

         })

         .fail(function() {
           
            alert( "Error processando o pedido, tente novamente" );
            
         })
         .always(function() {
           
            $("#spinner").hide('slow');
            mostra_painel_ctoa();
            
         });

}

function desativauser(type,user_id){
   //alert(um+'--e--'+dos);
  
const cadeia = `http://blogdonestor.com/api/alterastatus/${type}/${user_id}`;
//console.log(cadeia);
   const jqxhr = $.get( cadeia, function() {
     $("#spinner").show();
        })
        .done(function(data) {
         
           let objdata = JSON.parse(data);

           if (objdata.data === "ativo") {
               let achei = $(`.desativauser_${user_id}`);
               achei.text( "ativo" );
              let qtd1 = $('#qtd_usuarios').text();
              qtd1 = parseInt(qtd1) + 1;
            
              $('#qtd_usuarios').text(qtd1);
           }
           else if (objdata.data === "inativo") {
              let achei = $(`.desativauser_${user_id}`);
              achei.text( "inativo" );
              let qtd2 = $('#qtd_usuarios').text();
             
              qtd2 = parseInt(qtd2) - 1;
             $('#qtd_usuarios').text(qtd2);
           }

        })

        .fail(function() {
          
           alert( "Error processando o pedido, tente novamente" );
           
        })
        .always(function() {
           //alert( "finished" );
           $("#spinner").hide('slow');
           mostra_painel_painelAdm();
           
        });
}


function carrega_ckeditor(){
   $(function () {
    
      CKEDITOR.replace('editor1');
      
    })

    
}

function toggle_form_subcategorias(){
   
   $('#spinner-modal').hide();

         $.get("http://blogdonestor.com/api/lista/categorias", function(data){
      
            
         })
         .done(function(data){
          
            var options_cat = ``;
            let objData = JSON.parse(data);
        
            objData.categorias.forEach(function(value){
               //console.log(value.category_name);
               options_cat += `<option value='${value.category_id}'>${value.category_name}</option>`;

           

           }); //END FOREACH
           //INJETO O HTML NO SELECT
           $('#category_id').append(options_cat);
         })
         .fail(function(){
           
               alert('Erro processando seu pedido, tente mais tarde');

         })
         .always(function(){
            
            $('#modal_subcategorias').modal('toggle');
         });
      
     
    }

    function toggle_form_categorias(){
   
      $('#spinner-modal').hide();

         $.get("http://blogdonestor.com/api/lista/categorias", function(data){
      
            
         })
         .done(function(data){
          
            var options= ``;
            let objData = JSON.parse(data);
        
            objData.categorias.forEach(function(value){
               //console.log(value.category_name);
               options += `<option value='${value.category_id}'>${value.category_name}</option>`;

           

           }); //END FOREACH
           //INJETO O HTML NO SELECT
           $('#multiple_categorias').append(options);
         })
         .fail(function(){
           
               alert('Erro processando seu pedido, tente mais tarde');

         })
         .always(function(){
            
            $('#modal_categorias').modal('toggle');
         });
    }

         
   

    function salvar_subcategoria(event){
      event.preventDefault();
      $('#spinner-modal').show('fast');

      $.ajax({
      type: "POST",
      url: "api/salva/subcategory",
      data: {subcategory_name:$('#subcategory_name').val(), category_id: $('#category_id').val()},
      success: function(retorno){
         $('#modal_subcategorias').modal('toggle');
         //$('#spinner-modal').show('fast');
         window.location.href = 'http://blogdonestor.com/admin';
      },
      dataType: "json"
      });
  
        
      /* 
      .fail(function(){
         alert('Erro processando seu pedido tente mais tarde!');
      })
      .always(function(){
         alert('Erro processando seu pedido tente mais tarde!');
         $('#spinner-modal').hide('fast');
      }) */
             

    }

    function salvar_categoria(event){
       event.preventDefault();
      $('#spinner-modal').show('fast');
      $.ajax({
      type: "POST",
      url: "api/salva/category",
      data: {category_name:$('#cat_name').val()},
      success: function(retorno){
        alert("Operação realizada com sucesso")
         window.location.href = 'http://blogdonestor.com/admin';
      },
      dataType: "json"
      });
  
        
      /* 
      .fail(function(){
         alert('Erro processando seu pedido tente mais tarde!');
      })
      .always(function(){
         alert('Erro processando seu pedido tente mais tarde!');
         $('#spinner-modal').hide('fast');
      }) */
             

    }

    function elimina(element,id){
    
      $.get(`http://blogdonestor.com/api/elimina/${element}/${id}`, function(data){
         event.preventDefault();
      
        $('#spinner-modal').show('fast');
      })
      .done(function(data){
         objData = JSON.parse(data)
         alert(objData.retorno);
         window.location.href='admin';
        
      })
      .fail(function(){
         alert('Erro processando seu pedido, tente novamente em aulguns minutos');
      })
      .always(function(){
         $('#spinner-modal').hide('fast');
      })
    }

