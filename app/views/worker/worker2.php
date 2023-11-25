<!DOCTYPE html>
<html>
<head>
    <title>Painter Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
    
        }
        .profile-container3 {
            background-color: #ffffff;
            width: 800px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 150px;
            margin-left: 450px;
            min-width: 900px;
            max-width: 500px;
            margin-top: 10px;
            border-radius: 20px;

        }
        .picture .image { 
           max-width: 80px;
        }
        
        .profile-name {
            font-size: 17px;
            font-weight: 600;
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
            font-size: 16px; /* Adjust the font size to make it readable */
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
            border-radius: 20px;
            
        }
        .index{
            margin-top: -90px;
            margin-left: 150px;
        }
    </style>
</head>

<body>
    <div class="main-container3">
        <div class="profile-container3">
            <div class="picture">
                <img class="image" src="<?=ROOT?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="index">
                <div class="profile-name">Kaushal perera</div>
                <div class="profile-type">Plumber</div>
                <div class="profile-ratings">Ratings: 4.4</div>
                <div class="job-count">Jobs Completed: 50+</div>
                <div class="location">Kirulapana</div>
                
            </div>
            <a href="<?= ROOT ?>/employer/worker"><button class="view-profile-button">View Profile</button></a>
        </div>
    </div>
</body>

</html>