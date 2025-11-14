<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}
include "../koneksi.php";
if (!isset($_SESSION['id_guru'])) {
    header("Location: login.php");
    exit;
}
$namaGuru = $_SESSION['nama_guru'];
$id_guru = $_SESSION['id_guru'];

// CEK apakah ada pencarian - VERSI FIXED
$cari = "";
$result = null;

if (isset($_GET['cari']) && $_GET['cari'] != "") {
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
    
    // ✅ QUERY YANG SUDAH DIPERBAIKI
    $result = mysqli_query($koneksi,
        "SELECT jurnal.*, kelas.nama_kelas 
         FROM jurnal 
         JOIN kelas ON jurnal.id_kelas = kelas.id_kelas 
         WHERE jurnal.id_guru = $id_guru 
         AND (jurnal.materi LIKE '%$cari%' 
              OR jurnal.keterangan LIKE '%$cari%' 
              OR kelas.nama_kelas LIKE '%$cari%')
         ORDER BY jurnal.id_jurnal DESC");
         
} else {
    // Query tanpa pencarian
    $result = mysqli_query($koneksi,  
        "SELECT jurnal.*, kelas.nama_kelas 
         FROM jurnal 
         JOIN kelas ON jurnal.id_kelas = kelas.id_kelas 
         WHERE jurnal.id_guru = $id_guru
         ORDER BY jurnal.id_jurnal DESC");
}

// Handle AJAX request
if (isset($_GET['ajax']) && $_GET['ajax'] == "1") {
    ob_clean();
    $no = 1;
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $no++ . "</td>
                <td>{$row['tgl_mengajar']}</td>
                <td>{$row['nama_kelas']}</td>
                <td>{$row['materi']}</td>
                <td>{$row['keterangan']}</td>
                <td>
                    <a href='index.php?page=edit-jurnal&id={$row['id_jurnal']}' class='btn btn-warning' title='edit'>
                        <i class='bx bx-edit'></i> 
                    </a>
                    <a href='jurnal_hapus.php?id={$row['id_jurnal']}' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus data jurnal ini?')\" title='hapus'>
                        <i class='bx bx-trash'></i> 
                    </a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>⚠️ Data tidak ditemukan</td></tr>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Jurnal Guru</title>
        <link rel="stylesheet" href="css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <div class="hero-section" style="background-image: url(../assets/hero-img3.jpg); background-repeat: no-repeat; background-size: cover; background-position: center">
            <div class="overlay">
                <h1>Hai <?= $namaGuru ?></h1>
                <p>Siap untuk mengajar hari ini? >o<</p>
            </div>
            <div class="teacher-name">
                <p><?= date("l, d M Y") ?></p>
            </div>
        </div>

        <div class="container">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'tambah-jurnal':
                    include "jurnal_tambah.php";
                    break;
                case 'edit-jurnal':
                    include "jurnal_edit.php";
                    break;
                case 'hapus-jurnal':
                    include "jurnal_hapus.php";
                    break;
                default:
                    echo "<h1>Halaman tidak ditemukan !</h1>";
                    break;
            }
        } else {
        ?>
            <div class="top-bar">
                <!-- ✅ FORM YANG SUDAH DIPERBAIKI -->
                <form id="searchForm">
                    <input
                        type="search"
                        id="searchInput"
                        name="cari"
                        placeholder="Cari data jurnal..."
                        value="<?= htmlspecialchars($cari) ?>">
                </form>

                <div class="side-btn">
                    <a href="index.php?page=tambah-jurnal">+ Isi Jurnal</a>
                    <a href="../logout.php" class="btn-danger">Logout</a>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="table-container">
                <!-- ✅ TAMPILKAN INFO PENCARIAN -->
                <!-- <?php if ($cari != ""): ?>
                <div style="padding: 10px; background: #e3f2fd; border-radius: 5px; margin-bottom: 15px;">
                    🔍 Menampilkan hasil pencarian untuk: "<strong><?= htmlspecialchars($cari) ?></strong>"
                    <a href="index.php?page=jurnal" style="float: right; color: #666;">✖️ Hapus pencarian</a>
                </div>
                <?php endif; ?> -->

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Mengajar</th>
                            <th>Nama Kelas</th>
                            <th>Materi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        <?php
                        $no = 1;
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['tgl_mengajar'] ?></td>
                            <td><?= $row['nama_kelas'] ?></td>
                            <td><?= $row['materi'] ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                                <a href="index.php?page=edit-jurnal&id=<?= $row['id_jurnal'] ?>" class="btn btn-warning" title="edit">
                                    <i class='bx bx-edit'></i> 
                                </a>
                                <a href="jurnal_hapus.php?id=<?= $row['id_jurnal'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data jurnal ini?')" title="hapus">
                                    <i class='bx bx-trash'></i> 
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else { 
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">
                                <?php if ($cari != ""): ?>
                                ⚠️ Data tidak ditemukan untuk pencarian "<strong><?= htmlspecialchars($cari) ?></strong>"
                                <?php else: ?>
                                ⚠️ Belum ada data jurnal
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <!-- Tombol Toggle -->
                <?php if ($result && mysqli_num_rows($result) > 7): ?>
                <center>
                    <button id="toggleTable" class="btn btn-primary" style="margin-top: 50px; width: 600px; height: 60px;">
                        ⬇️ Tampilkan Semua
                    </button>
                </center>
                <?php endif; ?>
            </div>
            <?php
        }
        ?>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const tableBody = document.getElementById("tableBody");
            const searchForm = document.getElementById("searchForm");

            if (searchInput) {
                searchInput.addEventListener("keyup", function() {
                    const formData = new FormData();
                    
                    formData.append("cari", searchInput.value);
                    formData.append("ajax", "1");

                    fetch("index.php?" + new URLSearchParams(formData), {
                            method: "GET"
                        })
                        .then(res => res.text())
                        .then(data => {
                            tableBody.innerHTML = data;
                            setupTableToggle();
                        })
                        .catch(err => console.error(err));
                });
            }
        });

        // Fungsi toggle table
        function setupTableToggle() {
            const rows = document.querySelectorAll('.table tbody tr');
            const toggleButton = document.getElementById('toggleTable');
            
            if (!toggleButton) return;
            
            let expanded = false;
            const limit = 7;

            if (rows.length > limit) {
                for (let i = limit; i < rows.length; i++) {
                    rows[i].style.display = 'none';
                }

                toggleButton.addEventListener('click', () => {
                    expanded = !expanded;
                    for (let i = limit; i < rows.length; i++) {
                        rows[i].style.display = expanded ? 'table-row' : 'none';
                    }
                    toggleButton.textContent = expanded ? '⬆️ Sembunyikan' : '⬇️ Tampilkan Semua';
                });
            }
        }

        // Auto submit form saat mengetik (opsional)
        document.getElementById('searchInput')?.addEventListener('input', function(e) {
            // Jika ingin real-time search, uncomment berikut:
            // this.form.submit();
        });

        window.addEventListener('load', setupTableToggle);
        </script>
    </body>
</html>