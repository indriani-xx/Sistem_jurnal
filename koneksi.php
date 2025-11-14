<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sisri";

$koneksi = new mysqli($host, $user, $pass, $db);

//sintaks untuk ngecek koneksi apakah ada erorr atau tidak
if($koneksi->connect_error){
    die("koneksi gagal : " .$koneksi->connect_error);
}
?>
