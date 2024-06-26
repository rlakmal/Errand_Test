<!DOCTYPE html>
<html>

<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/empnav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobpopup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        #map {
            height: 300px;
            width: 85%;
            margin-left: 6%;
        }

        /* Style for the "Powered by Google Translator" */
        .google-translate-element {
            position: relative;
            bottom: 10px;
            right: 10px;
            z-index: 9999;
            /* Ensure it's above other elements */
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Adjust the position of the Google Translate element */
        #google_translate_element_sinhala {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            /* Ensure it's above other elements */
        }
    </style>

</head>

<body>
    <div class="homenavbar">
        <header>
            <div class="logo">Errand</div>
            <input type="checkbox" id="nav_check" hidden>
            <nav>
                <ul>
                    <!--                <li>-->
                    <!--                    <a class="bttn" type="button" onclick="openReport()">Post Job</a>-->
                    <!--                </li>-->
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
                        <!--                    <a class="bttn" onclick="openReport()">Post Job</a>-->
                        <a href="<?= ROOT ?>/employer/message">Message</a>
                        <a href="<?= ROOT ?>/employer/profile">Profile</a>
                        <a href="<?= ROOT ?>/employer/tickets">Tickets</a>
                        <a href="<?= ROOT ?>/home/signout">LogOut</a>
                    </div>
                </div>
            </div>
            <label for="nav_check" class="hamburger"></label>

            <div id="google_translate_element_sinhala" class="google-translate-element"></div>

        </header>
    </div>
    <script src="<?= ROOT ?>/assets/js/employer/navlist.js"></script>

    <!--<div class="popup-report">-->
    <!--    <form method="POST">-->
    <!--        <h2>Post your Job</h2>-->
    <!--        <h4>Job Title : </h4>-->
    <!--        <input name="jobTitle" type="text" placeholder="Enter Tiltle of the Job">-->
    <!--        <h4>Budget : </h4>-->
    <!--        <input name="budget" type="text" placeholder="Enter your Budget" autocomplete="off">-->
    <!--        <h4>Address : </h4>-->
    <!--        <input name="address" type="text" placeholder="Enter address">-->
    <!--        <h4>City : </h4>-->
    <!--        <input name="city" type="text" placeholder="Select Location">-->
    <!--        <h4>Description : </h4>-->
    <!--        <input name="description" type="text" placeholder="Enter your description">-->
    <!--        <div class="btns">-->
    <!--            <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>-->
    <!--            <button name="postJob" type="submit" value="POST" class="close-btn" onclick="closeReport()">POST</button>-->
    <!--        </div>-->
    <!--    </form>-->
    <!--</div>-->
    <!-- <div id="overlay" class="overlay"></div> -->

</body>

<!-- <script src="https://translate.google.com/translate_a/element.js?key=AIzaSyAGNQQ9JIyk-p8Ta2FB2WtYqPaOn4nb3wQ&cb=googleTranslateElementInit"></script> -->


<script>
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({
    //         pageLanguage: 'en',
    //         includedLanguages: 'en,si'
    //     }, 'google_translate_element_sinhala');
    //     // new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'en,ta' }, 'google_translate_element_tamil');
    // }

    // function toggleLanguageSinhala() {
    //     var select = document.querySelector('#google_translate_element_sinhala .goog-te-combo');
    //     if (select.value === 'en') {
    //         select.value = 'si';
    //     } else {
    //         select.value = 'en';
    //     }
    //     select.dispatchEvent(new Event('change'));
    // }

    // function toggleLanguageTamil() {
    //     var select = document.querySelector('#google_translate_element_tamil .goog-te-combo');
    //     if (select.value === 'en') {
    //         select.value = 'ta';
    //     } else {
    //         select.value = 'en';
    //     }
    //     select.dispatchEvent(new Event('change'));
    // }
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({
    //         pageLanguage: 'en',
    //         includedLanguages: 'en,si,ta' // Include Tamil (ta)
    //     }, 'google_translate_element_sinhala');
    // }

    // function toggleLanguageTamil() {
    //     var select = document.querySelector('#google_translate_element_sinhala .goog-te-combo');
    //     if (select.value === 'en') {
    //         select.value = 'ta'; // Switch to Tamil
    //     } else {
    //         select.value = 'en'; // Switch back to English
    //     }
    //     select.dispatchEvent(new Event('change'));
    // }
</script>

</html>