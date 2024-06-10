<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>Tambah Ruang Terbuka Hijau</h4>
                </div>
                <?= $this->session->flashdata('rth_message');unset($_SESSION['rth_message']); ?>
                <div class="card-body custom-input">
                    <form class="row g-3" method="POST" action="<?= base_url('RTH/tambah_rth'); ?>" enctype="multipart/form-data">
                        <h5 class="mb-3">Data RTH</h5>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Nama RTH</label>
                            <input type="text" class="form-control" name="nama_rth" placeholder="Masukkan nama RTH" >
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Deskripsi RTH</label>
                            <textarea class="form-control" name="deskripsi_rth" id="exampleFormControlTextarea1" rows="3" placeholder="" required=""></textarea>
                        </div>
                        <div class="col-6"> 
                            <label class="col-sm-12 col-form-label" for="inputPassword2">Kecamatan</label>
                            <select class="form-select kecamatan" name="kecamatan" required="">
                                <option value="" selected="" disabled="" >Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div class="col-6"> 
                            <label class="col-sm-12 col-form-label" for="inputPassword2">Kelurahan</label>
                            <select class="form-select kelurahan" name="kelurahan" required="">
                                <option value="" selected="" disabled="" >Pilih Kelurahan</option>
                            </select>
                        </div>
                        
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Lokasi dapat memuat info berupa nama jalan, nama gedung, ciri khusus di sekitar, dll" required=""></textarea>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Lampiran</label>
                            <input type="file" class="form-control" id="lampiran" name="lampiran" accept="image/*">
                            <span class="txt-sm txt-danger">* File harus berupa image dengan ukuran < 2MB</span>
                        </div>
                        <div class="col-12" style="display: none" id="preview-container"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Preview</label>
                            <div class="gallery my-gallery card-body row" itemscope="">
                                <figure class="col-xl-4 col-md-5 col-7" itemprop="associatedMedia" itemscope=""><a id="preview-image-link" href="" itemprop="contentUrl" data-size="1600x950"><img id="preview-image" class="img-thumbnail" src="" itemprop="thumbnail" alt="Image description"></a>

                                </figure>
                            </div>
                        </div>


                        <!-- <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Preview</label>
                            <div class="gallery my-gallery card-body row" itemscope="">
                                <figure class="col-xl-4 col-md-5 col-7" itemprop="associatedMedia" itemscope=""><a id="preview-image-link" href="" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?= base_url(); ?>assets/img/upload/<?= $rth['foto_rth']; ?>" itemprop="thumbnail" alt="Image description"></a>

                                </figure>
                            </div>
                        </div> -->
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Status Reservasi</label>
                            <input style="height: 15px !important;margin-left: 15px" class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" role="switch" value='1' name='status_reservasi'>
                        </div>
                        <!-- <h5>Data Fasilitas</h5>

                        <div class="col-md-12 col-sm-12 mb-3">
                    <label class="form-label" for="uraian">Lampiran</label>
                    <div class="form-repeater">
                        <div class="row g-3">
                            <div class="col-sm-11">
                                <div data-repeater-list="lampiran_notulen" id="form-lampiran_notulen">
                                    <div data-repeater-item class="repeater-item" id="repeater-lampiran_notulen">
                                        <div class="row mt-1">
                                            <input type="hidden" class="form-control id_lampiran_notulen" id="basic-icon-default-fullname" placeholder="Id Perizinan" name="id_lampiran_notulen" value="">
                                            <div class="col-lg-10 col-xl-10 col-12 d-flex align-items-center  mb-0">
                                                <input id="basic-icon-default-fullname" type="file" accept=".jpg, .jpeg, .png, .gif, .pdf" class="form-control lampiran_notulen" name="lampiran_notulen" placeholder="" />
                                            </div>
                                            <div class="col-lg-1 col-xl-1 col-12 d-flex align-items-center mb-0">
                                                <div class="btn btn-label-danger" data-repeater-delete>
                                                    <i class="ti ti-x ti-xs me-1"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="mb-0 mt-1">
                                    <div class="btn btn-primary" data-repeater-create>
                                        <i class="ti ti-plus me-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                        <div class="col-12 text-end">
                            <a href="<?= base_url('RTH')?>" class="btn btn-danger">Kembali</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
        <!-- Root element of PhotoSwipe. Must have class pswp.-->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>assets-admin/js/jquery.min.js"></script>
 <script src="<?= base_url(); ?>assets-admin/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets-admin/js/popover-custom.js"></script>
<script src="<?= base_url(); ?>assets-admin/js/jquery.repeater-master/jquery.repeater.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
            // Ketika ada perubahan pada input file
            $("#lampiran").change(function() {
                previewImage(this);
            });

                getKec();
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


        function getKec(kd_kecamatan = null){
            $.ajax({
                url: '<?= base_url('RTH/get_kec'); ?>', // Ganti dengan URL controller Anda
                type: 'POST',
                data: { 
                },
                success: function(response) {
                    let d = JSON.parse(response);
                    let html = '<option value="">Pilih Kecamatan</option>';

                    for (let i = 0; i < d.length; i++) {
                      if (kd_kecamatan != 0 && kd_kecamatan != '') {
                          html +=
                          `<option value="${d[i].kd_kecamatan}" ${kd_kecamatan == d[i].kd_kecamatan?'selected':''}>${d[i].kecamatan}</option>`;
                      } else {
                          html +=
                          `<option value="${d[i].kd_kecamatan}" >${d[i].kecamatan}</option>`;
                      }

                  }
                  $(".kecamatan").prop("disabled", false);
                  $(".kecamatan").html(html);
                },
                error: function(xhr, status, error) {
                    console.error('Error mengirim data:', error);
                }
            });
        }

         $(document).on('change', '.kecamatan', function() {

            getKel($(this).val())

         });

         function getKel(kd_kecamatan,kd_kelurahan = null){
            $.ajax({
                url: '<?= base_url('RTH/get_kel'); ?>', // Ganti dengan URL controller Anda
                type: 'POST',
                data: { 
                    id : kd_kecamatan
                },
                success: function(response) {
                    let d = JSON.parse(response);
                    let html = '<option value="">Pilih Kelurahan</option>';

                    for (let i = 0; i < d.length; i++) {
                      if (kd_kelurahan != 0 && kd_kelurahan != '') {
                          html +=
                          `<option value="${d[i].kd_kelurahan}" ${kd_kelurahan == d[i].kd_kelurahan?'selected':''}>${d[i].kelurahan}</option>`;
                      } else {
                          html +=
                          `<option value="${d[i].kd_kelurahan}" >${d[i].kelurahan}</option>`;
                      }

                  }
                  $(".kelurahan").prop("disabled", false);
                  $(".kelurahan").html(html);
                },
                error: function(xhr, status, error) {
                    console.error('Error mengirim data:', error);
                }
            });
        }
        function resetFasilitasForm(){
            $('#fasilitas-form input[name="id_fasilitas"]').val('');
            $('#fasilitas-form input[name="nama"]').val('');
            $('#fasilitas-form input[name="luas"]').val('');
            $('#fasilitas-form input[name="kapasitas"]').val('');
            $('#fasilitas-form textarea[name="deskripsi"]').html('');


            $('#fasilitas-form input[name="foto"]').attr('required')
        }

        function editFasilitas(id){
            $.ajax({
                url: '<?= base_url('RTH/get_row_fasilitas'); ?>', // Ganti dengan URL controller Anda
                type: 'POST',
                data: { 
                    id : id
                },
                success: function(response) {
                    let d = JSON.parse(response);
                    $('#fasilitas-form input[name="id_fasilitas"]').val(d.id_fasilitas_reservasi);
                    $('#fasilitas-form input[name="nama"]').val(d.nama);
                    $('#fasilitas-form input[name="luas"]').val(d.luas);
                    $('#fasilitas-form input[name="kapasitas"]').val(d.kapasitas);
                    $('#fasilitas-form textarea[name="deskripsi"]').html(d.deskripsi);
                    $('#fasilitas-form input[name="foto"]').removeAttr('required');

                    $('#fasilitasModal').modal('show')
                },
                error: function(xhr, status, error) {
                    console.error('Error mengirim data:', error);
                }
            });
        }


</script>