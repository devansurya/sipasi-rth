<section class="wrapper bg-light">
  <div class="container pb-14 pb-md-16">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="blog single mt-3">
          <div class="card">
            <div class="card-body">
              <h1 class="display-4 mb-1 mt-10"><?= $dokumentasi['judul']; ?></h1>
              <div class="post-category text-line mb-5">
                <a href="javascript:;" rel="category"><i class="uil uil-file-alt fs-15"></i> Tanggal Dibuat : <?= $dokumentasi['created_at']; ?></a>
              </div>


              <div class="classic-view">
                <center>
                <img width="90%" src="<?= base_url('assets/img/' . $dokumentasi['file']) ?>">
              </center>
                
                <p class="mt-10">
                  <?= $dokumentasi['deskripsi']; ?>
                </p>

              </div>

            </div>
            <!-- /.post-footer -->
          </article>
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