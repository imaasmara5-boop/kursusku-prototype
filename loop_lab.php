<?php
session_start();

$peserta_list = [
    ['nama' => 'irsyad akmal', 'email' => 'irsyad23@gmail.com', 'kursus' => 'Mobile App', 'tipe' => 'Umum', 'metode' => 'Online', 'paket' => 1],
    ['nama' => 'ima asmara', 'email' => 'imaasmara5@gmail.com', 'kursus' => 'Web Dasar', 'tipe' => 'Mahasiswa', 'metode' => 'Tatap Muka', 'paket' => 1],
    ['nama' => 'sella', 'email' => 'ella09@gmail.com', 'kursus' => 'Web Dasar', 'tipe' => 'Umum', 'metode' => 'Hybrid', 'paket' => 1],
    ['nama' => 'evagustin', 'email' => 'evagustin17@gmail.com', 'kursus' => 'Web Lanjut', 'tipe' => 'Guru', 'metode' => 'Tatap Muka', 'paket' => 3],
];

if (isset($_SESSION['form_data'])) {
    $data = $_SESSION['form_data'];
    array_unshift($peserta_list, [
        'nama' => $data['nama'] ?? '-',
        'email' => $data['email'] ?? '-',
        'kursus' => $data['kursus'] ?? '-',
        'tipe' => $data['tipe'] ?? '-',
        'metode' => $data['metode'] ?? '-',
        'paket' => $data['paket'] ?? 1
    ]);
}

$total_paket = 0;
$for_output = [];
for ($i = 0; $i < count($peserta_list); $i++) {
    $total_paket += $peserta_list[$i]['paket'];
    $for_output[] = ($i + 1) . ". " . $peserta_list[$i]['nama'] . " - " . $peserta_list[$i]['kursus'] . " (" . $peserta_list[$i]['paket'] . " paket)";
}

$foreach_output = [];
foreach ($peserta_list as $index => $peserta) {
    $foreach_output[] = [
        'no' => $index + 1,
        'nama' => $peserta['nama'],
        'email' => $peserta['email'],
        'kursus' => $peserta['kursus'],
        'tipe' => $peserta['tipe'],
        'metode' => $peserta['metode'],
        'paket' => $peserta['paket']
    ];
}

$while_output = [];
$j = 0;
while ($j < count($peserta_list)) {
    if ($peserta_list[$j]['paket'] > 1) {
        $while_output[] = $peserta_list[$j]['nama'] . " (" . $peserta_list[$j]['paket'] . " paket)";
    }
    $j++;
}

$metode_list = ['Online', 'Tatap Muka', 'Hybrid'];
$nested_output = [];
foreach ($peserta_list as $p) {
    foreach ($metode_list as $m) {
        $nested_output[] = $p['nama'] . " → " . $m;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Lab - Milestone 6</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background-color: #ede7f6; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px; }
        .container { background: #fff; border-radius: 16px; padding: 40px; max-width: 900px; width: 100%; box-shadow: 0 2px 20px rgba(0,0,0,0.05); }
        .milestone-label { font-size: 12px; font-weight: 700; color: #7c3aed; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 8px; }
        h1 { font-size: 28px; font-weight: 800; color: #1a1a2e; margin-bottom: 12px; }
        .subtitle { font-size: 13px; color: #888; margin-bottom: 32px; }
        .nav-links { margin-bottom: 32px; }
        .nav-links a { color: #7c3aed; text-decoration: none; font-size: 14px; margin-right: 16px; font-weight: 500; }
        .nav-links a:hover { text-decoration: underline; }
        .lab-section { background: #fafafa; border: 1.5px solid #e0e0e0; border-radius: 12px; padding: 24px; margin-bottom: 24px; }
        .lab-section h2 { font-size: 18px; font-weight: 700; color: #7c3aed; margin-bottom: 8px; }
        .lab-section h2 .badge { background: #7c3aed; color: #fff; font-size: 11px; padding: 3px 10px; border-radius: 12px; font-weight: 600; margin-left: 8px; }
        .lab-section .desc { font-size: 13px; color: #666; margin-bottom: 16px; }
        .lab-section .code-block { background: #1a1a2e; color: #ddd6fe; padding: 16px; border-radius: 8px; font-family: 'Courier New', monospace; font-size: 13px; margin-bottom: 16px; overflow-x: auto; line-height: 1.6; }
        .lab-section .output { background: #f3e8ff; border-left: 4px solid #7c3aed; padding: 12px 16px; border-radius: 0 8px 8px 0; font-size: 14px; color: #333; line-height: 1.8; }
        .lab-section .output .item { padding: 4px 0; }
        .loop-table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        .loop-table th { background: #7c3aed; color: #fff; padding: 10px 14px; text-align: left; font-size: 13px; }
        .loop-table th:first-child { border-radius: 8px 0 0 0; }
        .loop-table th:last-child { border-radius: 0 8px 0 0; }
        .loop-table td { padding: 10px 14px; border-bottom: 1px solid #eee; font-size: 13px; color: #333; }
        .loop-table tr:hover td { background: #f3e8ff; }
        .btn-row { display: flex; gap: 12px; margin-top: 32px; flex-wrap: wrap; }
        .btn { padding: 12px 24px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; text-decoration: none; display: inline-block; text-align: center; transition: all 0.2s; font-family: inherit; }
        .btn-purple { background: #7c3aed; color: #fff; border: none; }
        .btn-purple:hover { background: #6d28d9; }
        .btn-outline { background: #fff; color: #7c3aed; border: 1.5px solid #7c3aed; }
        .btn-outline:hover { background: #f3e8ff; }
        .total-box { background: #7c3aed; color: #fff; padding: 12px 20px; border-radius: 8px; font-size: 16px; font-weight: 700; margin-top: 12px; display: inline-block; }
    </style>
</head>
<body>
    <div class="container">
        <div class="milestone-label">Milestone 6 · Latihan Looping</div>
        <h1>Loop Lab</h1>
        <p class="subtitle">Praktik berbagai jenis looping PHP dengan data peserta.</p>

        <div class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar Kursus</a>
            <a href="history.php">History Dummy</a>
            <a href="loop_lab.php">Loop Lab</a>
        </div>

        <div class="lab-section">
            <h2>Latihan 1: For Loop <span class="badge">for</span></h2>
            <p class="desc">Menggunakan for loop untuk menghitung total paket semua peserta.</p>
            <div class="code-block">$total_paket = 0;<br>for ($i = 0; $i &lt; count($peserta_list); $i++) {<br>&nbsp;&nbsp;&nbsp;&nbsp;$total_paket += $peserta_list[$i]['paket'];<br>}</div>
            <div class="output">
                <strong>Output:</strong><br>
                <?php foreach ($for_output as $item): ?><div class="item"><?= $item ?></div><?php endforeach; ?>
                <div class="total-box">Total Paket: <?= $total_paket ?></div>
            </div>
        </div>

        <div class="lab-section">
            <h2>Latihan 2: Foreach Loop <span class="badge">foreach</span></h2>
            <p class="desc">Menggunakan foreach loop untuk menampilkan data peserta dalam tabel.</p>
            <div class="code-block">foreach ($peserta_list as $index => $peserta) {<br>&nbsp;&nbsp;&nbsp;&nbsp;// tampilkan data peserta<br>}</div>
            <table class="loop-table">
                <thead><tr><th>No</th><th>Nama</th><th>Email</th><th>Kursus</th><th>Tipe</th><th>Metode</th><th>Paket</th></tr></thead>
                <tbody>
                    <?php foreach ($foreach_output as $item): ?>
                    <tr><td><?= $item['no'] ?></td><td><strong><?= htmlspecialchars($item['nama']) ?></strong></td><td><?= htmlspecialchars($item['email']) ?></td><td><?= htmlspecialchars($item['kursus']) ?></td><td><?= htmlspecialchars($item['tipe']) ?></td><td><?= htmlspecialchars($item['metode']) ?></td><td><?= $item['paket'] ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="lab-section">
            <h2>Latihan 3: While Loop <span class="badge">while</span></h2>
            <p class="desc">Menggunakan while loop untuk mencari peserta dengan paket > 1.</p>
            <div class="code-block">$j = 0;<br>while ($j &lt; count($peserta_list)) {<br>&nbsp;&nbsp;&nbsp;&nbsp;if ($peserta_list[$j]['paket'] > 1) { /* tambah ke hasil */ }<br>&nbsp;&nbsp;&nbsp;&nbsp;$j++;<br>}</div>
            <div class="output">
                <strong>Peserta dengan paket > 1:</strong><br>
                <?php if (!empty($while_output)): ?>
                    <?php foreach ($while_output as $item): ?><div class="item">✅ <?= htmlspecialchars($item) ?></div><?php endforeach; ?>
                <?php else: ?>
                    <div class="item">Tidak ada peserta dengan paket > 1.</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="lab-section">
            <h2>Latihan 4: Nested Loop <span class="badge">nested</span></h2>
            <p class="desc">Menggunakan nested foreach untuk membuat kombinasi peserta × metode.</p>
            <div class="code-block">foreach ($peserta_list as $p) {<br>&nbsp;&nbsp;&nbsp;&nbsp;foreach ($metode_list as $m) {<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// kombinasi<br>&nbsp;&nbsp;&nbsp;&nbsp;}<br>}</div>
            <div class="output">
                <strong>Total Kombinasi: <?= count($nested_output) ?></strong><br>
                <?php foreach ($nested_output as $item): ?><div class="item">📦 <?= htmlspecialchars($item) ?></div><?php endforeach; ?>
            </div>
        </div>

        <div class="btn-row">
            <a href="registration.php" class="btn btn-purple">Daftar Kursus</a>
            <a href="history.php" class="btn btn-outline">History Dummy</a>
            <a href="index.php" class="btn btn-outline">Beranda</a>
        </div>
    </div>
</body>
</html>