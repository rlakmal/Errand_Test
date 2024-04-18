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

        .round {
            width: 27px;
            /* height: 20px; */
            border-radius: 50%;
            position: relative;
            background: red;
            display: inline-block;
            padding: 0.3rem 0.2rem !important;
            /* margin: 0.3rem 0.2rem !important; */
            left: -18px;
            /* top: 10px; */
            z-index: 99 !important;
        }

        .round>span {
            color: white;
            display: block;
            text-align: center;
            font-size: 1rem !important;
            padding: 0 !important;
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

                <a href="<?= ROOT ?>/employer/notifications">
                    <li><i class="bx bxs-bell icon" id="over" data-value="" style="z-index:-99 !important;font-size:32px;color:white;margin:0.5rem 0.4rem !important;"></i></li>
                </a>

                <div class="round" id="bell-count" data-value=""><span><?php echo $count_active; ?></span></div>



                <div class="profile-dropdown" id="profile-dropdown">
                    <a href="#">
                        <i class="bx bxs-user icon"></i>
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

            <div id="google_translate_element_sinhala" class="google-translate-element"></div>

        </header>
    </div>
    <script src="<?= ROOT ?>/assets/js/employer/navlist.js"></script>

    <!-- Google Translate Element -->
    <div id="google_translate_element_sinhala"></div>

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
            <div class="postjobimages">
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
            </div>
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
                <button name="postJob" type="submit" value="POST" class="close-btn" onclick="closeReport()">POST</button>
            </div>
        </form>
    </div>

    <div id="overlay" class="overlay"></div>

    <script src="https://translate.google.com/translate_a/element.js?key=AIzaSyD2dD6OZ4tXBs4f6FYMocZmVsSEN_3Tj50&cb=googleTranslateElementInit"></script>
    <!-- Google Translate Script -->
    <!--    <script src="https://translate.google.com/translate_a/element.js?key=YOUR_API_KEY&cb=googleTranslateElementInit"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "<?= ROOT ?>/employer/notifycount",
                cache: false,
                success: function(res) {
                    console.log("Response:", res);
                    var newData = JSON.parse(res);
                    var count = newData.count;

                    // Update the data-value attribute and text inside the bell icon
                    //$('#over').attr('data-value', count).text(count);

                    if (count > 0) {
                        // If count is greater than 0, display the round badge
                        $('#bell-count').attr('data-value', count).find('span').text(count);
                        $('#bell-count').show(); // Show the round badge
                    } else {
                        // If count is 0 or empty, hide the round badge
                        $('#bell-count').hide();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                }
            });
        });
    </script>


    <!-- <script>
        $(document).ready(function() {
            var ids = new Array();
            console.log(ids);
            $('#over').on('click', function() {
                $('#list').toggle();
            });

            //Message with Ellipsis
            $('div.msg').each(function() {
                var len = $(this).text().trim(" ").split(" ");
                if (len.length > 12) {
                    var add_elip = $(this).text().trim().substring(0, 65) + "…";
                    $(this).text(add_elip);
                }

            });


            $("#bell-count").on('click', function(e) {
                e.preventDefault();

                let belvalue = $('#bell-count').attr('data-value');
                console.log(belvalue);

                if (belvalue == '') {

                    console.log("inactive");
                } else {
                    $(".round").css('display', 'none');
                    $("#list").css('display', 'block');

                    // $('.message').each(function(){
                    // var i = $(this).attr("data-id");
                    // ids.push(i);

                    // });
                    //Ajax
                    $('.message').click(function(e) {
                        e.preventDefault();
                        var id = $(this).attr('data-id');
                        console.log(id);
                        // $.ajax({
                        //     url: 'deactive.php',
                        //     type: 'POST',
                        //     data: {
                        //         "id": id,
                        //     },
                        //     success: function(data) {

                        //         console.log(data);
                        //         location.reload();
                        //     }
                        // });
                    });
                }
            });
        });
    </script> -->

    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,si'
            }, 'google_translate_element_sinhala');
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
    </script>

    <!-- Google Maps API Script -->
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

        google.maps.event.addDomListener(window, "load", initMap);
    </script>

    <script src="<?= ROOT ?>/assets/js/employer/addpost.js"></script>
    <script src="<?= ROOT ?>/assets/js/employer/jobimageUpload.js"></script>

</body>

</html>