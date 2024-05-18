<section class="wrapper bg-light">

  <div class="container py-14 py-md-16">
    <center><h3 class="mb-5">Konfirmasi Reservasi</h3></center>
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
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter your first name.
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_lastname" type="date" name="surname" class="form-control" placeholder="Doe" required>
                    <label for="form_lastname">Tanggal Reservasi *</label>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter your last name.
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" required>
                    <label for="form_email">Email *</label>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please provide a valid email address.
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_email" type="number" name="email" class="form-control" placeholder="jane.doe@example.com" required>
                    <label for="form_email">No Telp *</label>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please provide a valid email address.
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <div class="form-floating mb-4">
                    <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px" required></textarea>
                    <label for="form_message">Kebutuhan *</label>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter your messsage.
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      I agree to <a href="#" class="hover">terms and policy</a>.
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Kirim">
                  <p class="text-muted"><strong>*</strong> These fields are required.</p>
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
              <figure class="overlay overlay-1 hover-scale rounded" style="height: 200px;"><a href="<?= base_url('Home/detail_pengaduan') ?>/"> <img src="<?= base_url(); ?>assets/img/upload/rthtapos.jpeg" alt="Foto Pengaduan" /></a>
                <figcaption>
                  <h5 class="from-top mb-0">Baca Selengkapnya</h5>
                </figcaption>
              </figure>
              <p>Taman Kelurahan Tapos</p>
            </div>
            <div class="d-flex flex-row">
              <div>
                <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
              </div>
              <div>
                <h5 class="mb-1">Alamat</h5>
                <address> Jl. Raya Tapos No.91, Tapos, Kec. Tapos, Kota Depok, Jawa Barat 16457</address>
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
</section>
<!-- /section -->