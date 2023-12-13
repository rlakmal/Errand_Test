<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Prompt</title>
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

        h1 {
            color: #3498db;
        }

        p {
            margin-bottom: 20px;
        }

        .status {
            font-weight: bold;
            color: #e74c3c; /* You can change the color based on the status */
        }
    </style>
</head>
<body>

<div class="verification-container">
    <h1>Email Verification</h1>
    <p>Hi <?php echo $data->name; ?>,</p>
    <p>Check your inbox at <?php echo $data->email; ?> for a verification email.</p>
    <p class="status">Status: <?php echo $data->status; ?></p>
</div>

</body>
</html>
