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
$data_pengunjung = $db->data_pengunjung();
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
      <?php include "form_pengunjung.php" ?>

      <div class="col-md-8">
        <div class="card">
          <div class="card-header" style="background: #947EC3;">
            <h4 class="text-center text-white">Data Pengunjung</h4>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Foto</th>
                    <th scope="col">NIK Pengunjung</th>
                    <th scope="col">Nama Pengunjung</th>
                    <th scope="col">Nomer Handphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data_pengunjung as $row) {
                  ?>
                    <tr>
                      <th><?php echo $no++; ?></th>
                      <td>
                        <img src="./doc/<?php echo "$row[foto]"; ?>" width="50px" class="img-fluid" alt="<?php echo "$row[foto]"; ?>">
                      </td>
                      <td><?php echo "$row[nik]"; ?></td>
                      <td><?php echo "$row[nama]"; ?></td>
                      <td><?php echo "$row[no_hp]"; ?></td>
                      <td><?php echo "$row[email]"; ?></td>
                      <td>
                        <?php echo "<a href='data_pengunjung.php?edit=update&&id=$row[nik]' class='btn btn-sm btn-success'>Edit</a>"; ?>
                        <?php echo "<a href='proses_pengunjung.php?aksi=delete&&id=$row[nik]' class='btn btn-sm btn-danger'  onclick='return confirm(Yakin akan menghapus data ini?)'>Delete</a>"; ?>
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