<?php
function tambah_data()
{
    $db = new database();
    $kamar = $db->data_kamar();
    $pengunjung = $db->data_pengunjung();
?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header " style="background: #069A8E;">
                <h4 class="text-center text-white">Form Reservasi</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo "proses_reservasi.php?aksi=tambah"; ?>">
                    <div class="form-group mb-3 mb-3">
                        <label class="form-label">Kode Reservasi</label>
                        <input type="text" name="id_reservasi" class="form-control" value="<?php echo "PRM" . rand(10000, 99999) ?>" required readonly>
                    </div>
                    <div class="form-group mb-3 mb-3">
                        <label for="nik">Pilih Pengunjung</label>
                        <select class="form-control" name="nama" id="nama">
                            <option selected disabled>Pilih Pengunjung Tersedia</option>
                            <?php foreach ($pengunjung as $row) : ?>
                                <option value="<?= $row['nik']; ?>"><?= $row['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3 mb-3">
                        <label for="tipe">Pilih Kamar</label>
                        <select class="form-control" name="tipe" id="tipe">
                            <option selected disabled>Pilih Kamar Tersedia</option>
                            <?php foreach ($kamar as $row) : ?>
                                <option value="<?= $row['kd_kamar']; ?>" <?= $_GET['kamar'] == $row['kd_kamar'] ? "selected" : ""; ?>><?= $row['tipe'] . " - " . $row['harga'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal Keluar</label>
                        <input type="date" name="tgl_keluar" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group mb-3 mb-3">

                        <input type="reset" class="btn btn-secondary" value="Reset">
                        <input type="submit" class="btn btn-primary" value="Pesan">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}

function update_data()
{
    $db = new database;
    $id_reservasi = $_GET['id'];
    $data = $db->data_reservasi($id_reservasi);
    // var_dump($data);
    $kamar = $db->data_kamar();
    $pengunjung = $db->data_pengunjung();

?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header " style="background: #069A8E;">
                <h4 class="text-center text-white">Form Update</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo "proses_reservasi.php?aksi=update"; ?>">
                    <div class="form-group mb-3 mb-3">
                        <label class="form-label">Kode Reservasi</label>
                        <input type="text" name="id_reservasi" class="form-control" value="<?php echo $data['id_reservasi'] ?>" required readonly>
                    </div>
                    <div class="form-group mb-3 mb-3">
                        <label for="kd_cust">Pilih Pengunjung</label>
                        <select class="form-control" name="nama" id="nama">
                            <option selected disabled>Pilih Customer Tersedia</option>
                            <?php foreach ($pengunjung as $row) : ?>
                                <option value="<?= $row['nik']; ?>" <?= $row['nik'] == $data['nik'] ? "selected" : "" ?>><?= $row['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group mb-3 mb-3">
                        <label for="tipe">Pilih Kamar</label>
                        <select class="form-control" name="tipe" id="tipe">
                            <option selected disabled>Pilih Kamar Tersedia</option>
                            <?php foreach ($kamar as $row) : ?>
                                <option value="<?= $row['kd_kamar'] ?>" <?= $row['kd_kamar'] == $data['kd_kamar'] ? "selected" : "" ?>><?= $row['tipe'] . " - " . $row['harga'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control" required value="<?= $data['tgl_masuk']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal Keluar</label>
                        <input type="date" name="tgl_keluar" class="form-control" required value="<?= $data['tgl_keluar']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
                        <input type="reset" class="btn btn-secondary" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$edit = $_GET['edit'];
if ($edit == "update") {
    update_data();
} else {
    tambah_data();
}
?>