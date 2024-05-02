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
        <?= $this->session->flashdata('pengaduan_message');unset($_SESSION['pengaduan_message']); ?>
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
                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th width="150">Alamat</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Studio Alam TVRI</td>
                                <td>Sukmajaya</td>
                                <td>Sukmajaya</td>
                                <td>Jalan Raden Saleh No.90, Kampung Cikumpa, Sukmajaya, Sukmajaya, Depok</td>
                                <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href=""><i class="icon-eye"></i></a></li>
                                        <li class="edit"> <a href=""><i class="icon-pencil"></i></a></li>
                                    <li class="delete"><a href="#" onclick=""><i class="icon-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tepian Situ Jatijajar</td>
                                <td>Jatijajar</td>
                                <td>Tapos</td>
                                <td>Jalan Raya Bogor Km. 37, Jatijajar, Tapos, Depok</td>
                                 <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href=""><i class="icon-eye"></i></a></li>
                                        <li class="edit"> <a href=""><i class="icon-pencil"></i></a></li>
                                    <li class="delete"><a href="#" onclick=""><i class="icon-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Taman Tole Iskandar</td>
                                <td>Ratujaya</td>
                                <td>Cipayung</td>
                                <td>Jalan Rawa Geni Swadaya, Ratujaya, Cipayung, Depok</td>
                                 <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href=""><i class="icon-eye"></i></a></li>
                                        <li class="edit"> <a href=""><i class="icon-pencil"></i></a></li>
                                    <li class="delete"><a href="#" onclick=""><i class="icon-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            
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