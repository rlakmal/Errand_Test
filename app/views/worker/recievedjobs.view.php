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
                // Fixed 3-day countdown
                $expirationDate = $item->time_remain + (3 * 24 * 60 * 60); // 3 days in seconds
                $timeRemaining = max(0, $expirationDate - time()); // Ensure the remaining time is non-negative
        ?>
                <?php
                if (!($item->status == 'Canceled')) {
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

                            <div class="status"><?php echo remain_Time($timeRemaining, $item->status); ?></div>

                            <?php
                            // Display buttons only if time has not expired
                            if ($item->status == 'Pending') {
                            ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                    <button type="submit" name="Reject" value="Reject" class="view-profile-button">Reject</button>
                                    <a><button type="submit" name="Accept" value="Accept" class="edit-profile-button">Accept</button></a>
                                    <a><button type="submit" name="Request" value="Request" class="request-profile-button">Request Budget</button></a>
                                </form>
                            <?php
                            } else {
                            ?>
                                <a><button class="view-profile-button"><?php echo $item->status ?></button></a>
                            <?php
                            }
                            ?>
                        <?php
                    }
                        ?>
                        </div>
                    </div>

            <?php
            }
        }

        function remain_Time($seconds, $status)
        {
            if ($seconds >= 60 && $status == 'Pending') {
                $days = floor($seconds / (24 * 60 * 60));
                $hours = floor(($seconds % (24 * 60 * 60)) / (60 * 60));
                $minutes = floor(($seconds % (60 * 60)) / 60);
                return "Expire in $days days $hours hours $minutes minutes";
            } elseif ($status == 'Expired') {
                return "Expired";
            }
        }
            ?>
    </div>

</body>

</html>