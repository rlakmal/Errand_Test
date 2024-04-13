<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #f4f4f4;
        }

        .main-container4 {
            display: flex;
            border-radius: 40px;
            margin: 10%;
            margin: 2%;
            width: 80%;
            height: 100%;
            background: #f3f3f3;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            align-items: flex-end;
        }

        .profile-container3 {
            display: flex;
            margin: 1%;
            position: relative;
            padding: 15px;
            background-color: #ffffff;
            width: 75%;
            height: 50%;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            flex-direction: column;
        }

        .pro_container-right {
            top: 25%;
            position: relative;
            display: flex;
            width: 100%;
            line-height: 28px;
            flex-direction: column;
            left: 0%;
            justify-content: center;
            background: #eeeeee;
            padding: 36px;
            border: 1px solid #d8d0d0;
        }

        .info {
            margin: 10px;
            display: flex;
            margin-left: -7%;
            color: #4d5151;
            /* margin-right: 3%; */
            justify-content: center;
        }

        .pro_container-right input {
            width: 90%;
            padding: 10px;
            font-size: 16px;
            border: none;
            outline: none;
        }

        .picture .image {
            width: 165px;
            border-radius: 50%;
            height: 160px;
        }

        .picture .rates {
            max-width: 400px;
        }

        .container-left {
            display: flex;
            position: relative;
            width: 100%;
            flex-wrap: nowrap;
            flex-direction: column;
            justify-content: center;
            /* align-content: center; */
            align-items: center;
            background: #ffffff;
            border-radius: 28px;
        }

        .edit-gen {
            width: 75%;
            font-size: 16px;
            font-weight: 300;
            color: #3e3e3e;
            font-family: "Lato", sans-serif;
            margin: 10px 0;
            border: 2px solid #e7e7e7;
            padding: 10px;
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
            margin-top: -40px;
        }

        .close-button {
            font-size: 28px;
            background: white;
            border: none;
            cursor: pointer;
            color: #ff7f00;
        }

        .tags {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin: 25px;
        }

        .tags i {
            font-size: 28px;
            color: #ff7f00;
        }

        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }

        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }

        .text-warning {
            color: #ffc107;
        }

        .star-light {
            color: #e9ecef;
        }

        .progress {
            height: 20px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0;
            background-color: #ffc107;
            /* Set your desired progress bar color */
            text-align: center;
            line-height: 20px;
            color: #000;
            /* Set your desired text color */
            font-weight: bold;
            transition: width 0.3s ease-in-out;
        }

        .row {
            display: flex;
            width: 100%;
            flex-direction: column;
            align-items: center;
        }

        .review_percent {
            display: flex;
            flex-direction: column;
            margin: 20px;
        }

        .review-bar {
            display: flex;
            flex-direction: column;
            width: 65%;
            margin: 33px;
        }

        .one-bar {
            margin: 2%;
        }

        .form-upload {
            /* margin-top: -30px; */
            /* margin-left: 250px; */
            cursor: pointer;
            /* width: 110px; */
            height: 24px;
            background-color: #f16a2d;
            color: white;
            border-radius: 20px;
            font-size: 15px;
            align-items: center;
            text-align: center;
        }

        .index_img {
            display: flex;
            position: relative;
            align-items: center;
            width: 50%;
            flex-direction: column;
        }


        @media only screen and (max-width: 600px) {
            .main-container4 {
                height: 100%;
                display: flex;
                margin-left: 40px;
                margin-top: 20%;
                max-width: 200%;
                justify-content: center;
                flex-direction: column;
            }

            .profile-container3 {
                height: 80%;
                display: flex;
                width: 100%;
                margin-left: 0;
                flex-direction: column;
            }

            .close-button {
                align-items: center;
            }

            .container-left {
                height: 478px;
                display: flex;
                flex-direction: column;
                justify-content: space-evenly;
                align-items: center;
            }

            .pro_container-right {
                display: flex;
                height: 550px;
                width: 100%;
                flex-direction: column;
                flex-wrap: nowrap;
            }

            .index_img {
                display: flex;
            }

            .picture .rates {
                display: flex;
                margin-left: 1%;
                width: 284px;
                flex-direction: column;
            }

            .bottum_index {
                display: flex;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>

    <form method="POST" enctype="multipart/form-data">

        <div class="main-container4">
            <div class="profile-container3">
                <!-- <a><button class="close-button">Edit profile</button></a> -->
                <div class="container-left">
                    <div class="index_img">
                        <div class="form-drag-area">
                            <div class="picture">
                                <img class="image" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $data['newData']['profile_image']  ?>" alt="placeholder" id="workerprofile_image_placeholder">
                            </div>
                            <div class="form-upload">
                                <input type="file" id="workerprofile_image" style="display: none;" name="workerprofile_image">
                                Choose Image
                            </div>
                        </div>
                        <div class="picture">
                            <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
                        </div>

                    </div>




                </div>


                <div class="pro_container-right">
                    <div class="tags">
                        <h2 class="info">Personal Information</h2>

                    </div>

                    <h3>
                        Full Name
                    </h3>

                    <input type="text" name="name" value="<?php echo ucfirst($data['newData']['name']); ?> " placeholder="Empty Full Name" class="edit-gen">
                    <h3>
                        City
                    </h3>
                    <input type="text" name="city" value="<?php echo ucfirst($data['newData']['city']); ?> " class="edit-gen">
                    <h3>
                        Profession
                    </h3>
                    <input type="text" name="category" value='<?php echo ucfirst($data['newData']['category']); ?> ' class="edit-gen">
                    <h3>
                        Address
                    </h3>
                    <input type="text" name="address" value="<?php echo ucfirst($data['newData']['address']); ?> " class="edit-gen">
                    <h3>
                        Date of Birth
                    </h3>
                    <input type="date" name="dob" value='<?php echo ucfirst($data['newData']['dob']); ?> ' class="edit-gen">

                    <h3>
                        Skills
                    </h3>
                    <input type="text" name="skills" value="<?php echo ucfirst($data['newData']['skills']); ?> " class="edit-gen-skill">
                    <h3>
                        Expierience
                    </h3>
                    <input type="text" name="expierience" value="<?php echo ucfirst($data['newData']['expierience']); ?> " class="edit-gen-skill">

                </div>
            </div>
            <div class="bottum_index">
                <button type="submit" class="close-button" value="Edit" name="edit">Done</button>
            </div>

        </div>
    </form>

    <script src="<?= ROOT ?>/assets/js/worker/profileUpload.js"></script>
</body>

</html>