<?php
function update_data()
{

  $db = new database();
  $nik = $_GET['id'];
  $data_pengunjung = mysqli_fetch_array($db->tampil_update_pengunjung($nik));
?>

  <div class="col-md-4">
    <div class="card">
      <div class="card-header" style="background: #947EC3;">
        <h4 class="text-center text-white">Update Pengunjung</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo "proses_pengunjung.php?aksi=update"; ?>" enctype="multipart/form-data">

          <div class="form-group mb-3">
            <label class="form-label">NIK Pengunjung</label>
            <input type="text" name="nik" class="form-control" value="<?php echo $data_pengunjung['nik'] ?>">
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Nama Pengunjung</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data_pengunjung['nama'] ?>">
          </div>

          <div class="form-group mb-3">
            <label class="form-label">No Handphone</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo $data_pengunjung['no_hp'] ?>">
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Email Pengunjung</label>
            <input type="email" name="email" class="form-control" value="<?php echo $data_pengunjung['email'] ?>">
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Foto Pengunjung</label>
            <input type="file" name="foto" class="form-control" required>
            <img src="./doc/<?php echo "$data_pengunjung[foto]"; ?>" width="50px" class="img-fluid" alt="<?php echo "$data_pengunjung[foto]"; ?>">

          </div>

          <div class="form-group mb-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="Update Data">
            <a herf="data_pengunjung.php" class="btn btn-success ">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php }
function tambah_data()
{
?>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header" style="background: #947EC3;">
        <h4 class="text-center text-white">Form Pengunjung</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo "proses_pengunjung.php?aksi=tambah"; ?>" enctype="multipart/form-data">

          <div class="form-group mb-3">
            <label class="form-label">NIK Pengunjung</label>
            <input type="number" name="nik" class="form-control" placeholder="Masukkan NIK Pengunjung" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Nama Pengunjung</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pengunjung" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">No Handphone</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No HP Pengunjung" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Email Pengunjung</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan Email Pengunjung" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" required>
          </div>

          <div class="form-group mb-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
            <input type="reset" class="btn btn-secondary" value="Reset">
          </div>

        </form>
      </div>
    </div>
  </div>
<?php } ?>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$edit = $_GET['edit'];
if ($edit == "update") {
  update_data();
} else {
  tambah_data();
}
?>