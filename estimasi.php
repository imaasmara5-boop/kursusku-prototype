<?php
session_start();

// Data kursus
$kursus_list = [
    'Web Dasar' => 300000,
    'Web Lanjut' => 350000,
    'Mobile App' => 400000,
    'Data Science' => 450000,
    'UI/UX Design' => 320000,
    'Database' => 280000,
];

// Diskon berdasarkan jenis peserta
$diskon_map = [
    'Mahasiswa' => 10,
    'Guru' => 15,
    'Umum' => 0,
];

$hasil = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kursus = $_POST['kursus'] ?? '';
    $jumlah_paket = (int)($_POST['jumlah_paket'] ?? 1);
    $jenis = $_POST['jenis'] ?? 'Umum';
    $metode = $_POST['metode'] ?? 'Online';

    $harga_satuan = $kursus_list[$kursus] ?? 0;
    $diskon_persen = $diskon_map[$jenis] ?? 0;

    // Bonus diskon jika pilih online
    $bonus_diskon = ($metode === 'Online') ? 5 : 0;
    $total_diskon_persen = $diskon_persen + $bonus_diskon;

    $subtotal = $harga_satuan * $jumlah_paket;
    $jumlah_diskon = $subtotal * ($total_diskon_persen / 100);
    $total = $subtotal - $jumlah_diskon;

    $hasil = [
        'kursus' => $kursus,
        'harga_satuan' => $harga_satuan,
        'jumlah_paket' => $jumlah_paket,
        'jenis' => $jenis,
        'metode' => $metode,
        'diskon_persen' => $total_diskon_persen,
        'subtotal' => $subtotal,
        'jumlah_diskon' => $jumlah_diskon,
        'total' => $total,
    ];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estimasi Biaya - KursusKu</title>
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

        .navbar .nav-links a:hover {
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
        }

        /* ===== CONTENT ===== */
        .content {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }

        .sub-title {
            font-size: 13px;
            font-weight: 700;
            color: #6d28d9;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        h1 {
            font-size: 32px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 12px;
        }

        .subtitle {
            font-size: 15px;
            color: #666;
            margin-bottom: 32px;
        }

        /* ===== FORM CARD ===== */
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: #333;
            background: #fff;
            transition: border-color 0.2s;
        }

        .form-group select:focus {
            outline: none;
            border-color: #6d28d9;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            color: #555;
            cursor: pointer;
            font-weight: 500;
        }

        .radio-group input {
            accent-color: #6d28d9;
            width: 16px;
            height: 16px;
        }

        .btn-calculate {
            width: 100%;
            padding: 14px;
            background: #6d28d9;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
            font-family: inherit;
            margin-top: 8px;
        }

        .btn-calculate:hover {
            background: #5b21b6;
        }

        /* ===== HASIL ===== */
        .hasil-card {
            background: #fff;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            border-left: 5px solid #6d28d9;
        }

        .hasil-card h2 {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 20px;
        }

        .hasil-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 15px;
        }

        .hasil-row:last-child {
            border-bottom: none;
        }

        .hasil-row .label {
            color: #555;
        }

        .hasil-row .value {
            font-weight: 600;
            color: #1a1a2e;
        }

        .hasil-row.total {
            background: #f3e8ff;
            margin: 16px -32px -32px;
            padding: 20px 32px;
            border-radius: 0 0 16px 16px;
            border-bottom: none;
        }

        .hasil-row.total .label {
            font-weight: 700;
            color: #6d28d9;
            font-size: 16px;
        }

        .hasil-row.total .value {
            font-weight: 800;
            color: #6d28d9;
            font-size: 18px;
        }

        .info-note {
            background: #f3e8ff;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            color: #6d28d9;
            margin-top: 16px;
            line-height: 1.6;
        }

        /* ===== BUTTONS ===== */
        .btn-row {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.2s;
            font-family: inherit;
        }

        .btn-purple {
            background: #6d28d9;
            color: #fff;
            border: none;
        }

        .btn-purple:hover { background: #5b21b6; }

        .btn-outline {
            background: #fff;
            color: #6d28d9;
            border: 1.5px solid #6d28d9;
        }

        .btn-outline:hover { background: #f3e8ff; }
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
            <a href="index.php">Beranda</a>
            <a href="index.php#keunggulan">Keunggulan</a>
            <a href="index.php#katalog">Katalog</a>
            <a href="index.php#cara-daftar">Cara Daftar</a>
            <a href="index.php#kontak">Kontak</a>
            <a href="registration.php">Daftar P6</a>
            <a href="history.php">History</a>
        </div>
        <a href="estimasi.php" class="btn-estimasi">Estimasi Biaya</a>
    </nav>

    <!-- Content -->
    <div class="content">
        <div class="sub-title">Milestone 6 · Estimasi Biaya</div>
        <h1>Hitung Estimasi Biaya Kursus</h1>
        <p class="subtitle">Pilih kursus dan preferensi kamu untuk melihat estimasi biaya secara real-time.</p>

        <!-- Form Estimasi -->
        <div class="card">
            <form method="POST" action="estimasi.php">
                <div class="form-group">
                    <label for="kursus">Pilih Kursus</label>
                    <select id="kursus" name="kursus" required>
                        <option value="">-- Pilih Kursus --</option>
                        <?php foreach ($kursus_list as $nama => $harga): ?>
                            <option value="<?= $nama ?>" <?= (isset($_POST['kursus']) && $_POST['kursus'] === $nama) ? 'selected' : '' ?>>
                                <?= $nama ?> - Rp <?= number_format($harga, 0, ',', '.') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="jumlah_paket">Jumlah Paket</label>
                        <select id="jumlah_paket" name="jumlah_paket" required>
                            <option value="1" <?= (isset($_POST['jumlah_paket']) && $_POST['jumlah_paket'] == 1) ? 'selected' : '' ?>>1 Paket</option>
                            <option value="2" <?= (isset($_POST['jumlah_paket']) && $_POST['jumlah_paket'] == 2) ? 'selected' : '' ?>>2 Paket</option>
                            <option value="3" <?= (isset($_POST['jumlah_paket']) && $_POST['jumlah_paket'] == 3) ? 'selected' : '' ?>>3 Paket</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="metode">Metode Belajar</label>
                        <select id="metode" name="metode" required>
                            <option value="Online" <?= (isset($_POST['metode']) && $_POST['metode'] === 'Online') ? 'selected' : '' ?>>Online (Diskon +5%)</option>
                            <option value="Tatap Muka" <?= (isset($_POST['metode']) && $_POST['metode'] === 'Tatap Muka') ? 'selected' : '' ?>>Tatap Muka</option>
                            <option value="Hybrid" <?= (isset($_POST['metode']) && $_POST['metode'] === 'Hybrid') ? 'selected' : '' ?>>Hybrid</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jenis Peserta</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis" value="Mahasiswa" <?= (isset($_POST['jenis']) && $_POST['jenis'] === 'Mahasiswa') ? 'checked' : '' ?>> Mahasiswa (Diskon 10%)</label>
                        <label><input type="radio" name="jenis" value="Guru" <?= (isset($_POST['jenis']) && $_POST['jenis'] === 'Guru') ? 'checked' : '' ?>> Guru (Diskon 15%)</label>
                        <label><input type="radio" name="jenis" value="Umum" <?= (!isset($_POST['jenis']) || $_POST['jenis'] === 'Umum') ? 'checked' : '' ?>> Umum</label>
                    </div>
                </div>

                <button type="submit" class="btn-calculate">Hitung Estimasi</button>
            </form>
        </div>

        <!-- Hasil Estimasi -->
        <?php if ($hasil): ?>
        <div class="hasil-card">
            <h2>Hasil Estimasi Biaya</h2>

            <div class="hasil-row">
                <span class="label">Kursus</span>
                <span class="value"><?= htmlspecialchars($hasil['kursus']) ?></span>
            </div>
            <div class="hasil-row">
                <span class="label">Harga Satuan</span>
                <span class="value">Rp <?= number_format($hasil['harga_satuan'], 0, ',', '.') ?></span>
            </div>
            <div class="hasil-row">
                <span class="label">Jumlah Paket</span>
                <span class="value"><?= $hasil['jumlah_paket'] ?></span>
            </div>
            <div class="hasil-row">
                <span class="label">Metode Belajar</span>
                <span class="value"><?= htmlspecialchars($hasil['metode']) ?></span>
            </div>
            <div class="hasil-row">
                <span class="label">Jenis Peserta</span>
                <span class="value"><?= htmlspecialchars($hasil['jenis']) ?></span>
            </div>
            <div class="hasil-row">
                <span class="label">Subtotal</span>
                <span class="value">Rp <?= number_format($hasil['subtotal'], 0, ',', '.') ?></span>
            </div>
            <div class="hasil-row">
                <span class="label">Diskon (<?= $hasil['diskon_persen'] ?>%)</span>
                <span class="value">-Rp <?= number_format($hasil['jumlah_diskon'], 0, ',', '.') ?></span>
            </div>
            <div class="hasil-row total">
                <span class="label">TOTAL ESTIMASI</span>
                <span class="value">Rp <?= number_format($hasil['total'], 0, ',', '.') ?></span>
            </div>

            <div class="info-note">
                💡 <strong>Catatan:</strong> Estimasi ini bersifat perkiraan. Harga final dapat berbeda tergantung promo dan kebijakan terbaru. 
                <?php if ($hasil['metode'] === 'Online'): ?>
                    Kamu mendapat bonus diskon 5% untuk metode Online!
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Buttons -->
        <div class="btn-row">
            <a href="registration.php" class="btn btn-purple">Daftar Sekarang</a>
            <a href="index.php" class="btn btn-outline">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>