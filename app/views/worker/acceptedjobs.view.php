<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;

        }

        .profile-container2 {
            background-color: #ffffff;
            max-width: 80%;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 150px;
            border-radius: 20px;
        }

        .picture .image {
            max-width: 50px;
            border-radius: 50%;
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
            margin-top: -5%;
            float: right;
            background-color: rgb(255, 117, 117);
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
            margin-top: 20px;
            margin-left: 450px;
        }

        .status {
            color: red;
            padding-left: 350px;
            margin-top: -20px;
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workersidebar.php' ?>
    <?php
    if (isset($data['data']) && is_array($data['data']) && count($data['data']) > 0) {
        for ($i = 0; $i < count($data['data']); $i++) {
            $item = $data['data'][$i];
            $image = $images['images'][$i];
    ?>

            <div class="post-container2">
                <div class="profile-container2">
                    <div class="picture">
                        <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $image ?>" alt="placeholder">
                    </div>
                    <div class="index">
                        <div class="profile-name"><?php echo $item->emp_name ?></div>
                        <div class="profile-ratings"><?php echo $item->created ?></div>
                        <div class="profile-type"><?php echo $item->title ?></div>
                        <div class="budget"><?php echo $item->budget ?> /= per day</div>
                        <div class="location"><?php echo $item->city ?></div>
                    </div>
                    <a><button class="view-profile-button" id="request-button">Pending Payment</button></a>
                </div>
            </div>

    <?php
        }
    }
    ?>
</body>

</html>