<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    
	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="<?= base_url(PATH_RESOURCES)?>/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url(PATH_RESOURCES)?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="<?= base_url(PATH_RESOURCES)?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
	
	<script src="<?= base_url(PATH_RESOURCES3)?>/js/bootstrap-datepicker.min.js"></script>

	<!-- Morris Charts JavaScript -->
	<!--
	<script src="<?= base_url(PATH_RESOURCES)?>/bower_components/raphael/raphael-min.js"></script>
	<script src="<?= base_url(PATH_RESOURCES)?>/bower_components/morrisjs/morris.min.js"></script>
	<script src="<?= base_url(PATH_RESOURCES)?>/js/morris-data.js"></script>
	-->

	<script type="text/javascript" src="<?= base_url(PATH_RESOURCES3)?>/moment/min/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url(PATH_RESOURCES3)?>/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?= base_url(PATH_RESOURCES)?>/dist/js/sb-admin-2.js"></script>

	<script type="text/javascript">
		$(function () {
			$('#fecha').datetimepicker({
				format: 'DD-MM-YYYY hh:mm A',
				useCurrent: false
			});
		});
	</script>
</body>
</html>