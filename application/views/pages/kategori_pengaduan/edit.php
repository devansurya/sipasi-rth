<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                <div class="card-header">
                    <h4>Edit Jenis Pengaduan</h4>
                </div>
                <div class="card-body custom-input">
                    <form class="row g-3" method="POST" action="<?= base_url('KategoriPengaduan/update'); ?>" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $kategori['id_jenispengaduan']?>" name="id_jenispengaduan">
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Nama Kategori</label>
                            <input type="text" class="form-control" name="kategori" value="<?= $kategori['jenis_pengaduan']?>">
                        </div>
                        <div class="col-12"> 
                            <label class="form-label" for="exampleFormControlTextarea1">Deskripsi Kategori</label>
                            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?= $kategori['deskripsi']?></textarea>
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