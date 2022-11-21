<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Book Store Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontastic.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info ">
                <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                    <h1>Registration Form</h1>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <?php
                        $notification = $this->session->flashdata('notif');
                        if($notification != NULL)
                        {
                          echo '
                              <div class="alert alert-danger">
                              '.$notification.'
                              </div>
                          ';
                        } 
                    ?>
                  <form method="post" class="form-validate" action="<?php echo base_url('index.php/admin/proses_register') ?>">
                  <h3 class="fw-bold text-muted text-center mb-4">Creating a New Account</h3>
                  <div class="form-group">
                      <input id="fullname" type="text" name="fullname" required data-msg="Please enter your Name" class="input-material">
                      <label for="login-fullname" class="label-material">Full Name</label>
                    </div>

                    <div class="form-group">
                      <input id="username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">Username</label>
                    </div>
                    
                    <div class="form-group">
                      <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                      <div class="form-group">
                      <label for="level" class="control-label">User Role</label>
                      <select type="text" name="level" required class="custom-select">
                          <option>admin</option>
                          <option>cashier</option>
                      </select> 
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                      <a href="<?php echo base_url('index.php/admin/index') ?>" class="text-decoration-none mr-3">Already have an account? Login here</a>
                      <input type="submit" name="submit" class="btn btn-primary rounded-0" value="Register">
                    </div>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
  </body>
</html>