<?php include 'header.php'; ?>
<?php include 'side-menu.php'; ?>



<div class="row">
<div class="card col-sm-12 col-xl-12">
<h6 class="card-header">Settings - Change Password</h6>
<div class="card-body">


<div class="form-row">
<div class="form-group col-md-12">
<label class="form-label">Email</label>
<input value="<?= $data[0]->email ?>" type="email" class="form-control" placeholder="Email" readonly>
</div>

<div class="form-group col-md-4">
<label class="form-label">Old Password</label>
<input id="old_password" type="password" class="form-control" placeholder="Old Password">
</div>

<div class="form-group col-md-4">
<label class="form-label">New Password</label>
<input id="new_password" type="password" class="form-control" placeholder="New Password">
</div>

<div class="form-group col-md-4">
<label class="form-label">Confirm Password</label>
<input id="confirm_password" type="password" class="form-control" placeholder="Confirm Password">
</div>
</div>


<p id="error_msg2" style="margin-top:20px; color:red; text-align:center;"></p>
<button style="background:#3D9831; color:#fff; margin-top:20px; width:100%;" id="submit_btn2" class="btn">Submit</button>
</div>
</div>
	
	
		
</div>
</div>
</div>
</div>



</div>
</div>




<?php include 'footer.php'; ?>
<script>
$(function(){
    $(".sidenav-link").removeClass("active");
    $(".Settings-menu").addClass("active");
		

	// Submit Form - Update Password - Database
    $("#submit_btn2").click(function(e){
        e.preventDefault();
		var old_password = $("#old_password").val();
		var new_password = $("#new_password").val();
		var confirm_password = $("#confirm_password").val();
		
		$("#error_msg2").html("");
        if(old_password.length < 6){ $("#error_msg2").html("Sorry old password should be more than 5 chars."); }    
        else if(new_password.length < 6){ $("#error_msg2").html("Sorry new password should be more than 5 chars."); }    
        else if(new_password != confirm_password){ $("#error_msg2").html("Sorry both password not match."); }    
        else
		{

            $.ajax({
                type:"post",
                url: "<?= base_url('Settings/myAccount_updatePassword_db')?>",
                data:{ 
                	old_password:old_password,
                	new_password:new_password,
                },
                success:function(data){
                	if(data == "success"){
						$("#error_msg2").html("");
						$("#old_password").val("");
						$("#new_password").val("");
						$("#confirm_password").val("");
						alert("Successfully Updated");
					}
                	else { alert(data); }
                }
            });

        }
    });	
	
});
</script>

