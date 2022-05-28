<?php
include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
    #die(var_dump($_POST));

    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 9999);
    $foto_baru = $angka_acak . '-' . $foto;
    $folder = "doc/";

    //pindahkan foto ke folder doc
    move_uploaded_file($file_tmp, $folder . $foto_baru);

    $db->input_kamar(
        rand(100000, 999999),
        $_POST['tipe'],
        $_POST['bed'],
        $_POST['kapasitas'],
        $_POST['harga'],
        $foto_baru
    );

    echo "
    <script language = 'JavaScript'>
    alert ('data berhasil disimpan');
    document.location='data_kamar.php';
    </script>
    ";
} else if ($aksi == "update") {

    //ambilid
    $kd_kamar = $_POST['kd_kamar'];

    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(10, 9999);
    $foto_baru = $angka_acak . '-' . $foto;
    $folder = "doc/";


    //hapus foto lama
    $data_kamar = $db->tampil_update_kamar($kd_kamar);

    if (file_exists('doc/' . $data_kamar['foto'])) {
        unlink('doc/' . $data_kamar['foto']);
    }

    //pindahkan foto ke folder doc
    move_uploaded_file($file_tmp, $folder . $foto_baru);


    $db->update_kamar(
        $kd_kamar,
        $_POST['tipe'],
        $_POST['bed'],
        $_POST['kapasitas'],
        $_POST['harga'],
        $foto_baru
    );
    echo "
    <script language = 'JavaScript'>
    alert ('data berhasil diupdate');
    document.location='data_kamar.php';
    </script>
    ";
} else if ($aksi == "delete") {
    $kd_kamar = $_GET['id'];

    //hapus foto lama
    $data_kamar = $db->tampil_update_kamar($kd_kamar);

    if (file_exists('doc/' . $data_kamar['foto'])) {
        unlink('doc/' . $data_kamar['foto']);
    }

    $db->delete_kamar($kd_kamar);
    echo "
    <script language = 'JavaScript'>
    alert ('data berhasil dihapus');
    document.location='data_kamar.php';
    </script>
    ";
} else {
    echo "Database Error, Silahkab Proses Kembali <a herf = 'data_kamar.php' >klik DIsini</a>";
}
