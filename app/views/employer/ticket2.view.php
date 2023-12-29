<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/emphome.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobPost.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <!-- Sidebar -->
    <?php include 'sidebar.php' ?>
    <!-- Navigation bar -->
    <?php include 'navigationbar.php' ?>
    <!-- Scripts -->
    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

    <!-- content  -->
    <section id="main" class="main">

        <div class="set-margin" id="set-marginid">
            <button id="raise-ticket-button">Raise New Ticket</button>

            <?php
            if (is_array($data)) {
                foreach ($data as $item) {
                    ?>
                    <div class="post-container">
                        <div class="profile-container2">
                            <!-- <div class="picture">
                                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="placeholder">
                            </div> -->
                            <div class="index">
                                <div class="profile-type"><?php echo $item->title ?></div>
                                <div class="profile-name"><?php echo $item->description ?></div>
                                <div class="profile-ratings">Raised @ <?php echo $item->created ?></div>

                                <div class="profile-buttons">
                                    <?php if ($item->archived) { ?>
                                        <button class="archived-button" disabled>Archived</button>
                                    <?php } else { ?>
                                        <button class="unarchived-button" disabled>Not Archived</button>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--                        <a><button class="view-profile-button" id="request-button">View</button></a>-->
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>

    </section>


    <!-- add members -->
    <div class="popup-report">
        <h2>New Ticket/h2>
        <h4> Title : </h4>
        <form method="POST">

            <input name="name" type="text" placeholder="Enter Member name">
            <h4>Email : </h4>
            <input name="email" type="text" placeholder="Enter Member email">
            <h4>Password : </h4>
            <input name="password" type="text" placeholder="Enter Member password">
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
                <button type="submit" name="memberRegister" value="Submit" class="close-btn" onclick="closeReport()">Submit</button>
            </div>
        </form>
    </div>

    <!-- update members -->
    <div class="popup-view">
        <h2>Update Crew Member</h2>
        <form method="POST">

            <h4> name : </h4>
            <input name="name" type="text" placeholder="Enter Member name">
            <h4>Email : </h4>
            <input name="email" type="text" placeholder="Enter Member email">
            <h4>Password : </h4>
            <input name="password" type="text" placeholder="Enter Member email">
            <input type="hidden" name="id">
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeView()">Cancel</button>
                <button type="submit" name="member" value="Update" class="close-btn" onclick="closeView()">Update</button>
            </div>

        </form>
    </div>



    <div id="overlay" class="overlay"></div>




    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- <script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script> -->
    <script src="<?= ROOT ?>/assets/js/admin/crewMembers.js"></script>

</body>

</html>