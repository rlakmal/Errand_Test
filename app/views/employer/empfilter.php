
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobfilter.css">
    <title>Category and Location Select</title>
    <style>

    </style>
</head>

<body>

<div class="select-container">
    <div class="logo_details">
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <div class="search-container">
        <input type="text" class="search-box" id="search" placeholder="Search..." oninput="searchTable()">
        <button type="submit" id="search-button">Search</button>
    </div>

    <div class="carousel">
        <div class="images-wrapper">

            <img src="<?= ROOT ?>/assets/images/signin-up/SYP10.png" class="slideimage img-1 show" alt="">
            <img src="<?= ROOT ?>/assets/images/signin-up/jbrrrr.png" class="slideimage img-2" alt="">
            <img src="<?= ROOT ?>/assets/images/signin-up/jo5r.png" class="slideimage img-3" alt="">
            <img src="<?= ROOT ?>/assets/images/signin-up/jo4r.png" class="slideimage img-4" alt="">

            <!-- <img src="<?= ROOT ?>/assets/images/signin-up/pj1.jpg" class="slideimage img-1 show" alt="">
                <img src="<?= ROOT ?>/assets/images/signin-up/pj2.jpg" class="slideimage img-2" alt="">
                <img src="<?= ROOT ?>/assets/images/signin-up/pj6.jpg" class="slideimage img-3" alt="">
                <img src="<?= ROOT ?>/assets/images/signin-up/pj5.jpg" class="slideimage img-4" alt=""> -->
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


    <!-- <label for="category">Category</label>
<select id="category">
    <option value="Technicians">All</option>
    <option value="Technicians">Technicians</option>
    <option value="AC Repairs">AC Repairs</option>
    <option value="CCTV">CCTV</option>
    <option value="Constructions">Constructions</option>
    <option value="Electricians">Electricians</option>
    <option value="Electronic Repairs">Electronic Repairs</option>
    <option value="Glass & Aluminium">Glass & Aluminium</option>
    <option value="Iron Works">Iron Works</option>
    <option value="Masonry">Masonry</option>
    <option value="Odd Jobs">Odd Jobs</option>
    <option value="Pest Controllers">Pest Controllers</option>
    <option value="Plumbing">Plumbing</option>
    <option value="Wood Works">Wood Works</option>
</select>

<label for="location">Location</label>
<select id="location">
    <option value="Colombo">All</option>
    <option value="Colombo">Colombo</option>
    <option value="Kandy">Kandy</option>
    <option value="Gampaha">Gampaha</option>
    <option value="Negombo">Negombo</option>
    <option value="Kadawatha">Kiribathgoda</option>
    <option value="Kadawatha">kaluthara</option>
    <option value="Kadawatha">Galle</option>
    <option value="Kadawatha">Homagama</option>
    <option value="Kadawatha">Kirulapana</option>

</select> -->


</div>
<script>
    window.onload = function() {
        const sidebar = document.querySelector(".select-container");
        const closeBtn = document.querySelector("#btn");
        const main = document.querySelector(".main");

        closeBtn.addEventListener("click", function() {
            sidebar.classList.toggle("open");
            main.classList.toggle("open");
            menuBtnChange();
        });

        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    };
</script>

<script>
    const inputs = document.querySelectorAll(".input-field");
    const toggle_btn = document.querySelectorAll(".toggle");
    const main = document.querySelector("main");
    const bullets = document.querySelectorAll(".bullets span");
    const imgArr = document.querySelectorAll(".slideimage");

    inputs.forEach((input) => {
        // input class name rename when the clicked
        input.addEventListener("focus", () => {
            input.classList.add("active");
        });

        // input class name remove when the clicked outside the page
        input.addEventListener("blur", () => {
            if (input.value != "") {
                return;
            } else {
                input.classList.remove("active");
            }
        });
    });


    // move sign in & sign up
    toggle_btn.forEach((btn) => {
        btn.addEventListener("click", () => {
            main.classList.toggle("sign-up-mode");
        });
    });

    // image slider & bullet navigation
    let index = 0;

    function moveSlider() {

        index = (index % imgArr.length) + 1;

        let currentImage = document.querySelector(`.img-${index}`);
        imgArr.forEach((img) => img.classList.remove("show"));
        currentImage.classList.add("show");

        const textSlider = document.querySelector(".text-group");
        textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;


        let currentBullet = document.querySelector(`.bull-${index}`);
        bullets.forEach((bull) => bull.classList.remove("active"));
        currentBullet.classList.add("active");

    }

    setInterval(moveSlider, 2000);
</script>


</body>

</html>
