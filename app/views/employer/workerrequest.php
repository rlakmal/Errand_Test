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
            width: 900px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 150px;
            border-radius: 20px;
        }
        .picture .image { 
           max-width: 40px;
        }
        
        .profile-name {
            font-size: 14px;
            font-weight: 700;
            color: #000;
            font-family: 'Lato', sans-serif;
            margin: 10px 0;
        }
        .profile-type {
            font-size: 14px;
            font-weight: 700;
            color: #000;
            font-family: 'Lato', sans-serif;
            margin: 10px 0;
        }
        .profile-ratings {
            font-size: 16px;
            color: #666;
            
            
        }
        .budget {
            font-size: 18px;
            color: black;
            font-weight: 700;
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
        .edit-profile-button {
            margin-top: -40px;
            margin-left: 700px;
            background-color: #ff7f00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            display: block;
            text-align: center;
            border-radius:20px ;
        }
        .worker-profile-button {
            margin-top: -35px;
            margin-left: 550px;
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
            margin-top: -50px;
            margin-left: 60px;
        }
        .post-container{
            margin-top: 20px;
            margin-left: 450px;
        }
    </style>
</head>

<body>
    <div class="post-container">
        <div class="profile-container2">
            <div class="picture">
                <img class="image" src="<?=ROOT?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="index">
                <div class="profile-name">Your Post -තණකොළ කැපීමට සේවකයෙකු අවශ්‍යයි</div>
                <div class="profile-ratings">2 hrs ago</div>
                <div class="profile-type">Requested By - Upul Perera</div>            
                <div class="budget">Requested Budget-RS 3500/= per day</div>
                <div class="location">Kadawatha</div>
                
            </div>
            <a></a><button class="view-profile-button">Accept</button></a>
            <a></a><button class="edit-profile-button">Reject</button></a>
            <a href="<?= ROOT ?>/employer/workerprof"><button class="worker-profile-button">Worker Profile</button></a>
            
        </div>
    </div>
</body>

</html>