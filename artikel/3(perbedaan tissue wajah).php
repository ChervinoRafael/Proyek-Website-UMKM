<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara Memilih Tissue</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Menghindari konflik dengan halaman lain */
        body.article-page {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .container-article {
            max-width: 800px;
            /* Tidak terlalu lebar */
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container-article:hover {
            transform: translateY(-5px);
            box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.15);
        }

        .article-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .article-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .article-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #29a067;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .back-button:hover {
            color: #218c57;
            text-decoration: underline;
        }
    </style>
</head>

<body class="article-page">
    <?php include "../layout/nav-artikel.php"; ?>

    <div class="container">
        <h1 class="article-title">Tips Membersihkan Wajah Secara Alami</h1>
        <img src="../img/tissue artikel3.jpg" alt="Gambar Artikel" class="article-image">
        <p class="article-content">
            Merawat kesehatan dan kecantikan kulit wajah adalah hal yang penting bagi banyak orang. Salah satu cara terbaik untuk mendapatkannya adalah dengan rutin membersihkan wajah menggunakan metode yang alami dan efektif.
        </p>
        <h2>Langkah-Langkah Membersihkan Wajah</h2>
        <h3>1. Cuci Tangan Sebelum Membersihkan Wajah</h3>
        <p class="article-content">
            Tangan adalah bagian tubuh yang sering bersentuhan dengan berbagai benda dan bisa menjadi sumber kuman. Oleh karena itu, sebelum menyentuh wajah, pastikan untuk mencuci tangan dengan air dan sabun antiseptik.
        </p>
        <h3>2. Bersihkan Make-up</h3>
        <p class="article-content">
            Gunakan produk pembersih wajah yang sesuai dengan jenis kulit untuk menghilangkan make-up dan kotoran yang menempel sepanjang hari.
        </p>
        <h3>3. Mencuci Wajah dengan Sabun</h3>
        <p class="article-content">
            Gunakan sabun pencuci wajah yang sesuai dengan jenis kulit. Basahi wajah dengan air hangat agar pori-pori terbuka, lalu bersihkan dengan sabun. Bilas dengan air dingin untuk menutup kembali pori-pori.
        </p>
        <h3>4. Keringkan Wajah dengan Handuk atau Tisu</h3>
        <p class="article-content">
            Gunakan handuk bersih atau tisu wajah yang lembut untuk mengeringkan wajah. Hindari menggosok wajah terlalu keras agar tidak menyebabkan iritasi.
        </p>
        <h3>5. Gunakan Produk Perawatan Kulit</h3>
        <p class="article-content">
            Setelah membersihkan wajah, gunakan pelembap atau produk perawatan kulit yang sesuai dengan kebutuhan kulit Anda untuk menjaga kelembapan dan kesehatan kulit.
        </p>
        <a href="../artikel.php" class="back-button">← Kembali ke Beranda</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>