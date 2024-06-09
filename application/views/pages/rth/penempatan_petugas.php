<div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h4>Penempatan Petugas</h4>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Application</li>
            <li class="breadcrumb-item">RTH</li>
            <li class="breadcrumb-item active">Penempatan Petugas</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div id="message" class="alert alert-success dark alert-dismissible fade show" role="alert" style="display: none">
            
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-xl-12 col-md-12 box-col-12 file-content">
                <div class="card">
                    <div class="card-header">
                        <div class="">
                            <h5>Petugas RTH <?= $rth['nama_rth']; ?></h5>
                            <!-- <a href="<?= base_url('RTH/tambah'); ?>" class="btn btn-primary"> <i data-feather="plus-square"></i>Tambah</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-2">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th width="150">Nama</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($petugas as $d): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d->nama; ?></td>
                                    <td><?= $d->no_telp; ?></td>
                                    <td><?= $d->alamat; ?></td>
                                    <td>

                                        <div class="form-check form-switch">
                                            <input style="height: 15px !important" class="form-check-input pilih-penempatan" id="flexSwitchCheckChecked" type="checkbox" role="switch" <?php if(in_array($d->id_user, $penempatan)){ ?> checked <?php } ?> data-id="<?= $d->id_user; ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            
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

<script src="<?= base_url(); ?>assets-admin/js/jquery.min.js"></script>
 <script src="<?= base_url(); ?>assets-admin/js/bootstrap/bootstrap.bundle.min.js"></script>

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
            if (result.isConfirmed) window.location = `<?= base_url('Pengaduan/delete/')?>${id}`;
        });
    }

    $(document).on('change', '.pilih-penempatan', function() {
            // Mendapatkan ID user dari atribut data-id
            var id_user = $(this).data('id');
            // Mendapatkan status checkbox (checked atau tidak)
            var status = $(this).is(':checked') ? 1 : 0;

            // Melakukan AJAX POST request
            $.ajax({
                url: '<?= base_url('RTH/pilih_penempatan'); ?>', // Ganti dengan URL controller Anda
                type: 'POST',
                data: { 
                    id_user: id_user, 
                    status: status,
                    id_rth: '<?= $rth['id_rth']; ?>'
                },
                success: function(response) {
                    var res = JSON.parse(response);
                    $('#message').html(res.message);
                    $('#message').show();
                },
                error: function(xhr, status, error) {
                    console.error('Error mengirim data:', error);
                }
            });
        });
</script>

<input id="base_url" value="<?= base_url() ?>">