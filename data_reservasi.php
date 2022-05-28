<?php
class dashboard
{

    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;
include('database.php');
$db = new database;
$data_reservasi = $db->data_reservasi();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hotel Prima Cirebon</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-4">
            <?php include('form_reservasi.php'); ?>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: #069A8E;">
                        <h4 class="text-center text-white">Data Reservasi</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Reservasi</th>
                                        <th>Nama</th>
                                        <th>Tipe Kamar</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Jumlah Hari</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_reservasi as $row) {
                                    ?>
                                        <tr>
                                            <th><?php echo $no++; ?></th>
                                            <td><?php echo "$row[id_reservasi]"; ?></td>
                                            <td><?php echo "$row[nama]"; ?></td>
                                            <td><?php echo "$row[tipe]"; ?></td>
                                            <td><?php echo "$row[tgl_masuk]"; ?></td>
                                            <td><?php echo "$row[tgl_keluar]"; ?></td>
                                            <td><?php echo "$row[jumlah_hari]"; ?>Hari</td>
                                            <td width="150px">
                                                Rp. <?php echo "$row[jumlah_bayar]"; ?>
                                            </td>
                                            <td>
                                                <?php echo "<a href='data_reservasi.php?edit=update&&id=$row[id_reservasi]' class='btn btn-sm btn-success'>Edit</a>"; ?>
                                                <?php echo "<a href='proses_reservasi.php?aksi=delete&&id=$row[id_reservasi]' class='btn btn-sm btn-danger'>Delete</a>"; ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>