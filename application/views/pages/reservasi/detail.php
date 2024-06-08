<?php $image_rth = (!empty($data->foto_rth)) ? base_url()."assets/img/upload/{$data->foto_rth}" : base_url().'assets-admin/images/lightgallry/01.jpg' ;?>
<?php $image_fasilitas = (!empty($data->foto_fasilitas)) ? base_url()."assets/img/upload/{$data->foto_fasilitas}" : base_url().'assets-admin/images/lightgallry/01.jpg' ;?>

<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                 <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Detail Reservasi</h4>
                <?= getStatusbadge($data->status) ?>
            </div>
                <?= $this->session->flashdata('reservasi_message');unset($_SESSION['reservasi_message']); ?>
                <div class="container mt-2">

                    <!-- Informasi Pengguna -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Informasi Pemesan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-detail">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><?= $data->nama; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $data->email; ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td><?= $data->no_telp; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Detail Reservasi -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Detail Reservasi</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-detail">
                                <tr>
                                    <th>Tanggal Reservasi:</th>
                                    <td><?= date('d/m/Y', strtotime($data->tanggal_reservasi)); ?></td>
                                </tr>
                                <tr>
                                    <th>RTH</th>
                                    <td><?= $data->nama_rth; ?></td>
                                </tr>
                                <tr>
                                    <th>Fasilitas</th>
                                    <td><?= $data->nama_fasilitas; ?></td>
                                </tr>
                                <tr>
                                    <th>Foto RTH</th>
                                    <td><img style="width: 300px" src="<?= $image_rth; ?>" alt="RTH Image" class="img-thumbnail"><img style="width: 300px" src="<?= $image_fasilitas; ?>" alt="RTH Image" class="img-thumbnail"></td>
                                </tr>
                                <tr>
                                    <th>Kategori Reservasi</th>
                                    <td><?= $data->jenis_reservasi; ?></td>
                                </tr>
                                <tr>
                                    <th>Tujuan Penggunaan</th>
                                    <td><?= $data->deskripsi_reservasi; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Status Reservasi</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-detail">
                                <tr>
                                    <th>Status</th>
                                    <td><?= $data->status; ?></td>
                                </tr>
                                <tr>
                                    <th>Detail Status</th>
                                    <td><?= $data->detail_status; ?></td>
                                </tr>
                                <?php if($data->status == 'Ditolak'): ?>
                                    <tr>
                                        <th>Catatan Petugas</th>
                                        <td><?= $data->catatan_petugas; ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="text-end mb-4">
                        <?php if($this->session->userdata('role') == 'Masyarakat') : ?>
                            <?php if($data->status == 'Proses'): ?>
                                <a href="edit_reservasi.html" class="btn btn-primary">Edit</a>
                                <a href="batal_reservasi.html" class="btn btn-danger">Batalkan</a>
                            <?php else: ?>
                                <a href="<?= base_url('Reservasi');?>" class="btn btn-primary">Kembali</a>
                                <?php if($data->status == 'Disetujui'): ?>
                                    <a href="<?= base_url('Reservasi/bukti_reservasi/');?><?= $data->id_reservasi; ?>" class="btn btn-success">Bukti Penerimaan</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                        <?php else: ?>
                            <?php if($data->status != 'Ditolak'): ?>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#rejectModal">Tolak</button>
                            <?php endif; ?>
                            <?php if($data->status != 'Disetujui'): ?>
                                <a href="<?= base_url('Reservasi/setujui_reservasi/');?><?= $data->id_reservasi; ?>" class="btn btn-success">Konfirmasi</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <!-- <a href="konfirmasi_reservasi.html" class="btn btn-success">Konfirmasi Reservasi</a> -->
                        
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Catatan Penolakan Reservasi</h5>
                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url('Reservasi/tolak_reservasi'); ?>">
                <div class="modal-body">
                    <input type="hidden" name="id_reservasi" value="<?= $data->id_reservasi; ?>">
                    <div class="form-group">
                        <label for="rejectNote">Catatan:</label>
                        <textarea class="form-control" id="rejectNote" name="catatan" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>


        <!-- Root element of PhotoSwipe. Must have class pswp.-->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    function modalReject(){
        $('#rejectModal').modal('show')
    }
</script>