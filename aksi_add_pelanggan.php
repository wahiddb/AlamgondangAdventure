<?php
include "koneksi.php";
$no_ktp    = $_POST['no_ktp'];
$nama   = $_POST['nama'];
$no_hp   = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$query  = mysqli_query($connect, "insert into penyewa(no_ktp,nama,no_hp,alamat)
values ('$no_ktp','$nama','$no_hp','$alamat')");
if ($query) {
    header('location:pelanggan.php');
} else {
    echo mysqli_error($connect);
}
