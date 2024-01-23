<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <!-- Custom CSS for Dashboard -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/emp_dashboard.css">

    <!-- Custom CSS for PopUp -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobpopup.css">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>


<body>
    <!-- Navigation Bar -->
    <div class="homenavbar">
        <header>
            <div class="logo">Errand</div>
            <input type="checkbox" id="nav_check" hidden>
            <nav>
                <ul>
                    <li>
                        <a class="bttn" type="button" onclick="openReport()">Post Job</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/employer/home">Jobs</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/employer/services">Services</a>
                    </li>
                </ul>
            </nav>
            <div class="icons">
                <a href="<?= ROOT ?>/employer/message">
                    <i class="bx bxs-chat icon"></i>
                </a>
                <!-- <a href="<?= ROOT ?>/employer/message"><img src="<?= ROOT ?>/assets/images/employer/msg.png" alt="Message"></a> -->
                <a href="<?= ROOT ?>/employer/notifications">
                    <i class="bx bxs-bell icon"></i>
                    <!-- <img src="<?= ROOT ?>/assets/images/employer/belll.png" alt="notification"> -->
                </a>
                <div class="profile-dropdown" id="profile-dropdown">
                    <a href="#">
                        <i class="bx bxs-user icon"></i>
                        <!-- <img class="profile-icon" src="<?= ROOT ?>/assets/images/employer/prr.png" alt="Profile"> -->
                    </a>
                    <div class="profile-menu" id="profile-menu">
                        <a href="<?= ROOT ?>/employer/home">Home</a>
                        <a href="<?= ROOT ?>/employer/myjob">My Jobs</a>
                        <a class="bttn" onclick="openReport()">Post Job</a>
                        <a href="<?= ROOT ?>/employer/message">Message</a>
                        <a href="<?= ROOT ?>/employer/profile">Profile</a>
                        <a href="<?= ROOT ?>/employer/tickets">Tickets</a>
                        <a href="<?= ROOT ?>/home/signout">LogOut</a>
                    </div>
                </div>
            </div>
            <label for="nav_check" class="hamburger"></label>


        </header>
    </div>
    

    <div class="popup-report">
        <form method="POST">
            <h2>Post your Job</h2>
            <h4>Job Title : </h4>
            <input name="jobTitle" type="text" placeholder="Enter Tiltle of the Job">
            <h4>Budget : </h4>
            <input name="budget" type="text" placeholder="Enter your Budget" autocomplete="off">
            <h4>Address : </h4>
            <input name="address" type="text" placeholder="Enter address">
            <h4>City : </h4>
            <input name="city" type="text" placeholder="Select Location">
            <h4>Description : </h4>
            <input name="description" type="text" placeholder="Enter your description">
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
                <button name="postJob" type="submit" value="POST" class="close-btn" onclick="closeReport()">POST</button>
            </div>
        </form>
    </div>
    <div id="overlay" class="overlay"></div>
    <!-- End of Navigation Bar -->
    

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo_details">
            <div class="logo_icon">Errand</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="<?= ROOT ?>/employer/dashboard">
                    <i class='bx bxs-dashboard' ></i>
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
            <!-- 
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
    <!-- End of Sidebar -->

    <!-- Main Section -->
    <main class="main">
        <div class="main-container">
            <h1>Dashboard</h1>
<!--             <div class="date">
                <input type="date">
            </div> -->
            
            <div class="insights">
                <div class="posted-jobs">
                    <span class="material-symbols-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h2>Posted</h2>
                            <h1>Jobs</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy="38" r="36"></circle>
                            </svg>
                            <div class="number">81%</div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- END OF SALES -->
                
                <div class="completed-jobs">
                    <span class="material-symbols-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h2>Completed</h2>
                            <h1>Jobs</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy="38" r="36"></circle>
                            </svg>
                            <div class="number">62%</div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- END OF Expenses -->
                
                <div class="income">
                    <span class="material-symbols-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1>$10,864</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy="38" r="36"></circle>
                            </svg>
                            <div class="number">44%</div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
                <!-- END OF Income -->
            </div>
            <!----------- END OF INSIGHTS ----------->
            
            <div class="recent-orders">
                <h2>Recent Jobs</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
<!--                         <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Foldable Mini Drone</td>
                            <td>85631</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr> -->
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>  
        </div>
        <!---------------- END OF MAIN ----------------->

        <div class="right">
<!--             <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Daniel</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg">
                    </div>
                </div>
            </div> -->
            <!-- END OF TOP -->

            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-2.jpg">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> recieved his order of Night lion tech GPS drone.</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-3.jpg">
                        </div>
                        <div class="message">
                            <p><b>Diana Ayi</b> declined her order of 2 DJI Air 2S.</p>
                            <small class="text-muted">5 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg">
                        </div>
                        <div class="message">
                            <p><b>Mandy Roy</b> recieved his order of LAVENDER KF102 Drone.</p>
                            <small class="text-muted">6 minutes ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF RECENT UPDATES -->

            <div class="sales-analytics">
                <h2>Sales Analytics</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-symbols-sharp">shopping_cart</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h5>ONLINE ORDERS</h5>
                            <small class="text-muted">Last 24 hours</small>
                        </div>
                        <h5 class="success">+39%</h5>
                        <h3>3849</h3>                        
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-symbols-sharp">local_mall</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h5>OFFLINE ORDERS</h5>
                            <small class="text-muted">Last 24 hours</small>
                        </div>
                        <h5 class="danger">-17%</h5>
                        <h3>1100</h3>                        
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-symbols-sharp">person</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h5>NEW CUTOMERS</h5>
                            <small class="text-muted">Last 24 hours</small>
                        </div>
                        <h5 class="success">+25%</h5>
                        <h3>849</h3>                        
                    </div>
                </div>
<!--                 <div class="item add-product">
                    <div>
                        <span class="material-symbols-sharp">add</span>
                        <h3>Add Product</h3>
                    </div>
                </div> -->
            </div>
            <!-- END OF SALES ANLAYTICS -->
        </div>
        <!----------------- END OF RIGHT -------------------->
    </main>
    <!-- End of Main Section -->

    <!-- Custom JS for NavBar -->
    <script src="<?= ROOT ?>/assets/js/employer/navlist.js"></script>
    <!-- Custom JS for Popup -->
    <script src="<?= ROOT ?>/assets/js/employer/addpost.js"></script>
    <!-- Custom JS for Sidebar -->
    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>
</body>

</html>