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
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 9999; /* Ensure it's above other elements */
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body>
    <div class="homenavbar" style="position: relative">
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
                        <a href="<?= ROOT ?>/employer/dashboard">Dashboard</a>

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
    <script src="<?= ROOT ?>/assets/js/employer/navlist.js"></script>

    <div class="popup-report">
        <form method="POST" enctype="multipart/form-data">
            <h2>Post your Job</h2>
            <h4>Job Title : </h4>
            <input name="jobTitle" type="text" placeholder="Enter Title of the Job">
            <h4>Budget : </h4>
            <input name="budget" type="text" placeholder="Enter your Budget" autocomplete="off">
            <h4>Select Your Town : </h4>
            <div id="map"></div>
            <input type="hidden" id="location" name="location">
            <h4>City : </h4>
            <input name="city" type="text" placeholder="Enter your city">
            <h4>Description : </h4>
            <input name="description" type="text" placeholder="Enter your description">
            <diV class="postjobimages">
                <div class="form-drag-area">

                    <div class="form-upload">
                        <input type="file" id="job_image" style="display: none;" name="job_image">
                        <div class="jobpicture">
                            <img class="jobimage" src="<?= ROOT ?>/assets/images/jobimages/job.png" alt="placeholder" id="job_image_placeholder">
                        </div>
                        Choose Image
                    </div>
                </div>
                <div class="form-drag-area1">
                    <div class="jobpicture">

                    </div>
                    <div class="form-upload1">
                        <input type="file" id="job_image1" style="display: none;" name="job_image1">
                        <img class="jobimage" src="<?= ROOT ?>/assets/images/jobimages/job.png" alt="placeholder" id="job_image1_placeholder">
                    </div>
                </div>
            </diV>
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
                <button name="postJob" type="submit" value="POST" class="close-btn" onclick="closeReport()">POST</button>
            </div>
    </form>
</div>

<div id="overlay" class="overlay"></div>

<script src="https://translate.google.com/translate_a/element.js?key=YOUR_API_KEY&cb=googleTranslateElementInit"></script>

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'en,si' }, 'google_translate_element_sinhala');
        // new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'en,ta' }, 'google_translate_element_tamil');
    }

    function toggleLanguageSinhala() {
        var select = document.querySelector('#google_translate_element_sinhala .goog-te-combo');
        if (select.value === 'en') {
            select.value = 'si';
        } else {
            select.value = 'en';
        }
        select.dispatchEvent(new Event('change'));
    }

    // function toggleLanguageTamil() {
    //     var select = document.querySelector('#google_translate_element_tamil .goog-te-combo');
    //     if (select.value === 'en') {
    //         select.value = 'ta';
    //     } else {
    //         select.value = 'en';
    //     }
    //     select.dispatchEvent(new Event('change'));
    // }
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GOvTVdWC3aNfI8Jg4gOkyk74hiOB0RE&libraries=places&callback=initMap"></script>

<script>
    let map, marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 6.871802506297455,
                lng: 79.9266435985261
            },
            zoom: 7.8
        });

        marker = new google.maps.Marker({
            position: {
                lat: 6.871802506297455,
                lng: 79.9266435985261
            },
            map: map,
            draggable: true
        });

        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });
    }

    function placeMarker(location) {
        marker.setPosition(location);
        document.getElementById("location").value = `${location.lat()}, ${location.lng()}`;
    }

    function openReport() {
        document.getElementById("map").style.display = "block";
        initMap();
    }

    function closeReport() {
        document.getElementById("map").style.display = "none";

    }

    // function submitForm() {

    // }

    google.maps.event.addDomListener(window, "load", initMap);
</script>

<script src="<?= ROOT ?>/assets/js/employer/addpost.js"></script>
<script src="<?= ROOT ?>/assets/js/employer/jobimageUpload.js"></script>

</body>

</html>
