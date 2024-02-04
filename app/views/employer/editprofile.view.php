<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">
</head>

<body>
    <?php include 'employernavex.php' ?>
    <style>
        .main-container4 {
            display: flex;
            border-radius: 40px;
            margin: 10%;
            margin-top: 7%;
            width: 80%;
            height: 100%;
            background: #f3f3f3;
            flex-direction: column;
            align-content: center;
            justify-content: center;

        }

        .profile-container3 {
            display: flex;
            margin: 1%;
            position: relative;
            padding: 15px;
            background-color: #ffffff;
            width: 98%;
            height: 578px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
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

        .container-right {
            position: relative;
            display: flex;
            width: 160%;
            line-height: 28px;
            flex-direction: column;
            left: 5%;
            justify-content: center;
        }

        .bottum_index {
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        .info {
            margin: 10px;
            display: flex;
            margin-left: -7%;
            color: #4d5151;
            /* margin-right: 3%; */
            justify-content: center;
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

            .form-upload {
                margin-left: 20px;
                /* Adjust as needed for small screens */
            }

            .container-left {
                height: 478px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
                align-items: flex-start;

            }

            .container-right {
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

                margin-left: 25%;
                width: 300px;
                flex-direction: row;

            }

            .picture .image {
                margin-left: 70px;
            }

            .bottum_index {
                display: flex;
                justify-content: center;

            }
        }
    </style>



    <form method="POST" enctype="multipart/form-data">
        <div class="main-container4">
            <div class="profile-container3">
                <div class="container-left">
                    <div class="index_img">

                        <div class="form-drag-area">
                            <div class="picture">
                                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $data['newData']['profile_image']  ?>" alt="placeholder" id="profile_image_placeholder">

                            </div>
                            <div class="form-upload">
                                <input type="file" id="profile_image" style="display: none;" name="profile_image">
                                Choose Image

                            </div>
                        </div>
                        <div class="picture">
                            <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
                        </div>

                    </div>
                </div>
                <div class="container-right">
                    <h2 class="info">Personal Information</h2>

                    <h3>
                        Full Name
                    </h3>
                    <input type="text" name="name" value="<?php echo ucfirst($data['newData']['name']); ?>" placeholder="Empty Full Name" class="edit-gen">
                    <h3>
                        NIC Number
                    </h3>

                    <input type="text" name="nic" value="<?php echo $data['newData']['nic']; ?>" placeholder="Empty NIC Number" class="edit-gen">
                    <h3>
                        City
                    </h3>
                    <input type="text" name="city" value="<?php echo ucfirst($data['newData']['city']); ?>" class="edit-gen" placeholder="Empty City">
                    <h3>
                        Address
                    </h3>
                    <input type="text" name="address" value="<?php echo $data['newData']['address']; ?>" class="edit-gen" placeholder="Empty Address">
                    <h3>
                        Date of Birth
                    </h3>
                    <input type="text" name="dob" value="<?php echo $data['newData']['dob']; ?>" class="edit-gen" placeholder="Empty Date of Birth">
                </div>
            </div>
            <div class="bottum_index">
                <button type="submit" class="close-button" value="Edit" name="edit">Done</button>
            </div>
        </div>

    </form>




    <script src="<?= ROOT ?>/assets/js/employer/imageUpload.js"></script>
</body>


</html>