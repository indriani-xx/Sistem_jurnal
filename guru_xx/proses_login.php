<?php
session_start();
include "../koneksi.php";// menyertakan file lain = ada sintaks dalam file yang dipilih

//$=variable
$username = $_POST['username'];
$password = md5/* enkripsi*/($_POST['password']);

//cek data
$sql = "SELECT * FROM guru WHERE username= '$username' AND password='$password'";

$query = mysqli_query($koneksi,$sql);
$cek = mysqli_num_rows($query);

if($cek >0){
    $data = mysqli_fetch_assoc($query);
    
    $_SESSION['nama_guru'] = $data['nama_guru'];
    $_SESSION['id_guru'] = $data['id_guru'];
    $_SESSION['login'] = true;
    
    echo "<script>
                alert('HALOOO SELAMAT BERGABUNG!!!!');
                window.location.href='index.php';
                </script>";
}else{
     echo "<script>
                alert('SALAHHH anda bukan member!!!!');
                window.location.href='login.php';
                </script>";
}

?>
