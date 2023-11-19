<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>Detail Pengaduan</h4>
                </div>
                <div class="card-body custom-input">
                    <form class="row g-3">
                        <div class="col-6"> 
                            <label class="form-label" for="first-name">Nama Mahasiswa</label>
                            <input class="form-control" id="first-name" type="text" placeholder="First name" aria-label="First name" disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="exampleFormControlInput1">NIM</label>
                            <input class="form-control" id="first-name" type="text" placeholder="First name" aria-label="First name" disabled>
                        </div>
                        <div class="col-12"> 
                            <label class="col-sm-12 col-form-label" for="inputPassword2">Kategori Pengaduan</label>
                            <input class="form-control" type="text" required disabled>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="validationDefault04">Bukti Foto</label>
                            <div class="gallery my-gallery card-body row" itemscope="">
                                <figure class="col-xl-4 col-md-5 col-7" itemprop="associatedMedia" itemscope=""><a href="<?= base_url(); ?>/assets-admin/images/big-lightgallry/01.jpg" itemprop="contentUrl" data-size="1600x950"><img class="img-thumbnail" src="<?= base_url(); ?>/assets-admin/images/lightgallry/01.jpg" itemprop="thumbnail" alt="Image description"></a>

                                </figure>
                            </div>
                        </div>
                        <div class="col-12"> 
                            <label class="col-sm-12 col-form-label" for="inputPassword2">Tanggal Pengaduan</label>
                            <input class="form-control" type="text" required disabled>
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-3"> 
                            <label class="form-label" for="validationDefault04">Status Pengaduan</label>
                            <select class="form-select" id="validationDefault04" required="">
                                <option selected="" disabled="" value="">Pilih Status</option>
                                <option>Baru </option>
                                <option>Penanganan</option>
                                <option>Selesai </option>
                            </select>
                        </div>
                        <div class="col-12">
                            <a href="<?= base_url('Administrator/pengaduan')?>" class="btn btn-danger">Kembali</a>
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