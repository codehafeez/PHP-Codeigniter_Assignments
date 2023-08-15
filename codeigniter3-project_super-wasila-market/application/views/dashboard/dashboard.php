<!-- Modal (Add New Product) -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="form-row">
<div class="form-group col-md-6">
<label class="form-label">Barcode Number</label>
<input id="Barcode_Number" name="Barcode_Number" type="text" class="form-control">
</div>

<div class="form-group col-md-6">
<label class="form-label">Product Type</label>
<select id="Product_Type" id="Product_Type" class="form-control">
<?php foreach($result as $data){ ?> <option value="<?= $data['category_name']; ?>"><?= $data['category_name']; ?></option><?php } ?>
</select>
</div>

<div class="form-group col-md-12">
<label class="form-label">Product Name</label>
<input id="Product_Name" type="text" class="form-control">
</div>

<div class="form-group col-md-12">
<label class="form-label">Product Description</label>
<textarea id="Product_Description" class="form-control" rows="3"></textarea>
</div>
</div>
      </div>
	  <p id="error_new_product_submit" style="font-size:18px; color:red; text-align:center;"></p>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button id="new_product_submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal (Add New Product) -->











<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>
<div id="divToPrint" style="display:none"></div>


















<div style="margin-bottom:20px;" class="pull-right">
<button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"><span class="feather icon-plus"></span>&nbsp;&nbsp;Add</button>
&nbsp;&nbsp;
<button id="button_print" class="btn btn-primary"><span class="fas fa-print"></span>&nbsp;&nbsp;Print</button>
&nbsp;&nbsp;
<button id="print_list" class="btn btn-primary"><span class="fas fa-print"></span>&nbsp;&nbsp;Print List</button>
&nbsp;&nbsp;
<button id="report_csv" class="btn btn-primary"><span class="feather icon-file"></span>&nbsp;&nbsp;Report</button>
</div>


<div class="layout-content">
<div class="card">
<div style="padding:30px;">
<div class="row">
<div class="input-group col-md-4">
  <input type="text" class="form-control" id="input_barcode" placeholder="Barcode Number">
	<span id="input_barcode_submit" class="btn btn-primary"><i class="feather icon-plus"></i>&nbsp;&nbsp;Add Item</span>
</div>
</div>


<style>
    th{ padding:10px !important; }
    td{ padding:10px !important; }
</style>

<div class="row" style="padding:20px;">
<div class="table-responsive">
<table id="example" class="print_table table-striped table-bordered">
<thead>
<tr>
	<th></th>
	<th>Barcode Number</th>
	<th>Product Name</th>
	<th>Product Type</th>
	<th>Description</th>
	<th>Description Translated</th>
</tr>
</thead>
<tbody>
</tbody>
</table>



</div>
</div>
<center>
<button style="padding-left:20px; padding-right:20px; padding-top:5px; padding-bottom:5px;" class="delete-row">Click to Delete Selected Row</button>
</center>





</div>
</div>
<?php include 'footer.php'; ?>
<script src='https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js'></script>
<style>.dt-buttons { display: none; }</style>
<script>
$(function(){

	$('#example').dataTable( {
	  dom: 'Bfrtip',
	  buttons: [{
		extend: 'print',
		title: 'Super Wasila Market'
	  },{
		extend: 'excel',
		title: 'Super Wasila Market'
	  }
	  ,]
	});



        $("#input_barcode").on('keyup', function (e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
    			var input_barcode = $("#input_barcode").val();
    			if(input_barcode.length < 1){ alert("Please enter a barcode number."); }
    			else {
    				$.ajax({
    					type:"post",
    					url: "<?= base_url('AddProduct/addItem')?>",
    					data:{ input_barcode:input_barcode, },
    					dataType:'json',
    					success:function(data){
    						if(data.message == "success"){
    							var markup = "<tr>"
    							+"<td><input type='checkbox' name='record'></td>"
    							+"<td>" + data.p_barcode + "</td>"
    							+"<td>" + data.p_name + "</td>"
    							+"<td>" + data.category + "</td>"				
    							+"<td>" + data.p_description + "</td>"
    							+"<td>" + data.p_description_translated + "</td>"
    							+"</tr>";
    							var table = $('#example').DataTable();
    							table.row.add($(markup)).draw(false);
    						}
    						else { alert(data.message); }
    					}
    				});
    			}
            }
        });



	$("#report_csv").on("click", function() { $('.buttons-excel').click(); });
	$("#button_print").on("click", function() {	$('.buttons-print').click(); });	
    $(".sidenav-link").removeClass("active");
    $(".Dashboard-menu").addClass("active");


        $(".delete-row").click(function(){
			var table = $('#example').DataTable();
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
					// $(this).parents("tr").remove();
					  table.rows($(this).parents("tr").index()).remove().draw();
				}
            });
        });


	
		$("#input_barcode_submit").click(function(e){
        e.preventDefault();
			var input_barcode = $("#input_barcode").val();
			if(input_barcode.length < 1){ alert("Please enter a barcode number."); }
			else {
				$.ajax({
					type:"post",
					url: "<?= base_url('AddProduct/addItem')?>",
					data:{ input_barcode:input_barcode, },
					dataType:'json',
					success:function(data){
						if(data.message == "success"){
							var markup = "<tr>"
							+"<td><input type='checkbox' name='record'></td>"
							+"<td>" + data.p_barcode + "</td>"
							+"<td>" + data.p_name + "</td>"
							+"<td>" + data.category + "</td>"				
							+"<td>" + data.p_description + "</td>"
							+"<td>" + data.p_description_translated + "</td>"
							+"</tr>";
							var table = $('#example').DataTable();
							table.row.add($(markup)).draw(false);
						}
						else { alert(data.message); }
					}
				});
			}
		});
		
		
		$("#new_product_submit").click(function(e){
        e.preventDefault();
			var Barcode_Number = $("#Barcode_Number").val();			
			var Product_Type = $("#Product_Type").val();
			var Product_Name = $("#Product_Name").val();
			var Product_Description = $("#Product_Description").val();

			if(Barcode_Number.length < 1){ $("#error_new_product_submit").html("Please enter a barcode number."); }
			else if(Product_Name.length < 1){ $("#error_new_product_submit").html("Please enter a product name."); }
			else if(Product_Description.length < 1){ $("#error_new_product_submit").html("Please enter a product description."); }			
			else {
				$("#error_new_product_submit").html("");
				$.ajax({
					type:"post",
					url: "<?= base_url('AddProduct/add')?>",
					data:{
						Barcode_Number:Barcode_Number,
						Product_Type:Product_Type,
						Product_Name:Product_Name,
						Product_Description:Product_Description,
					},
					success:function(data){
						if(data == "success"){ 
							$('#exampleModal').modal('toggle'); 
							$("#Barcode_Number").val("");			
							$("#Product_Name").val("");
							$("#Product_Description").val("");


            				$.ajax({
            					type:"post",
            					url: "<?= base_url('AddProduct/addItem')?>",
            					data:{ input_barcode:Barcode_Number, },
            					dataType:'json',
            					success:function(data){
            						if(data.message == "success"){
            							var markup = "<tr>"
            							+"<td><input type='checkbox' name='record'></td>"
            							+"<td>" + data.p_barcode + "</td>"
            							+"<td>" + data.p_name + "</td>"
            							+"<td>" + data.category + "</td>"				
            							+"<td>" + data.p_description + "</td>"
            							+"<td>" + data.p_description_translated + "</td>"
            							+"</tr>";
            							var table = $('#example').DataTable();
            							table.row.add($(markup)).draw(false);
            						}
            						else { alert(data.message); }
            					}
            				});

						}
						else { $("#error_new_product_submit").html(data); }
					}
				});
			}
		});		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	$("#print_list").click(function(e){
		e.preventDefault();
		var table = $(".print_table tbody");
		table.find('tr').each(function (i){
			
			var $tds = $(this).find('td'),
				barCodeId = $tds.eq(1).text(),
				translatedDescription = $tds.eq(5).text();								
				$("#divToPrint").append('<div class="column"><p>'+barCodeId+'<br/>'+translatedDescription+'</p></div>');

			// alert('Row '+(i+1)+':\nBarcode: '+barCodeId+'\nTranslated Description:' +translatedDescription);
		});
		printDiv();		
	});		
});

function printDiv(){
	var popupWin = window.open('');
	popupWin.document.open();
	popupWin.document.write('<html><body onload="window.print()">'+
'<style>* { box-sizing: border-box; }'+
'.column { padding:5px; border:1px solid; float: left; width: 25%; }'+
'.row:after { display: table; clear: both; }'+
'#divToPrint{display:block}</style>'+
'<div class="row">'+divToPrint.innerHTML+'</div></body></html>');
	popupWin.document.close();
}
</script>