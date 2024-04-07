<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobfilter.css">
    <title>Category and Location Select</title>
    <style>
        .carousel {
            position: absolute;
            height: 76%;
            width: 100%;
            top: 107px;
            left: 1%;
            padding-top: 5px;
            /* background-color: #bababa; */
            border-radius: 2rem;
            display: flex;
            overflow: hidden;
            grid-template-rows: auto 1fr;
            padding-bottom: 2rem;
            transition: 0.8s ease-in-out;
            margin-top: 1.8%;
            flex-direction: column;
        }

        .slideimage {
            width: 90%;
            grid-row: 1 / 2;
            grid-column: 1 / 2;
            opacity: 0;
            border-radius: 1%;
            margin-left: 2%;
            transition: opacity 0.5s linear, transform 1.2s ease-in-out;
        }



        .img-1 {
            transform: translate(50px, 0px);
            max-height: 75%;
        }

        .img-2 {
            transform: translate(50px, 0px);
            max-height: 75%;
        }

        .img-3 {
            transform: translate(50px, 0px);
            max-height: 75%;
            /* transform: scale(0.3) rotate(-20deg); */
        }

        .img-4 {
            transform: translate(50px, 0px);
            max-height: 75%;
            /* transform: scale(0.4, 0.5); */
        }

        .images-wrapper {
            width: 100%;
            height: 77%;
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            align-items: start;
            justify-content: center;
            border-radius: 10%;
            margin-left: 2%;
        }

        .slideimage.show {
            opacity: 1;
            transform: none;
        }

        .text-slider {
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 1%;
            /* background-color: red; */
        }

        .text-wrap {
            max-height: 2.2rem;
            overflow: hidden;
            margin-bottom: 0.5rem;
        }

        .text-group {
            display: flex;
            flex-direction: column;
            text-align: center;
            transform: translateY(0);
            transition: 0.5s;
        }

        .text-group h2 {
            line-height: 2.2rem;
            font-weight: 600;
            font-size: 1.6rem;
        }

        .bullets {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bullets span {
            display: block;
            width: 0.5rem;
            height: 0.5rem;
            margin: 0 0.25rem;
            border-radius: 50%;
            background-color: #aaaa;
            cursor: pointer;
            transition: 0.3s;
        }

        .bullets span.active {
            background-color: #000000;
            width: 1.1rem;
            border-radius: 1rem;
        }
    </style>
</head>

<body>

    <div class="select-container">
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