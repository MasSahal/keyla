<?php
function update_data()
{

  $db = new database();
  $kd_kamar = $_GET['id'];
  $data_kamar = $db->tampil_update_kamar($kd_kamar);
?>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header" style="background: #7F8487;">
        <h4 class="text-center text-white">Update Kamar</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo "proses_kamar.php?aksi=update"; ?>" enctype="multipart/form-data">

          <div class="form-group mb-3">
            <label class="form-label">Kode Kamar</label>
            <input type="text" name="kd_kamar" class="form-control" value="<?php echo $data_kamar['kd_kamar'] ?>" readonly>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Tipe Kamar</label>
            <input type="text" name="tipe" class="form-control" value="<?php echo $data_kamar['tipe'] ?>">
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Jumlah Bed</label>
            <input type="text" name="bed" class="form-control" value="<?php echo $data_kamar['bed'] ?>">
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Kapasitas Kamar</label>
            <input type="text" name="kapasitas" class="form-control" value="<?php echo $data_kamar['kapasitas'] ?>">
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $data_kamar['harga'] ?>">
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control mb-2" required>
          </div>

          <div class="form-group mb-3">
            <small>Foto Sebelumnya</small><br>
            <img src="./doc/<?php echo "$data_kamar[foto]"; ?>" width="150px" class="img-fluid" alt="<?php echo "$data_kamar[foto]"; ?>">
          </div>

          <div class="form-group mb-3">
            <input type="submit" name="simpan" class="btn btn-primary" value="Update Data">
            <a herf="data_kamar.php" class="btn btn-success ">Cancel</a>
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
      <div class="card-header" style="background: #7F8487;">
        <h4 class="text-center text-white">Form Kamar</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo "proses_kamar.php?aksi=tambah"; ?>" enctype="multipart/form-data">

          <div class="form-group mb-3">
            <label class="form-label">Kd Kamar</label>
            <input type="text" name="tipe" class="form-control" value="<?php echo "KM" . rand(1000, 9999); ?>" readonly>
          </div>
          <div class="form-group mb-3">
            <label class="form-label">Tipe Kamar</label>
            <input type="text" name="tipe" class="form-control" placeholder="Masukkan Tipe Kamar" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Jumlah Bed</label>
            <input type="text" name="bed" class="form-control" placeholder="Masukkan Jumlah Bed" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="text" name="kapasitas" class="form-control" placeholder="Masukkan Kapasitas Kamar" required>
          </div>

          <div class="form-group mb-3">
            <label class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Kamar" required>
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