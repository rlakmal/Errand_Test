<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/empnav.css">

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
                </ul>
            </nav>
            <div class="icons">
                <a href="<?= ROOT ?>/worker/messages"><img src="<?= ROOT ?>/assets/images/employer/msg.png" alt="Message"></a>
                <a href="<?= ROOT ?>/worker/notifications"><img src="<?= ROOT ?>/assets/images/employer/belll.png" alt="notification"></a>
                <div class="profile-dropdown" id="profile-dropdown">
                    <a href="#"><img class="profile-icon" src="<?= ROOT ?>/assets/images/employer/prr.png" alt="Profile"></a>
                    <div class="profile-menu" id="profile-menu">
                        <a href="<?= ROOT ?>/worker/home">Home</a>
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