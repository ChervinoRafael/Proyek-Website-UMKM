<?php
// Membaca daftar gambar dari file JSON
$banners_file = '../json/banners.json';  // Mengakses file JSON dari folder json
$banners = json_decode(file_get_contents($banners_file));

// Proses upload gambar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['banner_image'])) {
    $target_dir = "../img/";  // Gambar akan disalin ke folder img
    $target_file = $target_dir . basename($_FILES["banner_image"]["name"]);

    // Validasi file gambar
    if (move_uploaded_file($_FILES["banner_image"]["tmp_name"], $target_file)) {
        // Menambahkan gambar baru ke daftar (hanya nama file yang disimpan di JSON)
        $banners[] = basename($target_file);  // Menyimpan nama file, bukan seluruh jalur
        file_put_contents($banners_file, json_encode($banners));
}

// Proses hapus gambar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_banner'])) {
    $banner_to_delete = $_POST['delete_banner'];

    // Menghapus gambar dari daftar dan memperbarui file JSON
    $banners = array_filter($banners, fn($banner) => $banner !== $banner_to_delete);
    $banners = array_values($banners);  // Mengatur ulang indeks array
    file_put_contents($banners_file, json_encode($banners));

}
}

// testimonial 

// Lokasi file JSON yang menyimpan testimonial
$testimonials_file = '../json/testimonial.json';

// Membaca data testimonial dari file JSON
$testimonials = json_decode(file_get_contents($testimonials_file), true);

// Proses menambahkan testimonial baru
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['testimonial_text'], $_POST['author'], $_POST['role'])) {
    $new_testimonial = [
        'text' => $_POST['testimonial_text'],
        'author' => $_POST['author'],
        'role' => $_POST['role']
    ];

    // Menambahkan testimonial baru ke array
    $testimonials[] = $new_testimonial;

    // Menyimpan kembali data testimonial ke file JSON
    file_put_contents($testimonials_file, json_encode($testimonials));

    echo "<div class='alert alert-success'>Testimonial berhasil ditambahkan!</div>";
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Resetting Default Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            min-height: 100vh;
            color: #333;
        }

        h2,
        h3 {
            font-weight: bold;
            color: #29a067;
        }

        /* Layout: Sidebar */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #29a067;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 30px;
            color: white;
            box-shadow: 4px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            font-size: 24px;
            padding-left: 20px;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #218838;
        }

        /* Layout: Main Content */
        .main-content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            transition: margin-left 0.3s ease;
        }

        /* Form Elements */
        .form-control {
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #29a067;
            box-shadow: 0 0 5px rgba(41, 160, 103, 0.5);
        }

        /* Buttons */
        .btn {
            border-radius: 6px;
            padding: 8px 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #29a067;
            border: none;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #29a067;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Card Styling */
        .card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-body form button {
            background-color: #dc3545;
            border: none;
            padding: 8px 16px;
            color: white;
            border-radius: 5px;
        }

        .card-body form button:hover {
            background-color: #c82333;
        }

        /* Blockquote (Testimonial) Styling */
        blockquote {
            background-color: #e9f7e7;
            border-left: 5px solid #29a067;
            padding: 15px 20px;
            font-style: italic;
            font-size: 1.1rem;
            border-radius: 5px;
            margin: 10px 0;
        }

        blockquote footer {
            font-weight: bold;
            font-size: 1rem;
            color: #29a067;
        }

        /* Alerts Styling */
        .alert {
            border-radius: 6px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #29a067;
            color: white;
            margin-top: 30px;
        }

        footer p {
            margin: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                top: 0;
            }

            .sidebar a {
                text-align: center;
            }

            .sidebar h2 {
                font-size: 20px;
            }

            .container {
                margin-left: 20px;
                margin-right: 20px;
            }
        }
    </style>
</head>

<body>

    <?php include "side bar.php"; ?>

    <div class="main-content">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Kelola Banner</h2>

            <!-- Form untuk mengupload gambar banner baru -->
            <form action="tampilan.php" method="POST" enctype="multipart/form-data" class="mb-4">
                <div class="mb-3">
                    <label for="banner_image" class="form-label">Upload Gambar Banner Baru:</label>
                    <input type="file" name="banner_image" id="banner_image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

            <h3>Banner Saat Ini</h3>
            <div class="row">
                <?php foreach ($banners as $banner): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="../img/<?= $banner ?>" class="card-img-top" alt="Banner" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <form action="tampilan.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="delete_banner" value="<?= $banner ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus dari JSON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <hr>

            <h2 class="text-center mb-4">Kelola Testimonial</h2>

            <!-- Formulir untuk menambah testimonial -->
            <form action="testimonials.php" method="POST" class="mb-4">
                <div class="mb-3">
                    <label for="testimonial_text" class="form-label">Isi Testimonial:</label>
                    <textarea name="testimonial_text" id="testimonial_text" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Nama Penulis:</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Peran Penulis:</label>
                    <input type="text" name="role" id="role" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Tambah Testimonial</button>
            </form>

            <h3>Testimonial yang Ada</h3>
            <ul class="list-unstyled">
                <?php foreach ($testimonials as $testimonial): ?>
                    <li class="mb-3">
                        <blockquote class="blockquote">
                            <p>"<?= $testimonial['text'] ?>"</p>
                            <footer class="blockquote-footer"><?= $testimonial['author'] ?>, <cite title="Source Title"><?= $testimonial['role'] ?></cite></footer>
                        </blockquote>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>