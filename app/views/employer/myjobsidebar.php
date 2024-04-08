<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myjobsidebar.css">
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
                <a href="<?= ROOT ?>/employer/dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/employer/myjob">
                    <i class='bx bxs-receipt'></i>
                    <span class="link_name">My Posts</span>
                </a>
                <span class="tooltip">My Posts</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/employer/postedjobsrequest">
                    <i class="bx bxs-hard-hat"></i>
                    <span class="link_name">Worker Requests</span>
                </a>
                <span class="tooltip">Worker Requests</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/employer/myworkerreq">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">My Requests</span>
                </a>
                <span class="tooltip">My Requests</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/employer/acceptedreq">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">Accepted Requests</span>
                </a>
                <span class="tooltip">Accepted Requests</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/employer/reviewreq">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">Review Requests</span>
                </a>
                <span class="tooltip">Review Requests</span>
            </li>
            <!-- <li>
                <a href="<?= ROOT ?>/admin/admincrew">
                    <i class="bx bxs-group"></i>
                    <span class="link_name">Admin Crew</span>
                </a>
                <span class="tooltip">Admin Crew</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/adnotification2">
                    <i class="bx bxs-bell-plus"></i>
                    <span class="link_name">Notifications</span>
                </a>
                <span class="tooltip">Notifications</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/adreports">
                    <i class="bx bxs-report"></i>
                    <span class="link_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-user-circle"></i>
                    <span class="link_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li> -->

            <li class="profile">
                <div class="profile_details">
                    <img src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image ?>" alt="profile image">
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