<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu - Pemrograman Web III</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f3ff;
            min-height: 100vh;
        }

        /* ===== TOP BAR ===== */
        .top-bar {
            background: #6d28d9;
            padding: 12px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .top-bar .logo-icon {
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
            color: #6d28d9;
        }

        .top-bar .logo-text h2 {
            color: #fff;
            font-size: 18px;
            font-weight: 700;
        }

        .top-bar .logo-text p {
            color: #ddd6fe;
            font-size: 12px;
        }

        .top-bar .milestone-badge {
            background: rgba(255,255,255,0.15);
            color: #fff;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #5b21b6;
            padding: 0 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .nav-links {
            display: flex;
            gap: 4px;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #ddd6fe;
            font-size: 14px;
            font-weight: 500;
            padding: 12px 16px;
            transition: all 0.2s;
        }

        .navbar .nav-links a:hover,
        .navbar .nav-links a.active {
            color: #fff;
            background: rgba(255,255,255,0.1);
        }

        .navbar .btn-estimasi {
            background: #fff;
            color: #6d28d9;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .navbar .btn-estimasi:hover {
            background: #f5f3ff;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 40px;
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .hero-content {
            flex: 1;
        }

        .hero-label {
            font-size: 12px;
            font-weight: 700;
            color: #6d28d9;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 16px;
            color: #555;
            line-height: 1.7;
            margin-bottom: 32px;
            max-width: 500px;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.2s;
            font-family: inherit;
            border: none;
        }

        .btn-purple {
            background: #6d28d9;
            color: #fff;
        }

        .btn-purple:hover {
            background: #5b21b6;
        }

        .btn-outline-purple {
            background: #fff;
            color: #6d28d9;
            border: 2px solid #6d28d9;
        }

        .btn-outline-purple:hover {
            background: #f5f3ff;
        }

        /* ===== HERO ILLUSTRATION ===== */
        .hero-illustration {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .illustration-box {
            background: #ede9fe;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            position: relative;
        }

        .illustration-box .illu-title {
            font-size: 22px;
            font-weight: 800;
            color: #6d28d9;
            margin-bottom: 4px;
        }

        .illustration-box .illu-sub {
            font-size: 12px;
            color: #a78bfa;
            margin-bottom: 24px;
        }

        .illu-screen {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 16px;
        }

        .illu-bar {
            height: 12px;
            background: #6d28d9;
            border-radius: 6px;
            width: 60%;
            margin-bottom: 12px;
        }

        .illu-line {
            height: 8px;
            background: #e0e0e0;
            border-radius: 4px;
            margin-bottom: 8px;
        }

        .illu-line.short { width: 70%; }
        .illu-line.medium { width: 85%; }

        .illu-btn {
            width: 60px;
            height: 24px;
            background: #6d28d9;
            border-radius: 6px;
            margin-top: 12px;
        }

        .illu-people {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
        }

        .person {
            width: 40px;
            height: 40px;
            background: #6d28d9;
            border-radius: 50%;
            position: relative;
        }

        .person::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 20px;
            background: #6d28d9;
            border-radius: 25px 25px 0 0;
        }

        .person.small {
            width: 30px;
            height: 30px;
        }

        .person.small::after {
            width: 38px;
            height: 15px;
        }

        /* ===== STATS BAR ===== */
        .stats-bar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px 40px;
            display: flex;
            gap: 40px;
        }

        .stat-item {
            font-size: 14px;
            color: #555;
        }

        .stat-item strong {
            color: #1a1a2e;
        }

        /* ===== SECTIONS ===== */
        .section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 40px;
        }

        .section-label {
            font-size: 12px;
            font-weight: 700;
            color: #6d28d9;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section h2 {
            font-size: 32px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 16px;
        }

        .section p {
            font-size: 16px;
            color: #555;
            line-height: 1.7;
            max-width: 600px;
        }

        /* ===== KEUNGGULAN ===== */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 32px;
        }

        .feature-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        }

        .feature-card .feature-icon {
            width: 48px;
            height: 48px;
            background: #ede9fe;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .feature-card h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .feature-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        /* ===== KATALOG ===== */
        .katalog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 32px;
        }

        .katalog-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        }

        .katalog-card .card-img {
            height: 140px;
            background: #ede9fe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
        }

        .katalog-card .card-body {
            padding: 20px;
        }

        .katalog-card h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .katalog-card p {
            font-size: 13px;
            color: #666;
            margin-bottom: 12px;
        }

        .katalog-card .price {
            font-size: 14px;
            font-weight: 700;
            color: #6d28d9;
        }

        /* ===== CARA DAFTAR ===== */
        .steps {
            display: flex;
            gap: 24px;
            margin-top: 32px;
        }

        .step {
            flex: 1;
            text-align: center;
            padding: 24px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        }

        .step-number {
            width: 48px;
            height: 48px;
            background: #6d28d9;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            margin: 0 auto 16px;
        }

        .step h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .step p {
            font-size: 13px;
            color: #666;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: #6d28d9;
            color: #fff;
            text-align: center;
            padding: 24px 40px;
            font-size: 14px;
        }

        .footer a {
            color: #ddd6fe;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="logo-area">
            <div class="logo-icon">K</div>
            <div class="logo-text">
                <h2>KursusKu</h2>
                <p>Pemrograman Web III</p>
            </div>
        </div>
        <div class="milestone-badge">Milestone 6</div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-links">
            <a href="#beranda" class="active">Beranda</a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#katalog">Katalog</a>
            <a href="#cara-daftar">Cara Daftar</a>
            <a href="#media">Media</a>
            <a href="#kontak">Kontak</a>
            <a href="form_p5.php">Form P5</a>
            <a href="registration.php">Daftar P6</a>
            <a href="history.php">History</a>
        </div>
        <a href="estimasi.php" class="btn-estimasi">Estimasi Biaya</a>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="hero-content">
            <div class="hero-label">Landing Page KursusKu</div>
            <h1>Belajar Teknologi, Bangun Masa Depan</h1>
            <p>Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan melalui pembelajaran bertahap, latihan terarah, dan proyek nyata.</p>
            <div class="hero-buttons">
                <a href="#katalog" class="btn btn-purple">Lihat Katalog Kursus</a>
                <a href="registration.php" class="btn btn-purple">Daftar Sekarang</a>
                <a href="estimasi.php" class="btn btn-outline-purple">Hitung Estimasi Biaya</a>
            </div>
        </div>
        <div class="hero-illustration">
            <div class="illustration-box">
                <div class="illu-title">KursusKu</div>
                <div class="illu-sub">Belajar • Praktik • Bangun Proyek</div>
                <div class="illu-screen">
                    <div class="illu-bar"></div>
                    <div class="illu-line medium"></div>
                    <div class="illu-line short"></div>
                    <div class="illu-line"></div>
                    <div class="illu-btn"></div>
                </div>
                <div class="illu-people">
                    <div class="person small"></div>
                    <div class="person"></div>
                    <div class="person small"></div>
                    <div class="person"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <div class="stats-bar">
        <div class="stat-item"><strong>6</strong> kursus</div>
        <div class="stat-item"><strong>4</strong> function reusable</div>
        <div class="stat-item"><strong>PHP</strong> server-side</div>
    </div>

    <!-- Keunggulan Section -->
    <section class="section" id="keunggulan">
        <div class="section-label">Keunggulan Kami</div>
        <h2>Mengapa Memilih KursusKu?</h2>
        <p>Kami menyediakan pengalaman belajar terbaik dengan kurikulum terstruktur dan mentor berpengalaman.</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📚</div>
                <h3>Kurikulum Terstruktur</h3>
                <p>Materi disusun bertahap dari dasar hingga mahir dengan proyek nyata.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">‍🏫</div>
                <h3>Mentor Berpengalaman</h3>
                <p>Dibimbing oleh praktisi industri dengan pengalaman lebih dari 5 tahun.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎓</div>
                <h3>Sertifikat Resmi</h3>
                <p>Dapatkan sertifikat yang diakui setelah menyelesaikan kursus.</p>
            </div>
        </div>
    </section>

    <!-- Katalog Section -->
    <section class="section" id="katalog">
        <div class="section-label">Katalog Kursus</div>
        <h2>Pilih Kursus Favoritmu</h2>
        <p>Berbagai pilihan kursus teknologi yang siap meningkatkan skill kamu.</p>
        <div class="katalog-grid">
            <div class="katalog-card">
                <div class="card-img">🌐</div>
                <div class="card-body">
                    <h3>Web Dasar</h3>
                    <p>HTML, CSS, dan JavaScript untuk pemula.</p>
                    <div class="price">Rp 300.000</div>
                </div>
            </div>
            <div class="katalog-card">
                <div class="card-img">💻</div>
                <div class="card-body">
                    <h3>Web Lanjut</h3>
                    <p>PHP, MySQL, dan framework modern.</p>
                    <div class="price">Rp 350.000</div>
                </div>
            </div>
            <div class="katalog-card">
                <div class="card-img"></div>
                <div class="card-body">
                    <h3>Mobile App</h3>
                    <p>Flutter dan React Native untuk mobile.</p>
                    <div class="price">Rp 400.000</div>
                </div>
            </div>
            <div class="katalog-card">
                <div class="card-img">📊</div>
                <div class="card-body">
                    <h3>Data Science</h3>
                    <p>Python, analisis data, dan machine learning.</p>
                    <div class="price">Rp 450.000</div>
                </div>
            </div>
            <div class="katalog-card">
                <div class="card-img"></div>
                <div class="card-body">
                    <h3>UI/UX Design</h3>
                    <p>Figma, wireframe, dan prototyping.</p>
                    <div class="price">Rp 320.000</div>
                </div>
            </div>
            <div class="katalog-card">
                <div class="card-img">🗄️</div>
                <div class="card-body">
                    <h3>Database</h3>
                    <p>MySQL, PostgreSQL, dan NoSQL.</p>
                    <div class="price">Rp 280.000</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Daftar Section -->
    <section class="section" id="cara-daftar">
        <div class="section-label">Cara Daftar</div>
        <h2>3 Langkah Mudah</h2>
        <p>Proses pendaftaran yang simpel dan cepat.</p>
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Isi Form</h3>
                <p>Lengkapi data diri dan pilih kursus yang diinginkan.</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Proses Data</h3>
                <p>Data diproses secara otomatis oleh sistem PHP.</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Selesai</h3>
                <p>Lihat ringkasan pendaftaran dan mulai belajar.</p>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="section" id="kontak">
        <div class="section-label">Kontak</div>
        <h2>Hubungi Kami</h2>
        <p>Punya pertanyaan? Jangan ragu untuk menghubungi kami.</p>
        <div style="margin-top: 24px; font-size: 15px; color: #555; line-height: 2;">
            <p>📧 Email: info@kursusku.com</p>
            <p>📞 Telepon: (021) 1234-5678</p>
            <p>📍 Alamat: Jl. Teknologi No. 1, Jakarta</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 KursusKu - Pemrograman Web III | <a href="registration.php">Daftar Sekarang</a></p>
    </footer>

</body>
</html>