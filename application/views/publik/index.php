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
            <h3 class="display-4 mb-3 pe-xl-10">We are proud of our creative team</h3>
            <p class="lead fs-lg mb-0 pe-xxl-10">Just sit back and relax while we <span class="underline">take care</span> of your business needs.</p>
          </div>
          <!-- /column -->
          <div class="col-lg-8 mt-lg-2">
            <div class="row align-items-center counter-wrapper gy-6 text-center">
              <div class="col-md-4">
                <img src="./assets/img/icons/lineal/check.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                <h3 class="counter">7518</h3>
                <p>Completed Projects</p>
              </div>
              <!--/column -->
              <div class="col-md-4">
                <img src="./assets/img/icons/lineal/user.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                <h3 class="counter">3472</h3>
                <p>Happy Customers</p>
              </div>
              <!--/column -->
              <div class="col-md-4">
                <img src="./assets/img/icons/lineal/briefcase-2.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                <h3 class="counter">2184</h3>
                <p>Expert Employees</p>
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
                          <div class="post-category text-line">
                            <a href="" class="hover" rel="category">lorem</a>
                          </div>
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
                          <ul class="post-meta">
                            <li class="post-date"><i class="uil uil-calendar-alt"></i><span>12-12-2024</span></li>
                            <li class="post-comments"><a href=""><i class="uil uil-comment"></i>12</a></li>
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
        <section class="wrapper bg-light">
      <div class="container  ">
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-20 align-items-center">
          <div class="col-md-8 col-lg-6 order-lg-2 position-relative">
            <div class="shape bg-soft-primary rounded-circle rellax w-20 h-20" data-rellax-speed="1" style="top: -2rem; right: -1.9rem;"></div>
            <figure class="rounded"><img src="./assets/img/photos/about11.jpg" srcset="./assets/img/photos/about11@2x.jpg 2x" alt=""></figure>
          </div>
          <!--/column -->
          <div class="col-lg-6">
            <h2 class="display-4 mb-3">What We Do?</h2>
            <p class="lead fs-lg mb-8 pe-xxl-2">The full service we are offering is <span class="underline">specifically</span> designed to meet your business needs and projects.</p>
            <div class="row gx-xl-10 gy-6">
              <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="d-flex flex-row">
                  <div>
                    <img src="./assets/img/icons/lineal/megaphone.svg" class="svg-inject icon-svg icon-svg-sm text-primary me-5" alt="" />
                  </div>
                  <div>
                    <h4 class="mb-1">Marketing</h4>
                    <p class="mb-0">Nulla vitae elit libero pharetra augue dapibus.</p>
                  </div>
                </div>
              </div>
              <!--/column -->
              <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="d-flex flex-row">
                  <div>
                    <img src="./assets/img/icons/lineal/target.svg" class="svg-inject icon-svg icon-svg-sm text-primary me-5" alt="" />
                  </div>
                  <div>
                    <h4 class="mb-1">Strategy</h4>
                    <p class="mb-0">Vivamus sagittis lacus augue laoreet vel.</p>
                  </div>
                </div>
              </div>
              <!--/column -->
              <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="d-flex flex-row">
                  <div>
                    <img src="./assets/img/icons/lineal/settings-3.svg" class="svg-inject icon-svg icon-svg-sm text-primary me-5" alt="" />
                  </div>
                  <div>
                    <h4 class="mb-1">Development</h4>
                    <p class="mb-0">Cras mattis consectetur purus sit amet.</p>
                  </div>
                </div>
              </div>
              <!--/column -->
              <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="d-flex flex-row">
                  <div>
                    <img src="./assets/img/icons/lineal/bar-chart.svg" class="svg-inject icon-svg icon-svg-sm text-primary me-5" alt="" />
                  </div>
                  <div>
                    <h4 class="mb-1">Data Analysis</h4>
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
        <section class="wrapper bg-light">
      <div class="container  ">
        <div class="card bg-soft-primary rounded-4 mb-14 mb-md-18">
          <div class="card-body p-md-10 py-xxl-16 position-relative">
            <div class="position-absolute d-none d-lg-block" style="bottom:0; left:10%; width: 28%; z-index:2">
              <figure><img src="./assets/img/photos/co2.png" srcset="./assets/img/photos/co2@2x.png 2x" alt=""></figure>
            </div>
            <div class="row gx-md-0 gx-xl-12 text-center">
              <div class="col-lg-7 offset-lg-5 col-xl-6">
                <span class="ratings five mb-3"></span>
                <blockquote class="border-0 fs-lg mb-0">
                  <p>“Fusce dapibus tellus ac cursus commodo, tortor mauris condimentum nibh ut fermentum massa, justo sit amet vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed”</p>
                  <div class="blockquote-details justify-content-center text-center">
                    <div class="info p-0">
                      <h5 class="mb-1">Coriss Ambady</h5>
                      <div class="meta mb-0">Financial Analyst</div>
                    </div>
                  </div>
                </blockquote>
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
          <!--/.card-body -->
        </div>
      </div>
    </section>
        <!--/.card -->
        
        <!-- /.row -->
        <section class="wrapper bg-light">
      <div class="container">
        <div class="row grid-view gx-md-8 gx-xl-10 gy-8 gy-lg-0 mb-16 mb-md-19">
          <div class="col-md-6 col-lg-3">
            <div class="position-relative">
              <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
              <div class="card shadow-lg">
                <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t1.jpg" srcset="./assets/img/avatars/t1@2x.jpg 2x" alt="" /></figure>
                <div class="card-body px-6 py-5">
                  <h4 class="mb-1">Coriss Ambady</h4>
                  <p class="mb-0">Financial Analyst</p>
                </div>
                <!--/.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /div -->
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-3">
            <div class="position-relative">
              <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
              <div class="card shadow-lg">
                <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t2.jpg" srcset="./assets/img/avatars/t2@2x.jpg 2x" alt="" /></figure>
                <div class="card-body px-6 py-5">
                  <h4 class="mb-1">Cory Zamora</h4>
                  <p class="mb-0">Marketing Specialist</p>
                </div>
                <!--/.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /div -->
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-3">
            <div class="position-relative">
              <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
              <div class="card shadow-lg">
                <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t3.jpg" srcset="./assets/img/avatars/t3@2x.jpg 2x" alt="" /></figure>
                <div class="card-body px-6 py-5">
                  <h4 class="mb-1">Nikolas Brooten</h4>
                  <p class="mb-0">Sales Manager</p>
                </div>
                <!--/.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /div -->
          </div>
          <!--/column -->
          <div class="col-md-6 col-lg-3">
            <div class="position-relative">
              <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -0.75rem; right: -0.75rem; width: 98%; height: 98%; z-index:0"></div>
              <div class="card shadow-lg">
                <figure class="card-img-top"><img class="img-fluid" src="./assets/img/avatars/t4.jpg" srcset="./assets/img/avatars/t4@2x.jpg 2x" alt="" /></figure>
                <div class="card-body px-6 py-5">
                  <h4 class="mb-1">Jackie Sanders</h4>
                  <p class="mb-0">Investment Planner</p>
                </div>
                <!--/.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /div -->
          </div>
          <!--/column -->
        </div>
      </div>
    </section>
        <!--/.row -->
        <section class="wrapper bg-light">
      <div class="container">
        <div class="row gy-10 gy-sm-13 gx-lg-3 align-items-center mb-14 mb-md-18">
          <div class="col-md-8 col-lg-6 position-relative">
            <a href="./assets/media/movie.mp4" class="btn btn-circle btn-primary btn-play ripple mx-auto mb-5 position-absolute" style="top:50%; left: 50%; transform: translate(-50%,-50%); z-index:3;" data-glightbox><i class="icn-caret-right"></i></a>
            <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0" style="bottom: -1.8rem; right: -1.5rem; width: 85%; height: 90%; "></div>
            <figure class="rounded"><img src="./assets/img/photos/about12.jpg" srcset="./assets/img/photos/about12@2x.jpg 2x" alt=""></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5 col-xl-4 offset-lg-1">
            <h3 class="display-4 mb-3">Sandbox Brings Awesomeness</h3>
            <p class="lead fs-lg mb-6">We have considered our solutions to <span class="underline">support every stage</span> of your growth.</p>
            <ul class="progress-list">
              <li>
                <p>Marketing</p>
                <div class="progressbar line primary" data-value="100"></div>
              </li>
              <li>
                <p>Strategy</p>
                <div class="progressbar line primary" data-value="80"></div>
              </li>
              <li>
                <p>Development</p>
                <div class="progressbar line primary" data-value="85"></div>
              </li>
            </ul>
            <!-- /.progress-list -->
          </div>
          <!--/column -->
        </div>
      </div>
    </section>
        <!--/.row -->
        <section class="wrapper bg-light">
      <div class="container ">
        <div class="row gy-6 align-items-center mb-14 mb-md-18">
          <div class="col-lg-4">
            <h3 class="display-4 mb-5">We offer great and premium prices.</h3>
            <p class="lead fs-lg mb-5">Enjoy a <span class="underline">free 30-day trial</span> and experience the full service. No credit card required!</p>
            <a href="#" class="btn btn-primary rounded-pill mt-2">See All Prices</a>
          </div>
          <!--/column -->
          <div class="col-lg-7 offset-lg-1 pricing-wrapper">
            <div class="pricing-switcher-wrapper switcher justify-content-start justify-content-lg-end">
              <p class="mb-0 pe-3">Monthly</p>
              <div class="pricing-switchers">
                <div class="pricing-switcher pricing-switcher-active"></div>
                <div class="pricing-switcher"></div>
                <div class="switcher-button bg-primary"></div>
              </div>
              <p class="mb-0 ps-3">Yearly <span class="text-red">(Save 30%)</span></p>
            </div>
            <div class="row gy-6 mt-5">
              <div class="col-md-6">
                <div class="pricing card shadow-lg">
                  <div class="card-body pb-12">
                    <div class="prices text-dark">
                      <div class="price price-show justify-content-start"><span class="price-currency">$</span><span class="price-value">19</span> <span class="price-duration">mo</span></div>
                      <div class="price price-hide price-hidden justify-content-start"><span class="price-currency">$</span><span class="price-value">199</span> <span class="price-duration">yr</span></div>
                    </div>
                    <!--/.prices -->
                    <h4 class="card-title mt-2">Premium Plan</h4>
                    <ul class="icon-list bullet-bg bullet-soft-primary mt-7 mb-8">
                      <li><i class="uil uil-check"></i><span><strong>5</strong> Projects </span></li>
                      <li><i class="uil uil-check"></i><span><strong>100K</strong> API Access </span></li>
                      <li><i class="uil uil-check"></i><span><strong>200MB</strong> Storage </span></li>
                      <li><i class="uil uil-check"></i><span> Weekly <strong>Reports</strong></span></li>
                      <li><i class="uil uil-times bullet-soft-red"></i><span> 7/24 <strong>Support</strong></span></li>
                    </ul>
                    <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.pricing -->
              </div>
              <!--/column -->
              <div class="col-md-6 popular">
                <div class="pricing card shadow-lg">
                  <div class="card-body pb-12">
                    <div class="prices text-dark">
                      <div class="price price-show justify-content-start"><span class="price-currency">$</span><span class="price-value">49</span> <span class="price-duration">mo</span></div>
                      <div class="price price-hide price-hidden justify-content-start"><span class="price-currency">$</span><span class="price-value">499</span> <span class="price-duration">yr</span></div>
                    </div>
                    <!--/.prices -->
                    <h4 class="card-title mt-2">Corporate Plan</h4>
                    <ul class="icon-list bullet-bg bullet-soft-primary mt-7 mb-8">
                      <li><i class="uil uil-check"></i><span><strong>20</strong> Projects </span></li>
                      <li><i class="uil uil-check"></i><span><strong>300K</strong> API Access </span></li>
                      <li><i class="uil uil-check"></i><span><strong>500MB</strong> Storage </span></li>
                      <li><i class="uil uil-check"></i><span> Weekly <strong>Reports</strong></span></li>
                      <li><i class="uil uil-check"></i><span> 7/24 <strong>Support</strong></span></li>
                    </ul>
                    <a href="#" class="btn btn-primary rounded-pill">Choose Plan</a>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.pricing -->
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
        <section class="wrapper bg-light">
      <div class="container">
        <div class="card bg-soft-primary rounded-4">
          <div class="card-body p-md-10 p-xl-11">
            <div class="row gx-lg-8 gx-xl-12 gy-10">
              <div class="col-lg-6">
                <h3 class="display-4 mb-4">Frequently Asked Questions</h3>
                <p class="lead fs-lg mb-0">If you don't see an answer to your question, you can send us an email from our contact form.</p>
              </div>
              <!--/column -->
              <div class="col-lg-6">
                <div class="accordion accordion-wrapper" id="accordionExample">
                  <div class="card plain accordion-item">
                    <div class="card-header" id="headingOne">
                      <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">How do I get my subscription receipt?</button>
                    </div>
                    <!--/.card-header -->
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="card-body">
                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                      </div>
                      <!--/.card-body -->
                    </div>
                    <!--/.accordion-collapse -->
                  </div>
                  <!--/.accordion-item -->
                  <div class="card plain accordion-item">
                    <div class="card-header" id="headingTwo">
                      <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Are there any discounts for people in need?</button>
                    </div>
                    <!--/.card-header -->
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="card-body">
                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                      </div>
                      <!--/.card-body -->
                    </div>
                    <!--/.accordion-collapse -->
                  </div>
                  <!--/.accordion-item -->
                  <div class="card plain accordion-item">
                    <div class="card-header" id="headingThree">
                      <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Do you offer a free trial edit?</button>
                    </div>
                    <!--/.card-header -->
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="card-body">
                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                      </div>
                      <!--/.card-body -->
                    </div>
                    <!--/.accordion-collapse -->
                  </div>
                  <!--/.accordion-item -->
                  <div class="card plain accordion-item">
                    <div class="card-header" id="headingFour">
                      <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How do I reset my Account password?</button>
                    </div>
                    <!--/.card-header -->
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="card-body">
                        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
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
          <!--/.card-body -->
        </div>
      </div>
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