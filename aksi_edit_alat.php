<?php
include "koneksi.php";
$id_alat = $_GET['id_alat'];
$harga     = $_POST['harga'];
$stok    = $_POST['stok'];
$nama   = $_POST['nama'];


$query  = mysqli_query($connect, "update alat set harga='$harga',nama='$nama',stok='$stok' where id_alat='$id_alat' ")
    or die(mysqli_error($connect));
if ($query) {
    header('location:alat.php');
} else {
    echo mysqli_error($connect);
}
