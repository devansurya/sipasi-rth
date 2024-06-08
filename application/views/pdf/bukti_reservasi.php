<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Bukti Reservasi</title>
    <style>
        body {
            /*font-family: Arial, sans-serif;*/
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            /*border: 1px solid #000;
            border-radius: 10px;*/
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
        }
        .content {
            margin-bottom: 20px;
        }
        .content h3 {
            margin: 0 0 10px 0;
            font-size: 20px;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details th, .details td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }
        .details th {
            background-color: #f2f2f2;
        }
        .qr-code {
            text-align: center;
        }
        .qr-code img {
            max-width: 150px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            margin: 5px 0;
        }
        .paragraph {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Surat Keterangan Bukti Reservasi</h2>
            <p>Ruang Terbuka Hijau Kota Depok</p>
            <p><?= $data->nama_rth; ?></p>
        </div>
        <div class="paragraph">
            <p>Dengan adanya surat ini, saya, <?= $data->nama; ?>, telah melakukan reservasi Ruang Terbuka Hijau Kota Depok dengan menyetujui syarat dan ketentuan yang berlaku. Berikut adalah detail dari reservasi yang telah saya lakukan:</p>
        </div>
        <div class="content">
            <h3>Detail Reservasi</h3>
            <table class="details">
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
        <div class="qr-code">
            <img src="<?= base_url();?>assets/img/qrcode/qrcode<?= $data->id_reservasi; ?>.png" alt="QR Code">
            <p>Tunjukan QR Code kepada petugas RTH</p>
        </div>
        <div class="footer">
            <p>Copyright 2024 © SIPASI RTH</p>
        </div>
    </div>
</body>
</html>
