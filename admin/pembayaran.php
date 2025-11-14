<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data MPK - SMK Negeri 1 Sukawati</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css_admin/jurusan.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <h2><i class="fas fa-book"></i>Data Pembayaran SPP</h2>
            <p>Kelola Data Pembayaran SPP SMK Negeri 1 Sukawati</p>
        </div>

        <?php
        // Cek apakah ada pencarian
        include "../koneksi.php";
        
        // Query untuk mendapatkan jumlah total jurusan
        $total_pembayaran = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pembayaran");
        $total_data = mysqli_fetch_assoc($total_pembayaran);
        
        $cari = "";
        if (isset($_GET['cari']) && $_GET['cari'] != "") {
            $cari = $_GET['cari'];
            $result = mysqli_query($koneksi, "SELECT * FROM pembayaran, siswa, pegawai 
                                             WHERE pembayaran.id_siswa=siswa.id_siswa
                                             AND pembayaran.id_pegawai=pegawai.id_pegawai
                                             AND nama_siswa LIKE '%$cari%'
                                             or metode like '%$cari%' 
                                             ORDER BY id_pembayaran DESC");
        } else {
            $result = mysqli_query($koneksi, "SELECT * FROM pembayaran, siswa, pegawai 
                                             WHERE pembayaran.id_siswa=siswa.id_siswa
                                             AND pembayaran.id_pegawai=pegawai.id_pegawai ORDER BY id_pembayaran DESC");
        }
        ?>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stats-card primary">
                <div class="stats-card-header">
                    <div>
                        <div class="stats-card-value"><?php echo $total_data['total']; ?></div>
                        <div class="stats-card-title">Total </div>
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
                    if ($_GET['pesan'] == 'tambah') echo "✅ Data Pembayaran berhasil ditambahkan!";
                    if ($_GET['pesan'] == 'edit') echo "✅ Data Pembayaran berhasil diperbaharui!";
                    if ($_GET['pesan'] == 'hapus') echo "✅ Data Pembayaran berhasil dihapus!";
                    ?>
                    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
                </div>
            <?php endif; ?>

            <!-- Pencarian + Tombol Tambah -->
            <div class="action-bar">
                <form class="search-form" method="get" action="pembayaran.php">
                    <input type="hidden" name="page" value="pembayaran">
                    <input type="search" name="cari" placeholder="Cari Data Pembayaran..." value="<?= htmlspecialchars($cari) ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="pembayaran_tambah.php" class="btn-primary">
                    <i class="fas fa-plus"></i>Input Pembayaran SPP
                </a>
            </div>

            <!-- Tabel Data -->
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Siswa</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Bulan</th>
                            <th>Nominal</th>
                            <th>Metode</th>
                            <th>Petugas</th>
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
                                <td data-label="Siswa"><?= $row['nama_siswa'] ?></td>
                                <td data-label="Tanggal Pembayaran"><?= $row['tgl_pembayaran'] ?></td>
                                 <td data-label="Bulan"><?= $row['bulan'] ?></td>
                                   <td data-label="Nominal"><?= $row['nominal'] ?></td>
                                   <td data-label="Metode"><?= $row['metode'] ?></td>
                                   <td data-label="Petugas"><?= $row['nama_pegawai'] ?></td>
                                <td data-label="Aksi">
                                    <div class="btn-group">
                                        <a href="pembayaran_edit.php?id=<?= $row['id_pembayaran'] ?>" class="btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="pembayaran_hapus.php?id=<?= $row['id_pembayaran'] ?>" 
                                           class="btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus data Pembayaran ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
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
</body>
</html>