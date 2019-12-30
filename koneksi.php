<?php
$dbhost = "remotemysql.com";
$dbuser = "Lwv6ZSrNKv";
$dbpass = 'PMf7R9IVwa';
$dbname = "Lwv6ZSrNKv";


$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connect->connect_error) {
    die("Maaf koneksi gagal: " . $connect->connect_error);
}
