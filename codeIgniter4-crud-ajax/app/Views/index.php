<?= $this->extend("frontend") ?>

<?= $this->section("body") ?>

<nav class="navbar navbar-default navbar-static-top">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="https://www.onlyxcodes.com/">onlyxcodes</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
           <li class="active"><a href="https://www.onlyxcodes.com/2021/12/codeigniter-4-crud-ajax.html">Back to Tutorial</a></li>
         </ul>
       </div>
     </div>
</nav>
   
<div class="wrapper">
   
<div class="container">
               
   <div class="col-lg-12">
   
      <div class="panel panel-default">
            <div class="card mt-5">
                    <div class="panel-heading">
                  <button data-toggle="modal" data-target="#addModal" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>&nbsp; Add Student</button>
                    </div>       
               
         <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                        <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">  
                     
                        </tbody>
                    </table>
                </div>
            </div>
         
            </div>

         <!-- Add Modal Start-->
         <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
           <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
               <h4 class="modal-title" id="ModalLabel">Create New Student</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
              </div>
              <div class="modal-body">
               <form id="addStudent" class="form-horizontal">
                 <div class="form-group">
                  <label class="control-label col-sm-2">Firstname:</label>
                  <div class="col-sm-10">
                    <input type="text" id="txt_firstname" class="form-control" placeholder="enter firstname">
                    <span id="error_firstname" class="text-danger"></span>
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2">Lastname:</label>
                  <div class="col-sm-10">
                    <input type="text" id="txt_lastname" class="form-control" placeholder="enter lastname">
                    <span id="error_lastname" class="text-danger"></span>
                  </div>
                 </div>
               </form>     
              </div>
              <div class="modal-footer">
               <button type="button" id="btn_insert" class="btn btn-success">Insert</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
           </div>
         </div>
         <!-- Add Modal End-->
         
         <!-- Update Modal Start-->
         <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
           <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
               <h4 class="modal-title" id="ModalLabel">Update Student</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
              </div>
              <div class="modal-body">
              
               <form id="updateStudent" class="form-horizontal">
                 <div class="form-group">
                  <label class="control-label col-sm-2">Firstname:</label>
                  <div class="col-sm-10">
                    <input type="text" id="firstname_update" class="form-control" placeholder="enter firstname">
                    <span id="error_firstname_update" class="text-danger"></span>
                  </div>
                 </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2">Lastname:</label>
                  <div class="col-sm-10">
                    <input type="text" id="lastname_update" class="form-control" placeholder="enter lastname">
                    <span id="error_lastname_update" class="text-danger"></span>
                  </div>
                 </div>
                 
                 <input type="hidden" id="hidden_id">
                 
               </form>              
              </div>
              <div class="modal-footer">
               <button type="button" id="btn_update" class="btn btn-primary">Update</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
           </div>
         </div>
         <!-- Update Modal End-->
      
        </div>
         
   </div>
      
</div>
         
</div>

<?= $this->endSection() ?>

<?= $this->section("body") ?>

<script>

   $(document).ready(function(){
      
      displaystudent();
      
      $(document).on('click','#btn_insert',function(){
         
         var firstname = $('#txt_firstname').val();
         var lastname = $('#txt_lastname').val();
         
         if(firstname == ''){ 
            error_firstname = 'please enter firstname'; 
            $('#error_firstname').text(error_firstname);
         }
         else if(lastname == ''){ 
            error_lastname = 'please enter lastname'; 
            $('#error_lastname').text(error_lastname);
         }
         else{
            $.ajax({
               url:'<?= site_url('create-student') ?>',
               method:'post',
               data:
                  {
                     student_firstname:firstname,
                     student_lastname:lastname
                  },
               success:function(response){
            
                  $('#addModal').modal('hide');
                  $('#addModal').find('input').val('');
                  $('#error_firstname').text('');
                  $('#error_lastname').text('');
                  
                  $('#tableData').html('');
                  
                  displaystudent();
                  
                  swal("Inserted", response.status, "success");
               }
            });
         }
         
      });
      
      $(document).on('click','#btn_edit', function(){
         
         var student_id = $(this).attr('table-id');
         
         $.ajax({
            url:'<?= site_url('edit-student') ?>/',
            method:'get',
            data:{sid:student_id},
            success:function(response){
               $('#updateModal').modal('show');
               $('#firstname_update').val(response.row.firstname);
               $('#lastname_update').val(response.row.lastname);
               $('#hidden_id').val(response.row.student_id);
            }
         });
         
      });
      
      $(document).on('click','#btn_update', function(){
         
         var firstname = $('#firstname_update').val();
         var lastname = $('#lastname_update').val();
         var hiddenId = $('#hidden_id').val();
         
         if(firstname == ''){ 
            error_firstname = 'please enter firstname'; 
            $('#error_firstname_update').text(error_firstname);
         }
         else if(lastname == ''){ 
            error_lastname = 'please enter lastname'; 
            $('#error_lastname_update').text(error_lastname);
         }
         else{
            $.ajax({
               url:'<?= site_url('update-student') ?>',
               method:'post',
               data:
                  {
                     update_firstname:firstname,
                     update_lastname:lastname,
                     update_id:hiddenId
                   },
               success:function(response){
            
                  $('#updateModal').modal('hide');
                  $('#error_firstname_update').text('');
                  $('#error_lastname_update').text('');
                  
                  $('#tableData').html('');
                  
                  displaystudent();
                  
                  swal("Updated", response.status, "success");
               }
            });
         }
         
      });
      
      $(document).on('click','#btn_delete', function(){
         
         var student_id = $(this).attr('table-id');
         
         $.ajax({
            url:'<?= site_url('delete-student') ?>/',
            method:'get',
            data:{delete_id:student_id},
            success:function(response){
               
               swal("Deleted", response.status, "success");
               
               $('#tableData').html('');
               
               displaystudent();
            }
         });
         
      });
      
         
   });
   
   function displaystudent()
   {
      $.ajax({
         url:'<?= site_url('fetch-student') ?>',
         method:'get',
         success:function(response){
            $.each(response.allstudents,function(key, value){
               $('#tableData').append('<tr>\
                  <td> '+value['student_id']+' </td>\
                  <td> '+value['firstname']+' </td>\
                  <td> '+value['lastname']+' </td>\
                  <td>\
                     <a id="btn_edit" table-id='+value['student_id']+' data-toggle="modal" data-target="#updateModal" class="btn btn-warning">Edit</a>\
                  </td>\
                  <td>\
                     <a id="btn_delete" table-id='+value['student_id']+' class="btn btn-danger">Delete</a>\
                  </td>\
               </tr>');
            });
         }
         
      });
      
   }
   
</script>

<?= $this->endSection() ?>
