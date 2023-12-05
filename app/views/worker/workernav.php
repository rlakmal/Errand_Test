<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/empnav.css">
</head>

<body>
    <div class="homenavbar">
        <header>
            <div class="logo">Errand</div>
            <input type="checkbox" id="nav_check" hidden>
            <nav>
                <ul>

                    <li>
                        <a href="<?= ROOT ?>/worker/home">Jobs</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/worker/services">Services</a>
                    </li>
                </ul>
            </nav>
            <div class="icons">
                <a href="<?= ROOT ?>/worker/messages"><img src="<?= ROOT ?>/assets/images/employer/msg.png" alt="Message"></a>
                <a href="<?= ROOT ?>/worker/notifications"><img src="<?= ROOT ?>/assets/images/employer/belll.png" alt="notification"></a>
                <div class="profile-dropdown" id="profile-dropdown">
                    <a href="#"><img class="profile-icon" src="<?= ROOT ?>/assets/images/employer/prr.png" alt="Profile"></a>
                    <div class="profile-menu" id="profile-menu">
                        <a href="<?= ROOT ?>/worker/home">Home</a>
                        <a href="">Dashboard</a>
                        <a href="<?= ROOT ?>/worker/myjobs">My Jobs</a>
                        <a href="<?= ROOT ?>/worker/messages">Message</a>
                        <a href="<?= ROOT ?>/worker/workerprofile">Profile</a>
                        <a href="<?= ROOT ?>/home">LogOut</a>
                    </div>
                </div>
            </div>
            <label for="nav_check" class="hamburger"></label>


        </header>
    </div>
    <script src="<?= ROOT ?>/assets/js/employer/navlist.js"></script>
</body>

</html>