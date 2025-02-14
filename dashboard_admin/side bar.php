<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>
    <style>
        body {
            display: flex;
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

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .main-content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 20px;
            transition: all 0.3s;
        }

        #toggleSidebar {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
        }

        /* Sidebar Hidden */
        .sidebar.hidden {
            width: 60px;
        }

        .sidebar.hidden ul li {
            text-align: center;
        }

        .sidebar.hidden ul li a {
            display: none;
        }

        .main-content.expanded {
            margin-left: 60px;
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <button class="btn btn-primary" id="toggleSidebar">☰</button>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="dashboard utama.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="barang.php">Produk</a></li>
            <li class="nav-item"><a class="nav-link" href="tampilan.php">tampilan</a></li>
            <li class="nav-item"><a class="nav-link" href="masukan.php">masukan/feedback</a></li>
            <li class="nav-item"><a class="nav-link" href="../home.php">Logout</a></li>
        </ul>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById("sidebar");
            const toggleSidebar = document.getElementById("toggleSidebar");
            const mainContent = document.querySelector(".main-content");

            toggleSidebar.addEventListener("click", function() {
                sidebar.classList.toggle("hidden");
                mainContent.classList.toggle("expanded");
            });
        });
    </script>
</body>

</html>