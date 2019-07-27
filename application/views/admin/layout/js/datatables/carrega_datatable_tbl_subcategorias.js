function carrega_datatable_tbl_subcategorias(){
                    $('#tbl_subcategorias').DataTable({
                        "order": [[ 1, "desc" ]],
                       'paging'      : true,
                       'lengthChange': false,
                       'searching'   : true,
                       'ordering'    : true,
                       'info'        : true,
                       "processing": false,
                        "serverSide": false,
                        "ajax": "http://blogdonestor.com/api/lista/subcategorias",
                        "columns": [
                            { "data": "subcategory_id" },
                              { "data": "subcategory_name" },
                              { "data": "category_name" },
                              { "data": "status_name" },
                              { "data": "acoes" }
                              
                        ],
                       'autoWidth'   : false,
                       'columnDefs':[
                        {
                            "visible":false, "targets":[ 0 ]
                                
               
                        },

                        {
                            "render": function ( data, type, row ) {
                                   let toupper = data.toUpperCase();
                                   return `<h4>${toupper}</h4>`; 
                                
                                },
                "targets": 1

                        },
                        {
                            "render": function ( data, type, row ) {
                                   
                                let toupper = data.toUpperCase();
                                return `<h4>${toupper}</h4>`; 
                                
                                },
                "targets": 2

                        },
                           {
                               "render": function ( data, type, row ) {
                                let element = row['subcategory_id'];
                                
                                return `<h4><span class="desativasubcategory_${element}" onclick="desativasubcategory('subcategory','${element}')"> ${data} </span></h4>`;

                                   
                                   },
                   "targets": 3
   
                           },
                           {
                            "render": function ( data, type, row ) {
     
                                let subcategory_id = row['subcategory_id'];
                             
                                 return `<div class="btn btn-danger" onclick="elimina('subcategory',${subcategory_id})"> Eliminar</div>`;

                                
                                },
                "targets": 4

                        }
               
   
                       ],
                       
                    
                           "language": {
                               "lengthMenu": "Mostrar _MENU_ resultados por pag.",
                               "zeroRecords": "Sin resultados - ups!",
                               "info": "Mostrando pagina _PAGE_ de _PAGES_",
                               "infoEmpty": "Sin resultados disponíveis",
                               "infoFiltered": "(filtrado de _MAX_ total de registros)",
                               "prevoius":"anterior",
                               "next":"seguinte",
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