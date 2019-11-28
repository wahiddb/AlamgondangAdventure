<?php
include "koneksi.php";
$harga    = $_GET['harga'];
$nama   = $_GET['nama'];
$stok   = $_GET['stok'];
$query  = mysqli_query($connect, "insert into alat(harga,nama,stok)
values ('$harga','$nama','$stok')");
if ($query) {
    header('location:alat.php');
} else {
    echo mysqli_error($connect);
}
