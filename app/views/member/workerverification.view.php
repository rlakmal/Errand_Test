<!DOCTYPE html>
<html lang="en">

<head>
    <title>Worker Verification</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: auto;
        }

        .main {
            padding: 20px;
            width: calc(100% - 260px);
            overflow-x: scroll;
        }

        .verification-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .pdf-widget,
        .stripe-widget {
            width: 48%;
            background-color: #3498db;
            padding: 20px;
            color: #fff;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .pdf-widget:hover,
        .stripe-widget:hover {
            background-color: #2980b9;
        }

        .pdf-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .pdf-popup img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .verification-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .verify-button,
        .unverify-button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            color: #fff;
        }

        .verify-button:hover {
            background-color: #2ecc71;
        }

        .unverify-button:hover {
            background-color: #e74c3c;
        }

        /* Additional Styling */
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .verification-container {
                flex-direction: column;
                align-items: stretch;
            }

            .pdf-widget,
            .stripe-widget {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>
<!-- Scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<!-- content -->
<section id="main" class="main">
    <h2>Worker Verification</h2>

    <div class="verification-container">
        <!-- PDF Widget -->
        <div class="pdf-widget" onclick="showPdfPopup()">
            <p>View PDF</p>
        </div>

        <!-- Stripe Widget -->
        <div class="stripe-widget">
            <p>Stripe Integration Status</p>
            <p>Status: Connected</p>
            <!-- Add more information as needed -->
        </div>
    </div>

    <!-- PDF Popup -->
    <div class="pdf-popup" id="pdfPopup" onclick="hidePdfPopup()">
        <img src="path/to/your/pdf/file.pdf" alt="PDF Document">
    </div>

    <!-- Verification Buttons -->
    <div class="verification-buttons">
        <button class="verify-button">Verify</button>
        <button class="unverify-button">Unverify</button>
    </div>
</section>

<script>
    function showPdfPopup() {
        document.getElementById('pdfPopup').style.display = 'flex';
    }

    function hidePdfPopup() {
        document.getElementById('pdfPopup').style.display = 'none';
    }
</script>
</body>

</html>
