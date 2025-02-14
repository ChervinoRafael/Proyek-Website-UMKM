<?php include "service/db.php";

// Membaca daftar gambar dari file JSON
$banners_file = "json/banners.json";
$banners = json_decode(file_get_contents($banners_file));

// Menentukan gambar yang aktif (misalnya yang pertama)
$active_banner = $banners[0];  // Bisa sesuaikan dengan logika aktivasi gambar tertentu

// Membaca data testimonial dari file JSON
$testimonials_file = 'json/testimonial.json';  // Menyesuaikan dengan lokasi file
$testimonials = json_decode(file_get_contents($testimonials_file), true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Penataan Carousel */
        .carousel-item {
            transition: transform 1.5s ease-in-out;
        }

        .carousel-inner {
            position: relative;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
        }

        /* Bottom Section */
        .bottom {
            background-color: #29a067;
            height: 8px;
            margin-top: 20px;
        }

        /* Testimonial */
        .testimonial-section {
            background-color: #f9f9f9;
            padding: 60px 0;
        }

        .testimonial-card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .testimonial-card:hover {
            transform: scale(1.05);
        }

        /* Produk Unggulan */
        .featured-products .card {
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .featured-products .card:hover {
            transform: translateY(-10px);
        }

        /* Backgrounds */
        .container-fluid-1 {
            background-color: whitesmoke;
            padding: 50px 0;
            color: white;
        }


        .advantage-item {
            transition: transform 0.4s ease-in-out;
        }

        .advantage-item:hover {
            transform: translateY(-10px);
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <?php include "layout/navbar.php"; ?>

    <!-- Slideshow -->
    <div style="margin-top: 20px;">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($banners as $index => $banner): ?>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="<?= $index ?>"
                        class="<?= ($banner == $active_banner) ? 'active' : '' ?>">
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="carousel-inner">
                <?php foreach ($banners as $index => $banner): ?>
                    <div class="carousel-item <?= ($banner == $active_banner) ? 'active' : '' ?>" data-bs-interval="3000">
                        <img src="img/<?= $banner ?>" class="d-block w-100" alt="Slide <?= $index + 1 ?>">
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <div class="bottom"></div>

    <!-- testimonial -->
    <section class="testimonial-section">
        <div class="container">
            <h2 class="text-center mb-4">Testimoni Pelanggan</h2>
            <div class="row">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="col-md-4">
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <p class="card-text">"<?= $testimonial['text'] ?>"</p>
                                <footer-testi class="blockquote-footer"><?= $testimonial['author'] ?>, <cite><?= $testimonial['role'] ?></cite></footer-testi>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products py-5">
        <div class="container">
            <h2 class="text-center mb-4">Produk Unggulan</h2>
            <div class="row">
                <div class="col-md-4">
                    <div data-aos="fade-right"
                        data-aos-offset="200"
                        data-aos-easing="ease-in-sine"
                        data-aos-duration="500">
                        <div class="card">
                            <img src="img/see-u 10 rolls.png" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">Tisu Roll</h5>
                                <p class="card-text">Tisu roll berkualitas tinggi untuk kebutuhan sehari-hari.</p>
                                <a href="katalog.php" class="btn btn-success">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div data-aos="fade-down"
                        data-aos-easing="linear"
                        data-aos-duration="500">
                        <div class="card">
                            <img src="img/montiss 2x 1000.png" class="card-img-top" alt="Product 2">
                            <div class="card-body">
                                <h5 class="card-title">Tisu Lembaran</h5>
                                <p class="card-text">Tisu lembaran yang mudah digunakan untuk berbagai keperluan.</p>
                                <a href="katalog.php" class="btn btn-success">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div data-aos="fade-left"
                        data-aos-duration="500"
                        data-aos-easing="ease-in-sine"
                        data-aos-offset="200">
                        <div class="card">
                            <img src="img/lakban.png" class="card-img-top" alt="Product 3">
                            <div class="card-body">
                                <h5 class="card-title">Lakban</h5>
                                <p class="card-text">Lakban kuat untuk kebutuhan pengemasan dan perbaikan.</p>
                                <a href="katalog.php" class="btn btn-success">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid-1">
        <section class="advantages-section py-5" style="background-image: url('img/background.jpg'); background-size: cover;">
            <div class="container text-center">
                <h2 class="text-black mb-4">Mengapa Belanja di Toko Kami?</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="advantage-item">
                            <i class="bi bi-gem text-black" style="font-size: 60px;"></i>
                            <h5 class="mt-3 text-black">Kualitas Terjamin</h5>
                            <p class="text-black">Kami hanya menyediakan produk berkualitas tinggi yang telah teruji oleh pelanggan kami.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="advantage-item">
                            <i class="bi bi-truck text-black" style=" color:black; font-size: 60px; "></i>
                            <h5 class="mt-3 text-black">Pengiriman Cepat</h5>
                            <p class="text-black">Produk kami dikirim dengan cepat dan tepat waktu, sesuai dengan yang dijanjikan.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="advantage-item">
                            <i class="bi bi-heart text-black" style="font-size: 60px;"></i>
                            <h5 class="mt-3 text-black">Pelayanan Ramah</h5>
                            <p class="text-black">Tim layanan pelanggan kami siap membantu kapan saja dengan senyum ramah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include "layout/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>