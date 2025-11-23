<?php
require "../../config/koneksi.php";

if (!isset($_GET['id'])) {
  exit("ERROR");
}

$idJenis = (int) $_GET['id'];

// Ambil kode jenis
$resJenis = mysqli_query(
  $koneksi,
  "SELECT kode_barang_jenis FROM barang_jenis WHERE id_barang_jenis = $idJenis"
);

if (!$resJenis || mysqli_num_rows($resJenis) == 0) {
  exit("ERROR");
}

$rowJenis = mysqli_fetch_assoc($resJenis);
$kodeJenis = $rowJenis['kode_barang_jenis'];

// Cari kode terakhir
$resInv = mysqli_query(
  $koneksi,
  "SELECT kode_barang_inventaris FROM barang_inventaris 
     WHERE barang_jenis_id = $idJenis 
     ORDER BY id_barang_inventaris DESC LIMIT 1"
);

if (mysqli_num_rows($resInv)) {
  $last = mysqli_fetch_assoc($resInv)['kode_barang_inventaris'];
  $num = ((int) substr($last, -3)) + 1;
} else {
  $num = 1;
}

echo $kodeJenis . "-" . str_pad($num, 3, "0", STR_PAD_LEFT);
exit;
