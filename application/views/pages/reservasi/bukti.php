<div class="page-body">
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h5>E-Ticket Reservasi Ruang Terbuka Hijau</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Detail Reservasi</h5>
                            <table class="table table-borderless mt-4">
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
                                    <th>Kategori Reservasi</th>
                                    <td><?= $data->jenis_reservasi; ?></td>
                                </tr>
                                <tr>
                                    <th>Tujuan Penggunaan</th>
                                    <td><?= $data->deskripsi_reservasi; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="<?= base_url();?>assets/img/qrcode/qrcode<?= $data->id_reservasi; ?>.png" style="width: 50%" alt="QR Code" class="img-fluid mb-4">
                            <p>Tunjukan QR Code kepada petugas RTH</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <p>Terima kasih telah menggunakan layanan reservasi kami. Selamat menikmati acara Anda di Ruang Terbuka Hijau!</p>
                </div>
            </div>
            <div class="text-end mb-4">
                <a target="_blank" href="<?= base_url('Reservasi/cetak_bukti_reservasi/'); ?><?= $data->id_reservasi; ?>" class="btn btn-primary">Cetak Bukti</a>
            </div>
        </div>
    </div>
</div>