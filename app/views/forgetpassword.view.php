<!DOCTYPE html>
<html>
<style>
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

    input[type="email"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #f16a2d;
        border-radius: 4px;
        background-color: #f2f2f2;
        color: white;
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

<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">

</head>

<body>
    <?php include 'home/homenavbar.php' ?>

    <h1>Forgot Password</h1>

    <form method="POST">

        <label for="email">email</label>
        <input type="email" name="email" id="email">

        <button type="submit" name="fgtpwd">Send</button>

    </form>

</body>

</html>