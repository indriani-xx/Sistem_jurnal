<?php
include "../koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php?page=jurnal");
    exit;
}

$id= intval($_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM jurnal WHERE id_jurnal=$id"));

if (isset($_POST['update'])) {
    $id_guru    = $_POST['id_guru'];
    $tgl_mengajar    = $_POST['tgl_mengajar'];
    $id_kelas = $_POST['id_kelas'];
    $materi = $_POST['materi'];
    $keterangan   = $_POST['keterangan'];
  
    
    mysqli_query($koneksi, "UPDATE jurnal SET 
    nama_kelas='$nama_kelas', 
    id_guru='$id_guru', 
    id_jurusan='$id_jurusan' 
    WHERE id_jurnal=$id");
    header("Location: index.php?page=jurnal&pesan=edit");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Edit Pegawai</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Guru</label>
            <select name="id_guru" class="form-select" required>
                <option value="">-- Pilih Guru --</option>
                <?php 
                    // ambil data guru
                    $id_guru = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY nama_guru ASC");
                    while ($row = mysqli_fetch_assoc($id_guru)) { $selected = ($row['id_guru'] == $data['id_guru']) ? "selected" : "";
                echo "<option value='{$row['id_guru']}' $selected>{$row['nama_guru']}</option>";}?>
            </select>
        </div>
            <div class="mb-3">
            <label class="form-label">Tanggal Mengajar</label>
            <input type="date" name="tgl_mengajar" class="form-control" value="<?= $data['tgl_mengajar'] ?>" required>
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
            <label class="form-label">Materi</label>
            <input type="text" name="materi" class="form-control" value="<?= $data['materi'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php?page=jurnal" class="btn btn-secondary">Kembali</a>
    </form>
</div>
