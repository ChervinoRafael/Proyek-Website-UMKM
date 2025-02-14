<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wiendys_tissue";

$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);
if ($conn->connect_error) {
    die("koneksi gagal" . $conn->connect_error);
}
