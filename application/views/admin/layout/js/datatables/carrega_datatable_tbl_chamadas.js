function carrega_datatable_tbl_chamadas(){

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
        {
            "render": function ( data, type, row ) {
              
                /* let $n = row['chamada_title'].toLowerCase();
                let $camel = $n.replace(/ /g,"_"); */
                let chamada_id = row['chamada_id'];
                
                return `<h4><span class="desativachamada_${chamada_id}" onclick="desativachamada('chamada','${chamada_id}')"> ${data} </span></h4>`; 
            
            },
"targets": 5
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

}