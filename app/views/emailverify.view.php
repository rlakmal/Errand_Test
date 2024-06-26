<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #FFA07A, #FF6347);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            overflow: hidden;
        }

        .background-icon {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 300px;
            color: rgba(255, 255, 255, 0.1);
            pointer-events: none;
            z-index: -1;
        }

        .verification-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 80%;
            margin: 20px;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .verification-container h2 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .verification-message {
            font-size: 20px;
            margin-bottom: 20px;
            color: #555;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .status {
            font-weight: bold;
            color: #FF6347;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .email-address {
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
            display: block;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .thank-you-message {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-link {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            background: #FF6347;
            padding: 15px 30px;
            border-radius: 8px;
            transition: background 0.3s ease-in-out;
            font-size: 18px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-link:hover {
            background: #FF4500;
        }

        .envelope-icon {
            font-size: 120px;
            color: #FF6347;
            margin-bottom: 20px;
            animation: bounce 1s infinite alternate;
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);
        }

        @keyframes bounce {
            to {
                transform: translateY(-10px);
            }
        }

        .corner-image {
            position: absolute;
            top: 20px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
            width: 300px; /* Adjust as needed */
            height: auto; /* Adjust as needed */
            z-index: 1; /* Ensure it's above the background icon */
        }
    </style>
</head>

<body>
<img src="<?=ROOT?>/assets/images/logoe2.png" alt="Corner Image" class="corner-image">

<i class="fas fa-envelope background-icon"></i>
<div class="verification-container">
    <div class="envelope-icon"><i class="fas fa-envelope-open-text"></i></div>
    <h2>Your Email Address is Successfully Verified!</h2>
    <div class="verification-message">Hello <span class="status"><?= $data->name ?>!</span></div>
    <div class="email-address"><?= $data->email ?></div>
    <div class="status">Status: <span class="status"><?= $data->status ?></span></div>
    <div class="thank-you-message">Thank you for Registering on Errand!</div>
    <div><a href="<?= ROOT ?>/home/signin2" class="login-link">Click here to log in</a></div>
</div>
</body>

</html>
