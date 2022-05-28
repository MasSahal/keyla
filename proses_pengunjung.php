<?php
include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {

    $nik = $_POST['nik'];
    $data = $db->tampil_update_pengunjung($nik);

    if (mysqli_num_rows($data) != 0) {
        echo "
    <script langueage = 'JavaSccript'>
    alert('Data pengunjung telah terdaftar')
    document.location='data_pengunjung.php'
    </script>
    ";
    } else {

        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(10, 9999);
        $foto_baru = $angka_acak . '-pengunjung-' . $foto;
        $folder = "doc/";

        //pindahkan foto ke folder doc
        move_uploaded_file($file_tmp, $folder . $foto_baru);

        #die(var_dump($_POST));
        $db->input_pengunjung(
            $_POST['nik'],
            $_POST['nama'],
            $_POST['no_hp'],
            $_POST['email'],
            $foto_baru
        );
        echo "
            <script langueage = 'JavaSccript'>
            alert('data berhasil disimpan')
            document.location='data_pengunjung.php'
            </script>
            ";
    }
} elseif ($aksi == "update") {

    $nik = $_POST['nik'];
    $data = $db->tampil_update_pengunjung($nik);

    if (mysqli_num_rows($data) > 1) {
        echo "
    <script langueage = 'JavaSccript'>
    alert('Data pengunjung telah terdaftar')
    document.location='data_pengunjung.php'
    </script>
    ";
    } else {

        $data = mysqli_fetch_array($data);
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(10, 9999);
        $foto_baru = $angka_acak . '-pengunjung-' . $foto;
        $folder = "doc/";

        //pindahkan foto ke folder doc
        move_uploaded_file($file_tmp, $folder . $foto_baru);

        if (file_exists("doc/" . $data['foto'])) {
            //hapus file
            unlink("doc/" . $data['foto']);
        }

        #die(var_dump($_POST));
        $db->update_pengunjung(
            $_POST['nik'],
            $_POST['nama'],
            $_POST['no_hp'],
            $_POST['email'],
            $foto_baru
        );
        echo "
    <script langueage = 'JavaSccript'>
    alert('data berhasil disimpan')
    document.location='data_pengunjung.php'
    </script>
    ";
    }
} elseif ($aksi == "delete") {

    $id = $_GET['id'];
    $data = mysqli_fetch_array($db->tampil_update_pengunjung($id));

    if (file_exists("doc/" . $data['foto'])) {
        //hapus file
        unlink("doc/" . $data['foto']);
    }

    $hapus = $db->delete_pengunjung($id);
    if ($hapus) {

        echo "
    <script langueage = 'JavaSccript'>
    alert('data berhasil dihapus')
    document.location='data_pengunjung.php'
    </script>
    ";
    } else {
        echo "
    <script langueage = 'JavaSccript'>
    alert('data gagal dihapus')
    document.location='data_pengunjung.php'
    </script>
    ";
    }
} else {
    echo "database error,silahkan proses kembali <a href='data_pengunjung.php'> disini</a> ";
}
