<?php $image = (!empty($data->foto)) ? base_url()."assets/img/upload/{$data->foto}" : base_url().'assets-admin/images/lightgallry/01.jpg' ;?>

<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>Edit Pengaduan</h4>
                </div>
                <div class="card-body custom-input">
                    <form class="row g-3" method="post" action="<?= base_url('Pengaduan/edit'); ?>/<?= $data->id_pengaduan ?>" enctype="multipart/form-data">
                        <div class="col-6"> 
                            <label class="form-label" for="first-name">Nama Mahasiswa</label>
                            <input class="form-control" id="first-name" type="text" placeholder="First name" aria-label="First name" value="<?= $data->username ?>" disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="exampleFormControlInput1">NIM</label>
                            <input class="form-control" id="first-name" type="text" placeholder="First name" aria-label="First name" value="<?= $data->nim ?>" disabled>
                        </div>
                        <div class="col-4"> 
                            <label class="col-sm-12 col-form-label" >Kategori Pengaduan</label>
                            <select class="form-select" name="kategori" required="">
                                <option >Pilih Kategori</option>
                                <?php foreach ($kategori as $k): ?>
                                <option  <?= ($k->id_kategori == $data->id_kategori)? 'selected' : ''; ?> value="<?= $k->id_kategori ?>"><?= $k->kategori ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-4"> 
                            <label class="col-form-label" for="inputPassword2">Privasi Pengaduan</label>
                            <div class="input-group">
                                <select class="form-select" name="visibilitas" required="">
                                    <option value="" selected="" disabled="" >Pilih Privasi</option>
                                    <?php foreach ($visibilitas as $v): ?>
                                        <option <?= ($v->id_visibilitas == $data->visibilitas ) ? 'selected' : ''; ?> value="<?= $v->id_visibilitas ?>"><?= $v->visibilitas ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4"> 
                            <label class="col-sm-12 col-form-label" for="inputPassword2">Tanggal Pengaduan</label>
                            <input class="form-control" type="text" required disabled value="<?= $data->created_at ?>">
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="validationDefault04">Bukti Foto</label>
                            <div class="gallery my-gallery card-body row" itemscope="">
                                <figure class="col-xl-4 col-md-5 col-7" itemprop="associatedMedia" itemscope="">
                                    <a href="<?=$image ?>" itemprop="contentUrl" data-size="1600x950">
                                        <img class="img-thumbnail" src="<?=$image ?>" itemprop="thumbnail" alt="Image description"></a>
                                        <input class="form-control" type="hidden" name="old_pict" value="<?= $data->foto ?>">
                                </figure>
                            </div>
                        </div>
                        <div class="col-12" style="display: none" id="preview-container"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Preview</label>
                            <div class="gallery my-gallery card-body row" itemscope="">
                                <figure class="col-xl-4 col-md-5 col-7" itemprop="associatedMedia" itemscope=""><a id="preview-image-link" href="" itemprop="contentUrl" data-size="1600x950"><img id="preview-image" class="img-thumbnail" src="" itemprop="thumbnail" alt="Image description"></a>

                                </figure>
                            </div>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Ubah Bukti Foto</label>
                            <input type="file" class="form-control" name="lampiran" accept="image/*">
                            <span class="txt-sm txt-danger">* File harus berupa image dengan ukuran < 2MB</span>
                        </div>
                        <div class="col-12"> 
                            <label class="col-sm-12 col-form-label" for="inputPassword2">Subjek</label>
                            <input class="form-control" type="text" name="subjek" required value="<?= $data->subjek ?>">
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control"  name="deskripsi" rows="3" ><?= $data->deskripsi ?></textarea>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Lokasi</label>
                            <textarea class="form-control" name="lokasi" id="exampleFormControlTextarea1" rows="3" ><?= $data->lokasi ?></textarea>
                        </div>
                        <div class="col-12">
                            <a href="<?= base_url('pengaduan')?>" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
</script>