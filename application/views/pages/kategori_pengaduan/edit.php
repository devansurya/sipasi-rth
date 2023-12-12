<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>Edit Kategori</h4>
                </div>
                <div class="card-body custom-input">
                    <form class="row g-3" method="POST" action="<?= base_url('KategoriPengaduan/update'); ?>" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $kategori['id_kategori']?>" name="id_kategori">
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Nama Kategori</label>
                            <input type="text" class="form-control" name="kategori" value="<?= $kategori['kategori']?>">
                        </div>
                        <div class="col-12 text-end">
                            <a href="<?= base_url('KategoriPengaduan')?>" class="btn btn-danger">Kembali</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>