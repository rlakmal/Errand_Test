<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/jobpost.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/home.css">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }

        .titile_tag {
            margin-left: 30%;
            color: #000;
        }
    </style>

</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workerfilter.php' ?>
    <div class="set-margin" id="set-marginid">
        <h3 class="titile_tag">Jobs That Suggests For You </h3>
        <?php
        if (is_array($data_suggest)) {
            foreach ($data_suggest as $item) {
                // Check if job status is 'not completed'
                if ($item->job_status == 'not_completed') {
                    date_default_timezone_set('Asia/Kolkata');
                    $date1 = new DateTime($item->job_created);
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

                    <div class="post-container" id="myData">
                        <div class="profile-container2">
                            <div class="picture">
                                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                            </div>
                            <div class="index">
                                <div class="profile-name"><?php echo $item->name ?></div>
                                <div class="profile-ratings"><?php echo $times_ago ?></div>
                                <div class="profile-type"><?php echo $item->title ?></div>
                                <div class="budget">Rs <?php echo $item->budget ?>/= per day</div>

                            </div>
                            <div class="bottom-index">
                                <div class="location">
                                    <div class="location"><?php echo $item->city ?><i class="bx bxs-map icon"></i></div>
                                </div>
                                <div class="buton_bar">
                                    <a href="<?= ROOT ?>/worker/requestjob?id=<?php echo $item->id ?>"><button class="view-profile-button" id="request-button">View</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
    <div class="set-margin" id="set-margin">
        <h3 class="titile_tag">All Jobs</h3>
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {
                // Check if job status is 'not completed'
                if ($item->job_status == 'not_completed') {
                    date_default_timezone_set('Asia/Kolkata');
                    $date1 = new DateTime($item->job_created);
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

                    <div class="post-container" id="myData">
                        <div class="profile-container2">
                            <div class="picture">
                                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                            </div>
                            <div class="index">

                                <div class="profile-name"><?php echo $item->name ?></div>
                                <div class="profile-ratings"><?php echo $times_ago ?></div>
                                <div class="profile-type"><?php echo $item->title ?></div>
                                <div class="budget">Rs <?php echo $item->budget ?>/= per day</div>
                                <div type="hidden"> <?php echo $item->category ?></div>

                            </div>
                            <div class="bottom-index">
                                <div class="location">
                                    <div class="location"><?php echo $item->city ?><i class="bx bxs-map icon"></i></div>
                                </div>
                                <div class="buton_bar">
                                    <a href="<?= ROOT ?>/worker/requestjob?id=<?php echo $item->id ?>"><button class="view-profile-button" id="request-button">View</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>

        <script>
            function searchTable() {
                var input, filter, data, items, i, txtValue, category, location;
                data = document.getElementById("set-margin");
                items = data.getElementsByClassName("profile-container2");
                category = document.getElementById("category").value.toUpperCase();
                console.log(category);
                location = document.getElementById("locationdata").value.toUpperCase();
                console.log(location);

                for (i = 0; i < items.length; i++) {
                    txtValue = items[i].textContent || items[i].innerText;
                    var categoryMatch = txtValue.toUpperCase().indexOf(category) > -1 || category === 'ALL';
                    var locationMatch = txtValue.toUpperCase().indexOf(location) > -1 || location === 'ALL';
                    console.log(categoryMatch);
                    console.log(locationMatch);

                    if (categoryMatch && locationMatch) {
                        items[i].style.display = "";
                    } else {
                        items[i].style.display = "none";
                    }
                }
            }


            function searchInput() {
                var input, filter, data, items, i, txtValue;
                input = document.getElementById("search");
                console.log(input);
                filter = input.value.toUpperCase();
                data = document.getElementById("set-margin");
                console.log(data);
                items = data.getElementsByClassName("profile-container2");

                for (i = 0; i < items.length; i++) {
                    txtValue = items[i].textContent || items[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        items[i].style.display = "";

                    } else {
                        items[i].style.display = "none";
                    }
                }
            }
        </script>


</body>

</html>