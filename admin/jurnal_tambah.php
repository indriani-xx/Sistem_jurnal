<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
    $id_guru = $_POST['id_guru'];
     $tgl_mengajar = $_POST['tgl_mengajar'];
      $id_kelas = $_POST['id_kelas'];
    $materi = $_POST['materi'];
    $keterangan  = $_POST['keterangan'];

    mysqli_query($koneksi, "INSERT INTO jurnal (id_guru, tgl_mengajar, id_kelas, materi, keterangan) VALUES ('$id_guru','$tgl_mengajar', '$id_kelas', '$materi','$keterangan')");
    header("Location: index.php?page=jurnal&pesan=tambah");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4">Tambah Jurnal</h2>
    <form method="post">
        <div class="mb-3">

             <select name="id_guru" class="form-select" required>
                <option value="">-- Pilih Guru --</option>
                <?php 
                    $id_guru = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY nama_guru ASC");
                    while ($row = mysqli_fetch_assoc($id_guru)) { ?>
                    <option value="<?= $row['id_guru']; ?>">
                        <?= $row['nama_guru']; ?> 
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Mengajar</label>
            <input type="date" name="tgl_mengajar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mengajar Kelas</label>
             <select name="id_kelas" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                <?php 
                    $id_kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                    while ($row = mysqli_fetch_assoc($id_kelas)) { ?>
                    <option value="<?= $row['id_kelas']; ?>">
                        <?= $row['nama_kelas']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Materi</label>
            <input type="text" name="materi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php?page=guru" class="btn btn-secondary">Kembali</a>
    </form>
</div>
