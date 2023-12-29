<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">

</head>

<body>
    <!-- Sidebar -->
    <?php include 'sidebar.php' ?>
    <!-- Navigation bar -->

    <?php include 'navigationbar.php' ?>
    <!-- Scripts -->
    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

    <!-- content  -->

    <div class="main-container3">
        <div class="profile-container2">
            <a href="<?= ROOT ?>/member/workers"><button class="close-button">Close</button></a>
            <!--          <button onclick="openRequest()" class="close-button">Request</button>-->
            <div class="picture">
                <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="picture">
                <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
            </div>
            <div class="gsc">
                <h3>
                    View GS cerificate
                </h3>
                <input type="text" name="fullname" value="Click Here" readonly>
            </div>
            <div class="index">

                <h3>
                    Full Name
                </h3>

                <input type="text" name="fullname" value="<?php echo $data->name ?>" class="edit-gen" readonly>
                <h3>
                    City
                </h3>
                <input type="text" name="city" value="<?php echo $data->city ?>" class="edit-gen" readonly>
                <h3>
                    Address
                </h3>
                <input type="text" name="address" value="27/A, School Road, Sooriyawewa" class="edit-gen" readonly>
                <h3>
                    Date of Birth
                </h3>
                <input type="text" name="birthday" value='2012-12-12' class="edit-gen" readonly>
                <h3>
                    Profession
                </h3>
                <input type="text" name="profession" value='<?php echo $data->category ?>' class="edit-gen" readonly>

                <h3>
                    Skills
                </h3>
                <input type="text" name="skills" value="" class="edit-gen-skill" readonly>
                <h3>
                    Expierience
                </h3>
                <input type="text" name="expierience" value="" class="edit-gen-skill" readonly>


            </div>

        </div>
    </div>

</body>

</html>