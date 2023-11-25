<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerreg.css">
    <title>Registration - Step 1</title>
</head>
<body>
<div class="container">
    <h1>Step 1: Personal Information</h1>
    <form action="<?=ROOT?>/home/workerregnext" method="POST">
        <div class="form-group">
            <label class="label" for="name">Name:</label>
            <input class="input" type="text" id="name" name="name" >
        </div>
        <div class="form-group">
            <label class="label" for="nic">NIC No.:</label>
            <input class="input" type="text" id="nic" name="nic" >
        </div>
<!--        <div class="form-group">-->
<!--            <label class="label" for="email">Email:</label>-->
<!--            <input class="input" type="email" id="email" name="email" required>-->
<!--        </div>-->

        <div class="form-group">
            <label class="label" for="dob">Date of Birth:</label>
            <input class="input" type="date" id="dob" name="dob" >
        </div>
        <div class="form-group">
            <label class="label" for="address">Address:</label>
            <input class="input" type="text" id="address" name="address" >
        </div>
        <div class="form-group">
            <label class="label" for="location">Geographical Location:</label>
            <input class="input" type="text" id="location" name="location" >
        </div>
        <div class="form-group">
            <label for="username">User Name(email):</label>
            <input type="email" id="username" name="username" >
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" >
        </div>
        <div class="form-group">
            <label for="passwordre">Password:Re</label>
            <input type="password" id="passwordre" name="passwordre" >
        </div>
        <button class="button" type="submit">Next</button>
        <a href="<?= ROOT ?>/home" class="active"><button class="button" type="button">Back To Home</button></a>
    </form>
</div>
</body>
</html>
