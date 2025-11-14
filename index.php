<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMK Negeri 1 Sukawati</title>
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
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Story+Script&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class="hero">
            <nav class="navbar">
                <div class="navbar-container">
                    <a href="index.php" class="navbar-logo">CodeX<span>.</span></a>
                    <div class="navbar-right">
                        <a href="#" class="person">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                        <a href="#login" class="login">Login</a>
                    </div>
                </div>
            </nav>
            <div class="hero-section">
                <div class="logo">
                    <img src="admin/asset/logo_smk1.png" alt="">
                </div>
                <div class="slogan">
                    <p>Welcome To Web Sekolah
                    </p>
                    <h3>SMKN 1 SUKAWATI</h3>
                    <div class="metaksu">Metaksu</div>
                </div>
                <a href="#login">
                    <div class="login2">Login</div>
                </a>
            </div>
            <!-- Overlay -->
            <div class="overlay" id="overlay"></div>
        </div>
        <!--Features Section -->
        <section class="features">
            <div class="contin">
                <div class="section-title">
                    <h2>Sistem Kami</h2>
                    <p>
                        Data - data yang akan di input di Web ini</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-table"></i>
                        </div>
                        <h3>Absensi</h3>
                        <p>Pendataan kehadiran siswa setiap harinya.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <h3>Jurnal Guru</h3>
                        <p>Pendataan kehadiran & materi oleh guru.</p>
                    </div>

                    <div class="spp">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fa-solid fa-money-check-dollar"></i>
                            </div>
                            <h3>Pembayaran SPP</h3>
                            <p>Pendataan setiap siswa yang telah membayar uang komite/SPP.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- About Section -->
        <section class="about">
            <div class="container">
                <div class="about-content">
                    <div class="about-image">
                        <img src="asset/aula.jpg" alt="aula sekolah">

                    </div>
                    <div class="about-text">
                        <h2>Tentang Sekolah</h2>
                        <p>SMK Negeri 1 Sukawati merupakan Sekolah Kejuruan yang satu-satunya di Bali
                            dan Indonesia yang memiliki keunggulan dalam bidang seni rupa dan kerajinan yang
                            berbasis budaya dan sangat relepan dalam mendukung pariwisata di Bali khususnya
                            dan nasional umumnya. Sekolah Seni Rupa Indonesi berdiri pada tanggal 28 januari
                            1967 diresmikan oleh menteri pendidikan dan kebudayaan No SK.0111968 berdasarkan
                            Surat keterangan Nomor 800/1912/Disdikpora berdiri sebuah Sekolah Seni Rupa
                            Indonesia (SSRI ) dengan jurusan Seni Rupa.Pada tahun 1979 menjadi Sekolah
                            Menengah Seni Rupa ( SMSR)Denpasar. Pada tahun 1986 sekolah pindah ke Batubulan
                            ,Sukawati, Gianyar
                        </p>
                        <p></p>
                        <a href="https://smkn1sukawati.sch.id/" class="btn">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
         <!--Features Section -->
        <section id="login" class="features">
            <div class="contin">
                <div class="section-title">
                    <h2 >Login</h2>
                    <p>
                        Silahkan pilih anda akan login sebagai apa </p>
                </div>
                
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-table"></i>
                        </div>
                        <h3>MPK</h3>
                        <p>Bertugas mendataan kehadiran siswa setiap harinya.</p>
                    </div>
                    <a href="guru_xx/login.php">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <h3 >Guru</h3>
                        <p>Mendata materi yang telah di ajarkan.</p>
                    </div>
                    </a>
                    <div class="spp">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fa-solid fa-money-check-dollar"></i>
                            </div>
                            <h3>Pegawai</h3>
                            <p>Mendataan setiap siswa yang telah membayar uang komite/SPP.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </head>
    <body>
        <div class="kami">Tentang Kami</div>
        <div class="container2">
            <input type="radio" name="slider" id="slide-1" checked="checked">
            <input type="radio" name="slider" id="slide-2">
            <input type="radio" name="slider" id="slide-3">
            <input type="radio" name="slider" id="slide-4">

            <div class="slider-container">
                <div class="slider">
                    <div class="slide slide-1"></div>
                    <div class="slide slide-2"></div>
                    <div class="slide slide-3"></div>
                    <div class="slide slide-4"></div>
                </div>

                <!-- Tombol panah -->
                <label for="slide-4" class="arrow arrow-left"></label>
                <label for="slide-2" class="arrow arrow-right"></label>

                <label for="slide-1" class="arrow arrow-left"></label>
                <label for="slide-3" class="arrow arrow-right"></label>

                <label for="slide-2" class="arrow arrow-left"></label>
                <label for="slide-4" class="arrow arrow-right"></label>

                <label for="slide-3" class="arrow arrow-left"></label>
                <label for="slide-1" class="arrow arrow-right"></label>

                <!-- Navigasi dots -->
                <div class="navigation">
                    <label for="slide-1" class="nav-dot"></label>
                    <label for="slide-2" class="nav-dot"></label>
                    <label for="slide-3" class="nav-dot"></label>
                    <label for="slide-4" class="nav-dot"></label>
                </div>
            </div>
            <div class="deskripsi">Website ini dibuat untuk mempermudah dalam penginputan
                dan perekaman data absensi, jurnal dan SPP. Website ini dibuat pada tahun 2025
                oleh siswa-siswi kelas 11 RPL angkatan 2025/2026</div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>CodeX</h3>
                        <p>Solusi digital inovatif untuk membantu mempermudah segala keperluan pendataan.</p>
                        <div class="social-links">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.instagram.com/smkn1.sukawati?igsh=MTVvZXJycDZmc2dubA==">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer-column">
                        <h3>Kontak Kami</h3>
                        <ul class="footer-links">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>Jalan SMKI, Br. Pegambanga, Batubulan, Gianyar Regency, Bali</li>
                            <li>
                                <i class="fas fa-phone"></i>(0361) 298134</li>
                            <li>
                                <i class="fas fa-envelope"></i>smkn1sukawati@gmail.com</li>
                            <li>
                                <i class="fas fa-clock"></i>
                                Senin - Jumat: 7:00 - 4:00</li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; 2025 CodeX. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>