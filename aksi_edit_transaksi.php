<?php
include "koneksi.php";
$id = $_GET['id'];
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

$jml_olde  = mysqli_query($connect, "SELECT * from transaksi where id_order=$id");
while ($j = mysqli_fetch_array($jml_olde)) {
    $jml_old = $j['jml'];
}

if ($jml != $jml_old) {
    $query  = mysqli_query($connect, "update transaksi set tgl_pinjam='$tgl_sewa',tgl_kembali='$tgl_keluar',no_ktp='$no_ktp',id_alat='$alat',jml='$jml',total='$total' where id_order='$id' ")
        or die(mysqli_error($connect));
    if ($query) {
        $stok_old = $stok + $jml_old;
        $new_stok = $stok_old - $jml;
        $stokk = mysqli_query($connect, "update alat set stok='$new_stok' where id_alat='$alat' ");
        if ($stokk) {
            header('location:transaksi.php');
        } else {
            echo mysqli_error($connect);
        }
    } else {
        echo mysqli_error($connect);
    }
} else {
    $query  = mysqli_query($connect, "update transaksi set tgl_pinjam='$tgl_sewa',tgl_kembali='$tgl_keluar',no_ktp='$no_ktp',id_alat='$alat',jml='$jml',total='$total' where id_order='$id' ")
        or die(mysqli_error($connect));
    if ($query) {
        header('location:transaksi.php');
    } else {
        echo mysqli_error($connect);
    }
}
