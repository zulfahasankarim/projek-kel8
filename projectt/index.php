<?php
// index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Nurul Fikri UMKM</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --accent-color: #f39c12;
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #3498db, #2ecc71);
            color: white;
            font-family: 'Segoe UI', sans-serif;
            scroll-behavior: smooth;
        }

        header {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 2rem;
        }

        header h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        header p {
            font-size: 1.25rem;
            margin-top: 1rem;
        }

        .btn-login {
            background-color: var(--accent-color);
            border: none;
            padding: 12px 30px;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            margin-top: 30px;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #e67e22;
        }

        section.messages {
            background-color: white;
            color: #333;
            padding: 60px 20px;
            border-top-left-radius: 40px;
            border-top-right-radius: 40px;
        }

        .messages h2 {
            text-align: center;
            margin-bottom: 40px;
            color: var(--primary-color);
        }

        .message {
            max-width: 700px;
            margin: 20px auto;
            background-color: #f4f4f4;
            border-left: 6px solid var(--primary-color);
            padding: 20px;
            border-radius: 8px;
            font-size: 1.1rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <!-- Header section -->
    <header>
        <h1>Selamat Datang di Nurul Fikri UMKM</h1>
        <p>Mendukung kemajuan UMKM STT Nurul Fikri melalui teknologi.</p>
        <a href="login.php" class="btn btn-login">Masuk Sekarang</a>
    </header>

    <!-- Motivational / Info messages -->
    <section class="messages">
        <h2>Pesan dan Informasi untuk Anda</h2>

        <div class="message">
            💡 <strong>UMKM Kuat, Ekonomi Hebat!</strong> – Bersama kita bangun kemandirian ekonomi melalui inovasi.
        </div>

        <div class="message">
            🚀 <strong>Digitalisasi Bisnis</strong> – Mulailah mencatat penjualan, stok, dan pelanggan Anda secara digital!
        </div>

        <div class="message">
            🤝 <strong>Kolaborasi Adalah Kunci</strong> – Jangan ragu untuk bekerja sama dengan UMKM lainnya demi pertumbuhan bersama.
        </div>

        <div class="message">
            📈 <strong>Manfaatkan Data</strong> – Data penjualan yang rapi akan bantu Anda ambil keputusan terbaik untuk bisnis.
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
