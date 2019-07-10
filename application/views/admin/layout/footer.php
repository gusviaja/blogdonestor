<!-- jQuery 3 -->
<script src="/dist/AdminLTE-2.4.10/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/dist/AdminLTE-2.4.10/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/dist/AdminLTE-2.4.10/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/dist/AdminLTE-2.4.10/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/dist/AdminLTE-2.4.10/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/dist/AdminLTE-2.4.10/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/AdminLTE-2.4.10/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/AdminLTE-2.4.10/dist/js/demo.js"></script>

<script>
  $(document).ready(
function(){
    $('#posts').show();
    $('#subcategorias').hide();
    $('#administradores').hide();
    $('#ctoa').hide();

    // referente a DataTable
           
            
                    $('#tbl_posts').DataTable({
                    'paging'      : true,
                    "draw": 1,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    "processing": false,
                     "serverSide": false,
                     "ajax": "http://blogdonestor.com/api/lista/posts",
                     "columns":[
                           { "data": "post_coverurl" },
                           { "data": "post_title"},
                           { "data": "subcategory_name"},
                           { "data": "date_updated"},
                           { "data": "user_name"},
                           { "data": "status_name" },

                     ],
                     "columnDefs": [
                            {
                                "render": function ( data, type, row ) {
                                    //return data +' ('+ row[3]+')';
                                   return '<img class="img-thumbnail" width="90" height="90" src="'+ data +'">'; 
                                   //return 'capa: '+ data +' e isto';
                                },
                "targets": 0
            },
 
        ],
                    'autoWidth'   : false,
                    'responsive': {
                            'breakpoints': [
                            {name: 'bigdesktop', width: Infinity},
                            {name: 'meddesktop', width: 1480},
                            {name: 'smalldesktop', width: 1280},
                            {name: 'medium', width: 1188},
                            {name: 'tabletl', width: 1024},
                            {name: 'btwtabllandp', width: 848},
                            {name: 'tabletp', width: 768},
                            {name: 'mobilel', width: 480},
                            {name: 'mobilep', width: 320}
                            ]
                        },
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

                    //DATATABLE-SUB-CATEGORIAS===============//
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
                           { "data": "subcategory_name" },
                           { "data": "category_name" },
                           { "data": "status_name" }
                           
                     ],
                    'autoWidth'   : false,
                    'responsive': {
                            'breakpoints': [
                            {name: 'bigdesktop', width: Infinity},
                            {name: 'meddesktop', width: 1480},
                            {name: 'smalldesktop', width: 1280},
                            {name: 'medium', width: 1188},
                            {name: 'tabletl', width: 1024},
                            {name: 'btwtabllandp', width: 848},
                            {name: 'tabletp', width: 768},
                            {name: 'mobilel', width: 480},
                            {name: 'mobilep', width: 320}
                            ]
                        },
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

                    //END DATATABLE SUB-CATEGORIAS

                    //DATATABLE-ADMINISTRADORES===============//
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
                           { "data": "user_name" },
                           { "data": "user_email" },
                           { "data": "status_name" },
                           { "data": "level_name" }
                           
                     ],
                    'autoWidth'   : false,
                    'responsive': {
                            'breakpoints': [
                            {name: 'bigdesktop', width: Infinity},
                            {name: 'meddesktop', width: 1480},
                            {name: 'smalldesktop', width: 1280},
                            {name: 'medium', width: 1188},
                            {name: 'tabletl', width: 1024},
                            {name: 'btwtabllandp', width: 848},
                            {name: 'tabletp', width: 768},
                            {name: 'mobilel', width: 480},
                            {name: 'mobilep', width: 320}
                            ]
                        },
                        "language": {
                            "lengthMenu": "Mostrar _MENU_ resultados por pag.",
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

                    //END DATATABLE SUB-ADMINISTRADORES
                    
                     //DATATABLE-CHAMADAS===============//
                     $('#tbl_chamadas').DataTable({
                     "order": [[ 1, "desc" ]],
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    "processing": false,
                     "serverSide": false,
                     "ajax": "http://blogdonestor.com/api/lista/chamadas",
                     "columns": [
                           { "data": "chamada_id" },
                           { "data": "chamada_title" },
                           { "data": "chamada_subtitle" },
                           { "data": "chamada_link" },
                           { "data": "chamada_cover_path" },
                           { "data": "status_name" },
                           
                    
                    ],
                     "columnDefs": [
                            {
                                "targets": [ 0 ],
                                "visible": false,
                                "searchable": false,
                          
                                }, 
                     {
                        "render": function ( data, type, row ) {
                                 return '<a href="'+ data +'" > Ver imagem </a>';
                        },
                            "targets": 3

                     },
                           
                        ],

                    'autoWidth'   : false,
                   
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

                    //END DATATABLE SUB-CHAMADAS
       
});

                function mostra_painel_posts(){
                        $('#posts').show();
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

                   
  
</script>
</body>
</html>