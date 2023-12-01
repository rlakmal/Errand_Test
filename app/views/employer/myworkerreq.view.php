<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myworkerrequest.css">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <?php include 'employernav.php' ?>
    <?php include 'jobnav.php' ?>
    <diV class="set_margin">
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {

        ?>
                <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image  ?>" alt="">
                        </div>
                        <div class="index">
                            <div class="profile-name">My Post - <?php echo $item->title ?></div>
                            <div class="profile-ratings">2 hrs ago</div>
                            <div class="profile-type">Request To - <?php echo $item->worker_name ?></div>
                            <div class="budget">Budget - <?php echo $item->budget ?> /= per day</div>
                            <div class="location"><?php echo $item->city ?></div>

                        </div>
                        <a><button class="view-profile-button">Pending</button></a>
                        <a><button class="worker-profile-button">Cancel</button></a>

                    </div>
                </div>

        <?php
            }
        }


        ?>
    </diV>




</body>

</html>