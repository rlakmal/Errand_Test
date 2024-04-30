<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            overflow-y: hidden;
            /* Make the body scrollable */
        }

        .main {
            padding: 20px;
            width: calc(100% - 260px);
            /* Adjust based on your sidebar width */
            overflow-x: scroll;
        }

        .form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background: #f4f7fc;
        }

        .form-group {
            padding: 10px;
            margin-right: 10px;
            border-radius: 20px;
            /* Making borders round */
            border: 1px solid #ccc;
            background-color: #fff;
            /* Adding background color */
        }

        .icon {
            font-size: 24px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border-right: 1px #ddd;
            padding: 8px;
            text-align: left;
            background: white;
            height: fit-content;
        }

        .table tr {
            height: 70px;

        }

        .table th {
            background-color: #f4f7fc;
            color: black;
        }

        .table tr:nth-child(even) {
            background-color: white;
            transition: transform 0.3s;
        }

        .table tr:hover {
            background-color: #e5e5e5;
            transform: scale(1.01);
        }

        .edit-view-profile a {
            text-decoration: none;
            color: #ff904b;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .edit-view-profile a:hover {
            color: darkgoldenrod;
        }

        .verified-widget {
            display: flex;
            align-items: center;
            gap: 5px;
            background: white;
        }

        .verified-icon {
            color: #2ecc71;
            font-size: 16px;
        }

        .not-verified-icon {
            color: #e74c3c;
            font-size: 16px;
        }

        .btn_reply {
            width: 70px;
            height: 40px;
            color: white;
            background-color: #ff7611;
            border-radius: 30px;
            border: none;
        }

        .btn_sent {
            width: 70px;
            height: 40px;
            color: white;
            background-color: red;
            border-radius: 30px;
            border: none;
        }

        .btn_reply:hover {
            background-color: black;
        }

        .popup-view {
            position: absolute;
            max-height: 80vh;
            overflow-y: auto;
            width: 29%;
            background: #ffffff;
            margin-top: 0%;
            margin-bottom: 0%;
            top: 53%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 0 0 1px #cc1a00, 0 0 0 4px #fbcfc6;
            visibility: hidden;
            transition: transform 0.5s, top 0.5s;
            justify-content: center;
        }

        .open-popup-view {
            position: fixed;
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
            z-index: 101;
        }

        .overlay-active {
            opacity: 1;
            pointer-events: all;
            z-index: 100;
        }

        .popup-view form {
            padding: 0px;
        }

        #myform {
            display: flex;
            padding: 49px;
            margin: -20px;
            flex-direction: column;
            align-items: flex-start;
        }

        .popup-view .contact-textarea {
            width: 400px;
            height: 140px;
            border: 1px solid #686868;
            outline: none;
            padding-top: 15px;
            font-weight: 500;
            border-radius: 20px;
            margin-top: 20px;
            margin-left: -64px;
        }

        @media screen and (max-width: 768px) {
            .form {
                flex-direction: column;
            }

            .form-group {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>

    <title>Document</title>
</head>

<body>
    <?php include 'sidebar.php' ?>
    <!-- Navigation bar -->
    <?php include 'navigationbar.php' ?>
    <section id="main" class="main">
        <h2 style="background: #f4f7fc">Contact Us Form</h2>
        <form style="background: #f4f7fc">
            <div class="form">
                <!-- Category Selector -->

                <!-- Search bar -->
                <input style="margin-right: 10%" id="searchInput" class="form-group" type="text" placeholder="Search by Name or ID">
            </div>
        </form>
        <div style="overflow-y: scroll; height: 700px">

            <table class="table">
                <thead>
                    <tr>

                        <th class="id">ID</th>
                        <th class="ordId">Name</th>
                        <th class="ordId">Message</th>
                        <th class="stth">Email</th>
                        <th class="verified">Phone No</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (is_array($data)) {
                        foreach ($data as $item) {
                    ?>
                            <tr>
                                <td><?php echo $item->id ?></td>
                                <td><?php echo $item->name ?></td>
                                <td><?php echo $item->message ?></td>
                                <td><?php echo $item->email ?></td>
                                <td><?php echo $item->phone_number ?></td>
                                <?php if ($item->status == 0) {
                                ?>
                                    <td><button class="btn_reply" onclick="openRequest('<?php echo $item->id ?>')">Reply</button></td>
                                <?php
                                } else {
                                ?>
                                    <td><button class="btn_sent">Sent</button></td>
                                <?php
                                }
                                ?>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div class="popup-view">
                <form id="myform">
                    <h2>Message</h2>
                    <textarea name="message" class="contact-textarea"></textarea>
                    <div class="btns">
                        <!-- Pass the id to the sentMail function -->
                        <button type="" name="email_send" class="cancelR-btn" onclick="sentMail()">Send</button>
                    </div>
                </form>
            </div>
            <div id="overlay2" class="overlay"></div>
    </section>

    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>
    <script>
        let popupRequest = document.querySelector(".popup-view");
        let overlay2 = document.getElementById("overlay2");
        let currentId; 

        function openRequest(id) {
            currentId = id; 
            console.log(location);
            popupRequest.classList.add("open-popup-view");
            overlay2.classList.add("overlay-active");
        }

        function cancelRequest() {
            popupRequest.classList.remove("open-popup-view");
            overlay2.classList.remove("overlay-active");
        }

        function sentMail() {
            var message = document.querySelector('.contact-textarea').value.trim();

            if (message === '') {
                alert("Please enter a message before sending.");
                return;
            }

            console.log("on func" + currentId); // Use the current ID
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    alert(xhttp.responseText);
                }
            };
            xhttp.open("GET", "<?= ROOT ?>/member/mailsent?id=" + currentId + "&message=" + encodeURIComponent(message), true);
            xhttp.send();
        }
    </script>

</body>

</html>