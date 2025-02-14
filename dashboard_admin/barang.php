<?php
include "side bar.php";
include __DIR__ . "/../service/db.php";

$query = "SELECT * FROM produk";
$result = mysqli_query($conn, $query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id_barang'] ?? null;
    $nama = $_POST['nama'] ?? '';
    $harga = $_POST['harga'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';
    $gambar = $_POST['gambar'] ?? '';

    if ($action !== 'delete') {
        if (empty($nama) || empty($harga)) {
            die("Nama dan harga produk harus diisi.");
        }
        if (!is_numeric($harga)) {
            die("Harga dan jumlah harus berupa angka.");
        }
    }

    if ($action === 'add') {
        $query = "INSERT INTO produk (nama, harga, deskripsi, jumlah, gambar) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sdsss", $nama, $harga, $deskripsi, $jumlah, $gambar);
        mysqli_stmt_execute($stmt);
        header('Location: ' . htmlspecialchars($_SERVER['PHP_SELF']) . '?success=add');
        exit;
    }

    if ($action === 'edit' && $id) {
        $query = "UPDATE produk SET nama=?, harga=?, deskripsi=?, jumlah=?, gambar=? WHERE id_barang=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sdsssi", $nama, $harga, $deskripsi, $jumlah, $gambar, $id);
        mysqli_stmt_execute($stmt);
        header('Location: ' . htmlspecialchars($_SERVER['PHP_SELF']) . '?success=edit');
        exit;
    }

    if ($action === 'delete' && $id) {
        $query = "DELETE FROM produk WHERE id_barang=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        header('Location: ' . htmlspecialchars($_SERVER['PHP_SELF']) . '?success=delete');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: row;
            height: 100vh;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            background-color: #29a067;
            padding-top: 20px;
            color: white;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
        }

        .sidebar a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #218838;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 250px);
            overflow-y: auto;
            transition: margin-left 0.3s ease;
        }

        .form-control,
        .btn {
            border-radius: 8px;
        }

        .form-control {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #29a067;
            box-shadow: 0 0 5px rgba(41, 160, 103, 0.5);
        }

        .table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px 15px;
        }

        .table th {
            background-color: #29a067;
            color: white;
        }

        .btn-success,
        .btn-warning,
        .btn-danger {
            padding: 12px 18px;
            font-size: 15px;
        }

        .btn-success {
            background-color: #29a067;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        form {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #29a067;
            box-shadow: 0 0 8px rgba(41, 160, 103, 0.5);
        }

        textarea.form-control {
            resize: none;
            height: 100px;
        }

        .btn-success {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            background-color: #29a067;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            form {
                padding: 15px;
                max-width: 100%;
            }

            .btn-success {
                font-size: 14px;
                padding: 10px;
            }
        }


        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .form-control {
                font-size: 14px;
                padding: 10px;
            }

            .btn {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Form Tambah Produk -->
        <form method="POST" class="mb-4">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="text" class="form-control" name="jumlah" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar (URL)</label>
                <input type="" class="form-control" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah Produk</button>
        </form>

        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                    <td><?= htmlspecialchars($row['jumlah']) ?></td>
                    <td><img src="../<?= htmlspecialchars($row['gambar']) ?>" width="100"></td>
                    <td>
                        <button class="btn btn-warning btn-edit"
                            data-id="<?= $row['id_barang'] ?>"
                            data-nama="<?= $row['nama'] ?>"
                            data-harga="<?= $row['harga'] ?>"
                            data-deskripsi="<?= $row['deskripsi'] ?>"
                            data-jumlah="<?= $row['jumlah'] ?>"
                            data-gambar="<?= $row['gambar'] ?>"
                            data-bs-toggle="modal" data-bs-target="#editModal">
                            Edit
                        </button>

                        <!-- Tombol Hapus Produk -->
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="id_barang" value="<?= $row['id_barang'] ?>">
                            <button type="submit" name="action" value="delete" class="btn btn-danger">Hapus</button>
                        </form>

                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" id="edit-id" name="id_barang">
                        <div class="mb-3">
                            <label for="edit-nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="edit-nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="edit-harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="edit-harga" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="edit-deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="edit-deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit-jumlah" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="edit-jumlah" name="jumlah">
                        </div>
                        <div class="mb-3">
                            <label for="edit-gambar" class="form-label">Gambar</label>
                            <input type="text" class="form-control" id="edit-gambar" name="gambar">
                        </div>
                        <button type="submit" name="action" value="edit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-edit').forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('edit-id').value = this.dataset.id;
                    document.getElementById('edit-nama').value = this.dataset.nama;
                    document.getElementById('edit-harga').value = this.dataset.harga;
                    document.getElementById('edit-deskripsi').value = this.dataset.deskripsi;
                    document.getElementById('edit-jumlah').value = this.dataset.jumlah;
                    document.getElementById('edit-gambar').value = this.dataset.gambar;
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.search.includes('success=delete')) {
                setTimeout(() => {
                    window.history.replaceState({}, document.title, window.location.pathname);
                    var modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                    if (modal) modal.hide(); // Menutup modal jika terbuka
                }, 500);
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>