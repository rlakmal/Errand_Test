<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f8ff;
            color: white;
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

        input[type="password"] {
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

    <h1>Reset Password</h1>

    <form method="POST">

        <!-- <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>"> -->

        <label for="password">New password</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button type="submit" name="reset">Send</button>
    </form>

</body>

</html>