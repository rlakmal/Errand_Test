<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/new_home.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/new_home_responsive.css">
    <!-- font awesome style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home Page | Errand</title>
</head>

<body>
    <!-- NavBar -->
    <!-- <div class="homenavbar">
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
    <script src="assets/homenavbar.js"></script> -->
    <!-- End of NavBar -->
    <?php include 'homenavbar.php' ?>
    <div class="main-container">
        
        <!-- Hero Section -->
        <div class="hero sections">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col">
                        <div class="detail-box">
                            <h1>Get Your Job Done !</h1>
                            <h2>Hire Workers or<br> Get Hired</h2>
                            <p>
                                Your one-stop destination for connecting with skilled, reliable workers ready to tackle any task. 
                                Choose the right person for your needs based on detailed profiles, verified reviews, and transparent pricing. With Errand, 
                                getting things done has never been easier !
                            <div class="button-container">
                                <a href=""> Register as Customer </a>
                                <a href=""> Register as Worker </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col">
                        <div class="img-box">
                        <img src="<?= ROOT ?>/assets/images/home/slider-img.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- feature section -->
        <div class="feature sections">

            <div class="feature_container">
                <div class="box">
                    <div class="img-box">
                        <img src="<?= ROOT ?>/assets/images/home/repair.png" alt="">
                    </div>
                    <h5 class="name">
                        Repair
                    </h5>
                </div>

                <div class="box active">
                    <div class="img-box">
                        <img src="<?= ROOT ?>/assets/images/home/improve.png" alt="">
                    </div>
                    <h5 class="name">
                        Improve
                    </h5>
                </div>

                <div class="box">
                    <div class="img-box">
                        <img src="<?= ROOT ?>/assets/images/home/maintain.png" alt="">
                    </div>
                    <h5 class="name">
                        Maintain
                    </h5>
                </div>

            </div>

        </div>
        <!-- end feature section -->

        <!-- about section -->
        <div class="about sections layout_padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col">

                        <div class="detail-box">
                            <h2>
                            About us
                            </h2>
                            <p>
                                At Errand, we bridge the gap between you and the dependable help you need to complete any task, no matter how big or small. Founded with the vision to streamline the process of finding and hiring local workers, we provide a secure, user-friendly platform where every job can be handled with precision and professionalism.
                            </p>
                            <a href="">
                            Read More
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6 col">
                        <div class="img-box">
                            <img src="<?= ROOT ?>/assets/images/home/about-img.jpg" alt="">
                        </div>
                    </div>
                </div>

            </div>
        
        </div>
        <!-- end of about section -->

        <!-- professional section -->
        <div class="professional sections layout_padding">

            <div class="container">
                <div class="row">

                  <div class="col-md-6 col">
                    <div class="img-box">
                      <img src="<?= ROOT ?>/assets/images/home/professional-img.png" alt="">
                    </div>
                  </div>

                  <div class="col-md-6 col">
                    <div class="detail-box">
                      <h2>
                        We Provide Professional <br>
                        Home Services.
                      </h2>
                      <p>
                        Errand offers a comprehensive range of services to meet all your household needs. Whether you need someone to fix a leaky faucet or help with a install a new security system, our platform connects you with skilled professionals ready to assist. Each task is completed with efficiency and reliability, ensuring satisfaction every time. Dive deeper into our full spectrum of services and see how we can help you tackle your next project.
                      </p>
                      <a href="">
                        Read More
                      </a>
                    </div>
                  </div>

                </div>
            </div>

        </div>
        <!-- end of professional section -->

        <!-- service section -->
        <div class="service sections layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                  <h2> Our Services </h2>
                </div>

                <div class="row">

                  <div class="col-sm-6 col-md-4 m-auto col">
                    <div class="box">
                      <div class="img-box">
                        <img src="<?= ROOT ?>/assets/images/home/s1.png" alt="" />
                      </div>
                      <div class="detail-box">
                        <h5>
                          Maintenance
                        </h5>
                        <p>
                            Ensure your property stays in top condition with our Errand comprehensive maintenance services. 
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 m-auto col">
                    <div class="box">
                      <div class="img-box">
                        <img src="<?= ROOT ?>/assets/images/home/s2.png" alt="" />
                      </div>
                      <div class="detail-box">
                        <h5>
                          Electrical
                        </h5>
                        <p>
                            Safe and reliable electrical services at your fingertips. 
                            Our electricians are ready to tackle any project.
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4 mx-auto col">
                    <div class="box">
                      <div class="img-box">
                        <img src="<?= ROOT ?>/assets/images/home/s3.png" alt="" />
                      </div>
                      <div class="detail-box">
                        <h5>
                          Plumbing
                        </h5>
                        <p>
                            Experience hassle-free plumbing solutions. Whether it's a leaky faucet or a major pipe installation.
                        </p>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="btn-box">
                  <a href="">
                    View More
                  </a>
                </div>

              </div>
        
        </div>
        <!-- end of service section -->

        <!-- client section -->
        <div class="client sections">
            <div class="container">
                <div class="heading_container heading_center">
                  <h2>
                    What Our Clients Say
                  </h2>
                </div>

                <div class="carousel-wrap layout_padding2-top ">
                    <div class="carousel">
                    <div class="item">
                      <div class="box">
                        <div class="client_id">
                          <div class="img-box">
                            <img src="<?= ROOT ?>/assets/images/home/client-1.jpg" alt="">
                          </div>
                          <div class="client_detail">
                            <div class="client_info">
                              <h6>
                                Sahan Thathsara
                              </h6>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="client_text">
                          <p>
                            "Errand made my kitchen renovation a breeze! I posted my project, quickly received multiple bids, and chose a contractor with excellent reviews. The work was top-notch and completed ahead of schedule. Errand is a game-changer for any home project!"
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="box">
                        <div class="client_id">
                          <div class="img-box">
                            <img src="<?= ROOT ?>/assets/images/home/client-2.jpg" alt="">
                          </div>
                          <div class="client_detail">
                            <div class="client_info">
                              <h6>
                                Ruwang Konara
                              </h6>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                          </div>
                        </div>
                        <div class="client_text">
                          <p>
                            "I needed to fix a leaky roof before the rainy season and Errand connected me to a skilled roofer within a day. The quality of work was impressive and the price was right. I'm thoroughly satisfied with the prompt service and results!"
                          </p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            
        </div>
        <!-- end of client section -->

        <!-- contact section -->
        <div class="contact sections layout_padding">
            <div class="container">

                <div class="heading_container">
                  <h2>
                    Contact Us
                  </h2>
                </div>

                <div class="row">

                  <div class="col-md-6 col">
                    <form action="">
                      <div>
                        <input type="text" placeholder="Name" />
                      </div>
                      <div>
                        <input type="text" placeholder="Phone Number" />
                      </div>
                      <div>
                        <input type="email" placeholder="Email" />
                      </div>
                      <div>
                        <input type="text" class="message-box" placeholder="Message" />
                      </div>
                      <div class="d-flex ">
                        <button>
                          SEND
                        </button>
                      </div>
                    </form>
                  </div>

                  <div class="col-md-6 col">
                    <div class="img-box" style="background-color: aqua;">
                        <img src="<?= ROOT ?>/assets/images/home/painters.jpeg" alt="">
                    </div>
                  </div>

                </div>

              </div>

        </div>
        <!-- end of contact section -->

        <!-- info section -->
        <div class="info sections">
            <div class="container">
              <h4>
                Get In Touch
              </h4>
              <div class="row">
                <div class="col-lg-10 m-auto col">
                  <div class="info_items">
                    <div class="row">
                      <div class="col-md-4 col">
                        <a href="">
                          <div class="item ">
                            <div class="img-box ">
                              <i class="fa fa-solid fa-location-dot" aria-hidden="true"></i>
                            </div>
                            <p>
                              Errand Head Office, Colombo 7.
                            </p>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-4 col">
                        <a href="">
                          <div class="item ">
                            <div class="img-box ">
                              <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <p>
                              +94 112936820
                            </p>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-4 col">
                        <a href="">
                          <div class="item ">
                            <div class="img-box">
                              <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <p>
                              Errand@gmail.com
                            </p>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="social-box">
              <h4>
                Follow Us
              </h4>
              <div class="box">
                <a href="">
                  <i class="fa fa-brands fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-brands fa-x-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-brands fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-brands fa-instagram" aria-hidden="true"></i>
                </a>
              </div>
            </div>
        </div>

        <!-- footer -->
        <!-- <div class="footer sections" style="background-color: black">
            <div class="container">
                <p>
                    <h4>
                        Get In Touch
                      </h4>
                      <div class="row">
                        <div class="col-lg-10 m-auto col">
                          <div class="info_items">
                            <div class="row">
                              <div class="col-md-4 col">
                                <a href="">
                                  <div class="item ">
                                    <div class="img-box ">
                                      <i class="fa fa-solid fa-location-dot" aria-hidden="true"></i>
                                    </div>
                                    <p>
                                      Errand Head Office, Colombo 7.
                                    </p>
                                  </div>
                                </a>
                              </div>
                              <div class="col-md-4 col">
                                <a href="">
                                  <div class="item ">
                                    <div class="img-box ">
                                      <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <p>
                                      +94 112936820
                                    </p>
                                  </div>
                                </a>
                              </div>
                              <div class="col-md-4 col">
                                <a href="">
                                  <div class="item ">
                                    <div class="img-box">
                                      <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                    <p>
                                      Errand@gmail.com
                                    </p>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="social-box">
                      <h4>
                        Follow Us
                      </h4>
                      <div class="box">
                        <a href="">
                          <i class="fa fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-brands fa-x-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                          <i class="fa fa-brands fa-youtube" aria-hidden="true"></i>
                        </a>
                        <a href="">
                          <i class="fa fa-brands fa-instagram" aria-hidden="true"></i>
                        </a>
                      </div>
                    </div>
                </div>
                </p>
            </div>
        </div> -->
        <!-- end of footer section -->

    </div>
</body>
</html>
</body>

</html>