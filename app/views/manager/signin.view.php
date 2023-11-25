<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add some basic styles to your navbar */
        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        /* Style the navbar links */
        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* On hover, the links will change color */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Create a "hamburger" icon for mobile devices */
        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            /* Display the hamburger icon and hide the navbar links on small screens */
            .navbar a:not(:first-child) {display: none;}
            .navbar a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            /* Display the navbar links when the hamburger icon is clicked */
            .navbar.responsive {
                position: relative;
            }

            .navbar.responsive .icon {
                position: absolute;
                top: 0;
                right: 0;
            }

            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
</head>
<body>

<div class="navbar" id="myNavbar">
    <a href="#" class="icon" onclick="myFunction()">&#9776;</a>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Portfolio</a>
    <a href="#">Contact</a>
</div>

<script>
    // Function to toggle the responsive class
    function myFunction() {
        var x = document.getElementById("myNavbar");
        if (x.className === "navbar") {
            x.className += " responsive";
        } else {
            x.className = "navbar";
        }
    }
</script>

</body>
</html>
