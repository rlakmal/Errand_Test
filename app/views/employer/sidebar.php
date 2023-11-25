<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT ?>/assets/css/style-bar.css">
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
                    <i class="bx bxs-grid-alt"></i>
                    <span class="link_name">DashBoard</span>
                </a>
                <span class="tooltip">DashBoard</span>
            </li>
            <li>
            <a href="#">
                    <i class="bx bxs-user-circle"></i>
                    <span class="link_name">Workers</span>
                </a>
                <span class="tooltip">Workers</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-user-circle"></i>
                    <span class="link_name">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-user-circle"></i>
                    <span class="link_name">Admin Crew</span>
                </a>
                <span class="tooltip">Admin Crew</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-user-circle"></i>
                    <span class="link_name">Notifications</span>
                </a>
                <span class="tooltip">Notifications</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bxs-user-circle"></i>
                    <span class="link_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li class="profile">
                <div class="profile_details">
                    <img src="<?=ROOT?>/assets/images/manager/elon_musk.jpg" alt="profile image">
                    <div class="profile_content">
                        <div class="name">Admin 1</div>
                    </div>
                </div>
                <i class="bx bx-log-out" id="log_out"></i>
            </li>
        </ul>
        <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>
    </div>
   

    
</body>
</html>

