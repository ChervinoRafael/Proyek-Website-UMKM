<?php
session_start();
include "service/db.php";

// Ambil nilai pencarian & filter dari query string
$searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';

// Query dasar
$query = "SELECT * FROM produk WHERE 1=1";

// Tambahkan kondisi pencarian jika ada kata kunci
if (!empty($searchTerm)) {
    $query .= " AND nama LIKE '%$searchTerm%'";
}

// Tambahkan filter kategori jika dipilih
if (!empty($category)) {
    $query .= " AND jenis = '$category'";
}

// Eksekusi query
$result = mysqli_query($conn, $query);
$categoriesResult = mysqli_query($conn, "SELECT DISTINCT jenis FROM produk");

if (isset($_GET['keranjang']) && isset($_GET['quantity'])) {
    $productId = $_GET['keranjang'];
    $quantity = (int) $_GET['quantity'];

    if ($quantity <= 0) {
        header("Location: katalog.php");
        exit;
    }

    $query = "SELECT * FROM produk WHERE id_barang = '$productId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Periksa apakah produk sudah ada di keranjang
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $product['nama'],
                'price' => $product['harga'],
                'quantity' => $quantity,
                'image' => $product['gambar'],
                'description' => $product['deskripsi']
            ];
        }
    }

    header("Location: katalog.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Menggunakan font Poppins untuk tampilan lebih modern */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: rgb(249, 248, 250);
        }

        /* Styling card agar lebih elegan */
        .card {
            transition: all 0.3s ease-in-out;
            border: none;
            overflow: hidden;
            border-radius: 12px;
            position: relative;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card img {
            transition: transform 0.3s ease-in-out;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .card:hover img {
            transform: scale(1.08);
        }

        /* Tombol beli lebih modern */
        .btn-buy {
            background-color: #1f7a4e;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-buy:hover {
            background-color: #ff4757;
            box-shadow: 0 5px 15px rgba(255, 107, 129, 0.4);
            transform: scale(1.08);
        }

        /* Modal Produk Styling */
        .modal-content {
            border-radius: 15px;
            padding: 20px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        .modal img {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Animasi masuk modal lebih smooth */
        .modal.fade .modal-dialog {
            transform: translateY(-20px);
            transition: all 0.3s ease-in-out;
        }

        .container {
            padding-bottom: 40px;
        }
    </style>
</head>

<body>

    <?php include "layout/navbar.php"; ?>

    <div class="container mt-4">
        <h2 class="mb-4">Katalog Produk</h2>

        <div class="container mt-4">
            <div class="d-flex justify-content-end mb-4">
                <!-- Filter Kategori -->
                <form method="GET" class="d-flex">
                    <select name="category" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        <?php while ($cat = mysqli_fetch_assoc($categoriesResult)) { ?>
                            <option value="<?php echo $cat['jenis']; ?>" <?php if ($category == $cat['jenis']) echo 'selected'; ?>>
                                <?php echo $cat['jenis']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </form>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col">
                            <div class="card h-100" style="max-width: 20rem;">
                                <img src="<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama']; ?>">
                                <div class="card-body">
                                    <h6 class="card-title"><?php echo $row['nama']; ?></h6>
                                    <p class="card-text"><?php echo substr($row['deskripsi'], 0, 50); ?>...</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <p class="card-text"><strong>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></strong></p>
                                            </div>
                                            <div class="col">
                                                <p class="card-text"><strong><?php echo $row['jumlah']; ?></strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-buy btn-detail"
                                    data-bs-toggle="modal"
                                    data-bs-target="#pemesanan"
                                    data-id="<?php echo $row['id_barang']; ?>"
                                    data-name="<?php echo $row['nama']; ?>"
                                    data-image="<?php echo $row['gambar']; ?>"
                                    data-description="<?php echo $row['deskripsi']; ?>">
                                    Selengkapnya
                                </button>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='alert alert-warning'>Tidak ada produk yang ditemukan.</p>";
                }
                ?>
            </div>


            <!-- Modal Detail Produk -->
            <div class="modal fade" id="pemesanan" tabindex="-1" aria-labelledby="pemesananLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pemesananLabel">Detail Produk</h5>
                        </div>
                        <div class="modal-body">
                            <img id="modalImage" class="img-fluid mb-3" alt="Gambar Produk">
                            <h5 id="modalTitle"></h5>
                            <p id="modalDescription"></p>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" id="quantity" class="form-control" min="1" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <!-- Tombol untuk menambahkan produk ke keranjang -->
                            <form action="GET">
                                <button type="button" id="addToCartBtn" name="keranjang" class="btn btn-buy">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include "layout/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addToCartBtn = document.getElementById("addToCartBtn");

            document.getElementById("pemesanan").addEventListener("show.bs.modal", function(event) {
                var button = event.relatedTarget;
                var productId = button.getAttribute("data-id");
                var title = button.getAttribute("data-name");
                var description = button.getAttribute("data-description");
                var imageSrc = button.getAttribute("data-image");

                document.getElementById("modalTitle").textContent = title;
                document.getElementById("modalDescription").textContent = description;
                document.getElementById("modalImage").src = imageSrc;

                // Hapus event listener sebelumnya untuk menghindari duplikasi
                addToCartBtn.replaceWith(addToCartBtn.cloneNode(true));
                addToCartBtn = document.getElementById("addToCartBtn");

                // Tambahkan event listener baru
                addToCartBtn.addEventListener("click", function() {
                    var quantity = document.getElementById("quantity").value;
                    window.location.href = "katalog.php?keranjang=" + productId + "&quantity=" + quantity;
                });
            });
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>