<?php
include "../koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php?page=pembayaran");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran=$id"));

if (isset($_POST['update'])) {
    $id_siswa        = $_POST['id_siswa'];
    $tgl_pembayaran = $_POST['tgl_pembayaran'];
    $bulan          = $_POST['bulan'];
    $nominal       = $_POST['nominal'];
    $metode       = $_POST['metode'];
    $id_pegawai    = $_POST['id_pegawai'];

    mysqli_query($koneksi, "UPDATE pembayaran SET 
    id_siswa='$id_siswa', 
    tgl_pembayaran='$tgl_pembayaran',
    bulan='$bulan',
    nominal='$nominal',
    metode='$metode',
    id_pegawai='$id_pegawai' 
    WHERE id_pembayaran=$id");
    header("Location: index.php?page=pembayaran&pesan=edit");
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
                echo "<option value='{$row['id_siswa']}' $selected>{$row['nama_siswa']}</option>";
}
                  ?>
            </select>
                    
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Pembayaran</label>
            <input type="date" name="tgl_pembayaran" class="form-control" value="<?= $data['tgl_pembayaran'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Bulan</label>
            <input type="number" name="bulan" class="form-control" value="<?= $data['bulan'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" name="nominal" class="form-control" value="<?= $data['nominal'] ?>" required>
        </div>
         <div class="mb-3">
            <label class="form-label">Metode</label>
            <input type="text" name="metode" maxlength="10" class="form-control" value="<?= $data['metode'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Petugas</label>
            <select name="id_pegawai" class="form-select" required>
                <option value="">-- Pilih Petugas --</option>
                <?php 
                    $id_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nama_pegawai ASC");
                    while ($row = mysqli_fetch_assoc($id_pegawai)) { 
                        $selected = ($row['id_pegawai'] == $data['id_pegawai']) ? "selected" : "";
                    echo "<option value='{$row['id_pegawai']}' $selected>{$row['nama_pegawai']}</option>";
                }?>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php?page=pembayaran" class="btn btn-secondary">Kembali</a>
    </form>
</div>
