<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VerifyWorker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f8ff;
            color: black;
        }

        .otp_form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        h1 {
            margin: 5%;
            display: flex;
            align-items: center;
            color: black;
            justify-content: center;
        }

        form {
            width: 30%;
            height: 196px;
            margin: 0 auto;
            background-color: #f8fbff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #f16a2d;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #f16a2d;
        }

        input[type="otp"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f16a2d;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: black;
        }


        button[type="submit"] {
            background-color: #f16a2d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #d9534f;
        }
    </style>
</head>

<body>
    <?php include 'homenavbar.php' ?>
    <div class="otp_form">
        <form method="POST">
            <label for="password">OTP has already sent to your email</label>
            <label for="password">Enter OTP</label>
            <input type="otp" id="otp" name="otp">

            <button type="submit" name="submit_otp">Submit</button>
        </form>
    </div>


</body>

</html>