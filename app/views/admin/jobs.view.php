<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/jobpost.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/home.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* Custom CSS for post-container */
        .post-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f4f4f4;
            max-width: 1000px; /* Adjust as needed */
            margin: 0 auto; /* Center horizontally */
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .post-frame {
            padding: 20px; /* Add padding */
            margin-bottom: 20px; /* Add margin */
            border-radius: 10px; /* Keep border-radius consistent */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Keep box shadow consistent */
            background-color: #f9f9f9; /* Lighter background color */
        }

        .picture {
            margin-right: 20px;
        }

        .index {
            flex: 1;
        }

        .index > div {
            margin-bottom: 10px;
        }

        .image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 24px; /* Increased font size */
            font-weight: bold;
            color: #333; /* Darkened text color */
        }

        .profile-ratings {
            color: #777;
            font-size: 14px; /* Decreased font size */
        }

        .profile-type {
            font-style: italic;
            color: #555; /* Slightly darkened text color */
            font-size: 18px; /* Increased font size */
        }

        .budget {
            font-weight: bold;
            color: #009688; /* Custom color for budget */
            font-size: 20px; /* Increased font size */
        }

        .location {
            color: #666;
            font-size: 16px; /* Increased font size */
        }

        .icon {
            margin-left: 5px;
            font-size: 18px;
            color: #777;
        }

        .view-profile-button {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            border: none;
            background-color: #3498db;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .view-profile-button:hover {
            background-color: #2980b9;
        }
    </style>
    <title>Document</title>
</head>

<body>
<?php include 'navigationbar.php' ?>
<?php include 'sidebar.php' ?>

<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<div class="set-margin" id="set-marginid">
    <?php
    if (is_array($data)) {
        foreach ($data as $item) {
            date_default_timezone_set('Asia/Kolkata');
            $date1 = new DateTime($item->job_created);
            $date2 = new DateTime();
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
            <div class="post-frame">
                <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->name ?></div>
                            <div class="profile-ratings"><?php echo $times_ago ?></div>
                            <div class="profile-type"><?php echo $item->title ?></div>


                            <div class="budget">Rs <?php echo $item->budget ?>/= per day</div>
                            <div class="location">
                                <?php echo $item->city ?>
                                <i class="bx bxs-map icon"></i>
                            </div>


                        </div>
                        <!--                        <a href="--><?php //= ROOT ?><!--/worker/requestjob?id=--><?php //echo $item->id ?><!--"><button class="view-profile-button">Request Job</button></a>-->
                        <form method="post" action="<?= ROOT ?>/admin/jobs?id=<?= $item->id ?>">
                            <input type="submit" class="view-profile-button archive-button archive " value="Delete" name="Delete">
                        </form>
                        <!-- <a></a><button class="edit-profile-button">Edit</button></a> -->

                    </div>
                </div>
            </div>

            <?php
        }
    }
    ?>
</div>
</body>

</html>
