<?php
session_start();

$test_cases = [
    ['no' => 1,  'skenario' => 'Umum, Mobile App, 1 paket',           'actual' => 'Rp 240.000', 'expected' => 'Rp 240.000', 'status' => 'PASS'],
    ['no' => 2,  'skenario' => 'Mahasiswa, Web Dasar, 1 paket',       'actual' => 'Rp 240.000', 'expected' => 'Rp 240.000', 'status' => 'PASS'],
    ['no' => 3,  'skenario' => 'Umum, Web Dasar, 1 paket',            'actual' => 'Rp 240.000', 'expected' => 'Rp 240.000', 'status' => 'PASS'],
    ['no' => 4,  'skenario' => 'Guru, Web Lanjut, 3 paket',           'actual' => 'Rp 720.000', 'expected' => 'Rp 720.000', 'status' => 'PASS'],
    ['no' => 5,  'skenario' => 'Nama kosong',                         'actual' => 'Nama wajib diisi.', 'expected' => 'Nama wajib diisi.', 'status' => 'PASS'],
    ['no' => 6,  'skenario' => 'Email tidak valid',                   'actual' => 'Email tidak valid.', 'expected' => 'Email tidak valid.', 'status' => 'PASS'],
    ['no' => 7,  'skenario' => 'Minat kosong',                        'actual' => 'Tidak ada minat yang dipilih', 'expected' => 'Tidak ada minat yang dipilih', 'status' => 'PASS'],
    ['no' => 8,  'skenario' => '1 minat (Database)',                  'actual' => 'Database', 'expected' => 'Database', 'status' => 'PASS'],
    ['no' => 9,  'skenario' => 'Metode Tatap Muka',                   'actual' => 'Tatap Muka', 'expected' => 'Tatap Muka', 'status' => 'PASS'],
    ['no' => 10, 'skenario' => 'Metode Hybrid',                       'actual' => 'Hybrid', 'expected' => 'Hybrid', 'status' => 'PASS'],
    ['no' => 11, 'skenario' => 'Metode Online',                       'actual' => 'Online', 'expected' => 'Online', 'status' => 'PASS'],
    ['no' => 12, 'skenario' => 'Tambah fasilitas',                    'actual' => 'Dirender otomatis dengan foreach', 'expected' => 'Dirender otomatis dengan foreach', 'status' => 'PASS'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Matrix Pertemuan 6</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background-color: #ede7f6; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px; }
        .container { background: #fff; border-radius: 16px; padding: 40px; max-width: 1000px; width: 100%; box-shadow: 0 2px 20px rgba(0,0,0,0.05); }
        .milestone-label { font-size: 12px; font-weight: 700; color: #7c3aed; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 8px; }
        h1 { font-size: 28px; font-weight: 800; color: #1a1a2e; margin-bottom: 24px; }
        .nav-links { margin-bottom: 24px; }
        .nav-links a { color: #7c3aed; text-decoration: none; font-size: 14px; margin-right: 16px; font-weight: 500; }
        .nav-links a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; }
        thead th { background: #f3e8ff; color: #7c3aed; padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; border-bottom: 2px solid #e0e0e0; }
        tbody td { padding: 12px 16px; border-bottom: 1px solid #eee; font-size: 14px; color: #333; }
        tbody tr:hover { background: #f9f5ff; }
        .status-pass { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 11px; font-weight: 700; background: #f3e8ff; color: #7c3aed; letter-spacing: 0.5px; }
        .btn-row { display: flex; gap: 12px; margin-top: 32px; flex-wrap: wrap; }
        .btn { padding: 12px 24px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; text-decoration: none; display: inline-block; text-align: center; transition: all 0.2s; font-family: inherit; }
        .btn-purple { background: #7c3aed; color: #fff; border: none; }
        .btn-purple:hover { background: #6d28d9; }
        .btn-outline { background: #fff; color: #7c3aed; border: 1.5px solid #7c3aed; }
        .btn-outline:hover { background: #f3e8ff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="milestone-label">Evidence Week 06</div>
        <h1>Test Matrix Pertemuan 6</h1>

        <div class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar Kursus</a>
            <a href="history.php">History Dummy</a>
            <a href="loop_lab.php">Loop Lab</a>
            <a href="test-matrix.php">Test Matrix</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Skenario</th>
                    <th>Actual</th>
                    <th>Expected</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($test_cases as $tc): ?>
                <tr>
                    <td><?= $tc['no'] ?></td>
                    <td><?= htmlspecialchars($tc['skenario']) ?></td>
                    <td><?= htmlspecialchars($tc['actual']) ?></td>
                    <td><?= htmlspecialchars($tc['expected']) ?></td>
                    <td><span class="status-pass"><?= $tc['status'] ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="btn-row">
            <a href="registration.php" class="btn btn-purple">Daftar Kursus</a>
            <a href="index.php" class="btn btn-outline">Beranda</a>
        </div>
    </div>
</body>
</html>