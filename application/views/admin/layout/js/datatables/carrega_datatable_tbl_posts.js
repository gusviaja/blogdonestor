function carrega_datatable_tbl_posts(){
    
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
               { "data": "post_id" },
               { "data": "post_coverurl" },
               { "data": "post_title"},
               { "data": "subcategory_name"},
               { "data": "date_updated"},
               { "data": "user_name"},
               { "data": "status_name" },
               { "data": "post_delete" },
               { "data": "post_content" },
               { "data": "post_url" },
         ],
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
                       
                       //let n = data.replace(/_/g," ");
                       
                       return `<h4><a href="http://blogdonestor.com/admin/edita/post/${row['post_id']}">${data.toUpperCase()}</a></h4>`; 
                    },
    "targets": 2
},
{
    "render": function ( data, type, row ) {
     
       return `<h4>${data.toUpperCase()}</h4>`; 
    
    },
"targets": 3
},
{
    "render": function ( data, type, row ) {
     
       return `<h4>${data}</h4>`; 
    
    },
"targets": 4
},
{
    "render": function ( data, type, row ) {
     
       return `<h4>${data}</h4>`; 
    
    },
"targets": 5
},
{
                    "render": function ( data, type, row ) {
                       /*  return row['post_title']; */
                      // let $n = row['post_title'].toLowerCase();
                      let id = row['post_id'];
                      // let $camel = $n.replace(/ /g,"_");
                       
                       return `<h4><span class="desativapost_${id}" onclick="desativapost('post','${id}')"> ${data} </span></h4>`;
                    
                    },
    "targets": 6
},
{
    "render": function ( data, type, row ) {
     
      let id = row['post_id'];
   
       return `<div class="btn btn-danger" onclick="elimina('post',${id})"> Eliminar</div>`;
                    
    },
"targets": 7
}, 

{ "visible": false,  "targets": [ 8 ] },
{ "visible": false,  "targets": [ 9 ] },
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
}