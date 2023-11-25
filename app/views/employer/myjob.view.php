<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobPost.css">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobpopup.css">
    <title>Errand</title>
</head>

<body>

    <?php include 'employernav.php' ?>
    <?php include 'jobnav.php' ?>
    <div class="set-margin" id="set-marginid">
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {
                // show($item);

                // තණකොළ කැපීමට සේවකයෙකු අවශ්‍යයි
                date_default_timezone_set('Asia/Kolkata');

                $date1 = new DateTime($item->created);
                $date2 = new DateTime();

                // Calculate the difference between the dates
                $interval = $date1->diff($date2);

                $days_difference = $interval->days;
                $hours_difference = $interval->h;
                $minutes_difference = $interval->i;
                $seconds_difference = $interval->s;

                if ($days_difference > 0) {
                    $times_ago = $days_difference . " days ago";
                } elseif ($hours_difference > 0) {
                    $times_ago = $hours_difference . " hours ago";
                } elseif ($minutes_difference > 0) {
                    $times_ago = $minutes_difference . " minutes ago";
                } elseif ($seconds_difference > 0) {
                    $times_ago = $seconds_difference . " seconds ago";
                } elseif ($seconds_difference == 0) {
                    $times_ago = " Just Now";
                }
        ?>
                <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image  ?>" alt="placeholder">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->emp_name ?></div>
                            <div class="profile-ratings"><?php echo $times_ago ?></div>
                            <div class="profile-type"><?php echo $item->jobTitle ?></div>
                            <div class="budget">Rs <?php echo $item->budget ?> /= per day</div>
                            <div class="location"><?php echo $item->city ?></div>

                        </div>

                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $item->id ?>">
                            <button type="submit" name="jobDelete" value="Delete" class="view-profile-button">Delete</button>
                        </form>
                        <button type="submit" class="edit-profile-button" id="editButton" data-order='<?= json_encode($item) ?>' onclick="openEdit(this)">Edit</button>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

    <div class="popup-view">
        <form method="POST">
            <h2>Edit your Post</h2>
            <h4>Job Title : </h4>
            <input name="jobTitle" type="text" value="" required placeholder="Enter Tiltle of the Job">
            <h4>Budget : </h4>
            <input name="budget" type="text" value="" required placeholder="Enter your Budget" autocomplete="off">
            <h4>Address : </h4>
            <input name="address" type="text" value="" required placeholder="Enter address">
            <h4>City : </h4>
            <input name="city" type="text" value="" placeholder="Select Location">
            <h4>Description : </h4>
            <input name="description" type="text" value="" required placeholder="Enter your description">

            <input name="id" type="hidden" value="">

            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeEdit()">Cancel</button>
                <button name="editPost" type="submit" value="Post" class="close-btn">Post</button>
            </div>
        </form>
    </div>
    <div id="overlay1" class="overlay"></div>
    <script src="<?= ROOT ?>/assets/js/employer/editpost.js"></script>

</body>

</html>