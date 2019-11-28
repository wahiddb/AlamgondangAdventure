<?php
include "koneksi.php";
$no_ktp    = $_POST['no_ktp'];
$nama   = $_POST['nama'];
$alat   = $_POST['alat'];
$jml   = $_POST['jml'];
$tgl_sewa   = $_POST['tgl_sewa'];
$tgl_keluar   = $_POST['tgl_keluar'];
$sewa    = new DateTime($tgl_sewa);
$kembali        = new DateTime($tgl_keluar);
$diff         = $sewa->diff($kembali);
$durasi = $diff->d;

$alatt  = mysqli_query($connect, "SELECT * from alat where id_alat=$alat");
while ($plg = mysqli_fetch_array($alatt)) {
    $harga = $plg['harga'];
    $nama_alat = $plg['nama'];
    $stok = $plg['stok'];
    $total = $harga * $jml * $durasi;
}


$query  = mysqli_query($connect, "INSERT INTO `transaksi` (`id_order`, `tgl_pinjam`, `tgl_kembali`, `no_ktp`, `id_alat`, `jml`, `total`) VALUES (NULL, '$tgl_sewa', '$tgl_keluar', '$no_ktp', '$alat', '$jml', '$total');");
if ($query) {
    $new_stok = $stok - $jml;
    $stokk = mysqli_query($connect, "update alat set stok='$new_stok' where id_alat='$alat' ");
    if ($stokk) {
        header('location:transaksi.php');
    } else {
        echo mysqli_error($connect);
    }
} else {
    echo mysqli_error($connect);
}
