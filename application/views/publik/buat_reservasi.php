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
            <form class="reservasi-form" method="post" action="<?= base_url('Home/add_reservasi'); ?>">
              <div class="messages">
                <?php if ($this->session->flashdata('reservasi_message')): ?>
                  <?php echo $this->session->flashdata('reservasi_message'); ?>
                  <?php $this->session->unset_userdata('reservasi_message'); ?>
                <?php endif; ?>
              </div>
              <input type="hidden" name="id_rth" value="<?= $rth->id_rth; ?>">
              <div class="row gx-4">
                <div class="col-12 mb-4"> 
                  <select class="form-select" name="fasilitas" required="" id="fasilitas">
                    <option value="" selected="" disabled="" >Pilih Fasilitas</option>
                    <?php foreach ($fasilitas as $fs): ?>
                      <option value="<?= $fs['id_fasilitas_reservasi']; ?>"><?= $fs['nama']; ?> </option>
                    <?php endforeach ?>
                  </select>
                </div>
                
                <div class="col-md-6" id="luas-container" style="display: none">
                  <div class="form-floating mb-4">
                    <input id="luas" type="text" name="luas" class="form-control" placeholder="" readonly="">
                    <label for="luas">Luas</label>
                    
                  </div>
                </div>
                <div class="col-md-6" id="kapasitas-container" style="display: none">
                  <div class="form-floating mb-4">
                    <input id="kapasitas" type="text" name="name" class="form-control" placeholder="" readonly="">
                    <label for="kapasitas">Kapasitas</label>
                    
                  </div>
                </div>

                <div class="col-12 mb-4"> 
                  <select class="form-select" name="jenis" required="">
                    <option value="" selected="" disabled="" >Pilih Jenis Kebutuhan</option>
                    <?php foreach ($jenis as $j): ?>
                      <option value="<?= $j->id_jenisreservasi ?>"><?= $j->jenis_reservasi ?> </option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Jane" value="<?= $this->session->userdata('id') ? $this->session->userdata('nama') : ''; ?>" readonly required>
                    <label for="form_name">Nama *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi nama anda
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_lastname" type="date" name="tanggal" class="form-control" placeholder="Doe" required>
                    <label for="form_lastname">Tanggal Reservasi *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi tangal reservasi
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" value="<?= $this->session->userdata('id') ? $this->session->userdata('email') : ''; ?>" readonly required>
                    <label for="form_email">Email *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi email anda
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                  <div class="form-floating mb-4">
                    <input id="form_email" type="number" name="telp" class="form-control" placeholder="jane.doe@example.com" value="<?= $this->session->userdata('id') ? $this->session->userdata('telp') : ''; ?>" readonly required>
                    <label for="form_email">No Telp *</label>
                    
                    <div class="invalid-feedback">
                      Silahkan isi nomor telepon anda
                    </div>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                  <div class="form-floating mb-4">
                    <textarea id="form_message" name="deskripsi" class="form-control" placeholder="Your message" style="height: 150px" required></textarea>
                    <label for="form_message">Detail Tujuan Reservasi *</label>
                    
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
            <div id="preview-container" class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false" data-nav="false" data-thumbs="false" style="display: none">
                  <div class="swiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <figure class="rounded overflow-hidden" style="height: 200px; width: 100%;">
                          <img id="preview-image" src="" alt="" class="w-100 h-100" style="object-fit: cover;" />
                          <!-- <a id="preview-image-link" class="item-link" href="" data-glightbox data-gallery="product-group">
                            <i class="uil uil-focus-add"></i>
                          </a> -->
                        </figure>

                      </div>
                      <!--/.swiper-slide -->
                    </div>
                    <!--/.swiper-wrapper -->
                  </div>
                  <!-- /.swiper -->
                  <div class="swiper swiper-thumbs">
                    <!--/.swiper-wrapper -->
                  </div>
                  <!-- /.swiper -->
                </div>
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

<script>
  $(document).ready(function() {
    $('#fasilitas').change(function() {
      var fasilitasId = $(this).val();
      if (fasilitasId) {
        $.ajax({
          url: '<?= base_url();?>/Home/get_fasilitas_detail', 
          type: 'POST',
          data: { id_fasilitas: fasilitasId },
          dataType: 'json',
          success: function(response) {
            if (response) {
              $('#luas').val(response.luas + ' m²');
              $('#kapasitas').val(response.kapasitas + ' orang');
              $('#luas-container').show('slow');
              $('#kapasitas-container').show('slow');

              if (response.foto) {
                $('#preview-image').attr('src', '<?= base_url(); ?>assets/img/upload/' + response.foto);
                $('#preview-image-link').attr('href', '<?= base_url(); ?>assets/img/upload/' + response.foto);
                $('#preview-container').show('slow');
              } else {
                $('#preview-container').hide('slow');
                $('#preview-image').attr('src', '');
                $('#preview-image-link').attr('href', '');
              }
            }
          },
          error: function(xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
          }
        });
      } else {
        $('#luas-container').hide('slow');
        $('#kapasitas-container').hide('slow');
        $('#luas').val('');
        $('#kapasitas').val('');
      }
    });
  });
</script>