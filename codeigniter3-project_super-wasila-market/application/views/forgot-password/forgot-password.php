<?php include 'header.php'; ?>



<div class="authentication-wrapper authentication-3">
<div class="authentication-inner">


<div class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5" style="background-image: url(<?=base_url('assets/login-bg.jpg')?>);">
<div class="ui-bg-overlay bg-dark opacity-50"></div>

<div class="w-100 text-white px-5">
<h1 style="text-align:center; line-height:1.5" class="display-2 font-weight-bolder mb-4">Product Translater<br/>Super Wasila Market</h1>
</div>
</div>


<div class="d-flex col-lg-4 align-items-center bg-white p-5">
<div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">
<div class="w-100">
<div class="d-flex justify-content-center align-items-center">
<div class="w-100 position-relative">
<img src="assets/logo.png" alt="Brand Logo" class="img-fluid">
</div>
</div>


<div class="my-5">
<div class="form-group">
<label class="form-label">Email</label>
<input id="email" type="text" class="form-control">
</div>

<p id="error_msg" style="color:red; text-align:center;"></p>
<button style="width:100%; background:#3D9831; color:#fff;" id="submit_btn" class="btn">Submit</button>
</div>


<div style="margin-top:30px; " class="text-center text-muted">
<a style="font-weight:bold;" href="<?= base_url('Login')?>">Back to Login</a>
</div>
</div>
</div>
</div>

</div>
</div>




<?php include 'footer.php';?>
<script>
$(function(){

    $("#submit_btn").click(function(e){
        e.preventDefault();
		var email = $("#email").val();
		$("#error_msg").html("");
		
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if(!pattern.test(email)){ $("#error_msg").html("Please enter a valid email."); }       
        else
        {
            $.ajax({
                type:"post",
                url: "<?= base_url(); ?>ForgotPassword/forgotpassword",
                data:{ email:email },
                success:function(res){
                    $("#error_msg").html();
                    $("#email").val("");
                    alert(res);
                }
            });
        }

    });
});
</script>
