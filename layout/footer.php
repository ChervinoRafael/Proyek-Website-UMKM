<?php
// Lokasi file JSON untuk menyimpan feedback
$feedback_file = './json/feedback.json';  

// Membaca data feedback yang sudah ada
$feedbacks = json_decode(file_get_contents($feedback_file), true);

// Proses kirim feedback
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['feedback_text'])) {
    // Mendapatkan data feedback dari form
    $new_feedback = [
        'text' => $_POST['feedback_text'],
        'timestamp' => date('Y-m-d H:i:s')  // Menyimpan waktu kirim feedback
    ];

    // Menambahkan feedback baru ke dalam array
    $feedbacks[] = $new_feedback;

    // Menyimpan feedback yang baru ditambahkan ke file JSON
    file_put_contents($feedback_file, json_encode($feedbacks));

    // Memberikan pesan sukses setelah feedback berhasil dikirim
    echo "<div class='alert alert-success'>Terima kasih atas feedback Anda!</div>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Weindy's Tissue</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        footer {
            background-color: #4cae7b;
            color: white;
            padding: 30px;
            padding-bottom: 20px;
            width: 100%;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: start;
            max-width: 1200px;
            margin: auto;
            gap: 20px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
        }

        .social-links a {
            color: white;
            font-size: 24px;
            margin-right: 15px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .social-links a:hover {
            transform: scale(1.1);
            color: #29a067;
        }

        .feedback-textarea {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            resize: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .feedback-textarea:focus {
            border-color: #29a067;
            outline: none;
            box-shadow: 0 0 8px rgba(41, 160, 103, 0.5);
        }

        .feedback-button {
            background-color: #29a067;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .feedback-button:hover {
            background-color: #218c57;
            transform: scale(1.05);
        }

        .maps iframe {
            border-radius: 8px;
            width: 100%;
            height: 250px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            z-index: 1000;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/6283849518506" target="_blank" class="whatsapp-float">
        <i class="bi bi-whatsapp" style="font-size: 28px;"></i>
    </a>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <!-- Contact Section -->
            <div class="footer-section">
                <h5>Contact & Social</h5>
                <div class="social-links">
                    <a href="https://www.instagram.com/example" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="mailto:info@example.com"><i class="bi bi-envelope"></i></a>
                </div>
            </div>

            <!-- Feedback Section -->
            <div class="footer-section">
                <h5>Feedback</h5>
                <form action="" method="POST">
                    <textarea name="feedback_text" class="feedback-textarea" rows="3" placeholder="Masukkan feedback Anda" required></textarea>
                    <button type="submit" class="feedback-button mt-2">Kirim</button>
                </form>
            </div>


            <!-- Maps Section -->
            <div class="footer-section">
                <h5>Location</h5>
                <div class="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.485762788556!2d112.7495777741126!3d-7.299192571751613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbaf75f40955%3A0xc69c3eebed725709!2sJl.%20Bratang%20Gede%20II%20No.7%2C%20RT.004%2FRW.07%2C%20Ngagelrejo%2C%20Kec.%20Wonokromo%2C%20Surabaya%2C%20Jawa%20Timur%2060245!5e0!3m2!1sid!2sid!4v1736914109076!5m2!1sid!2sid" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; 2025 Wiendy's Tissue - Designed by Kelompok 5 PJBL Rpl 1</p>
        </div>
    </footer>

</body>

</html>