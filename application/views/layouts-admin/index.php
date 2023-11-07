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
        </div>
        <?php $this->load->view('layouts-admin/script'); ?>
    </div>
</body>
</html>