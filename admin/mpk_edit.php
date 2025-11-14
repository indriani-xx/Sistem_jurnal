<?php
include "../koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php?page=mpk");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mpk WHERE id_mpk=$id"));

if (isset($_POST['update'])) {
   $id_siswa = $_POST['id_siswa'];
    $id_kelas = $_POST['id_kelas'];
    $username    = $_POST['username'];
     $password    = $_POST['password'];

    mysqli_query($koneksi, "UPDATE mpk SET 
    id_siswa='$id_siswa', 
    id_kelas='$id_kelas', 
    username='$username',
    password='$password'
    
    WHERE id_mpk=$id");
    header("Location: index.php?page=mpk&pesan=edit");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Edit Pembayaran</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Siswa</label>
            <select name="id_siswa" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                <?php 
                    $id_siswa = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nama_siswa ASC");
                  while ($row = mysqli_fetch_assoc($id_siswa)) { 
                $selected = ($row['id_siswa'] == $data['id_siswa']) ? "selected" : "";
                echo "<option value='{$row['id_siswa']}' $selected>{$row['nama_siswa']}</option>";}
                  ?>
            </select>     
        </div>
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="id_kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                <?php
                $id_kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                while ($row = mysqli_fetch_assoc($id_kelas)) {
                    $selected = ($row['id_kelas'] == $data['id_kelas']) ? "selected" : "";
                    echo "<option value='{$row['id_kelas']}' $selected>{$row['nama_kelas']}</option>";
                }
                ?>
            </select>
        </div>
        
         <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" maxlength="20" class="form-control" value="<?= $data['username'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="password" maxlength="35" class="form-control" value="<?= $data['password'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php?page=mpk" class="btn btn-secondary">Kembali</a>
    </form>
</div>
