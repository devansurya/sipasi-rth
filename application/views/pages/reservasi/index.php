<div class="page-body">
    <div class="container-fluid">
    <div class="page-title">
        <div class="row">
        <div class="col-6">
            <h4>Reservasi</h4>
        </div>
        <div class="col-6">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">                                       
                <svg class="stroke-icon">
                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">Application</li>
            <li class="breadcrumb-item active">Reservasi</li>
            </ol>
        </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <?= $this->session->flashdata('reservasi_message');unset($_SESSION['reservasi_message']); ?>
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-xl-12 col-md-12 box-col-12 file-content">
                <div class="card">
                    <div class="card-header">
                        <!-- <div class="text-end">
                            <?php if($this->session->userdata('id_role') != 1){ ?>
                                <a href="<?= base_url('Pengaduan/tambah'); ?>" class="btn btn-primary"> <i data-feather="plus-square"></i>Pengaduan Baru</a>
                            <?php } ?>
                        </div> -->
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-2">
                        <thead>
                            <tr>
                            <th>No</th>
                            <?php if($this->session->userdata('id_role') != 3){ ?>
                                <th>Nama</th>
                            <?php } ?>
                            <th>RTH</th>
                            <th>Jenis Reservasi</th>
                            <th width="150">Deskripsi</th>
                            <th>Status</th>
                            <th>Tanggal Buat</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($data as $data): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <?php if($this->session->userdata('id_role') != 3){ ?>
                                    <td><?= $data['nama'] ?></td>
                                <?php } ?>
                                <td><?= $data['nama_rth'] ?></td>
                                <td><?= $data['jenis_reservasi'] ?></td>
                                <td>
                                    <?php 
                                    $text = $data['deskripsi_reservasi'];
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
                                <td><?= getStatusbadge($data['status']) ?></td>
                                <td><?php echo date('d/m/y H:i:s',strtotime($data['create_date'])) ?></td>
                                <td> 
                                    <ul class="action"> 
                                    <li class="edit"> <a href="<?= base_url("Reservasi/detail_reservasi/{$data['id_reservasi']}")?>"><i class="icon-eye"></i></a></li>
                                    <!-- <li class="delete"><a href="#" onclick="deleteId('<?= $data['id_reservasi'] ?>')"><i class="icon-trash"></i></a></li> -->
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
            if (result.isConfirmed) window.location = `<?= base_url('Pengaduan/delete/')?>${id}`;
        });
    }
</script>

<input id="base_url" value="<?= base_url() ?>">