<section class="wrapper bg-gray">
  <div class="container py-3 py-md-5">
    <nav class="d-inline-block" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('Home/rth'); ?>">RTH</a></li>
        <li class="breadcrumb-item active" aria-current="page">Buat Reservasi</li>
      </ol>
    </nav>
    <!-- /nav -->
  </div>
  <!-- /.container -->
</section>
<section class="wrapper bg-light">

  <div class="container py-8 py-md-10">
    <center><h2 class="">Buat Reservasi</h2></center>
    <center><h3 class="text-primary mb-5"><?= $rth->nama_rth; ?></h3></center>
    <div class="row">

      <div class="col-xl-10 mx-auto mt-5">
        <div class="row gy-10 gx-lg-8 gx-xl-12">
          <div class="col-lg-8">
            <form class="contact-form needs-validation" method="post" action="./assets/php/contact.php" novalidate>
              <div class="messages"></div>
              <div class="row gx-4">
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Jane" required>
                    <label for="form_name">Nama *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi nama anda
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_lastname" type="date" name="surname" class="form-control" placeholder="Doe" required>
                    <label for="form_lastname">Tanggal Reservasi *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi tangal reservasi
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" required>
                    <label for="form_email">Email *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi email anda
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_email" type="number" name="email" class="form-control" placeholder="jane.doe@example.com" required>
                    <label for="form_email">No Telp *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi nomor telepon anda
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <div class="form-floating mb-4">
                    <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px" required></textarea>
                    <label for="form_message">Kepentingan *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi kepentingan anda
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Saya menyetujui <a href="#" class="hover">syarat dan ketentuan</a>.
                    </label>
                    <div class="invalid-feedback">
                      Kamu harus menyetujui sebelum mengirim
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Kirim">
                  <p class="text-muted"><strong>*</strong> Kolom wajib di isi</p>
                </div>
                <!-- /column -->
              </div>
              <!-- /.row -->
            </form>
            <!-- /form -->
          </div>
          <!--/column -->
          <div class="col-lg-4">
            <div class="">
              <figure class="overlay overlay-1 hover-scale rounded" style="height: 200px;"><a href="<?= base_url('Home/detail_rth') ?>/<?= $rth->id_rth; ?>"> <img src="<?= base_url(); ?>assets/img/upload/<?= $rth->foto_rth; ?>" alt="Foto Pengaduan" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Baca Selengkapnya</h5>
                </figcaption>
              </figure>
            </div>
            <div class="d-flex flex-row mt-4">
              <div>
                <div class="icon text-primary fs-28 me-4"> <i class="uil uil-location-pin-alt"></i> </div>
              </div>
              <div>
                <address> <?= $rth->alamat; ?></address>
              </div>
            </div>
           <!--  <div class="d-flex flex-row">
              <div>
                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
              </div>
              <div>
                <h5 class="mb-1">Phone</h5>
                <p>00 (123) 456 78 90 <br />00 (987) 654 32 10</p>
              </div>
            </div>
            <div class="d-flex flex-row">
              <div>
                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
              </div>
              <div>
                <h5 class="mb-1">E-mail</h5>
                <p class="mb-0"><a href="mailto:sandbox@email.com" class="text-body">sandbox@email.com</a></p>
                <p><a href="mailto:help@sandbox.com" class="text-body">help@sandbox.com</a></p>
              </div>
            </div> -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <div class="overflow-hidden">
    <div class="divider text-navy mx-n2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
        <path fill="currentColor" d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
      </svg>
    </div>
  </div>
</section>
<!-- /section -->