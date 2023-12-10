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
        <?= $this->session->flashdata('pengaduan_message') ?>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-xl-12 col-md-12 box-col-12 file-content">
                <div class="card">
                    <div class="card-header">
                        <div class="text-end">
                            <a href="<?= base_url('Pengaduan/tambah'); ?>" class="btn btn-primary"> <i data-feather="plus-square"></i>Pengaduan Baru</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-2">
                        <thead>
                            <tr>
                            <th>No</th>
                            <?php if($this->session->userdata('id_role') != 2){ ?>
                                <th>Nama / NIM</th>
                            <?php } ?>
                            <th width="150">Deskripsi</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($data as $data): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <?php if($this->session->userdata('id_role') != 2){ ?>
                                    <td><?= $data['nama'] ?><br><?= $data['nim'] ?></td>
                                <?php } ?>
                                <td>
                                    <?php 
                                    $text = $data['deskripsi'];
                                    $limit = 100;

                                    if (strlen($text) > $limit) {
                                        $shortenedText = substr($text, 0, $limit);

                                        $shortenedText .= " ...";

                                        echo $shortenedText;
                                    } else {
                                        echo $text; 
                                    }

                                    ?>
                                        
                                </td>
                                <td><?= $data['kategori'] ?></td>
                                <td><?= getStatusbadge($data['status']) ?></td>
                                <td><?php echo date('d/m/y H:i:s',strtotime($data['created_at'])) ?></td>
                                <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href="<?= base_url("Pengaduan/detail_pengaduan/{$data['id_pengaduan']}")?>"><i class="icon-eye"></i></a></li>
                                    <li class="delete"><a href="#" onclick="deleteId('<?= $data['id_pengaduan'] ?>')"><i class="icon-trash"></i></a></li>
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
            window.location = `<?= base_url('Pengaduan/delete/')?>${id}`;
        });
    }
</script>

<input id="base_url" value="<?= base_url() ?>">