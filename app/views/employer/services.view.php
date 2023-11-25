<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/services.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerPost.css">


    <title>Document</title>
</head>

<body>
    <?php include 'employernav.php' ?>
    <?php include 'empfilter.php' ?>
    <div class="set-margin" id="set-marginid">
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {


        ?>
                <div class="main-container2">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->name ?></div>
                            <div class="profile-type"><?php echo $item->category ?></div>
                            <div class="profile-ratings">Ratings: 4.9</div>
                            <div class="job-count">Jobs Completed: 50+</div>
                            <div class="location"><?php echo $item->city ?></div>

                        </div>
                        <a href="<?= ROOT ?>/employer/workerprof?id=<?php echo $item->id ?>"><button class="view-profile-button">View Profile</button></a>

                    </div>
                </div>
        <?php
            }
        }
        ?>



</body>

</html>