<?php include 'header.php'; ?> 
<?php include 'side-menu.php'; ?> 


<div class="row">
<div class="card col-sm-12 col-xl-12">
<h6 class="card-header">Edit Product</h6>
<div class="card-body">


<form enctype="multipart/form-data" id="submitForm" style="width:100%;">
<input type="hidden" name="id" id="id" value="<?= $data[0]->p_id;?>">
<div class="form-row" style="margin-top:20px;">
<div class="form-group col-md-4">
<label class="form-label">Barcode Number</label>
<input name="Barcode_Number" value="<?= $data[0]->p_barcode;?>" type="text" class="form-control" required="true">
</div>

<div class="form-group col-md-4">
<label class="form-label">Product Name</label>
<input name="Product_Name" value="<?= $data[0]->p_name;?>" type="text" class="form-control" required="true">
</div>

<div class="form-group col-md-4">
<label class="form-label">Product Type</label>
<select id="Product_Type" name="Product_Type" class="form-control">
<option value="A"<?php if($data[0]->category == 'A'): ?> selected="selected"<?php endif; ?>>A</option>
<option value="B"<?php if($data[0]->category == 'B'): ?> selected="selected"<?php endif; ?>>B</option>
<option value="C"<?php if($data[0]->category == 'C'): ?> selected="selected"<?php endif; ?>>C</option>
<option value="D"<?php if($data[0]->category == 'D'): ?> selected="selected"<?php endif; ?>>D</option>
</select>
</div>
</div>

<div class="form-row" style="margin-top:20px;">
<div class="form-group col-md-12">
<label class="form-label">Product Description</label>
<textarea required="true" name="Product_Description" class="form-control" rows="3"><?= $data[0]->p_description;?></textarea></div>
</div>

<div class="row">
<div class="col-md-6">
<span onclick="delete_function()" style="color:#fff; margin-top:30px; width:100%;" class="btn btn-danger">Delete</span>
</div>
<div class="col-md-6">
<button type="submit" style="color:#fff; margin-top:30px; width:100%;" class="btn btn-info">Update</button>
</div>
</div>
</form>	


</div>
</div>
	
	
	
		
<?php include 'footer.php'; ?>
<script>
$(document).ready(function (e) {
    $(".sidenav-link").removeClass("active");
    $(".View_Products-menu").addClass("active");

	$('#submitForm').submit(function(e){
    e.preventDefault(); 
		var r = confirm("Do want to update this product?");
		if (r == true) {
			$.ajax({
				url: "<?php echo base_url(); ?>AddProduct/update",
				type:"post",
				data:new FormData(this),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				success: function(response){
					if(response === 'success'){ alert("Successfully updated."); }
					else { alert(response); }
				}
			});
		}
    });  		

});

function delete_function(){
	var id = $("#id").val();
	var r = confirm("Do want to update this product?");
	if (r == true) {
		$.ajax({
			type:"post",
			url: "<?= base_url('Products/delete')?>",
			data:{ id:id },
			success:function(data){
				if(data == "success"){ window.history.back(); }
				else { alert(data); }
			}
		});
	}
}
</script>


