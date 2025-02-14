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
        <h1>Jenis dan Perbedaan Tisu</h1>
        <p>Dalam satu hari, berapa banyak tisu yang biasanya Moms gunakan? Dan tisu apa saja yang paling sering Moms gunakan?</p>
        <p>Tisu adalah produk yang sangat dekat dengan keseharian kita. Untuk membersihkan wajah, tumpahan air, mengeringkan tangan, dan sebagainya, kita pasti mencari tisu. Namun, tahukah Moms bahwa tisu memiliki beberapa jenis dengan fungsi masing-masing?</p>
        
        <h2>Beberapa Jenis Tisu dan Kegunaannya</h2>
        <ul>
            <li><strong>Tisu Wajah:</strong> Bertekstur lembut dan halus, digunakan untuk membersihkan wajah, mulut, dan bagian tubuh lainnya.</li>
            <li><strong>Tisu Basah:</strong> Lebih tebal dan lembab, digunakan sebagai pengganti air untuk membersihkan tubuh, bayi, dan benda.</li>
            <li><strong>Tisu Masak (Cooking Towel):</strong> Menyerap minyak dan air dengan cepat, cocok digunakan untuk mengeringkan makanan atau membersihkan dapur.</li>
            <li><strong>Tisu Toilet:</strong> Lembut, mudah larut dalam air, dan digunakan untuk kebersihan di toilet.</li>
            <li><strong>Tisu Makan (Napkin):</strong> Digunakan di meja makan untuk membersihkan mulut dan peralatan makan.</li>
        </ul>

        <h2>Perbedaan Tisu Virgin dan Tisu Recycle</h2>
        <h3>Tisu Virgin</h3>
        <p>Tisu virgin dibuat dari pohon asli yang berasal dari hutan industri yang dikelola secara berkelanjutan. Diproduksi dengan standar higienis, ramah lingkungan, dan bersertifikat.</p>
        
        <h3>Tisu Recycle</h3>
        <p>Dibuat dari kertas bekas yang sumbernya tidak jelas, melalui proses daur ulang dengan bahan kimia berbahaya seperti klorin. Menurut WHO, bahan kimia ini dapat berdampak buruk bagi kesehatan.</p>
        
        <p>Setelah mengetahui perbedaan antara tisu virgin dan tisu daur ulang, Moms bisa lebih selektif dalam memilih produk tisu yang aman dan higienis untuk digunakan sehari-hari.</p>
        
        <a href="../artikel.php" class="back-button">&larr; Kembali ke Beranda</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>