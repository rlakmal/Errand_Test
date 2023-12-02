<!DOCTYPE html>
<html>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/jobpost.css">
<head>
    <title>Painter Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
    
        }
        .profile-container1 {
            background-color: #ffffff;
            width: 900px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 150px;
            margin-top: 20px;
            border-radius: 20px;
        }
        .post-container{
            margin-left: 450px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="post-container">
        <div class="profile-container1">
            <div class="picture">
                <img class="image" src="<?=ROOT?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="index">
                <div class="profile-name">Dasun Shanaka</div>
                <div class="profile-ratings">2 hrs ago</div>
                <div class="profile-type">තණකොළ කැපීමට සේවකයෙකු අවශ්‍යයි</div>            
                <div class="budget">RS 3500/= per day</div>
                <div class="location">Kadawatha</div>
                
            </div>
            <a href="<?=ROOT?>/worker/requestjob"><button class="view-profile-button">Request</button></a>
            
        </div>
    </div>
</body>

</html>