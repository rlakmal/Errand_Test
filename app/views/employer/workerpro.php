<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        .profile-container {
            background-color: #ffffff;
            width: 800px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 150px;
            border-radius: 20px;
        }
        .profile-picture { 
            border-radius: 50%;
            background-image: url('../../../public/assets/images/employer/'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
        }
        .profile-name {
            font-size: 18px;
            font-weight: 600;
            color: #000;
            font-family: 'Lato', sans-serif;
            margin: 10px 0;
        }
        .profile-type {
            font-size: 15px;
            font-weight: 700;
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
            font-size: 16px; /* Adjust the font size to make it readable */
            color: black;
            margin-top: -100px;
        }
        .view-profile-button {
            float: right;
            background-color: #ff7f00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            display: block;
            text-align: center;
            margin: 10px 0;
            border-radius: 20px;
        }
        .index{
            margin-left: 300px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="profile-container">
        <div class="picture">
                <img class="image" src="<?=ROOT?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="profile-picture"></div>
            <div class="index">
            <div class="profile-name">Dhananjaya Silva</div>
            <div class="profile-type">Plumber</div>
            <div class="profile-ratings">Ratings: 4.9</div>
            <div class="job-count">Jobs Completed: 50+</div>
            <div class="location">Gampaha</div>
            
            </div>
            <a href="<?= ROOT ?>/employer/workerprof"><button class="view-profile-button">View Profile</button></a>
        </div>
    </div>
</body>

</html>
