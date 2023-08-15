</div>
</div>
</div>
</div>
</div>
<div class="layout-overlay layout-sidenav-toggle"></div>
</div>

<script>
function changeSession(){
	var lang = $("#selected_language").val();
	$.ajax({
		type:"post",
		url: "<?= base_url('Login/changeSession')?>",
		data:{ lang:lang },
		success:function(data){
			if(data == "success"){ location.reload(); }
			else { alert(data); }
		}
	});
}
</script>

<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/pace.js')?>"></script>
<script src="<?=base_url('assets/libs/popper/popper.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
<script src="<?=base_url('assets/js/sidenav.js')?>"></script>
<script src="<?=base_url('assets/js/layout-helpers.js')?>"></script>
<script src="<?=base_url('assets/js/material-ripple.js')?>"></script>
<script src="<?=base_url('assets/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>
<script src="<?=base_url('assets/libs/chart-am4/core.js')?>"></script>
<script src="<?=base_url('assets/libs/chart-am4/charts.js')?>"></script>
<script src="<?=base_url('assets/libs/chart-am4/animated.js')?>"></script>
<script src="<?=base_url('assets/libs/eve/eve.js')?>"></script>
<script src="<?=base_url('assets/libs/flot/flot.js')?>"></script>
<script src="<?=base_url('assets/libs/flot/curvedLines.js')?>"></script>
<script src="<?=base_url('assets/libs/raphael/raphael.js')?>"></script>
<script src="<?=base_url('assets/libs/morris/morris.js')?>"></script>
<script src="<?=base_url('assets/js/demo.js')?>"></script>
<script src="<?=base_url('assets/js/analytics.js')?>"></script>

<!--
<script src="<?=base_url('assets/js/pages/dashboards_analytics.js')?>"></script>
-->

<script src="<?=base_url('assets/libs/bootstrap-select/bootstrap-select.js')?>"></script>
<script src="<?=base_url('assets/libs/bootstrap-multiselect/bootstrap-multiselect.js')?>"></script>
<script src="<?=base_url('assets/libs/select2/select2.js')?>"></script>
<script src="<?=base_url('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js')?>"></script>
<script src="<?=base_url('assets/js/pages/forms_selects.js')?>"></script>
<script src="<?=base_url('assets/libs/datatables/datatables.js')?>"></script>
<script src="<?=base_url('assets/js/pages/tables_datatables.js')?>"></script>
<script src="<?=base_url('assets/js/inputmask.js')?>"></script>
</body>
</html>

