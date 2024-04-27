<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/postedjobrequest.css">
    <title>Document</title>
</head>

<body>
    <?php include 'employernav2.php' ?>
    <?php include 'myjobsidebar.php' ?>

    <div class="set-margin" id="set-marginid">
        <section id="main" class="main">
            <h2>Requests From Workers To Your Jobs</h2>
        </section>
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {
                //show($item);
                $expire = $item->expire_date; // Assuming $item->expire_date contains the expiration date/time
                $current = time();
                $expire_timestamp = strtotime($expire);
                $remaining = $expire_timestamp - $current;
                $remaining_days = floor($remaining / (60 * 60 * 24));
                $remaining_hours = floor(($remaining % (60 * 60 * 24)) / (60 * 60));
                $remaining_minutes = floor(($remaining % (60 * 60)) / 60);
                //show("Remaining time: $remaining_days days, $remaining_hours hours, $remaining_minutes minutes");
                if ($remaining_days <= 0 && $remaining_hours <= 0 && $remaining_minutes <= 0) {
                    $expire_in = "Expired";
                } elseif ($remaining_days <= 0 && $remaining_hours <= 0) {
                    $expire_in = "Expire In $remaining_minutes minutes";
                } elseif ($remaining_days <= 0) {
                    $expire_in = "Expire In $remaining_hours hours, $remaining_minutes minutes";
                } else {
                    $expire_in = "Expire In $remaining_days days, $remaining_hours hours, $remaining_minutes minutes";
                }


        ?>
                <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
                        </div>

                        <div class="<?php if ($item->status == 'Pending') {
                                        echo 'b_index';
                                    } else {
                                        echo 'index';
                                    } ?>">
                            <div class="profile-name">POST Title</div>
                            <div class="profile-ratings">Date Time</div>
                            <div class="profile-type">WORKER </div>
                            <div class="budget">WORKER's Budget</div>



                        </div>
                        <div class="<?php if ($item->status == 'Pending') {
                                        echo 'b_index_info';
                                    } else {
                                        echo 'index_info';
                                    } ?>">
                            <div>- <?php echo $item->title ?></div>
                            <div>- <?php echo $item->created ?></div>
                            <div>- <?php echo $item->worker_name ?></div>
                            <div>- <?php echo $item->newbudget ?></div>
                            <?php if ($item->status == 'Pending') { ?>
                                <div class="expire_msg">- <?php echo $expire_in ?></div>
                            <?php } else
                            ?>


                        </div>
                        <div class="index-right">
                            <div class="location">
                                <?php echo $item->city ?>
                                <i class="bx bxs-map icon"></i>
                            </div>
                            <div class="buton_bar">
                                <?php
                                if ($item->status == 'Pending') {

                                ?>


                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                        <input type="hidden" name="job_id" value="<?php echo $item->job_id ?>">
                                        <input type="hidden" name="emp_id" value="<?php echo $item->emp_id ?>">
                                        <input type="hidden" name="worker_id" value="<?php echo $item->worker_id ?>">
                                        <input type="hidden" name="title" value="<?php echo $item->title ?>">
                                        <input type="hidden" name="newbudget" value="<?php echo $item->newbudget ?>">
                                        <input type="hidden" name="worker_name" value="<?php echo $item->worker_name ?>">
                                        <input type="hidden" name="location" value="<?php echo $item->location ?>">
                                        <button type="submit" name="Accept" value="Accept" class="view-profile-button" onclick="return confirm('Are you sure you want to accept this?');">Accept</button>
                                        <button type="submit" name="Reject" value="Reject" class="edit-profile-button" onclick="return confirm('Are you sure you want to reject this?');">Reject</button>

                                    </form>
                                    <a href="<?= ROOT ?>/employer/workerprof?id=<?php echo $item->worker_id ?>"><button class="worker-profile-button">Worker Profile</button></a>
                                <?php
                                } else {
                                ?>
                                    <button class="<?php if ($item->status == 'Accepted') {
                                                        echo "greenbutton";
                                                    } elseif ($item->status == 'Rejected') {
                                                        echo "redbutton";
                                                    } elseif ($item->status == 'Expired') {
                                                        echo "redbutton";
                                                    }
                                                    ?>"><?php echo $item->status ?></button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>


        <?php
            }
        }
        ?>
    </div>
    <script>
        setTimeout(function() {
            location.reload();
        }, 60000);
    </script>
</body>

</html>