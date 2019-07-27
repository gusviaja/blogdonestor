function carrega_datatable_tbl_usuarios(){

                    $('#tbl_usuarios').DataTable({
                        "order": [[ 1, "desc" ]],
                       'paging'      : true,
                       'lengthChange': false,
                       'searching'   : true,
                       'ordering'    : true,
                       'info'        : true,
                       "processing": false,
                        "serverSide": false,
                        "ajax": "http://blogdonestor.com/api/lista/usuarios",
                        "columns": [
                              { "data": "user_id" },
                              { "data": "user_img_path" },
                              { "data": "user_name" },
                              { "data": "user_email" },
                              { "data": "status_name" },
                              { "data": "level_name" }
                              
                        ],
                        
                       'autoWidth'   : false,
                       
                       
                       "columnDefs": [
                        { "visible": false,  "targets": [ 0 ] },
    
                               {
                                   "render": function ( data, type, row ) {
                                     
                                      return '<img class="img-thumbnail" width="90" height="90" src="'+ data +'">'; 
                                      
                                   },
                   "targets": 1
               },
               {
                                   "render": function ( data, type, row ) {
                                    
                                       return '<h4>'+ data +'</h4>'; 
                                   },
                   "targets": 2
               },
               {
                                   "render": function ( data, type, row ) {
                                    
                                       return '<h4>'+ data +'</h4>'; 
                                   },
                   "targets": 3
               },
               {
                                   "render": function ( data, type, row ) {

                                    let user_id = row['user_id'];
                
                                    return `<h4><span class="desativauser_${user_id}" onclick="desativauser('user','${user_id}')"> ${data} </span></h4>`; 


                                       /* switch (data) {
                                           case "ativo": 
                                           return "<div class='label_verde text-center'><h4><a href='#' class='text-center' >" + data + "</a></h4><div>";  
                                               break;
                                       
                                           default:
                                          return '<strong>'+ data +'</strong>'; 
                                               break;
                                       } */
                                   },
                   "targets": 4
               },
   
               {
                                   "render": function ( data, type, row ) {
   
                                       switch (data) {
                                           case "admin": 
                                           return "<h3><i class='ion-ribbon-a'>" + data + "</i></h3>";  
                                               break;
                                       
                                           default:
                                          return '<strong>'+ data +'</strong>'; 
                                               break;
                                       }
                                     
                                     
                                    
                                   },
                   "targets": 5
               },
   
    
           ],
                      
                           "language": {
                               "lengthMenu": " Mostrar _MENU_ resultados por pag.",
                               "zeroRecords": "Sin resultados - ups!",
                               "info": "Mostrando pagina _PAGE_ de _PAGES_",
                               "infoEmpty": "Sin resultados disponíveis",
                               "infoFiltered": "(filtrado de _MAX_ total de registros)",
                               "search":"buscar: ",
                               "oPaginate": {
                                   "sFirst": "Primeiro",
                                   "sPrevious": "Anterior",
                                   "sNext": "Seguinte",
                                   "sLast": "Ultimo"
                                   },
                           }
   
                       });
   
                
}