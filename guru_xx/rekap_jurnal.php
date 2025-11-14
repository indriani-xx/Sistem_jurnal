<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rekapan Jurnal Guru - SMK Negeri 1 Sukawati</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin="crossorigin">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Story+Script&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="css/rekap_jurnal.css">
    </head>
    <body>
        <!-- Header -->
        <header id="header">
            <div class="container header-container">
                <a href="index.html" class="logo">CodeX<span>.</span></a>
                <div class="user-info">
                    <span>Admin</span>
                    <img
                        src="https://ui-avatars.com/api/?name=Admin&background=4e73df&color=fff"
                        alt="Profile Admin">
                </div>
            </div>
        </header>

        <div class="container">
            <!-- Navigation Tabs -->
            <div class="nav-tabs">
                <div class="nav-tab active">Rekapan Jurnal</div>
                <div class="nav-tab" onclick="location.href='jurnal_guru.php'">Input Jurnal</div>
            </div>

            <!-- Teacher Selection -->
            <div class="teacher-selection">
                <h2 class="selection-title">Pilih Guru untuk Melihat Rekapan Jurnal</h2>
                <div class="selection-form">
                    <div class="selection-group">
                        <label for="guru">Nama Guru</label>
                        <select class="selection-control" id="guru">
                            <option value="">-- Pilih Guru --</option>
                            <option value="1">I Wayan Sutarya, S.Pd</option>
                            <option value="2">Ni Made Suryati, M.Pd</option>
                            <option value="3">I Ketut Wijaya, S.Pd</option>
                            <option value="4">Ni Komang Sri Lestari, S.Pd</option>
                            <option value="5">I Gede Adi Putra, M.Pd</option>
                        </select>
                    </div>

                    <div class="selection-group">
                        <label for="tahun-ajaran">Tahun Ajaran</label>
                        <select class="selection-control" id="tahun-ajaran">
                            <option value="2023/2024">2023/2024</option>
                            <option value="2022/2023">2022/2023</option>
                            <option value="2021/2022">2021/2022</option>
                        </select>
                    </div>

                    <div class="selection-group">
                        <button class="btn btn-primary" id="lihat-jurnal-btn" style="width: 100%">
                            <i class="fas fa-eye"></i>
                            Lihat Jurnal
                        </button>
                    </div>
                </div>
            </div>

            <!-- Teacher Info -->
            <div class="teacher-info" id="teacher-info">
                <div class="teacher-details">
                    <h2 id="teacher-name">Nama Guru</h2>
                    <p id="teacher-subject">Mata Pelajaran</p>
                </div>
                <div class="academic-year" id="academic-year">
                    Tahun Ajaran: 2023/2024
                </div>
            </div>

            <!-- Filter Section -->
            <div class="filter-section" id="filter-section">
                <h3 class="filter-title">Filter Jurnal</h3>
                <div class="filter-form">
                    <div class="filter-group">
                        <label for="bulan">Bulan</label>
                        <select class="filter-control" id="bulan">
                            <option value="">Semua Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="kelas">Kelas</label>
                        <select class="filter-control" id="kelas">
                            <option value="">Semua Kelas</option>
                            <option value="X RPL 1">X RPL 1</option>
                            <option value="X RPL 2">X RPL 2</option>
                            <option value="XI RPL 1">XI RPL 1</option>
                            <option value="XI RPL 2">XI RPL 2</option>
                            <option value="XII RPL 1">XII RPL 1</option>
                            <option value="XII RPL 2">XII RPL 2</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <button class="btn btn-primary" style="width: 100%">
                            <i class="fas fa-filter"></i>
                            Terapkan Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="summary-cards" id="summary-cards">
                <div class="summary-card">
                    <i class="fas fa-book-open"></i>
                    <h3>24</h3>
                    <p>Total Jurnal</p>
                </div>

                <div class="summary-card">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h3>6</h3>
                    <p>Kelas Diajar</p>
                </div>

                <div class="summary-card">
                    <i class="fas fa-calendar-check"></i>
                    <h3>85%</h3>
                    <p>Kehadiran</p>
                </div>

                <div class="summary-card">
                    <i class="fas fa-clock"></i>
                    <h3>96</h3>
                    <p>Jam Mengajar</p>
                </div>
            </div>

            <!-- Journal Table -->
            <div class="journal-table-container" id="journal-table">
                <table class="journal-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kelas</th>
                            <th>Materi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12/03/2024</td>
                            <td>X RPL 1</td>
                            <td class="materi-cell">Aljabar Linear: Matriks dan Operasinya</td>
                            <td>Pelajaran berjalan lancar, siswa antusias</td>
                            <td class="action-cell">
                                <button class="action-btn view-btn" onclick="openModal(0)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>11/03/2024</td>
                            <td>XI RPL 2</td>
                            <td class="materi-cell">Trigonometri: Fungsi Sinus dan Cosinus</td>
                            <td>Ada beberapa siswa yang kurang memahami</td>
                            <td class="action-cell">
                                <button class="action-btn view-btn" onclick="openModal(1)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>10/03/2024</td>
                            <td>X RPL 2</td>
                            <td class="materi-cell">Persamaan Kuadrat dan Pemfaktoran</td>
                            <td>Memberikan tugas kelompok</td>
                            <td class="action-cell">
                                <button class="action-btn view-btn" onclick="openModal(2)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>07/03/2024</td>
                            <td>XII RPL 1</td>
                            <td class="materi-cell">Statistika: Mean, Median, Modus</td>
                            <td>Mengadakan kuis singkat</td>
                            <td class="action-cell">
                                <button class="action-btn view-btn" onclick="openModal(3)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>05/03/2024</td>
                            <td>XI RPL 1</td>
                            <td class="materi-cell">Geometri: Bangun Ruang dan Sifat-sifatnya</td>
                            <td>Menggunakan media pembelajaran interaktif</td>
                            <td class="action-cell">
                                <button class="action-btn view-btn" onclick="openModal(4)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <div class="pagination-btn">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="pagination-btn active">1</div>
                <div class="pagination-btn">2</div>
                <div class="pagination-btn">3</div>
                <div class="pagination-btn">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="detailModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Detail Jurnal Mengajar</h3>
                    <button class="close-btn" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="modal-detail">
                        <label>Guru</label>
                        <p id="modal-guru">I Wayan Sutarya, S.Pd - Matematika</p>
                    </div>

                    <div class="modal-detail">
                        <label>Tanggal Mengajar</label>
                        <p id="modal-tanggal">12/03/2024</p>
                    </div>

                    <div class="modal-detail">
                        <label>Kelas</label>
                        <p id="modal-kelas">X RPL 1</p>
                    </div>

                    <div class="modal-detail">
                        <label>Materi yang Diajarkan</label>
                        <p id="modal-materi">Aljabar Linear: Matriks dan Operasinya. Penjelasan mengenai
                            pengertian matriks, jenis-jenis matriks, operasi penjumlahan dan pengurangan
                            matriks, serta perkalian matriks dengan skalar.</p>
                    </div>

                    <div class="modal-detail">
                        <label>Keterangan</label>
                        <p id="modal-keterangan">Pelajaran berjalan lancar, siswa antusias. Beberapa
                            siswa sudah memahami konsep dengan baik dan dapat membantu teman yang masih
                            kesulitan. Di akhir sesi diberikan latihan soal untuk menguji pemahaman.</p>
                    </div>
                </div>
            </div>
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
                                <i class="fas fa-map-marker-alt"></i>Jalan SMKI, Br. Pegambanga, Batubulan, Gianyar Regency, Bali
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>(0361) 298134
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>smkn1sukawati@gmail.com
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>Senin - Jumat: 7:00 - 4:00
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; 2025 CodeX. All Rights Reserved.</p>
                </div>
            </div>
        </footer>

        <script>
            // Data guru
            const teachers = {
                "1": {
                    name: "I Wayan Sutarya, S.Pd",
                    subject: "Matematika"
                },
                "2": {
                    name: "Ni Made Suryati, M.Pd",
                    subject: "Bahasa Indonesia"
                },
                "3": {
                    name: "I Ketut Wijaya, S.Pd",
                    subject: "IPA"
                },
                "4": {
                    name: "Ni Komang Sri Lestari, S.Pd",
                    subject: "Bahasa Inggris"
                },
                "5": {
                    name: "I Gede Adi Putra, M.Pd",
                    subject: "Sejarah"
                }
            };

            // Sample data for the modal
            const journalData = [
                {
                    guru: "I Wayan Sutarya, S.Pd - Matematika",
                    tanggal: "12/03/2024",
                    kelas: "X RPL 1",
                    materi: "Aljabar Linear: Matriks dan Operasinya. Penjelasan mengenai pengertian matriks" +
                            ", jenis-jenis matriks, operasi penjumlahan dan pengurangan matriks, serta perk" +
                            "alian matriks dengan skalar.",
                    keterangan: "Pelajaran berjalan lancar, siswa antusias. Beberapa siswa sudah memahami konse" +
                            "p dengan baik dan dapat membantu teman yang masih kesulitan. Di akhir sesi dib" +
                            "erikan latihan soal untuk menguji pemahaman."
                }, {
                    guru: "I Wayan Sutarya, S.Pd - Matematika",
                    tanggal: "11/03/2024",
                    kelas: "XI RPL 2",
                    materi: "Trigonometri: Fungsi Sinus dan Cosinus. Pembahasan mengenai definisi fungsi tr" +
                            "igonometri, grafik fungsi sinus dan cosinus, serta aplikasinya dalam menyelesa" +
                            "ikan masalah segitiga.",
                    keterangan: "Ada beberapa siswa yang kurang memahami konsep dasar trigonometri. Diperlukan " +
                            "pendekatan individual untuk menjelaskan kembali materi prasyarat. Akan diadaka" +
                            "n remedial untuk siswa yang masih kesulitan."
                }, {
                    guru: "I Wayan Sutarya, S.Pd - Matematika",
                    tanggal: "10/03/2024",
                    kelas: "X RPL 2",
                    materi: "Persamaan Kuadrat dan Pemfaktoran. Materi meliputi bentuk umum persamaan kuadr" +
                            "at, metode pemfaktoran, melengkapkan kuadrat sempurna, dan rumus ABC.",
                    keterangan: "Memberikan tugas kelompok untuk menyelesaikan masalah kontekstual yang melibat" +
                            "kan persamaan kuadrat. Siswa terlihat antusias bekerja dalam kelompok. Present" +
                            "asi hasil kerja kelompok akan dilaksanakan pertemuan berikutnya."
                }, {
                    guru: "I Wayan Sutarya, S.Pd - Matematika",
                    tanggal: "07/03/2024",
                    kelas: "XII RPL 1",
                    materi: "Statistika: Mean, Median, Modus. Pembahasan mengenai ukuran pemusatan data, ba" +
                            "ik untuk data tunggal maupun data kelompok. Contoh penerapan dalam analisis da" +
                            "ta sederhana.",
                    keterangan: "Mengadakan kuis singkat untuk mengukur pemahaman siswa. Hasil kuis menunjukkan" +
                            " bahwa sebagian besar siswa sudah memahami konsep dengan baik. Beberapa siswa " +
                            "perlu bimbingan lebih lanjut dalam menerapkan rumus pada data kelompok."
                }, {
                    guru: "I Wayan Sutarya, S.Pd - Matematika",
                    tanggal: "05/03/2024",
                    kelas: "XI RPL 1",
                    materi: "Geometri: Bangun Ruang dan Sifat-sifatnya. Pembelajaran mengenai kubus, balok," +
                            " prisma, limas, kerucut, dan bola. Fokus pada sifat-sifat, jarak, dan volume b" +
                            "angun ruang.",
                    keterangan: "Menggunakan media pembelajaran interaktif berupa model 3D bangun ruang. Siswa " +
                            "sangat tertarik dan dapat memvisualisasikan dengan baik. Diadakan diskusi kelo" +
                            "mpok untuk memecahkan masalah terkait volume dan luas permukaan."
                }
            ];

            // Function to show teacher journal
            function showTeacherJournal() {
                const teacherId = document
                    .getElementById('guru')
                    .value;
                const academicYear = document
                    .getElementById('tahun-ajaran')
                    .value;

                if (!teacherId) {
                    alert('Silakan pilih guru terlebih dahulu');
                    return;
                }

                const teacher = teachers[teacherId];

                // Update teacher info
                document
                    .getElementById('teacher-name')
                    .textContent = teacher.name;
                document
                    .getElementById('teacher-subject')
                    .textContent = teacher.subject;
                document
                    .getElementById('academic-year')
                    .textContent = `Tahun Ajaran: ${academicYear}`;

                // Show sections
                document
                    .getElementById('teacher-info')
                    .classList
                    .add('active');
                document
                    .getElementById('filter-section')
                    .classList
                    .add('active');
                document
                    .getElementById('summary-cards')
                    .classList
                    .add('active');
                document
                    .getElementById('journal-table')
                    .classList
                    .add('active');
                document
                    .getElementById('pagination')
                    .classList
                    .add('active');
            }

            // Function to open modal with journal details
            function openModal(index) {
                const data = journalData[index];
                document
                    .getElementById('modal-guru')
                    .textContent = data.guru;
                document
                    .getElementById('modal-tanggal')
                    .textContent = data.tanggal;
                document
                    .getElementById('modal-kelas')
                    .textContent = data.kelas;
                document
                    .getElementById('modal-materi')
                    .textContent = data.materi;
                document
                    .getElementById('modal-keterangan')
                    .textContent = data.keterangan;

                document
                    .getElementById('detailModal')
                    .style
                    .display = 'flex';
            }

            // Function to close modal
            function closeModal() {
                document
                    .getElementById('detailModal')
                    .style
                    .display = 'none';
            }

            // Close modal when clicking outside of it
            window.onclick = function (event) {
                const modal = document.getElementById('detailModal');
                if (event.target === modal) {
                    closeModal();
                }
            };

            // Set current month as default filter value
            document.addEventListener('DOMContentLoaded', function () {
                const now = new Date();
                const currentMonth = now.getMonth() + 1;

                document
                    .getElementById('bulan')
                    .value = currentMonth;

                // Add event listener to the button
                document
                    .getElementById('lihat-jurnal-btn')
                    .addEventListener('click', showTeacherJournal);
            });
        </script>
    </body>
</html>