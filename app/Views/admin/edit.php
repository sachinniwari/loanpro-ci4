<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 CRUD - Edit User Demo</title>
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
    <form method="post" id="update_user" name="update_user" 
    action="<?= base_url('/admin/updateData') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" name="firstName" class="form-control" value="<?php echo $user['firstName']; ?>">
      </div>
      <div class="form-group">
        <label>First Name</label>
        <input type="text" name="lastName" class="form-control" value="<?php echo $user['lastName']; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
      </div>
      <div class="form-group">
        <label>Mobile</label>
        <input type="text" name="mobile" class="form-control" value="<?php echo $user['mobile']; ?>">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Update</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
                firstName: {
                    required: true,
                    minlength: 3
                },
                lastName: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                }
            }
      })
    }
  </script>
</body>
</html>