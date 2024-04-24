<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/editempprof.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <!--    <link rel="stylesheet" href="--><?php //= ROOT ?><!--/assets/css/admin/dashboard.css">-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</head>

<body>
<?php include 'navigationbar.php' ?>
<?php include 'sidebar.php' ?>
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>
    <style>





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

            .container-left {
                height: 478px;
                display: flex;
                flex-direction: column;

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
                width: 280px;
                flex-direction: row;

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
                                Upload Image

                            </div>
                        </div>
<!--                        <div class="picture">-->
<!--                            <img class="rates" src="--><?php //= ROOT ?><!--/assets/images/employer/rates.png" alt="">-->
<!--                        </div>-->

                    </div>
                </div>
                <div class="container-right-parent">
                    <div class="container-right">
                        <h3>ID: <?=$data['newData']['id']?></h3>

                        <h2 class="info">Employer Details</h2>

                        <h3>
                            Full Name
                        </h3>
                        <input type="text" name="name" value="<?php echo ucfirst($data['newData']['name']); ?>" placeholder="Empty Full Name" class="edit-gen">
                        <h3>
                            User Name
                        </h3>
                        <input type="text" name="name" value="<?php echo ucfirst($data['newData']['email']); ?>" placeholder="Empty Full Name" class="edit-gen" style="font-style: italic" readonly>
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
                        <input type="date" name="dob" value="<?php echo $data['newData']['dob']; ?>" class="edit-gen" placeholder="Empty Date of Birth">
                    </div>
                </div>

            </div>
            <div class="bottum_index">
                <button type="submit" class="close-button" value="Edit" name="edit">Done</button>
            </div>
        </div>

    </form>




    <script src="<?= ROOT ?>/assets/js/admin/imageUpload.js"></script>
</body>


</html>