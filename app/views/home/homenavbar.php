<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/homenav.css">
</head>

<body>
    <div class="homenavbar">
        <header>
            <div class="logo">Errand</div>
            <input type="checkbox" id="nav_check" hidden>
            <nav>
                <ul>
                    <li>
                        <a href="<?= ROOT ?>/home" class="active">Home</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/about">About</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/home/signin" class="active">Login</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/home/workerreg" class="active">Register As Worker</a>
                    </li>

                </ul>
            </nav>
            <label for="nav_check" class="hamburger"></label>
        </header>
    </div>
    <script src="<?= ROOT ?>/assets/js/home/homenavbar.js"></script>
</body>

</html>