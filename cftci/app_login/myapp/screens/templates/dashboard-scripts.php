
    <script src="../js-plugins/jquery/jquery-ui.min.js"></script>

 <!-- Bootstrap core JavaScript-->

    <script src="../js-plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../js-plugins/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="../js-plugins/chart.js/Chart.min.js"></script>

<!-- Datatables -->
    <script src="../js-plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../js-plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js-plugins/datatables/dataTables.select.multi.min.js"></script>
    <script src="../js-plugins/moment/moment.min.js"></script>
    <script src="../js-plugins/datatables/datetime.min.js"></script>
    <script src="../js-plugins/datatables/datatables.buttons.min.js"></script>
    <script src="../js-plugins/datatables/jszip.min.js"></script>
    <script src="../js-plugins/datatables/pdfmake.min.js"></script>
    <script src="../js-plugins/datatables/vfsfont.min.js"></script>
    <script src="../js-plugins/datatables/buttons.html5.min.js"></script>
    <!-- Time Picker -->
<script src="../js-plugins/timepicker/jquery.timepicker.min.js"></script>
<script src="../js-plugins/datetimepicker/jquery.datetimepicker.full.min.js"></script>

    <!-- Page level custom scripts -->
<script src="../js-plugins/summernote/summernote-bs4.min.js"></script>

  <script>

  	$(function(){

  		$('ul.sidebar-menu a').filter(function() {

	    return this.href == window.location.href;

		}).parents().addClass('active');

  	});

  </script>
  <script>

// $.datetimepicker.setDateFormatter('');

  $(function () {
    // Summernote
    $('.textarea').summernote({
		height: 200
	}
	)
  })

  $( function() {
    $( ".datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });
  } );


    $( ".datetimepicker" ).datetimepicker({
      minDate:true,
      format:'Y-m-d H:i',
      formatTime:'H:i',
      formatDate:'Y-m-d',



    });
    CKEDITOR.replace( 'ckeditor' );
</script>

<script>
    $(function(){
            $('.time').timepicker({ 'timeFormat': 'H:i' });
    });
</script>