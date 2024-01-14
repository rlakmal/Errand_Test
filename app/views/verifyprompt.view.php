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
            background: linear-gradient(135deg, #87CEEB, #1E90FF);
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

        .verification-container h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .verification-message {
            font-size: 20px;
            color: #555;
            margin-bottom: 20px;
            font-weight: bold;
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

        .status {
            font-weight: bold;
            color: #1E90FF;
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
            background: #1E90FF;
            padding: 15px 30px;
            border-radius: 8px;
            transition: background 0.3s ease-in-out;
            font-size: 18px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .login-link:hover {
            background: #00BFFF;
        }

        .envelope-icon {
            font-size: 120px;
            color: #1E90FF;
            margin-bottom: 20px;
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.2);
            animation: bounce 1s infinite alternate;
        }

        @keyframes bounce {
            to {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>
<i class="fas fa-envelope background-icon"></i>
<div class="verification-container">
    <div class="envelope-icon"><i class="fas fa-envelope-open-text"></i></div>
    <h1>One More Step!</h1>
    <p class="verification-message">Hi <?php echo $data->name; ?>,</p>
    <p class="email-address">Check your inbox at <?php echo $data->email; ?> for a verification email.</p>
    <p class="status">Status: <?php echo $data->status; ?></p>
</div>
</body>

</html>
