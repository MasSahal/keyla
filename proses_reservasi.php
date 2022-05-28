<?php
include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {

    // var_dump($_POST);
    //id kamar
    $id_kamar = $_POST['tipe'];

    //id pengunjung
    $id_pengunjung = $_POST['nama'];

    // ambil waktu masuk dan keluar
    $masuk = strtotime($_POST['tgl_masuk']);
    $keluar = strtotime($_POST['tgl_keluar']);

    //hitung berapa hari
    $jumlah_hari = ($keluar - $masuk) / (24 * 60 * 60);

    //ambil data kamar
    $kamar = $db->tampil_update_kamar($id_kamar);

    //ambil pengunjung
    $pengunjung = mysqli_fetch_array($db->tampil_update_pengunjung($id_pengunjung));

    //kalkuasi biaya
    $jumlah_bayar = $kamar['harga'] * $jumlah_hari;

    $db->input_reservasi(
        $_POST['id_reservasi'],
        $pengunjung['nama'],
        $kamar['tipe'],
        $_POST['tgl_masuk'],
        $_POST['tgl_keluar'],
        $jumlah_hari,
        $jumlah_bayar,
    );

    echo "
    <script language = 'JavaScript'>
    alert ('data berhasil disimpan');
    document.location='data_reservasi.php';
    </script>
    ";
} else if ($aksi == "update") {

    //id kamar
    $id_kamar = $_POST['tipe'];

    //id pengunjung
    $id_pengunjung = $_POST['nama'];

    // ambil waktu masuk dan keluar
    $masuk = strtotime($_POST['tgl_masuk']);
    $keluar = strtotime($_POST['tgl_keluar']);

    //hitung berapa hari
    $jumlah_hari = ($keluar - $masuk) / (24 * 60 * 60);

    //ambil data kamar
    $kamar = $db->tampil_update_kamar($id_kamar);

    //ambil pengunjung
    $pengunjung = mysqli_fetch_array($db->tampil_update_pengunjung($id_pengunjung));

    //kalkuasi biaya
    $jumlah_bayar = $kamar['harga'] * $jumlah_hari;
    $db->update_reservasi(
        $_POST['id_reservasi'],
        $pengunjung['nama'],
        $kamar['tipe'],
        $_POST['tgl_masuk'],
        $_POST['tgl_keluar'],
        $jumlah_hari,
        $jumlah_bayar,
    );

    echo "
    <script language = 'JavaScript'>
    alert ('data berhasil diupdate');
    document.location='data_reservasi.php';
    </script>
    ";
} else if ($aksi == "delete") {
    $id_reservasi = $_GET['id'];
    $db->delete_reservasi($id_reservasi);
    echo "
    <script language = 'JavaScript'>
    alert ('data berhasil dihapus');
    document.location='data_reservasi.php';
    </script>
    ";
} else {
    echo "Database Error, Silahkab Proses Kembali <a herf = 'data_reservasi.php' >klik DIsini</a>";
}
