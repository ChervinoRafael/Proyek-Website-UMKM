<?php
session_start();

// Mengecek apakah keranjang ada
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Keranjang Anda kosong!</p>";
    exit;
}

// Menghapus seluruh isi keranjang
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']); // Hapus seluruh isi keranjang
    header("Location: keranjang.php"); // Redirect ke halaman keranjang
    exit;
}

// Checkout via WhatsApp hanya untuk produk yang dicentang
$showModal = false; // Flag to show modal
if (isset($_POST['checkout'])) {
    if (!isset($_POST['selected_products'])) {
        $showModal = true;
    } else {
        $whatsappMessage = "Saya ingin memesan:\n";

        foreach ($_POST['selected_products'] as $productId) {
            $quantity = $_POST['quantity'][$productId];

            if ($quantity > 0) {
                $product = $_SESSION['cart'][$productId];
                $whatsappMessage .= "- {$product['name']} (Jumlah: $quantity)\n";
            }
        }

        $whatsappMessage .= "Apakah bisa dibantu?";
        $phoneNumber = "6283849518506"; // Ganti dengan nomor WhatsApp tujuan
        $whatsappMessage = urlencode($whatsappMessage);

        header("Location: https://wa.me/{$phoneNumber}?text={$whatsappMessage}");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            margin-top: 50px;
            padding-bottom: 30px;
        }

        /* Header and Title */
        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
        }

        td {
            background-color: #ffffff;
            font-size: 1rem;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Button Styles */
        .btn {
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 10px;
            padding: 20px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-body {
            font-size: 1rem;
        }

        /* Input Fields */
        input[type="number"] {
            width: 80px;
            padding: 5px;
            text-align: center;
            font-size: 1rem;
        }

        textarea,
        input[type="text"],
        input[type="number"] {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 8px;
            font-size: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h2 {
                font-size: 1.5rem;
            }

            table,
            .btn {
                font-size: 0.9rem;
            }

            .modal-dialog {
                max-width: 90%;
            }

            .container {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <?php include "layout/navbar.php"; ?>

    <div class="container mt-4">
        <h2>Keranjang Belanja</h2>
        <form method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $productId => $product) {
                        $subtotal = $product['price'] * $product['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_products[]" value="<?php echo $productId; ?>">
                            </td>
                            <td><?php echo $product['name']; ?></td>
                            <td>Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                            <td>
                                <input type="number" name="quantity[<?php echo $productId; ?>]" value="<?php echo $product['quantity']; ?>" min="1" max="99" class="form-control">
                            </td>
                            <td>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td><strong>Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" name="checkout" class="btn btn-success">Checkout via WhatsApp</button>
            <button href="#" type="submit" name="clear_cart" class="btn btn-danger">Hapus Keranjang</button>
        </form>
    </div>

    <?php if ($showModal) : ?>
        <!-- Modal (Bootstrap) -->
        <div class="modal fade" id="modalWarning" tabindex="-1" aria-labelledby="modalWarningLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalWarningLabel">Peringatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Pilih produk terlebih dahulu sebelum checkout!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="keranjang.php" class="btn btn-primary">Kembali ke Produk</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Show modal after page load
            window.onload = function() {
                var myModal = new bootstrap.Modal(document.getElementById('modalWarning'), {});
                myModal.show();
            };
        </script>
    <?php endif; ?>



    <?php include "layout/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>