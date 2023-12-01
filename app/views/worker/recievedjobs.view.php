<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/recievdjob.css">
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'jobnav.php' ?>
    <div class="set_margin">
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {

        ?>
                <div class="post-container2">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->emp_name ?></div>
                            <div class="profile-ratings">3 hrs ago</div>
                            <div class="profile-type"><?php echo $item->title ?></div>
                            <div class="budget"><?php echo $item->budget ?> /= per day</div>
                            <div class="location"><?php echo $item->city ?></div>

                        </div>
                        <div class="status">Expire in 3 Days</div>
                        <a></a><button class="view-profile-button">Reject</button></a>
                        <a></a><button class="edit-profile-button">Accept</button></a>
                        <a></a><button class="request-profile-button">Request Budget</button></a>

                    </div>
                </div>

        <?php

            }
        }


        ?>
    </div>


</body>

</html>