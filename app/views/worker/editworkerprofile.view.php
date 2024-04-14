<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/editworkerprofile.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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
                        <div class="upload-gs">
                            <div class="ctag">Upload Gs Certificate</div>
                            <div class="form-drag-area1">
                                <div class="picture">
                                    <img class="image1" src="<?= ROOT ?>/assets/images/worker/certifiImages/<?php echo $data['newData']['certificate_image'] ?>" alt="placeholder" id="workergs_image_placeholder">
                                </div>
                                <div class="form-upload1">
                                    <input type="file" id="workergs_image" style="display: none;" name="workergs_image">
                                    <i class="bx bxs-image-add icon"></i>
                                </div>
                            </div>
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
    <script src="<?= ROOT ?>/assets/js/worker/certifiUpload.js"></script>
</body>

</html>