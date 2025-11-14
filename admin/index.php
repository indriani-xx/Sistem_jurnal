<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPL - SMK Negeri 1 Sukawati</title>
    <script src="https://kit.fontawesome.com/51c778479d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css_admin/style.css">
</head>
<body>
    <!-- Hamburger Menu Button (Mobile Only) -->
    <button class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i> Menu
    </button>

    <!-- Sidebar Navigation -->
    <div class="sidebar" id="sidebar">
        <div class="logo-section">
            <img src="asset/logo_smk1.png" alt="Logo SMKN 1 Sukawati" onerror="this.style.display='none'">
            <h1>SMK Negeri 1 Sukawati</h1>
            <p>Situs resmi SMK Negaeri 1 Sukawati</p>
        </div>
        
        <ul class="sidebar-menu" id="sidebarMenu">
            <li>
                <a href="index.php?page=home" id="homeLink">
                    <i class="fas fa-home"></i> HOME
                </a>
            </li>
            <li>
                <a href="index.php?page=guru" id="guruLink">
                    <i class="fas fa-chalkboard-teacher"></i> GURU
                </a>
            </li>
            <li>
                <a href="index.php?page=pegawai" id="pegawaiLink">
                    <i class="fas fa-user-tie"></i> PEGAWAI
                </a>
            </li>
            <li>
                <a href="index.php?page=jurusan" id="jurusanLink">
                    <i class="fas fa-graduation-cap"></i> JURUSAN
                </a>
            </li>
            <li>
                <a href="index.php?page=kelas" id="kelasLink">
                    <i class="fas fa-door-open"></i> KELAS
                </a>
            </li>
            <li>
                <a href="index.php?page=siswa" id="siswaLink">
                    <i class="fas fa-user-graduate"></i> SISWA
                </a>
            </li>
            <li>
                <a href="index.php?page=mpk" id="mpkLink">
                    <i class="fas fa-users"></i> MPK
                </a>
            </li>
            <li>
                <a href="index.php?page=jurnal" id="jurnalLink">
                    <i class="fas fa-book"></i> JURNAL
                </a>
            </li>
            <li>
                <a href="index.php?page=pembayaran" id="pembayaranLink">
                    <i class="fas fa-money-bill-wave"></i> PEMBAYARAN
                </a>
            </li>
            <li>
                <a href="index.php?page=absensi" id="absensiLink">
                    <i class="fas fa-clipboard-check"></i> ABSENSI
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <p>&copy; <?php echo date('Y'); ?> RPL - SMK Negeri 1 Sukawati</p>
        </div>
    </div>
    
    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Top Bar with User Greeting -->

            
            <!-- PHP Content Area -->
            <div class="halaman">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    switch ($page) {
                        case 'home':
                            include "home.php";
                            break;
                        case 'guru':
                            include "guru.php";
                            break;
                        case 'pegawai':
                            include "pegawai.php";
                            break;
                        case 'jurusan':
                            include "jurusan2.php";
                            break;
                        case 'kelas':
                            include "kelas.php";
                            break;
                        case 'siswa':
                            include "siswa.php";
                            break;
                        case 'mpk':
                            include "mpk.php";
                            break;
                        case 'jurnal':
                            include "jurnal.php";
                            break;
                        case 'pembayaran':
                            include "pembayaran.php";
                            break;
                        case 'absensi':
                            include "absensi.php";
                            break;
                        default:
                            echo "<center><h3>Maaf, halaman tidak ditemukan</h3></center>";
                    }
                } else {
                    // Default content shown above
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Function to set active menu item based on current page
        function setActiveMenuItem() {
            // Get current page from URL
            const urlParams = new URLSearchParams(window.location.search);
            const currentPage = urlParams.get('page') || 'home';
            
            // Remove active class from all menu items
            const menuItems = document.querySelectorAll('.sidebar-menu a');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to current page menu item
            const activeMenuItem = document.getElementById(currentPage + 'Link');
            if (activeMenuItem) {
                activeMenuItem.classList.add('active');
            }
            
            // Update page indicator
            const pageTitles = {
                'home': 'Home',
                'guru': 'Data Guru',
                'pegawai': 'Data Pegawai',
                'jurusan': 'Data Jurusan',
                'kelas': 'Data Kelas',
                'siswa': 'Data Siswa',
                'mpk': 'Data MPK',
                'jurnal': 'Jurnal Mengajar',
                'pembayaran': 'Pembayaran',
                'absensi': 'Absensi'
            };
            
            const pageIndicator = document.getElementById('pageIndicator');
            pageIndicator.textContent = `Halaman: ${pageTitles[currentPage] || 'Home'}`;
        }

        // Toggle menu untuk perangkat mobile
        document.getElementById('menuToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
            
            // Mengubah ikon menu
            const icon = this.querySelector('i');
            if (sidebar.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
                this.style.backgroundColor = '#e74c3c';
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
                this.style.backgroundColor = '#3498db';
            }
        });

        // Menutup menu saat item dipilih (untuk perangkat mobile)
        const menuItems = document.querySelectorAll('.sidebar-menu li a');
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    const sidebar = document.getElementById('sidebar');
                    const menuToggle = document.getElementById('menuToggle');
                    const icon = menuToggle.querySelector('i');
                    
                    sidebar.classList.remove('active');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                    menuToggle.style.backgroundColor = '#2760caff';
                }
                
                // Update active menu item after a short delay to allow page load
                setTimeout(setActiveMenuItem, 100);
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menuToggle');
            const icon = menuToggle.querySelector('i');
            
            if (window.innerWidth > 768) {
                sidebar.classList.remove('active');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
                menuToggle.style.backgroundColor = '#3498db';
            }
        });

        // Set active menu item on page load
        document.addEventListener('DOMContentLoaded', function() {
            setActiveMenuItem();
        });
    </script>
</body>
</html>