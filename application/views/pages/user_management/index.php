<div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h4>Pengaduan</h4>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Application</li>
            <li class="breadcrumb-item active">Pengaduan</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <?= $this->session->flashdata('user_management_message') ?>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-xl-12 col-md-12 box-col-12 file-content">
                <div class="card">
                    <div class="card-header">
                        <div class="text-end">
                            <a href="<?= base_url('UserManagement/tambah'); ?>" class="btn btn-primary"> <i data-feather="plus-square"></i>User Baru</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-2">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th width="150">Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal dibuat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($data as $data): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td><?= $data['role'] ?></td>
                                <td><?php echo date('d/m/y H:i:s',strtotime($data['created_at'])) ?></td>
                                <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href="<?= base_url("UserManagement/detail_user/{$data['id_user']}")?>"><i class="icon-eye"></i></a></li>
                                    <li class="delete"><a href="#" onclick="deleteId('<?= $data['id_user'] ?>')"><i class="icon-trash"></i></a></li>
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
            if (result.isConfirmed) window.location = `<?= base_url('UserManagement/delete/')?>${id}`;
        });
    }
</script>
<input id="base_url" value="<?= base_url() ?>">