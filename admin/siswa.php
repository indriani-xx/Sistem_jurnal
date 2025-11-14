<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurusan - SMK Negeri 1 Sukawati</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css_admin/jurusan.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <h2><i class="fas fa-book"></i>Data Siswa</h2>
            <p>Kelola data siswa SMK Negeri 1 Sukawati</p>
        </div>

        <?php
        // Cek apakah ada pencarian
        include "../koneksi.php";
        
        // Query untuk mendapatkan jumlah total jurusan
        $total_siswa = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM siswa");
        $total_data = mysqli_fetch_assoc($total_siswa);
        
        
        $cari = "";
        if (isset($_GET['cari']) && $_GET['cari'] != "") {
            $cari = $_GET['cari'];
            $result = mysqli_query($koneksi, "SELECT * FROM siswa, kelas 
                                             WHERE siswa.id_kelas=kelas.id_kelas
                                             AND nama_siswa LIKE '%$cari%'
                                             OR no_absen like '%$cari%' 
                                             ORDER BY id_siswa DESC");
        } else {
            $result = mysqli_query($koneksi, "SELECT * FROM siswa, kelas 
                                             WHERE siswa.id_kelas=kelas.id_kelas ORDER BY id_siswa DESC");
        }
        ?>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stats-card primary">
                <div class="stats-card-header">
                    <div>
                        <div class="stats-card-value"><?php echo $total_data['total']; ?></div>
                        <div class="stats-card-title">Total Siswa</div>
                    </div>
                    <div class="stats-card-icon">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>

          

        <!-- Content Container -->
        <div class="content-container">
            <!-- Notifikasi -->
            <?php if (isset($_GET['pesan'])): ?>
                <div class="alert alert-success">
                    <?php 
                    if ($_GET['pesan'] == 'tambah') echo "✅ Data jurusan berhasil ditambahkan!";
                    if ($_GET['pesan'] == 'edit') echo "✅ Data jurusan berhasil diperbaharui!";
                    if ($_GET['pesan'] == 'hapus') echo "✅ Data jurusan berhasil dihapus!";
                    ?>
                    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
                </div>
            <?php endif; ?>

            <!-- Pencarian + Tombol Tambah -->
            <div class="action-bar">
                <form class="search-form" method="get" action="">
                    <input type="hidden" name="page" value="siswa">
                    <input type="search" name="cari" placeholder="Cari siswa..." value="<?= htmlspecialchars($cari) ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="siswa_tambah.php" class="btn-primary">
                    <i class="fas fa-plus"></i>Tambah Siswa
                </a>
            </div>

            <!-- Tabel Data -->
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>No Absen</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1; 
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td data-label="No"><?= $no++ ?></td>
                                <td><?= htmlspecialchars( $row['nama_siswa'])?></td>
                                <td><?=htmlspecialchars( $row['no_absen'])?></td>
                                 <td><?=htmlspecialchars( $row['tgl_lahir'])?></td>
                                  <td><?=htmlspecialchars( $row['alamat'])?></td>
                                   <td><?=htmlspecialchars( $row['telp']) ?></td>
                                   <td>
                                <button 
                                class="btn btn-info btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#detailModal<?= $row['id_siswa'] ?>">
                                🔍 Detail
                            </button>
                        </td>
                            
                            </tr>

                              <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal<?= $row['id_siswa'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Detail Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <p><strong>Nama:</strong> <?= htmlspecialchars($row['nama_siswa']) ?></p>
                                    <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($row['tgl_lahir']) ?></p>
                                    <p><strong>Alamat:</strong> <?= htmlspecialchars($row['alamat']) ?></p>
                                    <p><strong>Telepon:</strong> <?= htmlspecialchars($row['telp']) ?></p>
                                    <p><strong>NIS:</strong> <?= htmlspecialchars($row['nis']) ?></p>
                                    <p><strong>NISN:</strong> <?= htmlspecialchars($row['nisn']) ?></p>
                                    <p><strong>Kelas:</strong> <?= htmlspecialchars($row['nama_kelas']) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="siswa_edit.php?id=<?= $row['id_siswa'] ?>" class="btn btn-warning">✏️ Edit</a>
                                    <a href="siswa_hapus.php?id=<?= $row['id_siswa'] ?>" 
                                       class="btn btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus siswa ini?')">🗑️ Hapus</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="fas fa-search"></i>
                                    <p>⚠️ Data tidak ditemukan</p>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Close alert notification
        document.querySelectorAll('.btn-close').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.alert').style.display = 'none';
            });
        });

        // Responsive table enhancement
        function setupResponsiveTable() {
            const tables = document.querySelectorAll('.data-table');
            
            tables.forEach(table => {
                const headers = [];
                table.querySelectorAll('thead th').forEach(header => {
                    headers.push(header.textContent);
                });
                
                table.querySelectorAll('tbody tr').forEach(row => {
                    row.querySelectorAll('td').forEach((cell, index) => {
                        cell.setAttribute('data-label', headers[index]);
                    });
                });
            });
        }

        // Run on page load and resize
        window.addEventListener('load', setupResponsiveTable);
        window.addEventListener('resize', setupResponsiveTable);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>