<!DOCTYPE html>
<html>
<?php $this->load->view('layouts-admin/head'); ?>
<body>
  <?php $this->load->view('layouts-admin/loader'); ?>
  <!-- tap on top starts-->
  <div class="tap-top"><i data-feather="chevrons-up"></i></div>
  <!-- tap on tap ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <?php $this->load->view('layouts-admin/header'); ?>
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
          <?php $this->load->view('layouts-admin/sidebar'); ?>
          <?= $content; ?>
          <!-- footer start-->
          <footer class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                  <p class="mb-0">Copyright 2024 © SIPASI RTH  </p>
                </div>
              </div>
            </div>
          </footer>
      </div>
  </div>
<?php $this->load->view('layouts-admin/script'); ?>
</body>
</html>