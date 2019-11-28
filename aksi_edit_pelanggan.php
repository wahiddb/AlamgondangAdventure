<?php
include "koneksi.php";
$no_ktp     = $_POST['no_ktp'];
$alamat    = $_POST['alamat'];
$nama   = $_POST['nama'];
$no_hp = $_POST['no_hp'];

$query  = mysqli_query($connect, "update penyewa set alamat='$alamat',nama='$nama',no_hp='$no_hp' where no_ktp='$no_ktp' ")
    or die(mysqli_error($connect));
if ($query) {
    header('location:pelanggan.php');
} else {
    echo mysqli_error($connect);
}
