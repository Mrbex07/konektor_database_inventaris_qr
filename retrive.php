<?php
require("koneksi.php");
$perintah = "SELECT * FROM barangservice";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if ($cek > 0) {
	$response["kode"] = 1;
	$response["pesan"] = "data tersedia";
	$response["data"] = array();

	while ($ambil = mysqli_fetch_object($eksekusi)) {
		$F["id"] = $ambil->id;
		$F["kode_barang"] = $ambil->kode_barang;
		$F["nama_barang"] = $ambil->nama_barang;
		$F["diterima_oleh"] = $ambil->diterima_oleh;
		$F["tgl_masuk"] = $ambil->tgl_masuk;
		$F["tgl_keluar"] = $ambil->tgl_keluar;
		$F["ket_keluhan"] = $ambil->ket_keluhan;
		$F["ket_penanganan"] = $ambil->ket_penanganan;
		$F["divisi"] = $ambil->divisi;
		$F["anydesk"] = $ambil->anydesk;
		$F["ket_email"] = $ambil->ket_email;
		$F["kp_name"] = $ambil->kp_name;
		$F["hostname"] = $ambil->hostname;


		array_push($response["data"], $F);
	}
}
else{
	$response["kode"] = 0;
	$response["pesan"] = "data tidak tersedia";
}
echo json_encode($response);
mysqli_close($konek);