<?php
// TENTUKAN NAMA DATABASE
include 'koneksi.php';
$no_ktp = $_POST['no_ktp']; // Menerima nim dari JQuery Ajax dari form

$s = mysqli_query($connect, "select * from penyewa where no_ktp='$no_ktp' ");
while ($data = mysqli_fetch_assoc($s)) {
    echo $data['nama']; // Print nama hasil perolehan dari query database
}
