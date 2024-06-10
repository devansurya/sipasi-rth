<div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h4>Data Ruang Terbuka Hijau</h4>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Application</li>
            <li class="breadcrumb-item active">RTH</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <?= $this->session->flashdata('rth_message');unset($_SESSION['rth_message']); ?>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-xl-12 col-md-12 box-col-12 file-content">
                <div class="card">
                    <div class="card-header">
                        <div class="text-end">
                            <a href="<?= base_url('RTH/tambah'); ?>" class="btn btn-primary"> <i data-feather="plus-square"></i>Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-2">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th width="150">Nama</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th width="150">Reservasi</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($data as $d): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['nama_rth']?></td>
                                    <td><?= $d['kec_rth']?></td>
                                    <td><?= $d['kel_rth']?></td>
                                    <td>
                                        <?php if($d['status_reservasi'] == 1){ ?>
                                            Aktif
                                        <?php }else{ ?>
                                            Tidak Aktif
                                        <?php }?>
                                    </td>
                                    <td>
                                        <ul class="action"> 
                                            <!-- <li class="edit"> <a href=""><i class="icon-eye"></i></a></li> -->
                                            <li class="edit"> <a href="<?= base_url('RTH/edit_rth/');?><?= $d['id_rth']; ?>"><i class="icon-pencil"></i></a></li>
                                            <?php if($this->session->userdata('id_role') == 1) : ?>
                                                <li class="text-primary"><a href="<?= base_url('RTH/penempatan_petugas/'); ?><?= $d['id_rth']; ?>" onclick=""><i class="icon-user"></i></a></li>
                                                <li class="delete"><a href="<?= base_url('RTH/delete_rth/');?><?= $d['id_rth']; ?>" onclick="return confirm('Anda yakin untuk menghapus rth ini?')"><i class="icon-trash"></i></a></li>
                                            <?php endif;?>

                                        </ul>
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
</script>

<input id="base_url" value="<?= base_url() ?>">