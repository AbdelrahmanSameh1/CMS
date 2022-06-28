</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../design/back/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../design/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../design/back/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../../design/back/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  // this code to use the editor (Summernote)
  $(function() {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="../../design/back/dist/js/demo.js"></script> -->
</body>

</html>