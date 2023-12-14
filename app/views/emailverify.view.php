<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .verification-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .verification-message {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .status {
            font-weight: bold;
            color: #1abc9c;
        }

        .login-link {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="verification-container">
    <h2>Email Verification</h2>
    <p class="verification-message">Dear <span class="status"><?= $data->name ?></span>,</p>
    <p>Your email has been verified successfully!</p>
    <p><?php echo $data->email ?> /p>

    <p>Status: <span class="status"><?= $data->status ?></span></p>
    <p>Thank you for using our service.</p>
    <p>Click <a href="<?=ROOT?>/home/signin2" class="login-link">here</a> to log in.</p>
</div>
</body>

</html>
