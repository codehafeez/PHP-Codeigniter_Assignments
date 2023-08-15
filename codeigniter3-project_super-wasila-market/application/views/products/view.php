<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<div style="margin-bottom:20px;" class="pull-right">
<input type="hidden" class="user_dataSideView btn btn-primary" data-toggle="modal" data-target="#myModal3"/>



<a href="<?= base_url('AddProduct')?>" class="btn btn-primary"><span class="feather icon-plus"></span>&nbsp;&nbsp;Add</a>&nbsp;&nbsp;
    


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
<span class="feather icon-filter"></span>&nbsp;&nbsp;Filter</button>
&nbsp;&nbsp;
<a href="<?= base_url('Products/report')?>" class="btn btn-primary"><span class="feather icon-file"></span>&nbsp;&nbsp;Report</a>
</div>


<div class="layout-content">
<div class="card">
<h6 class="card-header">View Products</h6>
<div style="padding:30px;">
<div class="table-responsive">









<table class="table-bordered">
<thead>
<tr role="row" style="background: #f3efef;">
<th style="width:60px; padding-left: 10px;">S.No#</th>
<th style="width:150px; padding-left: 10px;">Barcode Number</th>
<th style="width:150px; padding-left: 10px;">Product Name</th>
<th style="width:150px; padding-left: 10px;">Product Type</th>
<!--<th style="width:200px; padding-left: 10px;">Description</th>-->
<th style="width:200px; padding-left: 10px;">Description Translated</th>
<th style="width:150px; padding-left: 10px;">Action</th>
</tr>
</thead>
<tbody>
<?php 
$sno = $row;
foreach($result as $data){ $sno++; ?>			  
<tr>
<td><?= $sno ?></td>
<td><?= $data['p_barcode']; ?></td>
<td><?= $data['p_name']; ?></td>
<td><?= $data['category']; ?></td>
<!--<td><?= $data['p_description']; ?></td>-->
<td><?= $data['p_description_translated']; ?></td>
<td>
    <center>
<a href="<?= base_url('Products/viewProduct/'.$data['p_id']) ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
<a href="<?= base_url('Products/editProduct/'.$data['p_id']) ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
<button onclick="delete_function(<?= $data['p_id'] ?>)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
    </center>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<ul style="justify-content: flex-end;" class="pagination"><?= $pagination; ?></ul>



</div>
</div>
</div>
<?php include 'footer.php'; ?>












<!-- (Start) Right Side Model -->
<form method="post" action="<?= base_url('Products/filter')?>">
<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4><span class="feather icon-filter"></span>&nbsp;&nbsp;FILTER</h4>
</div>
<div class="modal-body" style="padding:20px;">


	<div style="margin-top:10px;">
		<label class="custom-control custom-checkbox">
			<input name="filter1_Barcode_Number" type="checkbox" class="filter_national-id-checkBox custom-control-input is-invalid">
			<span class="custom-control-label">Barcode Number</span>
		</label>
		<span class="filter_national-id" style="display:none">
			<input name="filter2_Barcode_Number" class="form-control" placeholder="Barcode Number">
		</span>
	</div>


	<div style="margin-top:30px;">
		<label class="custom-control custom-checkbox">
			<input name="filter1_Product_Name" type="checkbox" class="filter_city-checkBox custom-control-input is-invalid">
			<span class="custom-control-label">Product Name</span>
		</label>
		<span class="filter_city" style="display:none">
			<input name="filter2_Product_Name" class="form-control" placeholder="Product Name">
		</span>
	</div>


	<div style="margin-top:30px;">
		<label class="custom-control custom-checkbox">
			<input name="filter1_Product_Type" type="checkbox" class="filter_status-checkBox custom-control-input is-invalid">
			<span class="custom-control-label">Product Type</span>
		</label>
		<span class="filter_status" style="display:none">
			<select class="form-control" name="filter2_Product_Type">
            <?php foreach($categories as $data){ ?> <option value="<?= $data['category_name']; ?>"><?= $data['category_name']; ?></option><?php } ?>
			</select>	
		</span>
	</div>


	<div style="margin-top:30px;">
		<label class="custom-control custom-checkbox">
			<input name="filter1_Product_Description" type="checkbox" class="filter_age-checkBox custom-control-input is-invalid">
			<span class="custom-control-label">Product Description</span>
		</label>
		<span class="filter_age" style="display:none">
			<input name="filter2_Product_Description" class="form-control" placeholder="Product Description">
		</span>
	</div>

	<button style="margin-top:30px; width:100%;" type="submit" class="btn btn-primary">Apply</button>

</div>
</div>
</div>
</div>
</form>




<style>
.modal.left .modal-dialog, .modal.right .modal-dialog {
	position: fixed;
	margin: auto;
	width: 320px;
	height: 100%;
	-webkit-transform: translate3d(0%, 0, 0);
		-ms-transform: translate3d(0%, 0, 0);
		 -o-transform: translate3d(0%, 0, 0);
			transform: translate3d(0%, 0, 0);
}

.modal.left .modal-content, .modal.right .modal-content {
	height: 100%;
	overflow-y: auto;
}

.modal.left .modal-body, .modal.right .modal-body { padding: 0px 0px 0px; }

/*Left*/
.modal.left.fade .modal-dialog{
	left: -320px;
	-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
	   -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
		 -o-transition: opacity 0.3s linear, left 0.3s ease-out;
			transition: opacity 0.3s linear, left 0.3s ease-out;
}

.modal.left.fade.in .modal-dialog{ left: 0; }
	
/*Right*/
.modal.right.fade .modal-dialog {
	right: -320px;
	-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
	   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		 -o-transition: opacity 0.3s linear, right 0.3s ease-out;
			transition: opacity 0.3s linear, right 0.3s ease-out;
}

.modal.right.fade.in .modal-dialog { right: 0; }

/* ----- MODAL STYLE ----- */
.modal-content {
	border-radius: 0;
	border: none;
}

.modal-header {
	border-bottom-color: #EEEEEE;
	background-color: #FAFAFA;
}

.table_tr.active{
	background: #ffecec !important;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- (End) Right Side Model -->




<script>
$(function(){
    $(".sidenav-link").removeClass("active");
    $(".View_Products-menu").addClass("active");
	
	
	
	/* Filter Input Fields Toggle*/
	$('.filter_national-id-checkBox').change(function() {
		if ($(this).is(':checked')) { $(".filter_national-id").css("display", "block"); }
		else { $(".filter_national-id").css("display", "none"); }
	});
	$('.filter_status-checkBox').change(function() {
		if ($(this).is(':checked')) { $(".filter_status").css("display", "block"); }
		else { $(".filter_status").css("display", "none"); }
	});
	$('.filter_city-checkBox').change(function() {
		if ($(this).is(':checked')) { $(".filter_city").css("display", "block"); }
		else { $(".filter_city").css("display", "none"); }
	});
	$('.filter_age-checkBox').change(function() {
		if ($(this).is(':checked')) { $(".filter_age").css("display", "block"); }
		else { $(".filter_age").css("display", "none"); }
	});

});
function delete_function(id){
	var r = confirm("Do want to delete this product?");
	if (r == true) {
		$.ajax({
			type:"post",
			url: "<?= base_url('Products/delete')?>",
			data:{ id:id },
			success:function(data){
				if(data == "success"){ location.reload(); }
				else { alert(data); }
			}
		});
	}
}
</script>
