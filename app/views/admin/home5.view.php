<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .nue {
            overflow-y: scroll;
        }

        .curve-bar {
            position: relative;
            height: 20px;
            width: 100%;
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .filling-bar-verified {
            position: absolute;
            height: 100%;
            width: 0;
            background-color: #4CAF50;
            border-radius: 10px;
            animation: fillAnimationVerified 2s ease-in;
        }

        .filling-bar-completed {
            position: absolute;
            height: 100%;
            width: 0;
            background-color: #4CAF50;
            border-radius: 10px;
            animation: fillAnimationCompleted 2s ease-in;
        }

        @keyframes fillAnimationVerified {
            from {
                width: 0;
            }

            to {
                width: <?= "round($verifiedpercentage)%" ?>;
            }
        }

        @keyframes fillAnimationCompleted {
            from {
                width: 0;
            }

            to {
                width: 60%; /* Adjust the completed jobs percentage accordingly */
            }
        }

        .charts-row {
            display: flex;
            flex-direction: row;
            justify-content: space-between; /* Adjust as needed */
            margin-top: 20px;
            width: 100vw;
        }

        .chart-container {
            width: 50%; /* Adjust the width as needed */
            height: 600px; /* Adjust the height as needed */
            position: relative;
            margin-top: 50px;
            box-shadow: 10px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            background: #e6e6e6;
            border-radius: 15px;
            margin-right: 200px;

        }

        .chart-container h2{
            border-radius: 40px;
            background-color: #ffe6ff;
        }
        .chart-container :hover{
            background: lightgrey;
            cursor: pointer;
        }

        @media screen and (max-width: 768px) {
            .charts-row {
                flex-direction: column;
            }

            .chart-container {
                width: 100%;
            }
        }

    </style>
</head>

<body>

</body>

</html>
