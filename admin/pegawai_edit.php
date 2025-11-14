<?php
include "../koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php?page=pegawai");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai=$id"));

if (isset($_POST['update'])) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $tgl_lahir    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    mysqli_query($koneksi, "UPDATE pegawai SET nama_pegawai='$nama_pegawai', tgl_lahir='$tgl_lahir', alamat='$alamat', telp='$telp', username='$username', password='$password' WHERE id_pegawai=$id");
    header("Location: index.php?page=pegawai&pesan=edit");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Edit Pegawai</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control" value="<?= $data['nama_pegawai'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="text" name="tgl_lahir"  class="form-control" value="<?= $data['tgl_lahir'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="number" name="telp"  class="form-control" value="<?= $data['telp'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="teks" name="password" class="form-control" value="<?= $data['password'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php?page=pegawai" class="btn btn-secondary">Kembali</a>
    </form>
</div>
