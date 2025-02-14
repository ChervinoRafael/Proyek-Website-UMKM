<?php include "service/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user';

    $query = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Pendaftaran berhasil! Silakan login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal!'); window.location.href='daftar.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f4f4;
        }

        .register-container {
            max-width: 450px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-register {
            background-color: #1f7a4e;
            color: white;
            font-weight: 600;
        }

        .btn-register:hover {
            background-color: #57c492;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #1f7a4e;
            box-shadow: 0 0 5px rgba(31, 122, 78, 0.5);
        }

        .login-link {
            text-align: center;
            font-size: 14px;
        }

        .login-link a {
            text-decoration: none;
            color: #1f7a4e;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2>Daftar Akun</h2>
        <form action="daftar.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Usernmae</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Buat password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Ulangi password" required>
            </div>
            <button type="submit" class="btn btn-register w-100 mt-3">Daftar</button>
        </form>
        <p class="login-link mt-3">Sudah punya akun? <a href="login.php">Masuk</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>