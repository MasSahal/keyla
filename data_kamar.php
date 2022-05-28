<?php
class dashboard
{
    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include 'database.php';
$db = new database();
$data_kamar = $db->data_kamar();
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>HOTEL PRIMA CIREBON</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-4">
            <?php include('form_kamar.php'); ?>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: #7F8487;">
                        <h4 class="text-center text-white">Data Kamar</h4>

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Tipe Kamar</th>
                                    <th scope="col">Jenis Bed</th>
                                    <th scope="col">Jumlah Kapasitas</th>
                                    <th scope="col">Harga Permalam</th>
                                    <th width="230px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_kamar as $row) {
                                ?>
                                    <tr>
                                        <th><?php echo $no++; ?></th>
                                        <td>
                                            <img src="./doc/<?php echo "$row[foto]"; ?>" width="100px" class="img-fluid" alt="<?php echo "$row[foto]"; ?>">
                                        </td>
                                        <td><?php echo "$row[tipe]"; ?></td>
                                        <td><?php echo "$row[bed]"; ?></td>
                                        <td><?php echo "$row[kapasitas]"; ?></td>
                                        <td>Rp. <?php echo "$row[harga]"; ?></td>
                                        <td>
                                            <?php echo "<a href='data_reservasi.php?kamar=$row[kd_kamar]' class='btn btn-sm btn-success'>Pesan</a>"; ?>
                                            <a name="" id="" class="btn btn-sm btn-warning" href="data_kamar.php?edit=update&&id=<?= $row['kd_kamar']; ?>" role="button">Edit</a>
                                            <a name="" id="" class="btn btn-sm btn-danger" href="proses_kamar.php?aksi=delete&&id=<?= $row['kd_kamar']; ?>" role="button">Delete</a>
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
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>