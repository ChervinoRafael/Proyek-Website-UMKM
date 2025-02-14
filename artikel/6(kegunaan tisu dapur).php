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

    <div class="container-article">
        <h1>Manfaat Tisu Dapur</h1>
        <p>Dapur adalah tempat favorit bagi sebagian orang yang menyukai masak karena banyak menghabiskan waktu di tempat itu. Beberapa orang bahkan melengkapi peralatan masaknya agar lebih menyenangkan, salah satunya dengan menambahkan tisu dapur. Namun tahukah Anda manfaat tisu dapur selain untuk menghilangkan percikan minyak goreng?</p>

        <h2>Manfaat Lain dari Tisu Dapur</h2>
        <h3>1. Menjaga Kesegaran Sayur</h3>
        <p>Menyimpan sayur di kulkas bisa mempertahankan kesegarannya, tetapi tidak selamanya efektif. Gunakan tisu dapur untuk membungkus sayuran sebelum memasukkannya ke dalam kulkas. Selain itu, tisu dapur juga bisa dijadikan alas rak kulkas untuk menyerap kelembaban.</p>

        <h3>2. Menjadi Alas Talenan</h3>
        <p>Jika talenan plastik terasa licin saat digunakan, letakkan 1-2 lembar tisu dapur di bawahnya untuk meningkatkan stabilitas dan menghindari pergeseran saat memotong bahan makanan.</p>

        <h3>3. Menghilangkan Rambut Jagung</h3>
        <p>Basahi tisu dapur dengan sedikit air, kemudian gunakan untuk mengusap permukaan jagung guna menghilangkan rambut jagung yang menempel dengan lebih mudah.</p>

        <h3>4. Sebagai Bahan Pengomposan</h3>
        <p>Tisu dapur dapat digunakan dalam proses pengomposan karena dapat membantu menjaga keseimbangan karbon dalam kompos serta menciptakan lingkungan yang lebih kondusif bagi mikroorganisme.</p>

        <h3>5. Mengeringkan Panci Antilengket</h3>
        <p>Setelah mencuci panci antilengket, gunakan tisu dapur untuk mengeringkannya dengan cepat. Daya serap tisu dapur yang tinggi memungkinkan panci segera kering dan siap digunakan.</p>

        <h2>Kain Lap atau Tisu Dapur?</h2>
        <p>Keduanya memiliki fungsi masing-masing. Gunakan tisu dapur untuk mengeringkan peralatan masak agar lebih higienis. Sedangkan kain lap lebih cocok untuk membersihkan meja, kompor, atau tembok dapur yang terkena minyak.</p>

        <a href="../artikel.php" class="back-button">← Kembali ke Beranda</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>