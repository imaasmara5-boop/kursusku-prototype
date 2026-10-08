<?php
session_start();

if (!isset($_SESSION['form_data'])) {
    header('Location: registration.php');
    exit();
}

$data = $_SESSION['form_data'];

$harga_satuan = 300000;
$jumlah_paket = isset($data['paket']) ? (int)$data['paket'] : 1;
$subtotal = $harga_satuan * $jumlah_paket;
$diskon = $subtotal * 0.20;
$total = $subtotal - $diskon;

$minat = isset($data['minat']) ? $data['minat'] : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pendaftaran - Milestone 6</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ede7f6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
        }
        .container {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            max-width: 680px;
            width: 100%;
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
        }
        .milestone-label {
            font-size: 12px;
            font-weight: 700;
            color: #7c3aed;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        h1 {
            font-size: 28px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 24px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 32px;
        }
        .info-card {
            background: #f1f0fb;
            border-radius: 10px;
            padding: 16px;
        }
        .info-card .label {
            font-size: 12px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 4px;
        }
        .info-card .value {
            font-size: 14px;
            color: #555;
        }
        h2 {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 16px;
            margin-top: 28px;
        }
        .cost-table {
            width: 100%;
            border: 1.5px solid #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }
        .cost-row {
            display: flex;
            justify-content: space-between;
            padding: 14px 20px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }
        .cost-row:last-child { border-bottom: none; }
        .cost-row.total {
            background: #f3e8ff;
            font-weight: 700;
            color: #7c3aed;
        }
        .cost-row .cost-label { color: #555; }
        .cost-row.total .cost-label { color: #7c3aed; }
        .minat-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .minat-tag {
            background: #f3e8ff;
            color: #7c3aed;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        .fasilitas-list {
            list-style: none;
            padding: 0;
        }
        .fasilitas-list li {
            font-size: 14px;
            color: #555;
            padding: 4px 0;
            padding-left: 8px;
        }
        .fasilitas-list li::before {
            content: "• ";
            color: #7c3aed;
            font-weight: bold;
        }
        .catatan-text {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
        }
        .btn-row {
            display: flex;
            gap: 12px;
            margin-top: 32px;
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
            background: #7c3aed;
            color: #fff;
            border: none;
        }
        .btn-purple:hover { background: #6d28d9; }
        .btn-outline {
            background: #fff;
            color: #7c3aed;
            border: 1.5px solid #7c3aed;
        }
        .btn-outline:hover { background: #f3e8ff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="milestone-label">Milestone 6 · Ringkasan</div>
        <h1>Pendaftaran Berhasil Diproses</h1>

        <div class="info-grid">
            <div class="info-card"><div class="label">Nama:</div><div class="value"><?= htmlspecialchars($data['nama'] ?? '-') ?></div></div>
            <div class="info-card"><div class="label">Email:</div><div class="value"><?= htmlspecialchars($data['email'] ?? '-') ?></div></div>
            <div class="info-card"><div class="label">Kursus:</div><div class="value"><?= htmlspecialchars($data['kursus'] ?? '-') ?></div></div>
            <div class="info-card"><div class="label">Tipe peserta:</div><div class="value"><?= htmlspecialchars($data['tipe'] ?? '-') ?></div></div>
            <div class="info-card"><div class="label">Metode:</div><div class="value"><?= htmlspecialchars($data['metode'] ?? '-') ?></div></div>
            <div class="info-card"><div class="label">Jumlah paket:</div><div class="value"><?= htmlspecialchars($data['paket'] ?? '1') ?></div></div>
        </div>

        <h2>Rincian Biaya</h2>
        <div class="cost-table">
            <div class="cost-row"><span class="cost-label">Biaya satuan</span><span>Rp <?= number_format($harga_satuan, 0, ',', '.') ?></span></div>
            <div class="cost-row"><span class="cost-label">Subtotal</span><span>Rp <?= number_format($subtotal, 0, ',', '.') ?></span></div>
            <div class="cost-row"><span class="cost-label">Diskon 20%</span><span>-Rp <?= number_format($diskon, 0, ',', '.') ?></span></div>
            <div class="cost-row total"><span class="cost-label">TOTAL AKHIR</span><span>RP <?= number_format($total, 0, ',', '.') ?></span></div>
        </div>

        <h2>Minat</h2>
        <div class="minat-tags">
            <?php if (!empty($minat)): ?>
                <?php foreach ($minat as $m): ?>
                    <span class="minat-tag"><?= htmlspecialchars($m) ?></span>
                <?php endforeach; ?>
            <?php else: ?>
                <span style="color:#999; font-size:14px;">Tidak ada minat yang dipilih</span>
            <?php endif; ?>
        </div>

        <h2>Fasilitas</h2>
        <ul class="fasilitas-list">
            <li>Modul digital</li>
            <li>Sertifikat penyelesaian</li>
            <li>Forum diskusi kelas</li>
        </ul>

        <h2>Catatan</h2>
        <p class="catatan-text"><?= htmlspecialchars($data['catatan'] ?? 'Belajar dari dasar.') ?></p>

        <div class="btn-row">
            <a href="registration.php" class="btn btn-purple">Daftar Lagi</a>
            <a href="history.php" class="btn btn-outline">Lihat History Dummy</a>
            <a href="index.php" class="btn btn-outline">Beranda</a>
        </div>
    </div>
</body>
</html>