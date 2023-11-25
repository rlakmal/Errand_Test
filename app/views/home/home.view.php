<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/backgrount.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/footer.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/content.css">
    <title>Document</title>
</head>

<body>
    <?php include 'homenavbar.php' ?>
    <div class="maincontainer">
        <div class="home-first-content">
            <div>
                <div class="logo-name">
                    <span class="title"><span class="first_letter">E</span>rrand</span><br>
                </div>
                <span>Reliable Hands Good Works</span><br>
                <div class="home-buttons">
                    <a href="<?= ROOT ?>/home/workerreg" class="active"><button class="button-reg">Register As Worker</button></a>
                    <a href="<?= ROOT ?>/home/signin" class="active"><button class="button-hire">Want to Hire workers</button></a>
                </div>
            </div>

        </div>

        <div class="two-content-div">
            <div class="two-content-div-one">
                <span class="title">Friendly Service <br><br> Guaranteed</span><br>
            </div>
            <div class="two-content-div-form">
                <span class="subtitle">Contact Us</span>
                <form>
                    <input type="text" class="info" placeholder="First Name"><br>
                    <input type="text" class="info" placeholder="Last Name"><br>
                    <input type="text" class="info" placeholder="Email"><br>
                    <!-- <button class="contact-button">Contact</button> -->
                    <input type="submit" value="  Contact  " class="contact-button">
                </form>
            </div>
        </div>

        <div class="two-content-div">
            <div>
                <img src="<?= ROOT ?>/assets/images/signin-up/pain.jpeg" class="content-div-img">
            </div>
            <div>
                <span class="title">Best service in Sri Lanka</span><br>
                <span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                    aut odit aut fugit, sed quia consequuntur magni dolores
                    eos qui ratione voluptatem sequi nesciunt.
                    Neque porro quisquam est, qui dolorem.</span>
            </div>
        </div>

        <footer class="footer">
            <div class="center"><img src="../Assets/SerWise.png" class="logo"></div>
            <div class="center"><a href="#"> Contact Us </a> &nbsp|
                &nbsp<a href="#"> About Us </a> &nbsp|
                &nbsp <a href="#"> Legal Stuff </a></div>
            <div class="center">All Rights Recieved</div>
        </footer>

        <script src="<?= ROOT ?>/assets/js/home/homebackground.js"></script>
    </div>
</body>

</html>