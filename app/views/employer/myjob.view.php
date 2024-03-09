<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myjobPost.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobpopup.css">
    
    <title>Errand</title>
    <style>
        .sidebar {
            margin-top: -90px;
        }
    </style>
</head>


<body>
    <?php include 'employernav.php' ?>
    <?php include 'myjobsidebar.php' ?>
    <?php
    if (is_array($data)) {
        $len = count($data);
        $msg = "    You have Posted $len Jobs";
    } else {
        $msg = "    You have't any Posted Job Yet";
    }

    $name = $_SESSION['USER']->name;
    $first_name = explode(" ", $name);

    ?>

    <div class="set-margin" id="set-marginid">
        <section id="main" class="main">
            <h2>Hello <?php echo $first_name[0] ?>!! <?php echo $msg ?></h2>
        </section>
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {
                // තණකොළ කැපීමට සේවකයෙකු අවශ්‍යයි
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
                <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->name ?></div>
                            <div class="profile-ratings"><?php echo $times_ago ?></div>
                            <div class="profile-type"><?php echo $item->title ?></div>
                            <div class="budget">Rs <?php echo $item->budget ?> /= per day</div>

                            <div class="no-of-requests" data-post-id="<?php echo $item->id ?>">

                            </div>

                        </div>
                        <div class="bottom-index">
                            <div class="location">
                                <div class="location"><?php echo $item->city ?><i class="bx bxs-map icon"></i></div>
                            </div>
                            <div class="buton_bar">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                    <button type="submit" name="jobDelete" value="Delete" class="view-profile-button">Delete</button>
                                </form>
                                <button type="submit" class="edit-profile-button" id="editButton" data-order='<?= json_encode($item) ?>' onclick="openEdit(this)">Edit</button>
                            </div>
                        </div>
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
            <input name="title" type="text" value="" required placeholder="Enter Tiltle of the Job">
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.no-of-requests').each(function() {
                var postId = $(this).data('post-id');
                var container = $(this); // store the reference to the current element

                data = {
                    job_id: postId
                }

                $.ajax({
                    type: "POST",
                    url: "<?= ROOT ?>/employer/count_request",
                    data: data,
                    cache: false,
                    success: function(res) {
                        console.log("Response:", res);
                        newData = JSON.parse(res);
                        //console.log(newData);

                        // Update the corresponding element with the job count
                        if (newData.job_count === 'No Requests') {
                            container.text('No Requests');
                        } else {
                            container.text('Worker Requests: ' + newData.job_count);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error if needed
                    }
                });
            });
        });
    </script>
</body>

</html>