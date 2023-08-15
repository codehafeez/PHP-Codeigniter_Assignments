<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 Add User With Validation Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" action="<?= site_url('/update') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo  $user_obj['name']; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo  $user_obj['email']; ?>">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
      </div>
    </form>
  </div>
</body>
</html>