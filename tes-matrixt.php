<?php

$testMatrix = [
    // Skenario Normal - Mahasiswa
    ["Mahasiswa + Web Dasar + 1 paket", "Rp 240.000", "Rp 240.000", "PASS"],
    ["Mahasiswa + PHP Dasar + 1 paket", "Rp 320.000", "Rp 320.000", "PASS"],
    ["Mahasiswa + Laravel Dasar + 1 paket", "Rp 400.000", "Rp 400.000", "PASS"],
    ["Mahasiswa + Database + 1 paket", "Rp 280.000", "Rp 280.000", "PASS"],
    ["Mahasiswa + UI/UX Design + 1 paket", "Rp 360.000", "Rp 360.000", "PASS"],
    
    // Skenario Normal - Guru
    ["Guru + Web Dasar + 1 paket", "Rp 270.000", "Rp 270.000", "PASS"],
    ["Guru + PHP Dasar + 1 paket", "Rp 360.000", "Rp 360.000", "PASS"],
    ["Guru + Laravel Dasar + 1 paket", "Rp 450.000", "Rp 450.000", "PASS"],
    ["Guru + Database + 1 paket", "Rp 315.000", "Rp 315.000", "PASS"],
    ["Guru + UI/UX Design + 1 paket", "Rp 405.000", "Rp 405.000", "PASS"],
    
    // Skenario Normal - Umum
    ["Umum + Web Dasar + 1 paket", "Rp 300.000", "Rp 300.000", "PASS"],
    ["Umum + PHP Dasar + 1 paket", "Rp 400.000", "Rp 400.000", "PASS"],
    ["Umum + Laravel Dasar + 1 paket", "Rp 500.000", "Rp 500.000", "PASS"],
    ["Umum + Database + 1 paket", "Rp 350.000", "Rp 350.000", "PASS"],
    ["Umum + UI/UX Design + 1 paket", "Rp 450.000", "Rp 450.000", "PASS"],
    
    // Skenario Multi Paket
    ["Mahasiswa + Web Dasar + 2 paket", "Rp 480.000", "Rp 480.000", "PASS"],
    ["Guru + PHP Dasar + 2 paket", "Rp 720.000", "Rp 720.000", "PASS"],
    ["Umum + Laravel Dasar + 2 paket", "Rp 1.000.000", "Rp 1.000.000", "PASS"],
    ["Mahasiswa + Database + 3 paket", "Rp 840.000", "Rp 840.000", "PASS"],
    ["Guru + UI/UX Design + 3 paket", "Rp 1.215.000", "Rp 1.215.000", "PASS"],
    
    // Skenario dengan Diskon Tambahan
    ["Mahasiswa + Web Dasar + 1 paket + Diskon Early Bird", "Rp 216.000", "Rp 216.000", "PASS"],
    ["Guru + Laravel Dasar + 2 paket + Diskon Group", "Rp 810.000", "Rp 810.000", "PASS"],
    ["Umum + PHP Dasar + 1 paket + Diskon Referral", "Rp 360.000", "Rp 360.000", "PASS"],
    
    // Skenario Validasi Error
    ["Nama kosong", "Muncul error: Nama harus diisi", "Muncul error: Nama harus diisi", "PASS"],
    ["Email tidak valid", "Muncul error: Format email salah", "Muncul error: Format email salah", "PASS"],
    ["Kursus tidak dipilih", "Muncul error: Pilih kursus terlebih dahulu", "Muncul error: Pilih kursus terlebih dahulu", "PASS"],
    ["Jumlah paket 0", "Muncul error: Paket minimal 1", "Muncul error: Paket minimal 1", "PASS"],
    ["Jumlah paket negatif", "Muncul error: Paket tidak valid", "Muncul error: Paket tidak valid", "PASS"]
];

$total = count($testMatrix);
$pass = count(array_filter($testMatrix, fn($t) => $t[3] === 'PASS'));
$fail = $total - $pass;
$persen = round(($pass / $total) * 100);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Matrix Pertemuan 6</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #f0e6ff 0%, #e9d5ff 100%);
            min-height: 100vh;
            padding: 30px 20px;
            color: #1e1b4b;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: linear-gradient(135deg, #7c3aed 0%, #5b21b6 100%);
            color: white;
            padding: 30px 35px;
            border-radius: 16px;
            margin-bottom: 24px;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
        }

        .header .subtitle {
            font-size: 12px;
            letter-spacing: 2px;
            opacity: 0.9;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 800;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.08);
            border-left: 4px solid #7c3aed;
        }

        .stat-card .stat-label {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-card .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: #5b21b6;
        }

        .stat-card.pass { border-left-color: #10b981; }
        .stat-card.pass .stat-value { color: #10b981; }

        .stat-card.fail { border-left-color: #ef4444; }
        .stat-card.fail .stat-value { color: #ef4444; }

        .progress-box {
            background: white;
            border-radius: 14px;
            padding: 22px 26px;
            margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.08);
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .progress-bar {
            height: 12px;
            background: #f3e8ff;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #7c3aed, #a78bfa);
            border-radius: 20px;
            transition: width 0.5s;
        }

        .filter-row {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 8px 18px;
            border-radius: 20px;
            border: 2px solid #e9d5ff;
            background: white;
            color: #5b21b6;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-btn:hover, .filter-btn.active {
            background: #7c3aed;
            color: white;
            border-color: #7c3aed;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 16px;
        }

        .test-card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.08);
            border: 1.5px solid #f3e8ff;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .test-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.15);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .card-number {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #7c3aed, #a78bfa);
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 16px;
        }

        .status-badge {
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .status-badge.pass {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.fail {
            background: #fee2e2;
            color: #991b1b;
        }

        .card-scenario {
            font-size: 15px;
            font-weight: 700;
            color: #1e1b4b;
            margin-bottom: 14px;
            line-height: 1.4;
        }

        .card-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            padding-top: 14px;
            border-top: 1px dashed #e9d5ff;
        }

        .detail-item .detail-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #7c3aed;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .detail-item .detail-value {
            font-size: 13px;
            color: #374151;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .cards-grid { grid-template-columns: 1fr; }
            .header h1 { font-size: 24px; }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div class="subtitle">EVIDENCE WEEK 06</div>
        <h1>Test Matrix Pertemuan 6</h1>
    </div>

    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label">Total Test</div>
            <div class="stat-value"><?= $total ?></div>
        </div>
        <div class="stat-card pass">
            <div class="stat-label">Pass</div>
            <div class="stat-value"><?= $pass ?></div>
        </div>
        <div class="stat-card fail">
            <div class="stat-label">Fail</div>
            <div class="stat-value"><?= $fail ?></div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Success Rate</div>
            <div class="stat-value"><?= $persen ?>%</div>
        </div>
    </div>

    <div class="progress-box">
        <div class="progress-header">
            <span>Overall Progress</span>
            <span><?= $pass ?> / <?= $total ?> Passed</span>
        </div>
        <div class="progress-bar">
            <div class="progress-fill" style="width: <?= $persen ?>%"></div>
        </div>
    </div>

    <div class="filter-row">
        <button class="filter-btn active" onclick="filterCards('all', this)">Semua (<?= $total ?>)</button>
        <button class="filter-btn" onclick="filterCards('pass', this)">Pass (<?= $pass ?>)</button>
        <button class="filter-btn" onclick="filterCards('fail', this)">Fail (<?= $fail ?>)</button>
    </div>

    <div class="cards-grid" id="cardsGrid">
        <?php foreach ($testMatrix as $index => $data): ?>
            <div class="test-card" data-status="<?= strtolower($data[3]) ?>">
                <div class="card-header">
                    <div class="card-number"><?= $index + 1 ?></div>
                    <span class="status-badge <?= strtolower($data[3]) ?>"><?= $data[3] ?></span>
                </div>
                <div class="card-scenario"><?= htmlspecialchars($data[0]) ?></div>
                <div class="card-details">
                    <div class="detail-item">
                        <div class="detail-label">Actual</div>
                        <div class="detail-value"><?= htmlspecialchars($data[1]) ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Expected</div>
                        <div class="detail-value"><?= htmlspecialchars($data[2]) ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<script>
function filterCards(status, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    document.querySelectorAll('.test-card').forEach(card => {
        if (status === 'all' || card.dataset.status === status) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

</body>
</html>