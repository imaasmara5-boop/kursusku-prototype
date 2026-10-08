# AI Usage Log - Pertemuan 6

| Masalah/tujuan | Saran AI | Keputusan | Hasil uji |
| --- | --- | --- | --- |
| Perhitungan diskon flat | Gunakan rumus `subtotal * 0.20` untuk semua tipe peserta | Diterima | Semua peserta (Umum, Mahasiswa, Guru) dapat diskon 20% |
| Checkbox minat kosong | Gunakan `$_POST['minat'] ?? []` dan validasi array | Diterima | Tidak ada warning saat minat kosong (contoh: sella) |
| Looping data peserta | Render data peserta dari array dengan `foreach` | Diterima | 4 peserta (irsyad, ima, sella, evagustin) tampil otomatis di tabel |
| Redirect setelah submit | Gunakan `header('Location: summary.php')` + `session_start()` | Diterima | Setelah daftar, otomatis pindah ke halaman ringkasan |
| Duplikat data di history | Hapus data dummy yang sama dengan nama peserta yang daftar | Diterima | Irsyad hanya muncul 1x di tabel history |
| Konsistensi warna UI | Gunakan variabel warna `#7c3aed` (purple) di semua halaman | Diterima | Semua halaman senada purple |