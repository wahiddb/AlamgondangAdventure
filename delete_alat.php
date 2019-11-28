<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "delete from alat where id_alat='$id'")
    or die(mysqli_error($connect));
if ($query) {
    header('location:alat.php');
} else {
    echo mysqli_error($connect);
}
