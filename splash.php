<?php
session_start();
$_SESSION['splash_screen'] = true;
header('Refresh: 5; URL=index.php'); // Redirect to the main page after 50 seconds
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Screen</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('background-rs.jpeg'); /* Path to your background image */
            background-size: cover;
            background-position: center;
        }
        .splash-screen {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8); /* Add a white background with some transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 80%; /* Adjust the width as needed */
            max-width: 600px; /* Ensure it doesn't get too wide */
        }
        .splash-screen img {
            max-width: 100%; /* Make sure the image does not overflow */
            height: auto;
            margin-bottom: 20px;
        }
        .splash-screen h1 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
            line-height: 1.5;
        }
        .splash-screen .subtext {
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }
        .info-box {
            background-color: rgba(0, 0, 0, 0.1); /* Add a semi-transparent background */
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .info-box h2 {
            font-size: 20px;
            color: #333;
        }
        .info-box p {
            font-size: 16px;
            color: #666;
            margin: 10px 0 0;
        }
    </style>
</head>
<body>
    <div class="splash-screen">
        <img src="assets/img/logo-kepriprov.png" alt="Logo">
        <h1>SISTEM INFORMASI PERSEDIAAN STOK OBAT</h1>
        <div class="subtext">
            <h1> </h1>
            <h1> </h1>
        </div>
        <div class="info-box">
            <h2>RSUD RAJA AHMAD TABIB</h2>
            <h2>PROVINSI KEPULAUAN RIAU</h2>
            
        </div>
    </div>
</body>
</html>
