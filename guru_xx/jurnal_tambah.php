<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
    $tgl_mengajar = $_POST['tgl_mengajar'];
    $id_kelas = $_POST['id_kelas'];
    $materi = $_POST['materi'];
    $keterangan  = $_POST['keterangan'];

    mysqli_query($koneksi, "INSERT INTO jurnal ( id_guru, tgl_mengajar, id_kelas, materi, keterangan) VALUES ('$id_guru','$tgl_mengajar', '$id_kelas', '$materi','$keterangan')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jurnal Mengajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/jurnal_tambah.css">
</head>
<body>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="form-container">
                    <div class="d-flex align-items-center mb-4">
                        <div class="card-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="ms-3">
                            <h1 class="page-header h3 mb-0">Tambah Jurnal Mengajar</h1>
                            <p class="text-muted mb-0">Isi data jurnal mengajar dengan lengkap</p>
                        </div>
                    </div>
                    
                    <form method="post">
                        <div class="floating-label">
                            <input type="date" name="tgl_mengajar" class="form-control" id="tgl_mengajar" placeholder=" " required>
                            <label for="tgl_mengajar"><i class="fas fa-calendar-alt me-2"></i>Tanggal Mengajar</label>
                        </div>
                        
                        <div class="floating-label">
                            <select name="id_kelas" class="form-select" id="id_kelas" required>
                                <option value=""></option>
                                <?php 
                                    $id_kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                    while ($row = mysqli_fetch_assoc($id_kelas)) { ?>
                                    <option value="<?= $row['id_kelas']; ?>">
                                        <?= $row['nama_kelas']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label for="id_kelas"><i class="fas fa-users me-2"></i>Mengajar Kelas</label>
                        </div>
                        
                        <div class="floating-label">
                            <input type="text" name="materi" class="form-control" id="materi" placeholder=" " required>
                            <label for="materi"><i class="fas fa-book me-2"></i>Materi Pembelajaran</label>
                        </div>
                        
                        <div class="floating-label">
                            <textarea name="keterangan" class="form-control" id="keterangan" placeholder=" " rows="3" required></textarea>
                            <label for="keterangan"><i class="fas fa-sticky-note me-2"></i>Keterangan</label>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <a href="index.php?page=guru" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" name="simpan" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Jurnal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Menambahkan placeholder untuk select element
        document.getElementById('id_kelas').addEventListener('change', function() {
            if (this.value !== "") {
                this.setAttribute('data-selected', 'true');
            } else {
                this.removeAttribute('data-selected');
            }
        });
        
        // Validasi form sebelum submit
        document.querySelector('form').addEventListener('submit', function(e) {
            let isValid = true;
            const inputs = this.querySelectorAll('input[required], select[required], textarea[required]');
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Harap lengkapi semua field yang wajib diisi!');
            }
        });
    </script>
</body>
</html>