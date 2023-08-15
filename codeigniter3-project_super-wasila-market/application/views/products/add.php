<?php include 'header.php'; ?> 
<?php include 'side-menu.php'; ?> 


<div class="row">
<form enctype="multipart/form-data" id="submitForm" style="width:100%;">
<div class="card col-sm-12 col-xl-12">
<h6 class="card-header">Add New Product</h6>
<div class="card-body">


<div class="form-row" style="margin-top:20px;">
<div class="form-group col-md-4">
<label class="form-label">Barcode Number</label>
<input name="Barcode_Number" type="text" class="form-control" required="true">
</div>

<div class="form-group col-md-4">
<label class="form-label">Product Name</label>
<input name="Product_Name" type="text" class="form-control" required="true">
</div>

<div class="form-group col-md-4">
<label class="form-label">Product Type</label>
<select id="Product_Type" name="Product_Type" class="form-control">
<?php foreach($result as $data){ ?> <option value="<?= $data['category_name']; ?>"><?= $data['category_name']; ?></option><?php } ?>
</select>
</div>
</div>

<div class="form-row" style="margin-top:20px;">
<div class="form-group col-md-12">
<label class="form-label">Product Description</label>
<textarea required="" name="Product_Description" class="form-control" rows="3"></textarea></div>
</div>

<button style="background:#3D9831; color:#fff; margin-top:30px; width:100%;" type="submit" class="btn">Submit</button>
</div>
</div>
</form>	
	
	
	
		
<?php include 'footer.php'; ?>
<script>
$(document).ready(function (e) {
    
    $(".sidenav-link").removeClass("active");
    $(".Add_New_Product-menu").addClass("active");
	

	$('#submitForm').submit(function(e){
    e.preventDefault(); 
		$.ajax({
			url: "<?php echo base_url(); ?>AddProduct/add",
			type:"post",
			data:new FormData(this),
			processData:false,
			contentType:false,
			cache:false,
			async:false,
			success: function(response){
				if(response === 'success'){ alert("Successfully Added."); }
				else { alert(response); }
			}
		});
    });  		
});
</script>
