    <section class="wrapper bg-light">
      <div class="container">
        <div class="card bg-soft-primary rounded-4 mt-2 mb-13 mb-md-17">
          <div class="card-body p-md-10 py-xl-11 px-xl-15">
            <div class="row gx-lg-8 gx-xl-0 gy-10 align-items-center">
              <div class="col-lg-6 order-lg-2 d-flex position-relative">
                <figure><img class="img-auto" src="./assets/img/illustrations/ui-custom.png"  alt="" /></figure>
                
                <!--/div -->
              </div>
              <!--/column -->
              <div class="col-lg-6 text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600">
                <h1 class="display-2 mb-5">Sistem Pemeliharaan dan Reservasi RTH.</h1>
                <p class="lead fs-lg lh-sm mb-7 pe-xl-10">Sistem yang dapat memudahkan pengguna dalam menjaga kebersihan dan keamanan dari RTH (Ruang Terbuka Hijau), serta memanfaatkannya untuk kegiatan sosial atau rekreasi yang lebih terorganisir.</p>
                <span><a href="#" class="btn btn-lg btn-primary rounded-pill me-2" id="btn-jelajahi">Mulai Jelajahi</a></span>

              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!--/.card-body -->
        </div>
      </div>
      
    </section>

    <section class="wrapper bg-light">
      <div class="container">
        <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0 mb-11">
          <div class="col-lg-4">
            <h3 class="display-4 mb-3 pe-xl-10">Jaga hijau kita!</h3>
            <p class="lead fs-lg mb-0 pe-xxl-10">Reservasi mudah, Pengaduan cepat</p>
          </div>
          <!-- /column -->
          <div class="col-lg-8 mt-lg-2">
            <div class="row align-items-center counter-wrapper gy-6 text-center">
              <div class="col-md-4">
                <img src="./assets/img/icons/lineal/home.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                <h3 class="counter">20</h3>
                <p>RTH</p>
              </div>
              <!--/column -->
              <div class="col-md-4">
                <img src="./assets/img/icons/lineal/files.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                <h3 class="counter">50</h3>
                <p>Pengaduan</p>
              </div>
              <!--/column -->
              <div class="col-md-4">
                <img src="./assets/img/icons/lineal/briefcase-2.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                <h3 class="counter">50</h3>
                <p>Reservasi</p>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!-- /column -->
        </div>
      </div>
      <div class="overflow-hidden">
        <div class="divider text-soft-primary mx-n2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
          </svg>
        </div>
      </div>
    </section>

    <section class="wrapper bg-gradient-primary" id="pengaduan-terbaru-section">
      <div class="container pt-12 pt-lg-8 pb-14 pb-md-17">
        <div class="row text-center">
          <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <h2 class="fs-16 text-uppercase text-primary mb-3"></h2>
            <h3 class="display-3 mb-10 px-xxl-10">Ruang Terbuka Hijau</h3>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="position-relative">
          <div class="shape bg-dot primary rellax w-17 h-20" data-rellax-speed="1" style="top: -1.7rem; left: -1.7rem;"></div>
          <div class="swiper-container grid-view nav-color mb-6" data-margin="30" data-dots="true" data-nav="true" data-items-md="3" data-items-md="2" data-items-xs="1">
            <div class="swiper">
              <div class="swiper-wrapper delay-section">
                <?php if(isset($rth)){
                  foreach($rth as $r){ ?>
                    <div class="swiper-slide">
                      <article>
                        <figure class="overlay overlay-1 hover-scale rounded mb-5" style="height: 200px;"><a href="<?= base_url('Home/detail_rth') ?>/<?= $r['id_rth']; ?>"> <img src="<?= base_url(); ?>assets/img/upload/<?= $r['foto_rth']; ?>" alt="Foto RTH" /></a>
                          <figcaption>
                            <h5 class="from-top mb-0">Baca Selengkapnya</h5>
                          </figcaption>
                        </figure>
                        <div class="post-header">
                         <!--  <div class="post-category text-line">
                            <a href="" class="hover" rel="category">lorem</a>
                          </div> -->
                          <!-- /.post-category -->
                          <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="<?= base_url('Home/detail_rth') ?>/<?= $r['id_rth']; ?>"><?= $r['nama_rth']; ?></a></h2>
                        </div>
                        <!-- /.post-header -->

                        <div class="post-content">
                          <p>
                            <?php 
                            $text = $r['deskripsi_rth'];
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
                          <!-- <ul class="post-meta">
                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>12-12-2024</span></li>
                            <li class="post-comments"><a href=""><i class="uil uil-comment"></i>12</a></li>
                          </ul> -->
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
              <span>Semua RTH</span>
            </a>
          </div>

        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
        <!--/.card -->
        <section class="wrapper bg-light">
      <div class="container ">
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-18 align-items-center">
          <div class="col-md-8 col-lg-6 position-relative">
            <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1" style="top: -2rem; left: -1.9rem;"></div>
            <figure class="rounded"><img src="./assets/img/photos/about10.jpg" srcset="./assets/img/photos/about10@2x.jpg 2x" alt=""></figure>
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <h2 class="display-4 mb-3">Who Are We?</h2>
            <p class="lead fs-lg">We are a digital and branding company that believes in the power of <span class="underline">creative strategy</span> and along with great design.</p>
            <p class="mb-6">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
            <div class="row gx-xl-10 gy-6">
              <div class="col-md-6">
                <div class="d-flex flex-row">
                  <div>
                    <img src="./assets/img/icons/lineal/target.svg" class="svg-inject icon-svg icon-svg-sm me-4" alt="" />
                  </div>
                  <div>
                    <h4 class="mb-1">Our Mission</h4>
                    <p class="mb-0">Dapibus eu leo quam ornare curabitur blandit tempus.</p>
                  </div>
                </div>
              </div>
              <!--/column -->
              <div class="col-md-6">
                <div class="d-flex flex-row">
                  <div>
                    <img src="./assets/img/icons/lineal/award-2.svg" class="svg-inject icon-svg icon-svg-sm me-4" alt="" />
                  </div>
                  <div>
                    <h4 class="mb-1">Our Values</h4>
                    <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.</p>
                  </div>
                </div>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!--/column -->
        </div>
      </div>
    </section>
        <!--/.row -->
        <section class="wrapper bg-gradient-reverse-primary">
      <div class="container pb-14 pb-md-16">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
          <div class="col-lg-7">
            <figure><img class="img-auto" src="./assets/img/illustrations/i22-green.png" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5">
            <h2 class="fs-15 text-uppercase text-primary mb-3">Aman tidak ya?</h2>
            <h3 class="display-3 mb-7">Sistem Menjaga Privasi dan Keamanan Pengguna.</h3>
            <div class="accordion accordion-wrapper" id="accordionExample">
              <div class="card plain accordion-item">
                <div class="card-header" id="headingOne">
                  <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Publik </button>
                </div>
                <!--/.card-header -->
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="card-body">
                    <p>Pengaduan dengan visibilitas publik akan ditampilkan pada Portal SIPASI RTH dan dapat dilihat oleh siapapun beserta informasi pembuat.</p>
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
                    <p>Pengaduan dengan visibilitas anonim tetap ditampilkan pada Portal SIPASI RTH dan dapat dilihat oleh siapapun, namun informasi pembuat akan di sembunyikan.</p>
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
                    <p>Pengaduan dengan visibilitas private akan disembunyikan dari Portal SIPASI RTH, namun tetap masuk ke dalam sistem.</p>
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
                    <p>Kamu bisa melakukan pengaduan lewat portal sipasi di dalam halaman detail RTH atau kamu bisa login dengan akun sipasi, lalu masuk ke dalam aplikasi pengaduanku, disana kamu dapat melihat menu untuk membuat pengaduanmu.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
              <div class="card accordion-item shadow-lg">
                <div class="card-header" id="accordion-heading-3-2">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-2" aria-expanded="false" aria-controls="accordion-collapse-3-2">Apakah privasi pengguna terjaga?</button>
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
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-3" aria-expanded="false" aria-controls="accordion-collapse-3-3">Bagaimana cara mereservasi RTH?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-3-3" class="collapse" aria-labelledby="accordion-heading-3-3" data-bs-target="#accordion-3">
                  <div class="card-body">
                    <p>Kamu bisa melakukan reservasi RTH pada portal SIPASI RTH dengan cara masuk ke halaman detail RTH dan klik tombol reservasi, disana kamu harus mengisi beberapa informasi untuk melakukan reservasi.</p>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.collapse -->
              </div>
              <!-- /.card -->
              <div class="card accordion-item shadow-lg">
                <div class="card-header" id="accordion-heading-3-4">
                  <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-3-4" aria-expanded="false" aria-controls="accordion-collapse-3-4">Bagaimana cara mengubah profile akun SIPASI RTH?</button>
                </div>
                <!-- /.card-header -->
                <div id="accordion-collapse-3-4" class="collapse" aria-labelledby="accordion-heading-3-4" data-bs-target="#accordion-3">
                  <div class="card-body">
                    <p>Kamu bisa masuk ke dalam aplikasi pengelola atau admin SIPASI RTH dan mengubah profile kamu disana.</p>
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
        <!--/.card -->
      </div>
      <!-- /.container -->
    </section>

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