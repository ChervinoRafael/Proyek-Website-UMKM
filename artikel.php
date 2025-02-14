<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Lengkap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f9f7;
            margin: 0;
            padding: 0;
        }

        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .card {
            margin-bottom: 40px;
            border: none;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2a6f66;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #4b7671;
            line-height: 1.6;
        }

        .card-footer {
            background-color: #f1f7f6;
            border-top: none;
            text-align: center;
            padding: 12px;
        }

        .card-footer a {
            text-decoration: none;
            color: #29a067;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .card-footer a:hover {
            color: #218c57;
            text-decoration: underline;
        }

        /* Header Styling */
        .header {
            background-color: #29a067;
            color: white;
            padding: 60px 0;
            text-align: center;
            margin-bottom: 40px;
            border-radius: 12px;
            margin-top: 70px;
        }

        .header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2rem;
            font-weight: 400;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.2rem;
            }

            .header p {
                font-size: 1rem;
            }

            .card {
                margin-bottom: 30px;
            }
        }
    </style>
</head>

<body>
    <!-- Include Navbar -->
    <?php include "layout/navbar.php"; ?>

    <!-- Header Section -->
    <div class="header">
        <h1>Artikel Terbaru</h1>
        <p>Baca artikel terbaru yang penuh dengan wawasan dan pengetahuan.</p>
    </div>

    <div class="container">
        <div class="row">
            <!-- Article Card 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/tips-memilih-tisu-yang-aman-dan-ramah-lingkungan.jpg" class="card-img-top" alt="Artikel 1">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Pertama</h5>
                        <p class="card-text">Ini adalah deskripsi singkat tentang artikel pertama. Baca lebih lanjut untuk mengetahui lebih banyak.</p>
                    </div>
                    <div class="card-footer">
                        <a href="artikel/1(memilih tissue).php">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/tisu toilet.jpg" class="card-img-top" alt="Artikel 2">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Kedua</h5>
                        <p class="card-text">Ini adalah deskripsi singkat tentang artikel kedua. Temukan informasi menarik dalam artikel ini.</p>
                    </div>
                    <div class="card-footer">
                        <a href="artikel/2(tisu toilet).php">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Article Card 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/perbedaan tisu wajah.jpg" class="card-img-top" alt="Artikel 3">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Ketiga</h5>
                        <p class="card-text">Deskripsi singkat artikel ketiga yang mengulas berbagai topik menarik. Klik untuk membaca lebih lanjut.</p>
                    </div>
                    <div class="card-footer">
                        <a href="artikel/3(perbedaan tissue wajah).php">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Article Card 4 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/jenis tisu.jpg" class="card-img-top" alt="Artikel 4">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Keempat</h5>
                        <p class="card-text">Deskripsi singkat artikel keempat yang membahas topik penting dalam kehidupan sehari-hari.</p>
                    </div>
                    <div class="card-footer">
                        <a href="artikel/4(jenis tissue).php">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Article Card 5 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/PASEO - Article Infographics - Mengenal Tisu Virgin dan Tisu Recycle.jpg" class="card-img-top" alt="Artikel 5">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Kelima</h5>
                        <p class="card-text">Artikel kelima dengan topik menarik yang dapat membantu Anda memahami isu terkini.</p>
                    </div>
                    <div class="card-footer">
                        <a href="artikel/5(Mengenal Tisu Virgin dan Tisu Daur Ulang).php">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Article Card 6 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="img/tisu dapur.jpg" class="card-img-top" alt="Artikel 6">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Keenam</h5>
                        <p class="card-text">Artikel keenam yang memberikan informasi lengkap dan menarik mengenai berbagai topik.</p>
                    </div>
                    <div class="card-footer">
                        <a href="artikel/6(kegunaan tisu dapur).php">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>