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
<script src="application/views/admin/layout/js/datatables/carrega_datatable_tbl_posts.js"></script>
<script src="application/views/admin/layout/js/datatables/carrega_datatable_tbl_subcategorias.js"></script>
<script src="application/views/admin/layout/js/datatables/carrega_datatable_tbl_usuarios.js"></script>
<script src="application/views/admin/layout/js/datatables/carrega_datatable_tbl_chamadas.js"></script>
<script src="application/views/admin/layout/js/funcoes.js"></script>
 <!-- CK Editor -->
 <script src="/dist/AdminLTE-2.4.10/bower_components/ckeditor/ckeditor.js"></script>



  


<script>
  $(document).ready(
      function(){
        $("#spinner").hide();
          $('#posts').show();
          $('#subcategorias').hide();
          $('#administradores').hide();
          $('#ctoa').hide();
          $('[data-toggle="tooltip"]').tooltip();
          const url_atual = window.location.href;
         // console.log(url_atual === 'http://blogdonestor.com/admin/cria/post');

          if( url_atual === 'http://blogdonestor.com/admin' ){
            carrega_datatable_tbl_posts();
            carrega_datatable_tbl_subcategorias();
            carrega_datatable_tbl_usuarios();
            carrega_datatable_tbl_chamadas();
          }else if (url_atual === 'http://blogdonestor.com/admin/cria/post'){
             carrega_ckeditor();
             
          }
         

      });
</script>
</body>
</html>