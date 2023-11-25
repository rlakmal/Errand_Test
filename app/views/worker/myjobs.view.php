<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <style>
        .homenavbar {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;

        }

        .profile-container2 {
            background-color: #ffffff;
            width: 900px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 150px;
            border-radius: 20px;
        }

        .picture .image {
            max-width: 40px;
        }

        .profile-name {
            font-size: 18px;
            font-weight: 600;
            color: #000;
            font-family: 'Lato', sans-serif;
            margin: 10px 0;
        }

        .profile-type {
            font-size: 15px;
            font-weight: 700;
            color: #000;
            font-family: 'Lato', sans-serif;
            margin: 10px 0;
        }

        .profile-ratings {
            font-size: 16px;
            color: #666;

        }

        .budget {
            font-size: 18px;
            color: black;
        }

        .location {
            float: right;
            font-size: 16px;
            /* Adjust the font size to make it readable */
            color: black;
            margin-top: -100px;
        }

        .view-profile-button {
            margin-top: -40px;
            float: right;
            background-color: #ff7f00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            display: block;
            text-align: center;
            border-radius: 20px;
        }

        .edit-profile-button {
            margin-top: -40px;
            margin-left: 700px;
            background-color: #ff7f00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            display: block;
            text-align: center;
            border-radius: 20px;
        }

        .index {
            margin-top: -50px;
            margin-left: 60px;
        }

        .post-container2 {
            margin-left: 450px;
        }

        .status {
            color: red;
            padding-left: 550px;
            margin-top: -20px;
        }

        .worker-tab {
            margin-top: 80px;
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'jobnav.php' ?>
    <div class="worker-tab">
        <?php for ($i = 0; $i <  5; $i++) {
            echo $i; ?>

            <div class="post-container2">
                <div class="profile-container2">
                    <div class="picture">
                        <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
                    </div>
                    <div class="index">
                        <div class="profile-name">Dasun</div>
                        <div class="profile-ratings">3 hrs ago</div>
                        <div class="profile-type">Need an Electrician</div>
                        <div class="budget">RS 4000/= per day</div>
                        <div class="location">Gampaha</div>

                    </div>
                    <div class="status">Expire in 3 Days</div>
                    <a></a><button class="view-profile-button">Cancel Request</button></a>

                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>