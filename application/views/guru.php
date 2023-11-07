<section class="wrapper bg-light">
  <div class="container pb-14 pb-md-16">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="mt-3">
          <div class="row text-center pt-10 mb-10">
            <div class="col-md-12 col-lg-12">
              <h3 class="display-3 text-primary">Bertemu Dengan Guru di Sekolah Kami</h3>
              <p>Sekolah kami memiliki banyak guru dengan berbagai jenis lulusan yang handal dan berkompeten dibidangnya masing-masing.
              </p>
            </div>
          </div>
          <div class="row">
            <?php if(isset($guru)){
              foreach($guru as $g){ ?>
                <div class="col-md-6 col-lg-3">
                  <img class="rounded-circle w-20 mx-auto mb-4" src="<?= base_url('assets/img/'. $g['file']) ?>">
                  <h4 class="mb-1"><?= $g['nama']; ?></h4>
                </div>
                
              <?php }} ?>
              
            </div>


            <!-- /.post -->
          </div>
          <!-- /.classic-view -->
          <hr />
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.blog -->
  </div>
  <!-- /column -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->
</section>