<!DOCTYPE html>
<html>
<?php $this->load->view('layouts/loader'); ?>
<?php $this->load->view('layouts/head'); ?>
<body>
  <div class="content-wrapper">
  	<?php $this->load->view('layouts/header'); ?>
  	<?= $content; ?>
  </div>
  <?php $this->load->view('layouts/footer'); ?>
</body>

