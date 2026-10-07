<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Loop Lab - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container">
  <p class="eyebrow">Milestone 6 · Latihan</p>
  <h1>Loop Lab</h1>
  <p class="lead">Latihan for, while, dan do-while.</p>

  <h2>A. for</h2>
  <div class="panel">
    <?php for ($i = 1; $i <= 5; $i++) {
        echo "Pertemuan ke-$i<br>";
    } ?>
  </div>

  <h2>B. while</h2>
  <div class="panel">
    <?php
    $i = 1;
    while ($i <= 5) {
        echo "Nomor antrean: $i<br>";
        $i++;
    }
    ?>
  </div>

  <h2>C. do-while</h2>
  <div class="panel">
    <?php
    $i = 1;
    do {
        echo "Percobaan ke-$i<br>";
        $i++;
    } while ($i <= 5);
    ?>
  </div>

  <div class="actions"><a class="btn" href="register.php">Kembali ke Form</a></div>
</main>
</body>
</html>
