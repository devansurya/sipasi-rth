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
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-2">
                        <thead>
                            <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Status Pengaduan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $data): ?>
                            <tr>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= getStatusbadge($data['status']) ?></td>
                                <td><?= $data['kategori'] ?></td>
                                <td><?php echo date('d/m/y H:i:s',strtotime($data['created_at'])) ?></td>
                                <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href="<?= base_url("Pengaduan/detail_pengaduan/{$data['id_pengaduan']}")?>"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach ?>
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

<input id="base_url" value="<?= base_url() ?>">