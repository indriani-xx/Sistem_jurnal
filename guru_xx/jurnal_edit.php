<?php
include "../koneksi.php";
if (!isset($_GET['id'])) {
    header("Location: index.php?page=jurnal");
    exit;
}

$id= intval($_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM jurnal WHERE id_jurnal=$id"));

if (isset($_POST['update'])) {
    $tgl_mengajar    = $_POST['tgl_mengajar'];
    $id_kelas = $_POST['id_kelas'];
    $materi = $_POST['materi'];
    $keterangan   = $_POST['keterangan'];
  
    
    mysqli_query($koneksi, "UPDATE jurnal SET 
    tgl_mengajar='$tgl_mengajar',
    nama_kelas='$nama_kelas'
    WHERE id_jurnal=$id");
    header("Location: index.php?page=jurnal&pesan=edit");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurnal Mengajar</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/jurnal_edit.css">
</head>
<body>



<div class="container mt-5">
    <h2 class="mb-4">Edit Pegawai</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Tanggal Mengajar</label>
            <input
                type="date"
                name="tgl_mengajar"
                class="form-control"
                value="<?= $data['tgl_mengajar'] ?>"
                required="required">
        </div>
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="id_kelas" class="form-control" required="required">
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
            <input
                type="text"
                name="materi"
                class="form-control"
                value="<?= $data['materi'] ?>"
                required="required">
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input
                type="text"
                name="keterangan"
                class="form-control"
                value="<?= $data['keterangan'] ?>"
                required="required">
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php?page=jurnal" class="btn btn-secondary">Kembali</a>
    </form>
</div>
            </body>
            </html>