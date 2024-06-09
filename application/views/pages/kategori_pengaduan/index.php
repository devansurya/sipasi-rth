<div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h4>Kategori Pengaduan</h4>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Application</li>
            <li class="breadcrumb-item active">Kategori Pengaduan</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <?= $this->session->flashdata('kategori_pengaduan_message') ?>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-xl-12 col-md-12 box-col-12 file-content">
                <div class="card">
                    <div class="card-header">
                        <div class="text-end">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfullscreen-xl"><i data-feather="plus-square"></i>Jenis Baru</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($jenis as $data): ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data->jenis_pengaduan ?></td>
                                    <td> 
                                        <ul class="action"> 
                                        <li class="edit"> <a href="<?= base_url("KategoriPengaduan/edit_kategori/{$data->id_jenispengaduan}")?>"><i class="icon-pencil"></i></a></li>
                                        <li class="delete"><a href="#" onclick="deleteId('<?= $data->id_jenispengaduan ?>')"><i class="icon-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php $no++; endforeach ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<div class="modal fade" id="exampleModalfullscreen-xl" tabindex="-1" aria-labelledby="xlModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-xl-down">
        <div class="modal-content">
            <form action="<?= base_url('KategoriPengaduan/tambah')?>" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="xlModalLabel">Tambah Jenis</h1>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <label class="form-label"><h6>Nama Jenis Pengaduan :</h6></label>
                    <input type="text" name="jenis" class="form-control" required>
                </div>
                <div class="modal-body dark-modal">
                    <label class="form-label"><h6>Deskripsi :</h6></label>
                    <textarea name="deskripsi" class="form-control" cols="30" rows="10" required></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes        </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteId(id) {
        if (!id) return false;

        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            console.log(result);
            if (result.isConfirmed) window.location = `<?= base_url('KategoriPengaduan/delete/')?>${id}`;
        });
    }
</script>

<input id="base_url" value="<?= base_url() ?>">