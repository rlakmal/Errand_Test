<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/new_home.css">
    <title>Home Page | siraj</title>
</head>

<body>
    <div class="container">

        <!-- Navigation Bar -->
        <div class="homenavbar">
            <header>
                <div class="logo">Errand</div>
                <input type="checkbox" id="nav_check" hidden>
                <nav>
                    <ul>
                        <li>
                            <a href="#" class="active">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#" class="active">Login</a>
                        </li>
                        <li>
                            <a href="#" class="active">Register As Worker</a>
                        </li>

                    </ul>
                </nav>
                <label for="nav_check" class="hamburger"></label>
            </header>
        </div>
        <script src="assets/homenavbar.js"></script>
        
        <!-- Main Section -->
        <main class="main-section">

            <div class="hero-section">
                <div class="text-area">
                    <h1>Hire<br>Workers.<br>or Get<br>Hired.</h1>
                    <p>Looking for a laborer or worker for get your job done.<br>
                        Looking for a job or work to do.<br>
                        <b class="primary">Errand</b> got you covered.<br>
                        <b>Now it's just a matter of minutes.</b>
                    </p>

                    <div class="btn-contianer">
                        <button class="reg-btn">Register as Customer</button>
                        <button class="reg-btn">Register as Worker</button>
                    </div>
                
                </div>

                
                <div class="image">
                    <div class="image-container">
                        <img src="assets/images/signin-up/painter.jpg" alt="We can't show you now">
                    </div>
                </div>
            </div>
            
        </main>
        
    </div>
</body>

</html>