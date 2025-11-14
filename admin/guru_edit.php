<?php
include "../koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php?page=guru");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru=$id"));

if (isset($_POST['update'])) {
    $nama_guru = $_POST['nama_guru'];
    $tgl_lahir    = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan', singkatan='$singkatan' WHERE id_jurusan=$id");
    header("Location: index.php?page=jurusan&pesan=edit");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Edit Guru</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" value="<?= $data['nama_guru'] ?>" required>
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
        <a href="index.php?page=jurusan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
