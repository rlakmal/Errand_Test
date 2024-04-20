<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/empnav.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Style for the "Powered by Google Translator" */
        .google-translate-element {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 9999;
            /* Ensure it's above other elements */
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        @media only screen and (max-width: 768px) {

            /* Show Services and Job Map links in profile menu */
            #profile-menu a[href*="/worker/services"],
            #profile-menu a[href*="/worker/viewjobmap"] {
                display: block;
            }
        }

        @media only screen and (min-width: 769px) {

            /* Hide Services and Job Map links in profile menu */
            #profile-menu a[href*="/worker/services"],
            #profile-menu a[href*="/worker/viewjobmap"] {
                display: none;
            }
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
                        <a href="<?= ROOT ?>/worker/home">Jobs</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/worker/services">Services</a>
                    </li>
                    <li>
                        <a href="<?= ROOT ?>/worker/viewjobmap">Job Map</a>
                    </li>
                </ul>
            </nav>
            <div class="icons">
                <a href="<?= ROOT ?>/worker/message">
                    <i class="bx bxs-chat icon" style="z-index:-99 !important;font-size:32px;color:white;margin:0.5rem 0.4rem !important;"></i>
                </a>
                <a href="<?= ROOT ?>/worker/notifications">
                    <li><i class="bx bxs-bell icon" id="over" data-value="<?php echo $count_active; ?>" style="z-index:-99 !important;font-size:32px;color:white;margin:0.5rem 0.4rem !important;"></i></li>
                </a>

                <div class="round" id="bell-count" data-value=""><span></span></div>

                <div class="profile-dropdown" id="profile-dropdown">
                    <a href="#">
                        <i class="bx bxs-user icon" style="z-index:-99 !important;font-size:32px;color:white;margin:0.5rem 0.4rem !important;"></i>
                    </a>
                    <div class="profile-menu" id="profile-menu">
                        <a href="<?= ROOT ?>/worker/home">Home</a>
                        <a href="<?= ROOT ?>/worker/services">Services</a>
                        <a href="<?= ROOT ?>/worker/viewjobmap">Job Map</a>
                        <a href="">Dashboard</a>
                        <a href="<?= ROOT ?>/worker/myjobs">My Jobs</a>
                        <a href="<?= ROOT ?>/worker/messages">Message</a>
                        <a href="<?= ROOT ?>/worker/workerprofile">Profile</a>
                        <a href="<?= ROOT ?>/worker/tickets">Tickets</a>
                        <a href="<?= ROOT ?>/home/signout">LogOut</a>

                    </div>
                </div>
            </div>
            <label for="nav_check" class="hamburger"></label>

            <div id="google_translate_element_sinhala" class="google-translate-element"></div>

        </header>
    </div>
    <script src="<?= ROOT ?>/assets/js/employer/navlist.js"></script>

    <script src="https://translate.google.com/translate_a/element.js?key=AIzaSyD2dD6OZ4tXBs4f6FYMocZmVsSEN_3Tj50&cb=googleTranslateElementInit"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "<?= ROOT ?>/worker/notifyjobcount",
                cache: false,
                success: function(res) {
                    console.log("Response:", res);
                    var newData = JSON.parse(res);
                    var count = newData.count;

                    if (count > 0) {
                        $('#bell-count').attr('data-value', count).find('span').text(count);
                        $('#bell-count').show(); // Show the round badge
                    } else {
                        $('#bell-count').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    // Handle error if needed
                }
            });
        });
    </script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,si'
            }, 'google_translate_element_sinhala');
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
</body>

</html>