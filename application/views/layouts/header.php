<header class="wrapper bg-light">
      <nav class="navbar navbar-expand-lg classic transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
          <div class="navbar-brand w-100">
            <a href="<?= base_url('Home') ?>" class="nav-link text-dark">
              <img width="40px" src="<?= base_url('assets/img/logo-detimihan.png') ?>">
              <b>SMK 8 DETIMIHAN</b>
            </a>
          </div>
          <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
            <div class="offcanvas-header d-lg-none">
              <h3 class="text-white fs-30 mb-0">Sandbox</h3>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="dropdown-item" href="<?= base_url('Home/visimisi'); ?>">Visi Misi</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="<?= base_url('Home/sejarah'); ?>">Sejarah</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="<?= base_url('Home/struktur'); ?>">Struktur Organisasi</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link scroll-section" data-section="section-informasi" href="#">Informasi</a>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link scroll-section" data-section="section-dokumentasi" href="#">Dokumentasi</a>
                </li>
                <li class="nav-item dropdown dropdown-mega">
                  <a class="nav-link scroll-section" data-section="section-kontak" href="#">Kontak</a>
                </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="offcanvas-footer d-lg-none">
                <div>
                  <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                  <br /> 00 (123) 456 78 90 <br />
                  <nav class="nav social social-white mt-4">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                    <a href="#"><i class="uil uil-dribbble"></i></a>
                    <a href="#"><i class="uil uil-instagram"></i></a>
                    <a href="#"><i class="uil uil-youtube"></i></a>
                  </nav>
                  <!-- /.social -->
                </div>
              </div>
              <!-- /.offcanvas-footer -->
            </div>
            <!-- /.offcanvas-body -->
          </div>
        </div>
        <!-- /.container -->
      </nav>
      <!-- /.navbar -->
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $(".nav-link").on('click', function() {
          var section = $(this).data('section');
          $("html, body").animate({ scrollTop: $("#" + section).offset().top }, 1000);
        });
      });
    </script>