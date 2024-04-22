<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Your Webpage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 10px;
            /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
        }

        .containerStu {
            max-width: 700px;
            width: 100%;
            background: #ececec;
            padding: 25px 30px;
            border-radius: 15px;
        }

        .containerStu {
            max-width: 700px;
            width: 100%;
            background: #ececec;
            padding: 25px 30px;
            border-radius: 15px;
        }

        .containerStu .title {
            font-size: 25px;
            font-weight: 500;
            margin-bottom: 13px;
            position: relative;
            /* float: left; */
        }

        .containerStu .back {
            float: right;
            text-decoration: none;
        }

        .containerStu .back a {
            text-decoration: none;
        }

        /* student form details  */

        .containerStu form .user-details,
        .containerStu form .parent-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 10px 0 12px 0;
        }

        form .user-details .input-box,
        form .parent-details .input-box {
            margin-bottom: 10px;
            width: calc(100% / 2 - 20px);
        }

        .user-details .input-box .details,
        .parent-details .input-box .details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input,
        select,
        .parent-details .input-box input {
            width: 100%;
            height: 45px;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 15px;
            transition: all 0.3s ease-in;
            border-bottom-width: 2px;
        }
    </style>
</head>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        console.log('Page loaded.');
    });
</script>

<body>
    <header>
        <h1>Welcome to Your Webpage</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <section id="main-content">
        <!-- Your content goes here -->
    </section>

    <footer>
        <p>&copy; 2024 Your Webpage. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">watch</a></li>
                        <li><a href="#">bag</a></li>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">dress</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>