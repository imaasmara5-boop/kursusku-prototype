<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus - KursusKu</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0e6ff;
            color: #0f172a;
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Header */
        .header-label {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #7c3aed;
            margin-bottom: 12px;
        }

        .header-title {
            font-size: 36px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .header-desc {
            font-size: 15px;
            color: #475569;
            margin-bottom: 30px;
        }

        /* Form Card */
        .form-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px 35px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label.field-label {
            display: block;
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            background: #fff;
            color: #334155;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23334155' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
            cursor: pointer;
        }

        /* Fieldset */
        fieldset {
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            padding: 18px 22px;
            margin-bottom: 20px;
        }

        legend {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            padding: 0 8px;
        }

        .radio-item, .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            font-size: 15px;
            color: #334155;
            font-weight: 600;
        }

        .radio-item:last-child, .checkbox-item:last-child {
            margin-bottom: 0;
        }

        .radio-item input[type="radio"],
        .checkbox-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #7c3aed;
            cursor: pointer;
        }

        /* Buttons */
        .button-row {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 13px 26px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
        }

        .btn-primary {
            background: #7c3aed;
            color: #fff;
        }

        .btn-primary:hover {
            background: #6d28d9;
        }

        .btn-outline {
            background: #fff;
            color: #7c3aed;
            border: 2px solid #7c3aed;
        }

        .btn-outline:hover {
            background: #f5f3ff;
        }

        @media (max-width: 600px) {
            .header-title { font-size: 26px; }
            .form-card { padding: 20px 18px; }
            .button-row { flex-direction: column; }
            .btn { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

<div class="container">

    <p class="header-label">PENDAFTARAN KURSUS</p>
    <h1 class="header-title">Mulai belajar bersama KursusKu</h1>
    <p class="header-desc">Lengkapi form berikut dengan data latihan.</p>

    <div class="form-card">
        <form action="process-registration.php" method="POST">

            <div class="form-group">
                <label class="field-label" for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label class="field-label" for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label class="field-label" for="hp">Nomor HP</label>
                <input type="tel" id="hp" name="hp" required>
            </div>

            <div class="form-group">
                <label class="field-label" for="prodi">Program Studi</label>
                <input type="text" id="prodi" name="prodi" required>
            </div>

            <div class="form-group">
                <label class="field-label" for="kursus">Pilih Kursus</label>
                <select id="kursus" name="kursus" required>
                    <option value="">-- Pilih Kursus --</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Programming">Programming</option>
                    <option value="Database">Database</option>
                    <option value="UI/UX Design">UI/UX Design</option>
                </select>
            </div>

            <fieldset>
                <legend>Jenis Peserta</legend>
                <label class="radio-item">
                    <input type="radio" name="jenis" value="Mahasiswa" required>
                    Mahasiswa
                </label>
                <label class="radio-item">
                    <input type="radio" name="jenis" value="Guru">
                    Guru
                </label>
                <label class="radio-item">
                    <input type="radio" name="