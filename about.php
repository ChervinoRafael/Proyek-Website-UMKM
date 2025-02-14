<?php include "service/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .hero {
            background: url('https://source.unsplash.com/1600x900/?team,office') center/cover no-repeat;
            color: black;
            text-align: center;
            padding: 100px 20px;
        }

        .mission,
        .team {
            padding: 80px 20px;
            text-align: center;
        }

        .mission h2,
        .team h2 {
            font-weight: 600;
            color: #2c3e50;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .mission h2::after,
        .team h2::after {
            content: '';
            width: 50px;
            height: 4px;
            background-color: #29a067;
            display: block;
            margin: 10px auto 0;
            border-radius: 4px;
        }

        .team img {
            border-radius: 10px;
            width: 100%;
            max-width: 350px;
            height: auto;
            object-fit: cover;
            transition: all 0.3s ease-in-out;
        }

        .team img:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .buka {
            font-size: 1.1rem;
            font-weight: 400;
            color: #555;
        }

        .buka h3 {
            color: #29a067;
            font-weight: 500;
        }

        .team h3 {
            font-style: italic;
            font-size: 1.5rem;
            font-weight: 400;
            color: #555;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .team img {
                max-width: 300px;
            }
        }
    </style>
</head>

<body>
    <?php include "layout/navbar.php"; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="hero-title">Selamat Datang</h1>
            <p class="hero-subtitle">Belanja Praktis dengan Pilihan Produk Berkualitas</p>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="mission text-center bg-light">
        <div class="container">
            <h2>Visi</h2>
            <p>Menjadi penyedia tissue berkualitas tinggi yang tidak hanya terjangkau, tetapi juga ramah lingkungan dan andal, serta memastikan setiap pelanggan mendapatkan kelembutan dan kenyamanan terbaik dalam setiap penggunaan </p>
        </div>
    </section>

    <!-- Meet the Team Section -->
    <div data-aos="fade-up">
        <section class="team text-center">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-md-4">
                        <h2>Toko Wiendy's Tissue</h2>
                        <img src="img/kios.jpeg" alt="Team Member">
                    </div>

                    <div class="col-sm-3 buka">
                        <h3>Hari</h3>
                        <p style="margin-top: 35px;">Senin</p>
                        <p>Selasa</p>
                        <p>Rabu</p>
                        <p>Kamis</p>
                        <p>Jumat</p>
                        <p>Sabtu</p>
                        <p>Minggu</p>
                    </div>

                    <div class="col-sm-2 buka">
                        <h3>Pukul</h3>
                        <p style="margin-top: 35px;">07.00 - 20.00 WIB</p>
                        <p>07.00 - 20.00 WIB</p>
                        <p>07.00 - 20.00 WIB</p>
                        <p>07.00 - 20.00 WIB</p>
                        <p>07.00 - 20.00 WIB</p>
                        <p>07.00 - 20.00 WIB</p>
                        <p>07.00 - 20.00 WIB</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="team text-center">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-8 align-self-center">
                    <h3> "Setiap langkah kecil yang kita ambil mendekatkan kita pada tujuan kita, jangan ragu untuk terus bergerak meski terasa sulit" </h3>
                </div>

                <div class="col-md-4 align-self-center">
                    <h2>Wiendy</h2>
                    <img src="img/owner.jpg" alt="pemilik">
                </div>
            </div>
        </div>
    </section>


    <?php include "layout/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        gsap.from(".hero-title", {
            opacity: 0,
            y: 50,
            duration: 1,
            ease: "power3.out"
        });
        gsap.from(".hero-subtitle", {
            opacity: 0,
            y: 30,
            delay: 0.3,
            duration: 1,
            ease: "power3.out"
        });

        document.addEventListener("DOMContentLoaded", function() {
            gsap.registerPlugin(ScrollTrigger);

            // Animasi teks di bagian Mission
            gsap.from(".mission h2, .mission p", {
                opacity: 0,
                y: 50,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: ".mission",
                    toggleActions: "play none none none"
                }
            });

            // Animasi gambar toko & tim
            gsap.from(".team img", {
                opacity: 0,
                scale: 0.9,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: ".team img",
                    start: "top 85%",
                    toggleActions: "play none none none"
                }
            });

        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>