<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = $_POST;
    header('Location: summary.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - Milestone 6</title>
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
            margin-bottom: 12px;
        }
        .subtitle {
            font-size: 13px;
            color: #888;
            margin-bottom: 30px;
        }
        .form-row {
            display: flex;
            gap: 20px;
        }
        .form-group {
            flex: 1;
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 8px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: #333;
            transition: border-color 0.2s;
            background: #fff;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #7c3aed;
        }
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        .box-section {
            border: 1.5px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }
        .box-section .box-label {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 12px;
            display: block;
        }
        .radio-options, .checkbox-options {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .radio-options label, .checkbox-options label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            color: #555;
            cursor: pointer;
        }
        .radio-options input, .checkbox-options input {
            accent-color: #7c3aed;
            width: 16px;
            height: 16px;
        }
        .btn-row {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            margin-bottom: 24px;
        }
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            background: #7c3aed;
            color: #fff;
        }
        .btn:hover { background: #6d28d9; }
        .facilities-box {
            border: 1.5px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            background: #fafafa;
        }
        .facilities-box h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 16px;
        }
        .facilities-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .facility-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #555;
        }
        .facility-icon {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }
        .icon-purple { background: #ede7f6; }
        .icon-blue { background: #e3f2fd; }
        .icon-pink { background: #fce4ec; }
        .icon-green { background: #e8f5e9; }
    </style>
</head>
<body>
    <div class="container">
        <div class="milestone-label">Milestone 6 · Form Lanjutan</div>
        <h1>Daftar Kursus</h1>
        <p class="subtitle">Alur: landing page → form → proses PHP → ringkasan. Belum memakai database.</p>

        <form method="POST" action="registration.php">
            <div class="form-row">
                <div class="form-group">
                    <label for="nama">Nama lengkap</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="kursus">Pilih kursus</label>
                <select id="kursus" name="kursus" required>
                    <option value="">-- Pilih kursus --</option>
                    <option value="Web Dasar">Web Dasar</option>
                    <option value="Web Lanjut">Web Lanjut</option>
                    <option value="Mobile App">Mobile App</option>
                    <option value="Data Science">Data Science</option>
                </select>
            </div>

            <div class="box-section">
                <span class="box-label">Tipe peserta</span>
                <div class="radio-options">
                    <label><input type="radio" name="tipe" value="Mahasiswa" required> Mahasiswa</label>
                    <label><input type="radio" name="tipe" value="Guru"> Guru</label>
                    <label><input type="radio" name="tipe" value="Umum"> Umum</label>
                </div>
            </div>

            <div class="box-section">
                <span class="box-label">Minat belajar</span>
                <div class="checkbox-options">
                    <label><input type="checkbox" name="minat[]" value="Frontend"> Frontend</label>
                    <label><input type="checkbox" name="minat[]" value="Backend"> Backend</label>
                    <label><input type="checkbox" name="minat[]" value="Database"> Database</label>
                    <label><input type="checkbox" name="minat[]" value="UI/UX"> UI/UX</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="metode">Metode belajar</label>
                    <select id="metode" name="metode" required>
                        <option value="">-- Pilih metode --</option>
                        <option value="Tatap Muka">Tatap Muka</option>
                        <option value="Online">Online</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="paket">Jumlah paket</label>
                    <select id="paket" name="paket" required>
                        <option value="1">1 paket</option>
                        <option value="2">2 paket</option>
                        <option value="3">3 paket</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan tambahan</label>
                <textarea id="catatan" name="catatan"></textarea>
            </div>

            <div class="btn-row">
                <button type="submit" class="btn">Proses Pendaftaran</button>
                <a href="history.php" class="btn">History Dummy</a>
                <a href="loop_lab.php" class="btn">Loop Lab</a>
            </div>
        </form>

        <div class="facilities-box">
            <h3>Fasilitas</h3>
            <div class="facilities-grid">
                <div class="facility-item"><div class="facility-icon icon-purple">📋</div><span>Modul pembelajaran lengkap & terstruktur</span></div>
                <div class="facility-item"><div class="facility-icon icon-blue">🖥️</div><span>Akses lab komputer dengan spesifikasi tinggi</span></div>
                <div class="facility-item"><div class="facility-icon icon-pink">🎓</div><span>Sertifikat resmi setelah menyelesaikan kursus</span></div>
                <div class="facility-item"><div class="facility-icon icon-green">💬</div><span>Konsultasi mentor secara online & offline</span></div>
            </div>
        </div>
    </div>
</body>
</html>