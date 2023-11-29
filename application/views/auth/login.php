
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('assets-admin/images/favicon.png'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets-admin/images/favicon.png'); ?>" type="image/x-icon">
    <title>SIDUMA</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/font-awesome.css'); ?>">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/vendors/icofont.css'); ?>">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/vendors/themify.css'); ?>">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/vendors/flag-icon.css'); ?>">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/vendors/feather-icon.css'); ?>">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/vendors/bootstrap.css'); ?>">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/style.css'); ?>">
    <link id="color" rel="stylesheet" href="<?= base_url('assets-admin/css/color-1.css'); ?>" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets-admin/css/responsive.css'); ?>">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?= base_url('assets-admin/images/login/2.jpg'); ?>" alt="looginpage"></div>
        <div class="col-xl-5 p-0">
          <div class="login-card login-dark">
            <div>
              <!-- <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light" src="<?= base_url('assets-admin/images/logo/logo.png'); ?>" alt="looginpage"><img class="img-fluid for-dark" src="<?= base_url('assets/img/logo-detimihan.png'); ?>../assets/images/logo/logo_dark.png" alt="looginpage"></a></div> -->
              <div class="login-main"> 
                <form class="theme-form" action="<?= base_url('Auth') ?>" method="POST">
                  <h4>Sign in to account</h4>
                  <p>Enter your NIM & password to login</p>
                  <?= $this->session->flashdata('message') ?>
                  <div class="form-group">
                    <label class="col-form-label">NIM</label>
                    <input class="form-control" type="number" required="" name="nim">
                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="">
                      <!-- <div class="show-hide"><span class="show"></span></div> -->
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                  </div>
                  <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="<?= base_url('Auth/register')?>">Create Account</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="<?= base_url('assets-admin/js/jquery.min.js'); ?>."></script>
      <!-- Bootstrap js-->
      <script src="<?= base_url('assets-admin/js/bootstrap/bootstrap.bundle.min.js'); ?>"></script>
      <!-- feather icon js-->
      <script src="<?= base_url('assets-admin/js/icons/feather-icon/feather.min.js'); ?>"></script>
      <script src="<?= base_url('assets-admin/js/icons/feather-icon/feather-icon.js'); ?>"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="<?= base_url('assets-admin/js/config.js'); ?>"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?= base_url('assets-admin/js/script.js'); ?>"></script>
    </div>
  </body>
</html>