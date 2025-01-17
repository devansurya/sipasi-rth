  <section class="wrapper bg-light">
      <div class="container pt-10 pt-md-14 text-center">
        <div class="row gx-lg-8 gx-xl-12 gy-10 gy-xl-0 mb-14 align-items-center">
          <div class="col-lg-7 order-lg-2">
            <figure><img class="img-auto" src="./assets/img/illustrations/i21.png" srcset="./assets/img/illustrations/i21@2x.png 2x" alt="" /></figure>
          </div>
          <!-- /column -->
          <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-5 text-center text-lg-start">
            <h1 class="display-1 fs-50 mb-5 mx-md-n5 mx-lg-0 mt-7">Sistem Pengaduan <br class="d-md-none">Mahasiswa UBSI <br class="d-md-none"><span class="rotator-fade text-primary fs-30 delay-section">Akademik,Administratif,Layanan Kampus,Kesejahteraan Mahasiswa,Lingkungan Kampus</span></h1>
            <p class="lead fs-lg mb-7">SIDUMA adalah sistem yang dapat membantu mahasiswa untuk memberikan saran maupun keluhan kepada UBSI guna meningkatkan kualitas layanan yang diberikan kepada mahasiswa.</p>
            <span><a class="btn btn-lg btn-primary rounded-pill me-2" id="btn-jelajahi">Mulai Jelajahi</a></span>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <section class="wrapper bg-light">
      <div class="container  pb-10 pb-md-10">
        <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0 mb-11">
          <div class="col-lg-4 text-center text-lg-start">
            <!-- <h2 class="fs-16 text-uppercase text-primary mb-3">Company Facts</h2> -->
            <h3 class="display-1 fs-40 mb-4 pe-xxl-5">Ayo Buat Pengaduanmu!</h3>
            <p class="mb-0 pe-xxl-11">Berikan saran atau tuangkan keluhanmu kepada UBSI.</p>
          </div>
          <!-- /column -->
          <div class="col-lg-8 mt-lg-2">
            <div class="row align-items-center counter-wrapper gy-6 text-center">
              <div class="col-md-4">
                <div class="icon btn btn-circle btn-lg btn-soft-primary pe-none mb-4"> <i class="uil uil-file-alt"></i> </div>
                <h3 class="counter"><?= $jumlah_pengaduan_all; ?></h3>
                <p>Semua Pengaduan</p>
              </div>
              <!--/column -->
              <div class="col-md-4">
                <div class="icon btn btn-circle btn-lg btn-soft-primary pe-none mb-4"> <i class="uil uil-clock-nine"></i> </div>
                <h3 class="counter"><?= $jumlah_pengaduan_proses; ?></h3>
                <p>Dalam Penanganan</p>
              </div>
              <!--/column -->
              <div class="col-md-4">
                <div class="icon btn btn-circle btn-lg btn-soft-primary pe-none mb-4"> <i class="uil uil-file-check"></i> </div>
                <h3 class="counter"><?= $jumlah_pengaduan_selesai; ?></h3>
                <p>Telah Selesai</p>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!-- /column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
      <div class="overflow-hidden">
        <div class="divider text-soft-primary mx-n2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
          </svg>
        </div>
      </div>
      <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-gradient-primary" id="pengaduan-terbaru-section">
      <div class="container pt-12 pt-lg-8 pb-14 pb-md-17">
        <div class="row text-center">
          <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <h2 class="fs-16 text-uppercase text-primary mb-3">Apa Yang Baru?</h2>
            <h3 class="display-3 mb-10 px-xxl-10">Pengaduan Terbaru</h3>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="position-relative">
          <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1" style="top: -1.7rem; left: -1.7rem;"></div>
          <div class="swiper-container grid-view nav-color mb-6" data-margin="30" data-dots="true" data-nav="true" data-items-md="3" data-items-md="2" data-items-xs="1">
            <div class="swiper">
              <div class="swiper-wrapper delay-section">
                <?php if(isset($pengaduan)){
                  foreach($pengaduan as $p){ ?>
                    <div class="swiper-slide">
                      <article>
                        <figure class="overlay overlay-1 hover-scale rounded mb-5" style="height: 200px;"><a href="<?= base_url('Home/detail_pengaduan') ?>/<?= $p['id_pengaduan']; ?>"> <img src="<?= base_url(); ?>assets/img/upload/<?= $p['foto']; ?>" alt="Foto Pengaduan" /></a>
                          <figcaption>
                            <h5 class="from-top mb-0">Baca Selengkapnya</h5>
                          </figcaption>
                        </figure>
                        <div class="post-header">
                          <div class="post-category text-line">
                            <a href="<?= base_url('Home/detail_pengaduan') ?>/<?= $p['id_pengaduan']; ?>" class="hover" rel="category"><?= $p['kategori']; ?></a>
                          </div>
                          <!-- /.post-category -->
                          <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="<?= base_url('Home/detail_pengaduan') ?>/<?= $p['id_pengaduan']; ?>"><?= $p['subjek']; ?></a></h2>
                        </div>
                        <!-- /.post-header -->

                        <div class="post-content">
                          <p>
                            <?php 
                            $text = $p['deskripsi'];
                            $limit = 200;

                            if (strlen($text) > $limit) {
                              $shortenedText = substr($text, 0, $limit);

                              $shortenedText .= " ...";

                              echo $shortenedText;
                            } else {
                              echo $text; 
                            }

                            ?>
                          </p>
                        </div>

                        <div class="post-footer">
                          <ul class="post-meta">
                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span><?php echo date('d M Y', strtotime($p['created_at'])); ?></span></li>
                            <li class="post-comments"><a href="<?= base_url('Home/detail_pengaduan') ?>/<?= $p['id_pengaduan']; ?>"><i class="uil uil-comment"></i><?= $p['jumlah_komentar']; ?></a></li>
                          </ul>
                          <!-- /.post-meta -->
                        </div>
                        <!-- /.post-footer -->
                      </article>
                      <!-- /article -->
                    </div>
                    <!--/.swiper-slide -->
                  <?php }} ?>

                </div>
                <!-- /.swiper-wrapper -->
              </div>
              <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
            <a style="margin-top: -10px" href="<?= base_url('Home/pengaduan'); ?>" class="btn btn-expand btn-primary rounded-pill float-end">
              <i class="uil uil-arrow-right"></i>
              <span>Semua Pengaduan</span>
            </a>
          </div>

        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container pb-14 pb-md-17">
        <div class="row gx-md-8 gx-xl-12 gy-10 align-items-center">
          <div class="col-lg-6 order-lg-2">
            <?php
            $class = ['me-lg-6','ms-lg-13 mt-6','mx-lg-6 mt-6'];
            $index = 0;
            $no = 1;
             if(!empty($kategori_favorit)){
              foreach ($kategori_favorit as $k) { ?>
                
            <div class="card shadow-lg <?= $class[$index]; ?>">
              <div class="card-body p-6">
                <div class="d-flex flex-row">
                  <div>
                    <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span class="number"><?= $no; ?></span></span>
                  </div>
                  <div>
                    <h4 class="mb-1"><?= $k['kategori']; ?></h4>
                    <p class="mb-0">Dengan jumlah <?= $k['total']; ?> pengaduan.</p>
                  </div>
                </div>
              </div>
              <!--/.card-body -->
            </div>

          <?php $index++;$no++; }} ?>
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <h2 class="fs-16 text-uppercase text-primary mb-3">Paling Sering</h2>
            <h3 class="display-3 mb-4">Ini adalah 3 kategori favorit yang sering terlibat dalam pengaduan.</h3>
            <p class="mb-6">Dalam SIDUMA terdapat banyak kategori yang bisa dibahas kedalam sebuah pengaduan, berikut adalah 3 kategori favorit yang sering di bahas dalam sebuah pengaduan.</p>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-gradient-reverse-primary">
      <div class="container pb-14 pb-md-16">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
          <div class="col-lg-7">
            <figure><img class="img-auto" src="./assets/img/illustrations/i22.png" srcset="./assets/img/illustrations/i22@2x.png 2x" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5">
            <h2 class="fs-15 text-uppercase text-primary mb-3">Aman tidak ya?</h2>
            <h3 class="display-3 mb-7">Sistem Menjaga Privasi dan Keamanan Mahasiswa.</h3>
            <div class="accordion accordion-wrapper" id="accordionExample">
              <div class="card plain accordion-item">
                <div class="card-header" id="headingOne">
                  <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Publik </button>
                </div>
                <!--/.card-header -->
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    <p>Pengaduan dengan visibilitas publik akan ditampilkan pada Portal SIDUMA UBSI dan dapat dilihat oleh siapapun beserta informasi pembuat.</p>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.accordion-collapse -->
              </div>
              <!--/.accordion-item -->
              <div class="card plain accordion-item">
                <div class="card-header" id="headingTwo">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Anonim </button>
                </div>
                <!--/.card-header -->
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    <p>Pengaduan dengan visibilitas anonim tetap ditampilkan pada Portal SIDUMA UBSI dan dapat dilihat oleh siapapun, namun informasi pembuat akan di sembunyikan.</p>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.accordion-collapse -->
              </div>
              <!--/.accordion-item -->
              <div class="card plain accordion-item">
                <div class="card-header" id="headingThree">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Private </button>
                </div>
                <!--/.card-header -->
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    <p>Pengaduan dengan visibilitas private akan disembunyikan dari Portal SIDUMA BSI, namun tetap masuk ke dalam sistem.</p>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.accordion-collapse -->
              </div>
              <!--/.accordion-item -->
            </div>
            <!--/.accordion -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
      <div class="overflow-hidden">
        <div class="divider text-light mx-n2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
          </svg>
        </div>
      </div>
      <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->
    
   
    <section class="wrapper bg-light">
      <div class="container pt-6 pb-14 pb-md-16">
        <div class="row gx-lg-8 gx-xl-12 gy-10">
          <div class="col-lg-6 mb-0">
            <h2 class="fs-16 text-uppercase text-primary mb-4">FAQ</h2>
            <h3 class="display-3 mb-4">Tidak Menemukan Jawaban?</h3>
            <p class="mb-6">Jika kamu tidak menemukan jawaban dari pertanyaanmu, kamu dapat mengirim pertanyaan ke email kami yang tertera pada menu kontak.</p>
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <div id="accordion-3" class="accordion-wrapper">
              <div class="card accordion-item shadow-lg">
                <div class="card-header" id="accordion-heading-3-1">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-1" aria-expanded="false" aria-controls="accordion-collapse-3-1">Bagaimana cara membuat pengaduan?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-3-1" class="collapse" aria-labelledby="accordion-heading-3-1" data-bs-target="#accordion-3">
                  <div class="card-body">
                    <p>Kamu perlu login dengan akun siduma, lalu masuk ke dalam aplikasi pengaduanku, disana kamu dapat melihat menu untuk membuat pengaduanmu.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
              <div class="card accordion-item shadow-lg">
                <div class="card-header" id="accordion-heading-3-2">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-2" aria-expanded="false" aria-controls="accordion-collapse-3-2">Apakah privasi mahasiswa terjaga?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-3-2" class="collapse" aria-labelledby="accordion-heading-3-2" data-bs-target="#accordion-3">
                  <div class="card-body">
                    <p>Sangat amat terjaga, kami menyediakan jenis privasi yang akan menjaga identitas dari pelapor mungkin untuk konten pengaduan yang lumayan sensitif.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
              <div class="card accordion-item shadow-lg">
                <div class="card-header" id="accordion-heading-3-3">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-3" aria-expanded="false" aria-controls="accordion-collapse-3-3">Bagaimana cara mengomentari pengaduan?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-3-3" class="collapse" aria-labelledby="accordion-heading-3-3" data-bs-target="#accordion-3">
                  <div class="card-body">
                    <p>Kamu bisa mengomentari pengaduan pada portal SIDUMA dengan cara masuk ke dalam detail pengaduan yang ingin kamu komentari.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
              <div class="card accordion-item shadow-lg">
                <div class="card-header" id="accordion-heading-3-4">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-4" aria-expanded="false" aria-controls="accordion-collapse-3-4">Bagaimana cara mengubah profile akun SIDUMA?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-3-4" class="collapse" aria-labelledby="accordion-heading-3-4" data-bs-target="#accordion-3">
                  <div class="card-body">
                    <p>Kamu bisa masuk ke dalam aplikasi pengelola atau admin SIDUMA dan mengubah profile kamu disana.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.accordion-wrapper -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
      <div class="overflow-hidden">
        <div class="divider text-navy mx-n2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
          </svg>
        </div>
      </div>
      <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->

 <script type="text/javascript">
   
  $(document).ready(function() {
    setTimeout(function() {
      $('.delay-section').css("visibility", "visible");
    });

    $("#btn-jelajahi").on('click', function() {
      $("html, body").animate({ scrollTop: $("#pengaduan-terbaru-section").offset().top }, 1000);
    });

  });
 </script>
            
