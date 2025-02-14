<?php include "service/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
            header("Location: dashboard_admin/barang.php");
        } else {
            header("Location: home.php");
        }
        exit();
    } else {
        echo "<script>alert('Username atau password salah!'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f4f4;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-login {
            background-color: #1f7a4e;
            color: white;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #57c492;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #1f7a4e;
            box-shadow: 0 0 5px rgba(31, 122, 78, 0.5);
        }

        .forgot-password {
            text-align: right;
            font-size: 14px;
        }

        .forgot-password a {
            text-decoration: none;
            color: #1f7a4e;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan password" required>
            </div>
            <div class="forgot-password">
                <a href="#">Lupa password?</a>
            </div>
            <button type="submit" class="btn btn-login w-100 mt-3">Masuk</button>
        </form>
        <p class="text-center mt-3">Belum punya akun? <a href="daftar.php" style="color:#1f7a4e; font-weight:600;">Daftar</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>