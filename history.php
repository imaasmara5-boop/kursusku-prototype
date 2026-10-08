<?php
session_start();

// Data dummy dari array (bukan database) - Irsyad dihapus dari sini
$history = [
    [
        'nama' => 'ima asmara',
        'email' => 'imaasmara5@gmail.com',
        'kursus' => 'Web Dasar',
        'tipe' => 'Mahasiswa',
        'metode' => 'Tatap Muka',
        'paket' => 1,
        'tanggal' => '2026-10-02'
    ],
    [
        'nama' => 'sella',
        'email' => 'ella09@gmail.com',
        'kursus' => 'Web Dasar',
        'tipe' => 'Umum',
        'metode' => 'Hybrid',
        'paket' => 1,
        'tanggal' => '2026-10-03'
    ],
    [
        'nama' => 'evagustin',
        'email' => 'evagustin17@gmail.com',
        'kursus' => 'Web Lanjut',
        'tipe' => 'Guru',
        'metode' => 'Tatap Muka',
        'paket' => 3,
        'tanggal' => '2026-10-04'
    ],
];

// Jika ada data dari session (baru daftar), tambahkan ke atas
if (isset($_SESSION['form_data'])) {
    $data = $_SESSION['form_data'];
    array_unshift($history, [
        'nama' => $data['nama'] ?? '-',
        'email' => $data['email'] ?? '-',
        'kursus' => $data['kursus'] ?? '-',
        'tipe' => $data['tipe'] ?? '-',
        'metode' => $data['metode'] ?? '-',
        'paket' => $data['paket'] ?? 1,
        'tanggal' => date('Y-m-d')
    ]);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Dummy - Milestone 6</title>
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
            max-width: 900px;
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
            margin-bottom: 12px;
        }
        .subtitle {
            font-size: 13px;
            color: #888;
            margin-bottom: 24px;
        }
        .nav-links {
            margin-bottom: 24px;
        }
        .nav-links a {
            color: #7c3aed;
            text-decoration: none;
            font-size: 14px;
            margin-right: 16px;
            font-weight: 500;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        thead th {
            background: #7c3aed;
            color: #fff;
            padding: 12px 16px;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }
        thead th:first-child { border-radius: 8px 0 0 0; }
        thead th:last-child { border-radius: 0 8px 0 0; }
        tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
        }
        tbody tr:hover {
            background: #f3e8ff;
        }
        tbody tr:last-child td:first-child { border-radius: 0 0 0 8px; }
        tbody tr:last-child td:last-child { border-radius: 0 0 8px 0; }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            background: #f3e8ff;
            color: #7c3aed;
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
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="milestone-label">Milestone 6 · Latihan Looping</div>
        <h1>History Dummy</h1>
        <p class="subtitle">Data contoh dari array, bukan database.</p>

        <div class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar Kursus</a>
            <a href="history.php">History Dummy</a>
        </div>

        <?php if (empty($history)): ?>
            <div class="empty-state">Belum ada data pendaftaran.</div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kursus</th>
                    <th>Tipe</th>
                    <th>Metode</th>
                    <th>Paket</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['kursus']) ?></td>
                    <td><span class="badge"><?= htmlspecialchars($row['tipe']) ?></span></td>
                    <td><?= htmlspecialchars($row['metode']) ?></td>
                    <td><?= $row['paket'] ?></td>
                    <td><?= htmlspecialchars($row['tanggal']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="btn-row">
            <a href="registration.php" class="btn btn-purple">Daftar Kursus</a>
            <a href="index.php" class="btn btn-outline">Beranda</a>
        </div>
    </div>
</body>
</html>