<?php
include "service/db.php";


// Ambil nilai pencarian dan filter kategori dari query string
$searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';

// Query dasar untuk mengambil produk
$query = "SELECT * FROM produk WHERE 1=1";

// Jika ada kata kunci pencarian, tambahkan filter pencarian pada query
if (!empty($searchTerm)) {
    $query .= " AND nama LIKE '%$searchTerm%'";
}

// Jika ada kategori yang dipilih, tambahkan filter kategori pada query
if (!empty($category)) {
    $query .= " AND jenis = '$category'";
}

// Eksekusi query hanya jika search atau kategori ada
$result = mysqli_query($conn, $query);

// Ambil kategori produk untuk filter dropdown
$categoriesResult = mysqli_query($conn, "SELECT DISTINCT jenis FROM produk");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Search Icon</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #2C3E50;
        }

        /* Navbar */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1050;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease-in-out;
            padding: 12px 20px;
        }

        /* Navbar Links */
        .nav-link {
            color: #29a067;
            font-size: 19px;
            font-weight: 450;
            transition: color 0.3s ease, transform 0.2s ease, letter-spacing 0.2s ease;
            position: relative;
        }

        .navbar-nav {
            gap: 20px;
        }

        .nav-link:hover {
            color: #3498DB;
            transform: translateY(-2px);
            letter-spacing: 1px;
        }

        /* Garis bawah hover */
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #3498DB;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Logo */
        .namalogo {
            font-weight: 500;
            font-size: 1.2rem;
            color: #2C3E50;
        }

        /* Navbar brand (logo) */
        .navbar-brand img {
            width: 50px;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        /* Search Bar */
        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-bar {
            display: none;
            position: relative;
            width: 220px;
            border-radius: 20px;
            padding: 6px 12px;
            border: 1px solid #27AE60;
            transition: all 0.3s ease-in-out;
        }

        .search-bar.show {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Animasi fade-in untuk pencarian */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Tombol search */
        #searchToggle {
            color: #27AE60;
            border-color: transparent;
            background: none;
            transition: transform 0.2s ease;
            font-size: 20px;
        }

        #searchToggle:hover {
            transform: scale(1.1);
        }

        /* Login Button */
        #login {
            width: 90px;
            border: 2px solid #27AE60;
            border-radius: 50px;
            color: #27AE60;
            font-weight: 400;
            transition: all 0.3s ease-in-out;
            padding: 6px 12px;
        }

        #login:hover {
            background-color: #27AE60;
            color: white;
        }

        /* Cart Icon Button */
        .navbar .bi-cart {
            font-size: 1.6rem;
            color: #27AE60;
            transition: color 0.3s ease, transform 0.2s ease;
            margin-left: 15px;
            cursor: pointer;
        }

        .navbar .bi-cart:hover {
            color:rgb(113, 98, 13);
            transform: scale(1.1);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: #e74c3c;
            color: white;
            font-size: 12px;
            font-weight: bold;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.2s ease;
        }

        .cart-icon:hover .cart-count {
            transform: scale(1.2);
        }

        /* Garis bawah navbar */
        .block {
            background-color: #27AE60;
            padding-top: 6px;
            margin-top: 2px;
            width: 100%;
            height: 5px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .search-container {
                position: relative;
            }

            .search-bar {
                width: 100%;
            }

            .search-bar.show {
                width: 80%;
            }

            .navbar .bi-cart {
                font-size: 1.4rem;
                /* Slightly smaller cart icon on mobile */
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="home.php">
                <img src="./img/logo wt.svg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </a>
            <a class="navbar-brand namalogo"> Wiendy's Tissue</a>

            <!-- Navbar Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#NavbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="NavbarContent">
                <!-- Centered Menu -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artikel.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="katalog.php">Katalog</a>
                    </li>
                </ul>

                <!-- Cart Icon with Item Count -->
                <a href="keranjang.php">
                    <i class="bi bi-cart"></i>
                    <span id="cartItemCount" style="color: red;">
                        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                            <span class="badge bg-primary"><?php echo array_sum(array_column($_SESSION['cart'], 'quantity')); ?></span>
                        <?php } ?>
                </a>
                <form action="katalog.php" method="GET" class="search-container me-3">
                    <!-- Search Input -->
                    <input type="text" name="search" class="search-bar" id="searchInput" placeholder="Cari Produk" value="<?php echo htmlspecialchars($searchTerm); ?>">
                </form>
                <button type="submit" class="btn me-3" id="searchToggle">
                    <i class="bi bi-search"></i>
                </button>

                <a href="login.php" id="login" class="btn">Login</a>

            </div>

        </div>
    </nav>

    <div class="block"></div>

    <!-- Bootstrap JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchToggle = document.getElementById('searchToggle');
            const searchInput = document.getElementById('searchInput');

            // Toggle input
            searchToggle.addEventListener('click', function(event) {
                event.stopPropagation(); // Mencegah event klik dari menyebar ke dokumen
                searchInput.classList.toggle('show'); // Tampilkan input
                if (searchInput.classList.contains('show')) {
                    searchInput.focus(); // Fokus pada input jika muncul
                }
            });

            // Menyembunyikan input jika klik di luar elemen pencarian
            document.addEventListener('click', function(event) {
                if (!searchInput.contains(event.target) && !searchToggle.contains(event.target)) {
                    searchInput.classList.remove('show'); // Sembunyikan input
                }
            });

            // Mencegah input tersembunyi jika pengguna klik di dalam elemen input
            searchInput.addEventListener('click', function(event) {
                event.stopPropagation(); // Mencegah event klik dari menyebar
            });
        });

        function updateCartCount() {
            let cartCount = document.getElementById('cartItemCount');
            // Ambil jumlah produk dari sesi atau halaman server (biasanya di-update menggunakan Ajax)
            cartCount.innerText = <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>;
        }

        // Memanggil fungsi updateCartCount setelah halaman dimuat
        window.onload = updateCartCount;
    </script>
</body>

</html>