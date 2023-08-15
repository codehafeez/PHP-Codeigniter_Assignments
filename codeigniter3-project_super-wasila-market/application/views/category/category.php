<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<div style="margin-bottom:20px;">



<div class="form-row">
<div class="form-group col-md-4">
<input id="categoryName_add" type="text" class="form-control" placeholder="Product Types">
</div>
<div class="form-group col-md-2">
<button id="submit_add" class="btn btn-primary"><span class="feather icon-plus"></span>&nbsp;&nbsp;Add</button>
</div>
</div>


<div class="layout-content">
<div class="card">
<h6 class="card-header">Product Types</h6>
<div style="padding:30px;">
<div class="table-responsive">









<table class="table table-bordered">
<thead>
<tr role="row" style="background: #f3efef;">
<th>S.No#</th>
<th>Product Type</th>
<th>Delete</th>
</tr>
</thead>
<tbody>

<?php 
$sno = 0;
foreach($result as $data){ $sno++; ?>			  
<tr>
<td><?= $sno ?></td>
<td><?= $data['category_name']; ?></td>
<td><button onclick="delete_function(<?= $data['category_id'] ?>)" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
</tr>
<?php } ?>

</tbody>
</table>



</div>
</div>
</div>
<?php include 'footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




<script>
$(function(){
    $(".sidenav-link").removeClass("active");
    $(".category-menu").addClass("active");
});


	$("#submit_add").click(function(e){
    e.preventDefault();
		var category_name = $("#categoryName_add").val();
		if(category_name.length < 1){ alert("Please enter a category."); }
		else {
			$.ajax({
				type:"post",
				url: "<?= base_url('Category/addCategory')?>",
				data:{ category_name:category_name, },
				success:function(data){
    				if(data == "success"){ location.reload(); }
    				else { alert(data); }
				}
			});
		}
	});


function delete_function(id){
	var r = confirm("Do want to delete this category.?");
	if (r == true) {
		$.ajax({
			type:"post",
			url: "<?= base_url('Category/deleteCategory')?>",
			data:{ id:id },
			success:function(data){
				if(data == "success"){ location.reload(); }
				else { alert(data); }
			}
		});
	}
}
</script>
