<!DOCTYPE html>
<html>
<head>
    <style>
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>
<body>

<center><h3>Laporan Pengaduan</h3></center>
<div class="table-responsive">
    <table id="basic-2">
        <thead>
            <tr>
                <th>No</th>
                <?php if($this->session->userdata('id_role') != 3){ ?>
                    <th>Nama Pengadu</th>
                <?php } ?>
                <th>RTH</th>
                <th>Jenis Pengaduan</th>
                <th width="150">Deskripsi</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($data as $data): ?>
            <tr>
                <td><?= $no; ?></td>
                <?php if($this->session->userdata('id_role') != 3){ ?>
                    <?php if($data['nama_pengadu'] == NULL) { ?>
                        <td><?= $data['nama'] ?></td>
                    <?php }else{ ?>
                        <td><?= $data['nama_pengadu'] ?></td>
                    <?php } ?>
                <?php } ?>
                <td><?= $data['nama_rth'] ?></td>
                <td><?= $data['jenis_pengaduan'] ?></td>
                <td>
                    <?php 
                    $text = $data['deskripsi_pengaduan'];
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
            </tr>
            <?php $no++; endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>
