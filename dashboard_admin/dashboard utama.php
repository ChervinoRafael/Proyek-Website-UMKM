<?php
// Membaca data feedback yang sudah ada dari file JSON
$feedback_file = "../json/feedback.json";
$feedbacks = json_decode(file_get_contents($feedback_file), true);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include "../dashboard_admin/side bar.php"; ?>

    <div class="main-content">

        <div class="container mt-4">
            <h2>Selamat Datang di Dashboard Admin</h2>
            <p>Gunakan menu di sidebar untuk mengelola data.</p>
        </div>

        <div class="container mt-5">
            <h2 class="text-center mb-4">Feedback dari Pengguna</h2>

            <h3>Daftar Feedback</h3>
            <div class="list-group">
                <?php foreach ($feedbacks as $feedback): ?>
                    <div class="list-group-item">
                        <p><?= $feedback['text'] ?></p>
                        <small class="text-muted">Dikirim pada: <?= $feedback['timestamp'] ?></small>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>