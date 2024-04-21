<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myjobsidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo_details">
            <div class="logo_icon">Errand</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="">
                    <i class='bx bxs-dashboard'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/worker/myjobs">
                    <i class="bx bxs-hard-hat"></i>
                    <span class="link_name">Requested Jobs</span>
                </a>
                <span class="tooltip">Requested Jobs</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/worker/recievedjobs">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">Recieved Jobs</span>
                </a>
                <span class="tooltip">Recieved Jobs</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/worker/acceptedjobs">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">Accepted Requests</span>
                </a>
                <span class="tooltip">Accepted Requests</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/worker/completedjobs">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">Completed Jobs</span>
                </a>
                <span class="tooltip">Completed Jobs</span>
            </li>
            <li class="profile">
                <div class="profile_details">
                    <!-- <img src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image ?>" alt="profile image"> -->
                    <div class="profile_content">
                        <div class="name"><?php echo $_SESSION['USER']->name ?></div>
                    </div>
                </div>
                <a href="<?= ROOT ?>/home/signout">
                    <i class="bx bx-log-out" id="log_out"></i>
                    <span class="link_name">Logout</span>
                </a>
                <span class="tooltip">logOut</span>

            </li>
        </ul>
    </div>
</body>
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

</html>