<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - SMK Negeri 1 Sukawati</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css_admin/jurusan.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>

</style>
<body>
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <h2><i class="fas fa-book"></i>Data Guru</h2>
            <p>Kelola data guru SMK Negeri 1 Sukawati</p>
        </div>

        <?php
        // Cek apakah ada pencarian
        include "../koneksi.php";
        
        // Query untuk mendapatkan jumlah total jurusan
        $total_pegawai = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM guru");
        $total_data = mysqli_fetch_assoc($total_pegawai);
        
        
        $cari = "";
        if (isset($_GET['cari']) && $_GET['cari'] != "") {
            $cari = $_GET['cari'];
            $result = mysqli_query($koneksi, "SELECT * FROM guru
                                            WHERE nama_guru LIKE '%$cari%'
                                            ORDER BY id_guru DESC");
        } else {
            $result = mysqli_query($koneksi,"SELECT * FROM guru  ORDER BY id_guru DESC");
        }
        ?>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stats-card primary">
                <div class="stats-card-header">
                    <div>
                        <div class="stats-card-value"><?php echo $total_data['total']; ?></div>
                        <div class="stats-card-title">Total Guru</div>
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
                    if ($_GET['pesan'] == 'tambah') echo "✅ Data guru berhasil ditambahkan!";
                    if ($_GET['pesan'] == 'edit') echo "✅ Data guru berhasil diperbaharui!";
                    if ($_GET['pesan'] == 'hapus') echo "✅ Data guru berhasil dihapus!";
                    ?>
                    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
                </div>
            <?php endif; ?>

            <!-- Pencarian + Tombol Tambah -->
            <div class="action-bar">
                <form class="search-form" method="get" action="">
                    <input type="hidden" name="page" value="guru">
                    <input type="search" name="cari" placeholder="Cari guru..." value="<?= htmlspecialchars($cari) ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="guru_tambah.php" class="btn-primary">
                    <i class="fas fa-plus"></i> Tambah Guru
                </a>
            </div>

    <!-- Tabel Data Ringkas -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Guru </th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1; 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama_guru']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_lahir']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td>
                            <button 
                                class="btn btn-info btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#detailModal<?= $row['id_guru'] ?>">
                                🔍 Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal<?= $row['id_guru'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Detail Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <p><strong>Nama:</strong> <?= htmlspecialchars($row['nama_guru']) ?></p>
                                    <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($row['tgl_lahir']) ?></p>
                                    <p><strong>Alamat:</strong> <?= htmlspecialchars($row['alamat']) ?></p>
                                    <p><strong>Telepon:</strong> <?= htmlspecialchars($row['telp']) ?></p>
                                    <p><strong>Username:</strong> <?= htmlspecialchars($row['username']) ?></p>
                                    <p><strong>Password:</strong> <?= htmlspecialchars($row['password']) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <a href="guru_edit.php?id=<?= $row['id_guru'] ?>" class="btn btn-warning">✏️ Edit</a>
                                    <a href="guru_hapus.php?id=<?= $row['id_guru'] ?>" 
                                       class="btn btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus guru ini?')">🗑️ Hapus</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } 
            } else { ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">⚠️ Data tidak ditemukan</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
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