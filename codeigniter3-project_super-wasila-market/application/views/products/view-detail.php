<?php include 'header.php'; ?> 
<?php include 'side-menu.php'; ?> 

<div class="row">
<button onclick="print()" style="color:#fff; margin-bottom:10px;" class="btn btn-info"><i class="fas fa-print"></i>&nbsp;&nbsp;Print</button>

<div class="card col-sm-12 col-xl-12">
<div class="card-body">

<div class="col-md-12">
<label><b>Barcode Number</b><br/><?= $data[0]->p_barcode ?></label>
</div>
<hr/>

<div class="col-md-12" style="margin-top:30px;">
<label><b>Product Name</b><br/><?= $data[0]->p_name; ?></label>
</div>
<hr/>

<div class="col-md-12" style="margin-top:30px;">
<label><b>Product Type</b><br/><?= $data[0]->category ?></label>
</div>
<hr/>

<div class="col-md-12" style="margin-top:30px;">
<label><b>Product Description</b><br/><?= $data[0]->p_description ?></label>
</div>



</div>
</div>
</div>
	

<div id="divToPrint" style="display:none">
<?= $data[0]->p_barcode ?><br/><?= $data[0]->p_description ?>
</div>


	
		
<?php include 'footer.php'; ?>
<script>
$(document).ready(function (e) {
    $(".sidenav-link").removeClass("active");
    $(".View_Products-menu").addClass("active");
});

function print(){
	var divToPrint = document.getElementById('divToPrint');
    // divToPrint.style.display = "block";
	var popupWin = window.open('');
	popupWin.document.open();
	popupWin.document.write('<html><style>#divToPrint{display:block} @page {size: 80mm;margin: 0;}@media print {width: 80mm;min-height: 80mm;}</style><body onload="window.print()">'+divToPrint.innerHTML+'</html>');
	popupWin.document.close();
}
</script>


