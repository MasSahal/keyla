<?php
class database
{

	var $host = "localhost";
	var $user = "root";
	var $pass = "root";
	var $db   = "20210120014_hotel";
	var $koneksi = "";

	function __construct()
	{
		$this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
	}

	//------------------ Kamar --------------------------//

	function input_kamar($kd_kamar, $tipe, $bed, $kapasitas, $harga, $foto_baru)
	{
		mysqli_query($this->koneksi, "insert into data_kamar values ('$kd_kamar','$tipe','$bed','$kapasitas', '$harga', '$foto_baru')");
	}

	function data_kamar()
	{
		return mysqli_query($this->koneksi, "select * from data_kamar");
	}

	function tampil_update_kamar($kd_kamar)
	{
		return mysqli_fetch_array(mysqli_query($this->koneksi, "select * from data_kamar where kd_kamar='$kd_kamar' "));
	}

	function update_kamar($kd_kamar, $tipe, $bed, $kapasitas, $harga, $foto)
	{
		return mysqli_query($this->koneksi, "Update data_kamar set tipe='$tipe', bed='$bed', kapasitas='$kapasitas', harga='$harga', foto='$foto' where kd_kamar='$kd_kamar'");
	}

	function delete_kamar($kd_kamar)
	{
		return mysqli_query($this->koneksi, "delete from data_kamar where kd_kamar='$kd_kamar' ");
	}

	//------------------ Pengunjung --------------------------//


	function input_pengunjung($nik, $nama, $no_hp, $email, $foto)
	{
		mysqli_query($this->koneksi, "insert into data_pengunjung values ('$nik','$nama','$no_hp','$email', '$foto')");
	}

	function data_pengunjung()
	{
		return mysqli_query($this->koneksi, "select * from data_pengunjung");
	}

	function tampil_update_pengunjung($nik)
	{
		$data = mysqli_query($this->koneksi, "select * from data_pengunjung where nik='$nik' ");
		return $data;
	}

	function update_pengunjung($nik, $nama, $no_hp, $email, $foto)
	{
		return mysqli_query($this->koneksi, "Update data_pengunjung set nama='$nama', no_hp='$no_hp', nik='$nik', foto='$foto', email='$email'where nik='$nik' ");
	}

	function delete_pengunjung($nik)
	{
		return mysqli_query($this->koneksi, "delete from data_pengunjung where nik='$nik'");
	}


	//------------------ Reservasi --------------------------//

	function data_reservasi($id = false)
	{
		if ($id) {
			$query = "SELECT * FROM data_reservasi JOIN data_kamar ON data_reservasi.tipe = data_kamar.tipe JOIN data_pengunjung ON data_reservasi.nama = data_pengunjung.nama WHERE data_reservasi.id_reservasi = '$id'";
			return mysqli_fetch_array(mysqli_query($this->koneksi, $query));
		} else {
			$query = "SELECT * FROM data_reservasi JOIN data_kamar ON data_reservasi.tipe = data_kamar.tipe JOIN data_pengunjung ON data_reservasi.nama = data_pengunjung.nama";
			return mysqli_query($this->koneksi, $query);
		}
	}

	function input_reservasi($id_reservasi, $nama, $tipe, $tgl_masuk, $tgl_keluar, $jumlah_hari, $jumlah_bayar)
	{
		return mysqli_query($this->koneksi, "insert into data_reservasi values ('$id_reservasi','$nama','$tipe','$tgl_masuk','$tgl_keluar', '$jumlah_hari','$jumlah_bayar')");
	}

	function update_reservasi($id_reservasi, $nama, $tipe, $tgl_masuk, $tgl_keluar, $jumlah_hari, $jumlah_bayar)
	{
		return mysqli_query($this->koneksi, "Update data_reservasi set nama='$nama', tipe='$tipe', tgl_masuk='$tgl_masuk', tgl_keluar='$tgl_keluar', jumlah_hari='$jumlah_hari', jumlah_bayar='$jumlah_bayar' where id_reservasi='$id_reservasi'");
	}

	function delete_reservasi($id)
	{
		return mysqli_query($this->koneksi, "delete from data_reservasi where id_reservasi='$id'");
	}
}
