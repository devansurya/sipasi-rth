<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>User Baru</h4>
                </div>
                <div class="card-body custom-input">
                    <form class="row g-3" method="POST" action="<?= base_url('UserManagement/add'); ?>" enctype="multipart/form-data">
                        <div class="col-6"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="col-6"> 
                            <label class="form-label" for="exampleFormControlTextarea1">NIM</label>
                            <input type="number" class="form-control" name="nim" placeholder="Masukkan NIM" required>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">No Telepon</label>
                            <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telepon" required>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="col-12"> 
                            <label class="col-sm-12 col-form-label" for="inputPassword2">Role</label>
                            <select class="form-select" name="role" required="">
                                <option value="" selected="" disabled="" >Pilih role</option>
                                <?php foreach ($role as $k): ?>
                                <option value="<?= $k->id_role ?>"><?= $k->role ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12 text-end">
                            <a href="<?= base_url('pengaduan')?>" class="btn btn-danger">Kembali</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
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