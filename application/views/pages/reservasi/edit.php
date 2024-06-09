<?php $image_rth = (!empty($data->foto_rth)) ? base_url()."assets/img/upload/{$data->foto_rth}" : base_url().'assets-admin/images/lightgallry/01.jpg' ;?>
<?php $image_fasilitas = (!empty($data->foto_fasilitas)) ? base_url()."assets/img/upload/{$data->foto_fasilitas}" : base_url().'assets-admin/images/lightgallry/01.jpg' ;?>

<div class="page-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="card height-equal">
                 <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Reservasi</h4>
            </div>
                <?= $this->session->flashdata('reservasi_message');unset($_SESSION['reservasi_message']); ?>
                <div class="container mt-2">
                    <form method="post" action="<?= base_url('Reservasi/update_reservasi'); ?>">
                        <input type="hidden" name="id_reservasi" value="<?= $data->id_reservasi; ?>">
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
                                    <th>Tanggal Reservasi</th>
                                    <td><input id="form_lastname" type="date" name="tanggal" class="form-control" placeholder="Doe" required value="<?= $data->tanggal_reservasi ? $data->tanggal_reservasi : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <th>RTH</th>
                                    <td><?= $data->nama_rth; ?></td>
                                </tr>
                                <tr>
                                    <th>Fasilitas</th>
                                    <td><select class="form-select" name="fasilitas" required="" id="fasilitas">
                                        <option value="" selected="" disabled="" >Pilih Fasilitas</option>
                                        <?php foreach ($fasilitas as $fs): ?>
                                            <?php if($fs['id_fasilitas_reservasi'] == $data->id_fasilitas_reservasi) : ?>
                                              <option selected value="<?= $fs['id_fasilitas_reservasi']; ?>"><?= $fs['nama']; ?> </option>
                                              <?php else: ?>
                                                <option value="<?= $fs['id_fasilitas_reservasi']; ?>"><?= $fs['nama']; ?> </option>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <th>Foto RTH</th>
                                    <td><img style="width: 300px" src="<?= $image_rth; ?>" alt="RTH Image" class="img-thumbnail"><img style="width: 300px" src="<?= $image_fasilitas; ?>" alt="RTH Image" class="img-thumbnail"></td>
                                </tr>
                                <tr>
                                    <th>Kategori Reservasi</th>
                                    <td><select class="form-select" name="jenis" required="">
                                        <option value="" selected="" disabled="" >Pilih Jenis Kebutuhan</option>
                                        <?php foreach ($jenis as $j): ?>
                                            <?php if($j->id_jenisreservasi == $data->id_jenisreservasi) : ?>
                                              <option selected value="<?= $j->id_jenisreservasi ?>"><?= $j->jenis_reservasi ?> </option>
                                              <?php else: ?>
                                                <option value="<?= $j->id_jenisreservasi ?>"><?= $j->jenis_reservasi ?> </option>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </select>
                              </td>
                                </tr>
                                <tr>
                                    <th>Tujuan Penggunaan</th>
                                    <td><textarea id="form_message" name="deskripsi" class="form-control" placeholder="Your message" style="height: 150px" required><?= $data->deskripsi_reservasi ? $data->deskripsi_reservasi : ''; ?></textarea></td>
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

                        <button type="submit" class="btn btn-success">Simpan</button>
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