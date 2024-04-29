<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--    <link rel="stylesheet" href="--><?php //= ROOT ?><!--/assets/css/worker/jobpost.css">-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/style-bar.css">
<!--    <link rel="stylesheet" href="--><?php //= ROOT ?><!--/assets/css/admin/dashboard2.css">-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">-->

    <style>
        /* Custom CSS for post-container */

        body{
            overflow-y: hidden;
        }

        .index{
            height: fit-content;
        }

        .post-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f4f4f4;
            max-width: 1000px; /* Adjust as needed */
            margin: 0 auto; /* Center horizontally */
            padding-bottom: 10px;
            margin-bottom: 10px;
            height: fit-content;
            flex-direction: row;
            transition: transform 0.3s;

        }
        .post-container :hover{
            transform: scale(1.01);
            cursor: pointer;
        }

        .profile-container2{
            width: 100%;
            flex-direction: row;
            display: flex;
            transition: transform 0.3s;

        }
        .profile-container2 :hover{
            transform: scale(1.01);
        }

        .picture{
            flex-direction: column;
            height:;
            width: fit-content;
            margin-bottom: 0;
            justify-content: center;

        }

        .searchbar{

            width: 28%;
            right: -20%;
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;


        }

        .post-frame {
            padding: 20px; /* Add padding */
            margin-bottom: 20px; /* Add margin */
            border-radius: 20px; /* Keep border-radius consistent */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Keep box shadow consistent */
            background-color: white; /* Lighter background color */
            height: fit-content;
            font-size: 20px;
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
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 15px; /* Increased font size */
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
            font-size: 14px; /* Increased font size */
        }

        .profile-id {
            display: none; /* Hide profile ID initially */
        }

        .budget {
            font-weight: bold;
            color: #009688; /* Custom color for budget */
            font-size: 17px; /* Increased font size */
        }

        .location {
            color: #666;
            font-size: 12px; /* Increased font size */
        }

        .icon {
            margin-left: 5px;
            font-size: 18px;
            color: #777;
        }

        .right-container{

        }

        .right-container a, button{

            margin-top: 50px;

        }

        .delete-button , .delete-button2{
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            border: none;
            background-color: red;
            color: #fff;
            transition: background-color 0.3s ease;
            height: 40px;
            align-self: end;
            justify-content: center;
            width: 120px
        }


        .delete-button:hover {
            background-color: darkred;
        }


        .view-b{
            background: #f16a2d;
        }

        .view-b :hover{
            background: darkgoldenrod;
        }
        /* Styles for search form */
        .search-form {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 10px;
            background-color: #f4f4f4;
        }

        .search-input {
            width: 100%;
            padding: 8px;
            border-radius: 20px;
            border: none;
            outline: none;
            /*align-self: center;*/
            background: lightgrey;
            margin-top: 25px;
            box-shadow: none;
            margin-left: 15px;
        }

        .popup {
            position: fixed;
            top: 40%;
            left: 40%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px; /* Increase padding for a bigger popup */
            border-radius: 20px; /* Add curved edges */
            z-index: 1000;
            display: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
            animation: popup-animation 0.5s ease forwards; /* Add animation */
            font-size: 16px;
            width: 400px;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        /* Animation keyframes */
        @keyframes popup-animation {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .popup img {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px; /* Adjust size of the image */
            height: 50px; /* Adjust size of the image */
            border-radius: 50%; /* Make the image round */
            border: 2px solid #fff; /* Add border for contrast */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
        }

        .archive-button {
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            border: none;
            margin-top: 100px;
            margin-right: 15px;
            width: 100px;
        }

        .archive-button.archive {
            background-color: #e74c3c;
            color: #fff;
        }

        .archive-button.unarchive {
            background-color: #2ecc71;
            color: #fff;
        }

        .not_com{
            color: #f16a2d;
        }

        .com{
            color: red;
        }

    </style>
    <title>Jobs</title>
</head>

<body>
<?php include 'sidebar.php' ?>
<?php include 'navigationbar.php' ?>

<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>



<!-- Search Form -->
<div style="text-align: center; margin-top:-2%; background: white; position: fixed; width: 100%" class="search-form" >
    <div  style="text-align: center">
        <h2 style="margin-top: 20px; font-family: 'Arial', sans-serif">Posted Jobs</h2>
    </div>
    <div style="flex-direction: row;  position: relative">
        <div class = "searchbar">
            <input class="search-input" type="text" name="query" id="searchQuery" placeholder="Search by title or ID">
            <input class="search-input" type="text" name="query" id="searchQuery2" placeholder="Location">

            <!--        <i style="margin-right: 55%; position: fixed" class='bx bx-search icon'></i>-->
        </div>
        <button  id = "complete" >Complete</button>
        <button  id = "notcomplete" >Not Complete</button>
    </div>


</div>

<div style="margin-top: 5%; position: relative; overflow-y: scroll; height: 750px;margin-bottom: 100px" class="set-margin" id="set-marginid">
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
                    <div class="profile-container2" style="padding: 15px; height: fit-content;">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->name ?></div>
                            <div class="profile-type"><?php echo $item->title ?></div>
                            <div class="profile-id">job no: <?php echo $item->id ?></div> <!-- Hidden profile ID -->
                            <div class="profile-type">job no: <?php echo $item->id ?></div> <!-- Hidden profile ID -->
                            <div class="budget">Rs <?php echo $item->budget ?>/= per day</div>

                        </div>
                        <div class = "right-container">
                            <div class="profile-ratings <?php echo ($item->job_status == "not_completed")?  "com": "not_com"?>"><?php echo ($item->job_status == "not_completed")?  "Not Complete": "Complete"?></div>

                            <div class="profile-ratings"><?php echo $times_ago ?></div>

                            <div class="location">
                                <?php echo $item->city ?>
                                <i class="bx bxs-map icon"></i>
                            </div>
                            <button class="delete-button" data-id="<?php echo $item->id ?>">Delete</button>
                            <a style="margin-left: 10px; align-self: end" href="<?= ROOT ?>/admin/viewjob?id=<?= $item->id ?>"><button style="margin-right: 10px " class="delete-button2 view-b">View Job</button></a>
                        </div>

                        <!-- <a></a><button class="edit-profile-button">Edit</button></a> -->
                    </div>
                </div>
            </div>

            <?php
        }
    }
    ?>
</div>

<div class="popup" id="popup">
    <img src="<?=ROOT?>/assets/images/logoe.png" alt="Image" /> <!-- Add your image here -->
    <h2 style="font-size: 16px">Are you sure you want to delete?</h2>
    <div style="flex-direction: row; display: flex">

        <form id="deleteForm" method="post" action="<?= ROOT ?>/admin/jobs?id=">
            <input type="hidden" id="deleteId" name="deleteId" value="">
            <input style="" type="submit" class="archive-button archive" value="Yes" name="Delete">
        </form>
        <button style="background-color: #f16a2d;" class="archive-button archive" id="cancel-delete">No</button>

    </div>
</div>


<script>
    // Get reference to the search input field
    const searchInput = document.getElementById('searchQuery');
    const searchInput2 = document.getElementById('searchQuery2');

    // Add event listener for input change
    searchInput.addEventListener('input', function() {
        const searchValue = this.value.trim().toLowerCase();

        const postFrames = document.querySelectorAll('.post-frame');

        postFrames.forEach(frame => {
            const title = frame.querySelector('.profile-type').textContent.toLowerCase();
            const id = frame.querySelector('.profile-id').textContent.toLowerCase();

            if (title.includes(searchValue) || id.includes(searchValue)) {
                frame.style.display = 'block';
            } else {
                frame.style.display = 'none';
            }
        });
    });

    searchInput2.addEventListener('input', function() {
        const searchValue = this.value.trim().toLowerCase();

        const postFrames = document.querySelectorAll('.post-frame');

        postFrames.forEach(frame => {
            const location = frame.querySelector('.location').textContent.toLowerCase();

            if (location.includes(searchValue)) {
                frame.style.display = 'block';
            } else {
                frame.style.display = 'none';
            }
        });
    });

        // Add event listener to delete buttons
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-id');
            const form = document.getElementById('deleteForm');
            // Update the action attribute of the form
            form.action = "<?= ROOT ?>/admin/jobs?id=" + postId;
            document.getElementById('deleteId').value = postId;
            document.getElementById('popup').style.display = 'block';
            document.querySelector('.popup-overlay').style.display = 'block';

            console.log(postId)
        });
    });

        // Add event listener to cancel delete button
        document.getElementById('cancel-delete').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
        document.querySelector('.popup-overlay').style.display = 'none';
    });

</script>

</body>

</html>
