<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>Edit Ruang Terbuka Hijau</h4>
                </div>
                <?= $this->session->flashdata('rth_message');unset($_SESSION['rth_message']); ?>
                <div class="card-body custom-input">
                    <form class="row g-3" method="POST" action="<?= base_url('RTH/update_rth'); ?>" enctype="multipart/form-data">
                        <h5 class="mb-3">Data RTH</h5>
                        <input type="hidden" name="id_rth" value="<?= $rth['id_rth']; ?>">
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Nama RTH</label>
                            <input type="text" class="form-control" name="nama_rth" placeholder="Masukkan nama RTH" value="<?= $rth['nama_rth']; ?>">
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Deskripsi RTH</label>
                            <textarea class="form-control" name="deskripsi_rth" id="exampleFormControlTextarea1" rows="3" placeholder="" required=""><?= $rth['deskripsi_rth']; ?></textarea>
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
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Lokasi dapat memuat info berupa nama jalan, nama gedung, ciri khusus di sekitar, dll" required=""><?= $rth['alamat']; ?></textarea>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Lampiran</label>
                            <input type="file" class="form-control" id="lampiran" name="lampiran" accept="image/*">
                            <span class="txt-sm txt-danger">* File harus berupa image dengan ukuran < 2MB</span>
                        </div>
                        <div class="col-12" id="preview-container"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Preview</label>
                            <div class="gallery my-gallery card-body row" itemscope="">
                                <figure class="col-xl-4 col-md-5 col-7" itemprop="associatedMedia" itemscope=""><a id="preview-image-link" href="" itemprop="contentUrl" data-size="1600x950"><img id="preview-image" class="img-thumbnail" src="<?= base_url(); ?>assets/img/upload/<?= $rth['foto_rth']; ?>" itemprop="thumbnail" alt="Image description"></a>

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
                            <input style="height: 15px !important;margin-left: 15px" class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" role="switch" <?php if($rth['status_reservasi'] == '1'){ ?> checked <?php } ?> value='1' name='status_reservasi'>
                        </div>
                        <h5>Data Fasilitas</h5>
                        <div class="text-end">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#fasilitasModal" onclick="resetFasilitasForm()">Tambah</button>
                        </div>
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="150">Nama Fasilitas</th>
                                        <th>Luas</th>
                                        <th>Kapasitas</th>
                                        <th width="150">Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($fasilitas as $f): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $f['nama']?></td>
                                            <td><?= $f['luas']?></td>
                                            <td><?= $f['kapasitas']?></td>
                                            <td><?= $f['deskripsi']; ?></td>
                                            <td>
                                                <figure class="col-8" itemprop="associatedMedia" itemscope=""><img class="img-thumbnail" src="<?= base_url(); ?>assets/img/upload/<?= $f['foto']; ?>" itemprop="thumbnail" alt="Image description">

                                                </figure>
                                            </td>
                                            <td>
                                                <ul class="action"> 
                                                    <li class="edit"> <a href="#" onclick="editFasilitas('<?= $f['id_fasilitas_reservasi']; ?>')"><i class="icon-pencil"></i></a></li>
                                                    <li class="delete"><a onclick="return confirm('Apakah anda yakin untuk menghapus fasilitas ini?')" href="<?= base_url('RTH/delete_fasilitas'); ?>/<?= $f['id_fasilitas_reservasi']; ?>/<?= $rth['id_rth']; ?>"><i class="icon-trash"></i></a></li>

                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 text-end">
                            <a href="<?= base_url('RTH')?>" class="btn btn-danger">Kembali</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="fasilitasModal" tabindex="-1" role="dialog" aria-labelledby="fasilitasModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Fasilitas</h5>
                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="fasilitas-form" method="post" action="<?= base_url('RTH/add_fasilitas'); ?>" enctype='multipart/form-data'>
                <div class="modal-body">
                    <input type="hidden" name="id_rth" value="<?= $rth['id_rth']; ?>">
                    <input type="hidden" name="id_fasilitas" value="">
                    <div class="container row">
                        <div class="form-group col-12">
                            <label for="rejectNote">Nama</label>
                            <input type="text" class="form-control" id="rejectNote" name="nama" required>
                        </div>
                        <div class="form-group col-6 mt-3">
                            <label for="rejectNote">Luas (m²) </label>
                            <input type="number" class="form-control" id="rejectNote" name="luas" required>
                        </div>
                        <div class="form-group col-6 mt-3">
                            <label for="rejectNote">Kapasitas (orang) </label>
                            <input type="number" class="form-control" id="rejectNote" name="kapasitas" required>
                        </div>
                        <div class="form-group col-12 mt-3">
                            <label for="rejectNote">Deskripsi </label>
                            <textarea class="form-control" id="rejectNote" name="deskripsi" required></textarea>
                        </div>
                        <div class="form-group col-12 mt-3">
                            <label for="rejectNote">Foto </label>
                            <input type="file" class="form-control" id="rejectNote" name="foto" accept="image/*" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
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
<script type="text/javascript">
    $(document).ready(function() {
            // Ketika ada perubahan pada input file
            $("#lampiran").change(function() {
                previewImage(this);
            });

            <?php if($rth['kecamatan']){ ?>

                getKec("<?= $rth['kecamatan']; ?>");
                <?php if($rth['kelurahan']){ ?>
                    getKel("<?= $rth['kecamatan']; ?>","<?= $rth['kelurahan']; ?>");
                <?php }else{ ?>
                    getKel("<?= $rth['kecamatan']; ?>",null);
                <?php } ?>

            <?php }else{ ?>

                getKec();
            <?php } ?>
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