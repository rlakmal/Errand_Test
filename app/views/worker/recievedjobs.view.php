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
        // Check if there is data in @item
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
                            <div class="profile-ratings">3 hrs ago</div>
                            <div class="profile-type"><?php echo $item->title ?></div>
                            <div class="budget"><?php echo $item->budget ?> /= per day</div>
                            <div class="location"><?php echo $item->city ?></div>

                        </div>
                        <div class="status">Expire in 3 Days</div>
                        <a><button class="view-profile-button">Reject</button></a>
                        <a><button class="edit-profile-button">Accept</button></a>
                        <a><button class="request-profile-button">Request Budget</button></a>
                    </div>
                </div>

        <?php
            }
        } else {
            // Display a message or take alternative action when there is no data
            // echo "<p>No data available.</p>";
        }
        ?>
    </div>

</body>

</html>