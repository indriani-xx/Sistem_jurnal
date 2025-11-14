<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data MPK - SMK Negeri 1 Sukawati</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="css_admin/jurusan.css">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <div class="page-header">
                <h2>
                    <i class="fas fa-book"></i>Data Jurnal</h2>
                <p>Kelola data Jurnal SMK Negeri 1 Sukawati</p>
            </div>

        <?php
        // Cek apakah ada pencarian
        include "../koneksi.php";
        
        // Query untuk mendapatkan jumlah total jurusan
        $total_mpk = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM jurnal");
        $total_data = mysqli_fetch_assoc($total_mpk);
        
        $cari = "";
        if (isset($_GET['cari']) && $_GET['cari'] != "") {
            $cari = $_GET['cari'];
            $result = mysqli_query($koneksi, "SELECT * FROM jurnal
                                             INNER JOIN guru ON jurnal.id_guru = guru.id_guru
                                             INNER JOIN kelas ON jurnal.id_kelas = kelas.id_kelas
                                             WHERE nama_guru LIKE '%$cari%' OR
                                             nama_kelas LIKE '%$cari%' OR
                                             tgl_mengajar LIKE '%$cari%' OR
                                             materi LIKE '%$cari%'
                                             ORDER BY id_jurnal DESC");
        } else {
            $result = mysqli_query($koneksi, "SELECT * FROM jurnal
                                             INNER JOIN guru ON jurnal.id_guru = guru.id_guru
                                             INNER JOIN kelas ON jurnal.id_kelas = kelas.id_kelas
                                             ORDER BY id_jurnal DESC");
        }
        ?>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stats-card primary">
                    <div class="stats-card-header">
                        <div>
                            <div class="stats-card-value"><?php echo $total_data['total']; ?></div>
                            <div class="stats-card-title">Total
                            </div>
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
                    if ($_GET['pesan'] == 'tambah') echo "✅ Data Jurnal berhasil ditambahkan!";
                    if ($_GET['pesan'] == 'edit') echo "✅ Data Jurnal berhasil diperbaharui!";
                    if ($_GET['pesan'] == 'hapus') echo "✅ Data Jurnal berhasil dihapus!";
                    ?>
                        <button
                            type="button"
                            class="btn-close"
                            onclick="this.parentElement.style.display='none'">&times;</button>
                    </div>
                    <?php endif; ?>

                    <!-- Pencarian + Tombol Tambah -->
                    <div class="action-bar">
                        <form class="search-form" method="get" action="">
                            <input type="hidden" name="page" value="jurnal">
                            <input
                                type="search"
                                name="cari"
                                placeholder="Cari Jurnal..."
                                value="<?= htmlspecialchars($cari) ?>">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        <a href="jurnal_tambah.php" class="btn-primary">
                            <i class="fas fa-plus"></i>Input Jurnal
                        </a>
                    </div>

                    <!-- Tabel Data -->
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Guru</th>
                                    <th>Tanggal Mengajar</th>
                                    <th>Mengajar Kelas</th>
                                    <th>Materi</th>
                                    <th>Keterangan</th>
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
                                    <td data-label="Guru"><?= $row['nama_guru'] ?></td>
                                    <td data-label="Tanggal Mengajar"><?= $row['tgl_mengajar'] ?></td>
                                    <td data-label="Mengajar Kelas"><?= $row['nama_kelas'] ?></td>
                                    <td data-label="Materi"><?= $row['materi'] ?></td>
                                    <td data-label="Keterangan"><?= $row['keterangan'] ?></td>
                                    <td data-label="Aksi">
                                        <div class="btn-group">
                                            <a href="jurnal_edit.php?id=<?= $row['id_jurnal'] ?>" class="btn-warning">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <a
                                                href="jurnal_hapus.php?id=<?= $row['id_jurnal'] ?>"
                                                class="btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data jurnal ini?')">
                                                <i class="fas fa-trash"></i>
                                                Hapus
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
                        <!-- TAMBAHIN INI!!!!!!!!!!! -->
                        <center>
                            <button
                                id="toggleTable"
                                class="btn btn-primary"
                                style="margin-top: 50px; width: 600px; height: 60px;">
                                ⬇️ Tampilkan Semua
                            </button>
                        </center>
                    </div>
                </div>
            </div>

            <script>
                // Close alert notification
                document
                    .querySelectorAll('.btn-close')
                    .forEach(button => {
                        button.addEventListener('click', function () {
                            this
                                .closest('.alert')
                                .style
                                .display = 'none';
                        });
                    });

                // Responsive table enhancement
                function setupResponsiveTable() {
                    const tables = document.querySelectorAll('.data-table');

                    tables.forEach(table => {
                        const headers = [];
                        table
                            .querySelectorAll('thead th')
                            .forEach(header => {
                                headers.push(header.textContent);
                            });

                        table
                            .querySelectorAll('tbody tr')
                            .forEach(row => {
                                row
                                    .querySelectorAll('td')
                                    .forEach((cell, index) => {
                                        cell.setAttribute('data-label', headers[index]);
                                    });
                            });
                    });

                }
                // TAMBAHIN INI!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! Fungsi sembunyikan sebagian baris
                // tabel
                function setupTableToggle() {
                    const rows = document.querySelectorAll('.data-table tbody tr');
                    const toggleButton = document.getElementById('toggleTable');
                    let expanded = false;
                    const limit = 7; // jumlah baris yang ditampilkan pertama

                    // Kalau jumlah datanya banyak
                    if (rows.length > limit) {
                        for (let i = limit; i < rows.length; i++) {
                            rows[i].style.display = 'none';
                        }

                        toggleButton.addEventListener('click', () => {
                            expanded = !expanded;
                            for (let i = limit; i < rows.length; i++) {
                                rows[i].style.display = expanded
                                    ? 'table-row'
                                    : 'none';
                            }
                            toggleButton.textContent = expanded
                                ? '⬆️ Sembunyikan'
                                : '⬇️ Tampilkan Semua';
                        });
                    } else {
                        // Kalau datanya sedikit, sembunyikan tombol
                        toggleButton.style.display = 'none';
                    }
                }
                // Jalankan saat halaman dimuat
                window.addEventListener('load', setupTableToggle);

                // Run on page load and resize
                window.addEventListener('load', setupResponsiveTable);
                window.addEventListener('resize', setupResponsiveTable);
            </script>

        </body>
    </html>