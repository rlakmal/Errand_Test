<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;

        }

        .profile-container2 {
            background-color: #ffffff;
            width: 800px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 150px;
            margin-left: 450px;
            min-width: 900px;
            max-width: 500px;
            margin-top: 20px;
            border-radius: 20px;
        }

        .picture .image {
            max-width: 90px;
        }

        .profile-name {
            font-size: 20px;
            font-weight: 700;
            color: #000;
            font-family: 'Lato', sans-serif;
            margin: 10px 0;
        }

        .profile-type {
            font-size: 15px;
            font-weight: 300;
            color: #000;
            font-family: 'Lato', sans-serif;
            margin: 10px 0;
        }

        .profile-ratings {
            font-size: 16px;
            color: #666;
        }

        .job-count {
            font-size: 16px;
            color: #666;
        }

        .location {
            float: right;
            font-size: 16px;
            /* Adjust the font size to make it readable */
            color: black;
            margin-top: -100px;
        }

        .view-profile-button {
            margin-top: -40px;
            float: right;
            background-color: #ff7f00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            display: block;
            text-align: center;

        }

        .index {
            margin-top: -90px;
            margin-left: 150px;
        }
    </style>
</head>

<body>
    <div class="main-container2">
        <div class="profile-container2">
            <div class="picture">
                <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="index">
                <div class="profile-name">Dasun Shanaka</div>
                <div class="profile-type">Electrician</div>
                <div class="profile-ratings">Ratings: 4.9</div>
                <div class="job-count">Jobs Completed: 50+</div>
                <div class="location">Kadawatha</div>

            </div>
            <a href="<?= ROOT ?>/worker/viewworker"><button class="view-profile-button">View Profile</button></a>
        </div>
    </div>
</body>

</html>