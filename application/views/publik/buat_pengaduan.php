<section class="wrapper bg-gray">
  <div class="container py-3 py-md-5">
    <nav class="d-inline-block" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('Home/rth'); ?>">RTH</a></li>
        <li class="breadcrumb-item active" aria-current="page">Buat Pengaduan</li>
      </ol>
    </nav>
    <!-- /nav -->
  </div>
  <!-- /.container -->
</section>
<section class="wrapper bg-light">

  <div class="container py-8 py-md-10">
    <center><h2 class="">Buat Pengaduan <?php if(!$this->session->userdata('id')){ ?> Publik <?php } ?></h2></center>
    <center><h3 class="text-primary mb-5"><?= $rth->nama_rth; ?></h3></center>
    <div class="row">

      <div class="col-xl-10 mx-auto mt-5">
        <div class="row gy-10 gx-lg-8 gx-xl-12">
          <div class="col-lg-8">
            <form class="pengaduan-form" method="post" action="<?= base_url('Home/add_pengaduan'); ?>" enctype="multipart/form-data">
              <div class="messages">
                <?php if ($this->session->flashdata('pengaduan_message')): ?>
                  <?php echo $this->session->flashdata('pengaduan_message'); ?>
                  <?php $this->session->unset_userdata('pengaduan_message'); ?>
                <?php endif; ?>
              </div>

              <div class="row gx-4">
                <input type="hidden" class="form-control" name="id_rth" placeholder="Masukkan id" value="<?= $rth->id_rth; ?>">
                <?php if(!$this->session->userdata('id')){ ?>
                  <span class="fs-14">Anda melakukan pengaduan sebagai akun publik <span class="example-popover text-primary" type="button" data-bs-html="true" data-bs-trigger="hover" data-container="body" data-bs-toggle="popover" data-bs-placement="right" title="Pengaduan Publik" data-offset="-20px -20px" data-bs-content="Pada mode ini pengaduan anda akan tetap tersampaikan kepada petugas, tetapi anda tidak bisa menerima status tracking pengaduan anda">Pelajari selengkapnya</span></span>
                  <span class="fs-14">Sudah memiliki akun? <a href="<?= base_url('Auth'); ?>">Masuk</a></span>
                  <div class="col-md-6 mt-2">
                    <label class="form-label" for="exampleFormControlTextarea1">Nama *</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" required="">
                    </div>
                  </div>
                  <div class="col-md-6 mt-2">
                    <label class="form-label" for="exampleFormControlTextarea1">Email *</label>
                    <div class="input-group">
                      <input type="email" class="form-control" name="email" placeholder="Masukkan email" required="">
                    </div>
                  </div>
                  
                  
                <?php } ?>
                <div class="col-md-6 mt-2">
                  <label class="form-label" for="exampleFormControlTextarea1">Status Privasi *</label>
                  <div class="input-group">
                    <select class="form-select" name="visibilitas" required="">
                      <option value="" selected="" disabled="" >Pilih Privasi</option>
                      <?php foreach ($visibilitas as $v): ?>
                        <option value="<?= $v->id_visibilitas ?>"><?= $v->visibilitas ?> </option>
                      <?php endforeach ?>
                    </select> <span class="example-popover input-group-text" type="button" data-bs-html="true" data-bs-trigger="hover" data-container="body" data-bs-toggle="popover" data-bs-placement="right" title="Privasi Pengaduan" data-offset="-20px -20px" data-bs-content="1. Publik<br> Pengaduan ini akan ditampilkan pada Portal SIPASI RTH dan dapat dilihat oleh siapapun beserta informasi pembuat. <br><br> 2. Anonim<br> Pengaduan ini tetap ditampilkan pada Portal SIPASI RTH dan dapat dilihat oleh siapapun, namun informasi pembuat akan di sembunyikan. <br><br> 3. Private<br> Pengaduan ini akan disembunyikan dari Portal SIPASI RTH, namun tetap masuk ke dalam sistem."><i class="uil uil-question-circle" ></i></span>
                  </div>
                </div>
                <div class="col-12 form-group"> 
                  <label class="col-sm-12 col-form-label" for="inputPassword2">Jenis Pengaduan *</label>
                  <select class="form-select" name="jenis" required="" id="jenis_pengaduan">
                    <option value="" selected="" disabled="" >Pilih Jenis Pengaduan</option>
                    <?php foreach ($kategori as $k): ?>
                      <option value="<?= $k->id_jenispengaduan ?>" data-deskripsi="<?= $k->deskripsi; ?>"><?= $k->jenis_pengaduan ?> </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group mt-2 d-none" id="descriptionContainer">
                  <p id="description" class="alert alert-info fs-14"></p>
                </div>
                <div class="col-12 mt-2"> 
                  <label class="form-label" for="exampleFormControlTextarea1">Judul *</label>
                  <input type="text" class="form-control" name="subjek" placeholder="Masukkan judul pengaduan" required="">
                </div>
                <div class="col-12 mt-2"> 
                  <label class="form-label" for="exampleFormControlTextarea1">Deskripsi *</label>
                  <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi dapat memuat info berupa detail permasalahan, waktu kejadian, jenis pelanggaran, dsb." required=""></textarea>
                </div>
                <div class="col-12 mt-2"> 
                  <label class="form-label" for="exampleFormControlTextarea1">Detail Lokasi *</label>
                  <textarea class="form-control" name="lokasi" id="exampleFormControlTextarea1" rows="3" placeholder="Lokasi dapat memuat info berupa nama jalan, nama gedung, ciri khusus di sekitar, dll" required=""></textarea>
                </div>
                <div class="col-12 mt-2"> 
                  <label class="form-label" for="exampleFormControlTextarea1">Lampiran</label>
                  <input type="file" class="form-control" id="lampiran" name="lampiran" accept="image/*">
                  <span class="txt-sm txt-danger fs-14">* File harus berupa image dengan ukuran < 2MB</span>
                </div>
                <div class="col-12 mt-2" style="display: none" id="preview-container"> 
                  <label class="form-label" for="exampleFormControlTextarea1">Preview</label>
                  <div class="" itemscope="">
                    <!-- <figure class="col-xl-4 col-md-5 col-7" itemprop="associatedMedia" itemscope=""><a id="preview-image-link" href="" itemprop="contentUrl" data-size="1600x950"><img id="preview-image" class="img-thumbnail" src="" itemprop="thumbnail" alt="Image description"></a>

                    </figure> -->
                    <figure class="col-7 rounded"><a id="preview-image-link" href=""> <img  id="preview-image" class="" src="" itemprop="thumbnail" alt="Image description"></a>
                    </figure>
                  </div>
                </div>
                <!-- /column -->
                <div class="col-12 mt-3">
                  <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Kirim">
                  <!-- <p class="text-muted"><strong>*</strong> Kolom wajib di isi</p> -->
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
<script>
  $(document).ready(function() {
            // Ketika ada perubahan pada input file
            $("#lampiran").change(function() {
                previewImage(this);
            });
        });

        function previewImage(input) {
            var previewContainer = $('#preview-container');
            var previewImage = $('#preview-image');
            var previewImageLink = $('#preview-image-link');
            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Menampilkan preview image
                    previewImage.attr('src', e.target.result);
                    previewImageLink.attr('href', e.target.result);
                    previewContainer.show();
                };

                // Membaca file sebagai URL data
                reader.readAsDataURL(file);
            } else {
                // Menyembunyikan preview jika tidak ada file yang dipilih
                previewContainer.hide();
            }
        }

        $('#jenis_pengaduan').change(function() {
          var selectedOption = $(this).find('option:selected');
          var description = selectedOption.data('deskripsi');

          if (description) {
            $('#description').text(description);
            $('#descriptionContainer').removeClass('d-none');
          } else {
            $('#description').text('');
            $('#descriptionContainer').addClass('d-none');
          }
        });
</script>