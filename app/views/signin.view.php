<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signinup.css">
</head>
<?php include 'home/homenavbar.php' ?>

<body>
    <main class="">
        <div class="box">
            <div class="inner-box">
                <div class="form-warp">

                    <!-- --------------------------
                       Sign-IN Part
                    ------------------------------- -->
                    <form method="POST" autocomplete="off" class="sign-in-form">
                        <div class="logo">
                            <h3>
                                Errand
                            </h3>

                            <span>
                                <a href="<?= ROOT ?>/home">
                                    <ion-icon name="chevron-back-outline"></ion-icon>
                                    <!-- <ion-icon name="chevron-back-circle-outline"></ion-icon> -->
                                    Back
                                </a>
                            </span>
                        </div>

                        <div class="heading">
                            <h2>Welcome Back</h2>
                            <h6>Not Registred Yet ?</h6>
                            <a href="#" class="toggle">Sign Up</a>
                        </div>
                        <?php

                        // if (!empty($data['errors'])) {
                        //     echo $data['errors'];
                        // } 
                        ?>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="email" value="<?php echo !empty($data['loginData']) ? htmlspecialchars($data['loginData']['email']) : ''; ?>" class="input-field" autocomplete="on" minlength="5">
                                <!-- <input type="text" value="" name="email" class="input-field" autocomplete="on" minlength="5"> -->
                                <label for="email">Email</label>
                            </div>
                            <div class="input-wrap">
                                <input type="password" name="password" value="<?php echo !empty($data['loginData']) ? htmlspecialchars($data['loginData']['password']) : ''; ?>" class="input-field" autocomplete="on">
                                <!-- <input type="password" name="password" class="input-field" autocomplete="on"> -->
                                <label for="pass">Password</label>
                                <a href="#" class="hide active">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>


                            </div>
                            <input type="submit" value="Sign In" class="sign-btn" name="signIn">
                            <p class="text">
                                Forget your password or your login details?
                                <a href="<?= ROOT ?>/home/forgetpwd" class="toggle-1">Get Help</a> Signing in
                            </p>

                        </div>
                    </form>

                    <!-- --------------------------
                        Sign-Up Part
                    ------------------------------- -->
                    <form method="POST" autocomplete="off" class="sign-up-form">
                        <div class="logo">
                            <!-- <img src="<?= ROOT ?>/assets/images/logo.JPG" alt="company_logo"> -->
                            <!-- <h4>Amoral</h4> -->
                            <h3>
                                Errand
                            </h3>
                            <span>
                                <a href="#">
                                    <ion-icon name="chevron-back-outline"></ion-icon>
                                    <!-- <ion-icon name="chevron-back-circle-outline"></ion-icon> -->
                                    Back
                                </a>
                            </span>
                        </div>

                        <div class="heading">
                            <h2>Get Started</h2>
                            <h6>Already Have an account ?</h6>
                            <a href="#" class="toggle">Sign In</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="name" class="input-field" required autocomplete="off">
                                <label for="fullname">Full Name</label>
                            </div>
                            <div class="input-wrap">
                                <input type="email" name="email" class="input-field" required autocomplete="on">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-wrap">
                                <input type="password" name="password" class="input-field" required autocomplete="off">
                                <label for="pass">Password</label>

                            </div>
                            <div class="input-wrap">
                                <input type="password" name="re-password" class="input-field" required autocomplete="off">
                                <label for="pass">Confirm Password</label>
                                <a href="#" class="hide active">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                            </div>
                            <input type="submit" value="Sign Up" class="sign-btn" name="signUp">
                            <p class="text">
                                By signing up, I agree to the
                                <a href="#" class="toggle-1">Terms of Services</a> and
                                <a href="#" class="toggle-1">Privacy Policy</a>
                            </p>

                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">

                        <img src="<?= ROOT ?>/assets/images/signin-up/pain.jpeg" class="image img-1 show" alt="">
                        <img src="<?= ROOT ?>/assets/images/signin-up/elect.JPG" class="image img-2" alt="">
                        <img src="<?= ROOT ?>/assets/images/signin-up/cleaner.jpg" class="image img-3" alt="">
                        <img src="<?= ROOT ?>/assets/images/signin-up/painter.jpg" class="image img-4" alt="">
                    </div>
                    <div class="text-slider">
                        <div class="text-wrap">
                            <div class="text-group">
                                <h2>Post Your Job Free</h2>
                                <h2>List Your Skills as a worker</h2>
                                <h2>Hire skillfull Workers</h2>
                                <h2>View ratings and comments </h2>
                                <!-- <span>
                                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                                </span> -->

                            </div>
                        </div>
                        <div class="bullets">
                            <span class="bull-1 active" data-value="1"></span>
                            <span class="bull-2" data-value="2"></span>
                            <span class="bull-3" data-value="3"></span>
                            <span class="bull-4" data-value="4"></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="<?= ROOT ?>/assets/js/signin-up.js"></script>

</body>

</html>