<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin - SMK Negeri 1 Sukawati</title>
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
        <link rel="stylesheet" href="css_admin/home.css">

    </head>
    <body>
        <div class="dashboard-container">

            <div class="dashboard-container">
                <main class="main-content">
                    <!-- Header -->
                    <header class="header">

                        <div class="sapaan">
                            <h4>Halooo, Aksaraa!
                            </h4>
                            <br>
                            <p>"Selamat datang kembali, aksaraa!. Siap mengatur informasi hari ini?"</p>
                        </div>
                        <div class="header-right">
                            <div class="notification">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">3</span>
                            </div>
                            <div class="user-profile">
                                <div class="user-avatar">A</div>
                                <div class="user-name">Aksaraa</div>
                            </div>
                        </div>

                    </header>

                    <!-- Content -->
                    <div class="content">
                        <div class="page-title">
                            <h1>Dashboard Admin</h1>
                            <div class="breadcrumb">
                                <a href="#">Home</a>
                                /
                                <span>Dashboard</span>
                            </div>
                        </div>

                        <?php
                        // Query untuk mendapatkan jumlah total jurusan
                        include "../koneksi.php";
                    $total_siswa = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM siswa");
                    $total_data1 = mysqli_fetch_assoc($total_siswa);
                    
                     $total_guru = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM guru");
                     $total_data2 = mysqli_fetch_assoc($total_guru);


                    ?>

                        <!-- Stats Cards -->
                        <div class="stats-grid">
                            <div class="stats-card primary">
                                <div class="stats-card-header">
                                    <div>
                                        <div class="stats-card-value"><?php echo $total_data1['total']; ?></div>
                                        <div class="stats-card-title">Total Siswa</div>
                                    </div>
                                    <div class="stats-card-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="stats-grid">
                                <div class="stats-card primary">
                                    <div class="stats-card-header">
                                        <div>
                                            <div class="stats-card-value"><?php echo $total_data2['total']; ?></div>
                                            <div class="stats-card-title">Total Guru</div>
                                        </div>
                                        <div class="stats-card-icon">
                                            <i class="fas fa-book"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Akademik Section -->
                                <div class="dashboard-grid">
                                    <div class="section-card">
                                        <div class="section-header">
                                            <h2>Akademik</h2>
                                            <a href="#" class="view-all">
                                                Lihat Semua
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>

                                        <div class="academic-tabs">
                                            <button class="tab-btn active" data-tab="schedule">Jadwal Pelajaran</button>
                                            <button class="tab-btn" data-tab="subjects">Data Pelajaran</button>
                                        </div>

                                        <div class="tab-content active" id="schedule">
                                            <div class="schedule-grid">
                                                <div class="schedule-item">
                                                    <div class="schedule-time">07:00 - 08:30</div>
                                                    <div class="schedule-subject">Matematika</div>
                                                    <div class="schedule-class">Kelas X - R.301</div>
                                                </div>
                                                <div class="schedule-item">
                                                    <div class="schedule-time">08:40 - 10:10</div>
                                                    <div class="schedule-subject">Bahasa Indonesia</div>
                                                    <div class="schedule-class">Kelas XI - R.205</div>
                                                </div>
                                                <div class="schedule-item">
                                                    <div class="schedule-time">10:30 - 12:00</div>
                                                    <div class="schedule-subject">Pemrograman Web</div>
                                                    <div class="schedule-class">Kelas XII - Lab. Komputer</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content" id="subjects">
                                            <div class="subject-list">
                                                <div class="subject-item">
                                                    <div class="subject-name">Matematika</div>
                                                    <div class="subject-teacher">I Wayan Sutama, S.Pd</div>
                                                </div>
                                                <div class="subject-item">
                                                    <div class="subject-name">Bahasa Indonesia</div>
                                                    <div class="subject-teacher">Ni Made Suryani, S.Pd</div>
                                                </div>
                                                <div class="subject-item">
                                                    <div class="subject-name">Pemrograman Web</div>
                                                    <div class="subject-teacher">I Ketut Wijaya, S.Kom</div>
                                                </div>
                                                <div class="subject-item">
                                                    <div class="subject-name">Basis Data</div>
                                                    <div class="subject-teacher">Putu Adi, S.Kom</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Konten Website Section -->
                                <div class="dashboard-grid">
                                    <div class="section-card">
                                        <div class="section-header">
                                            <h2>Konten Website</h2>
                                            <a href="#" class="view-all">
                                                Lihat Semua
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </div>

                                        <div class="content-tabs">
                                            <button class="tab-btn active" data-tab="articles">Artikel Sekolah</button>
                                            <button class="tab-btn" data-tab="announcements">Pengumuman</button>
                                            <button class="tab-btn" data-tab="agenda">Agenda Kegiatan</button>
                                        </div>

                                        <div class="tab-content active" id="articles">
                                            <div class="article-grid">
                                                <div class="article-card">
                                                    <div class="article-img">
                                                      
                                                    </div>
                                                    <div class="article-content">
                                                        <h3 class="article-title">SMK Negeri 1 Sukawati Raih Penghargaan Sekolah Adiwiyata</h3>
                                                        <p class="article-excerpt">Sekolah kita kembali meraih penghargaan sebagai
                                                            sekolah adiwiyata tingkat nasional...</p>
                                                        <div class="article-meta">
                                                            <span>15 Agustus 2023</span>
                                                            <span>254 Dilihat</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="article-card">
                                                    <div class="article-img">
                                                        
                                                    </div>
                                                    <div class="article-content">
                                                        <h3 class="article-title">Workshop Kewirausahaan untuk Siswa Kelas XII</h3>
                                                        <p class="article-excerpt">Dalam rangka mempersiapkan lulusan yang mandiri,
                                                            sekolah menyelenggarakan workshop kewirausahaan...</p>
                                                        <div class="article-meta">
                                                            <span>10 Agustus 2023</span>
                                                            <span>187 Dilihat</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content" id="announcements">
                                            <ul class="announcement-list">
                                                <li class="announcement-item">
                                                    <h3 class="announcement-title">Pengumuman Pembayaran SPP Bulan September</h3>
                                                    <div class="announcement-date">Diposting: 1 September 2023</div>
                                                </li>
                                                <li class="announcement-item">
                                                    <h3 class="announcement-title">Jadwal Ujian Tengah Semester Ganjil 2023/2024</h3>
                                                    <div class="announcement-date">Diposting: 28 Agustus 2023</div>
                                                </li>
                                                <li class="announcement-item">
                                                    <h3 class="announcement-title">Penerimaan Peserta Didik Baru Tahun 2024</h3>
                                                    <div class="announcement-date">Diposting: 15 Agustus 2023</div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="tab-content" id="agenda">
                                            <ul class="agenda-list">
                                                <li class="agenda-item">
                                                    <div class="agenda-date-box">
                                                        <div class="agenda-day">15</div>
                                                        <div class="agenda-month">SEP</div>
                                                    </div>
                                                    <div class="agenda-content">
                                                        <h3 class="agenda-title">Upacara Bendera Hari Senin</h3>
                                                        <div class="agenda-date">07:00 - Lapangan Upacara</div>
                                                    </div>
                                                </li>
                                                <li class="agenda-item">
                                                    <div class="agenda-date-box">
                                                        <div class="agenda-day">18</div>
                                                        <div class="agenda-month">SEP</div>
                                                    </div>
                                                    <div class="agenda-content">
                                                        <h3 class="agenda-title">Studi Lapangan ke PT. XYZ</h3>
                                                        <div class="agenda-date">08:00 - PT. XYZ, Denpasar</div>
                                                    </div>
                                                </li>
                                                <li class="agenda-item">
                                                    <div class="agenda-date-box">
                                                        <div class="agenda-day">25</div>
                                                        <div class="agenda-month">SEP</div>
                                                    </div>
                                                    <div class="agenda-content">
                                                        <h3 class="agenda-title">Lomba Peringatan Hari Pendidikan Nasional</h3>
                                                        <div class="agenda-date">08:00 - Aula Sekolah</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

                <script>
                    // Toggle sidebar on mobile
                    document
                            .querySelector('.menu-toggle')
                            ?
                            .addEventListener('click', function () {
                                document.querySelector('.sidebar')
                                    ?
                                        .classList
                                        .toggle('open');
                            });

                    // Tab functionality
                    document
                        .querySelectorAll('.tab-btn')
                        .forEach(button => {
                            button.addEventListener('click', (e) => {
                                const tabContainer = e
                                    .target
                                    .closest('.section-card');
                                const tabId = e
                                    .target
                                    .getAttribute('data-tab');

                                if (!tabContainer) 
                                    return;
                                
                                // Deactivate all tabs in this container
                                tabContainer
                                    .querySelectorAll('.tab-btn')
                                    .forEach(btn => {
                                        btn
                                            .classList
                                            .remove('active');
                                    });

                                // Deactivate all tab contents in this container
                                tabContainer
                                    .querySelectorAll('.tab-content')
                                    .forEach(content => {
                                        content
                                            .classList
                                            .remove('active');
                                    });

                                // Activate current tab
                                e
                                    .target
                                    .classList
                                    .add('active');
                                const targetTab = tabContainer.querySelector(`#${tabId}`);
                                if (targetTab) {
                                    targetTab
                                        .classList
                                        .add('active');
                                }
                            });
                        });
                </script>
            </body>
        </html>