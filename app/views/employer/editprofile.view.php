<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">
</head>

<body>
    <?php include 'employernav.php' ?>
    <style>
        .main-container4 {
            margin-left: 200px;
            min-width: 900px;
            max-width: 500px;
            margin-top: 120px;
            margin-bottom: 10px;

        }

        .profile-container3 {
            background-color: #ffffff;
            width: auto;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            height: 500px;
            position: absolute;
            border-radius: 20px;
        }

        .form-upload {
            margin-top: -30px;
            margin-left: 250px;
            cursor: pointer;
            width: 110px;
            height: 24px;
            background-color: #f16a2d;
            color: white;
            border-radius: 20px;
            font-size: 15px;
            align-items: center;
            text-align: center;
        }
    </style>

    <div class="main-container4">
        <div class="profile-container3">
            <form method="POST" enctype="multipart/form-data">

                <button type="submit" class="close-button" value="Edit" name="edit">Done</button>
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

                <div class="index_edit">

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

            </form>


        </div>
        <script src="<?= ROOT ?>/assets/js/employer/imageUpload.js"></script>
</body>


</html>