<!DOCTYPE html>
<html>

<head>
    <title>Ongoing Jobs</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/chat.css">


    <style>
        #map {
            height: 300px;
            width: 85%;
            margin-left: 6%;
        }

        table {
            margin: 2%;
            margin-left: 3%;
            width: 94%;
            border: 3px solid #bbbbbb;
            border-radius: 6px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .my_table {
            left: 10%;

        }

        .t_head {
            height: 73px;
            border: 1px solid black;
        }

        .th_one {
            border: 23px;
        }



        table.table {
            border-collapse: collapse;
            margin: 0px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            width: 100%;
            border-radius: 12px;
            padding-right: 15px;
        }

        table thead tr {
            background-color: #f4f7fc;
            color: #191919;
            text-align: justify;
            border-radius: 12px;
        }

        table th,
        table td {
            padding: 12px 30px 12px 20px;
            width: -1px;
            background-color: #e7e9ff;
        }

        table tr,
        table td {
            background: #ffffff;
        }

        table tbody tr {
            border-top: 1px solid #cdcdcd;
            height: 60px;
        }

        table tbody tr:nth-of-type(even) {
            background-color: #191919;
        }

        table tbody tr:last-of-type {
            border-top: 2px solid #bcc2ce;
        }

        table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .acceptbutton {
            background-color: #393b5e;
            /* border: none; */
            border: solid 1px #393b5e;
            border-radius: 18px;
            color: #ffffff;
            font-weight: bold;
            width: 130px;
            height: 30px;
            font-weight: 300;
            cursor: pointer;
        }

        .scrollable-table {
            max-height: 600px;
            overflow-y: auto;
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

        .map-btn i {
            font-size: 30px;
            color: #393b5e;
        }

        .map-btn {
            border: none;
            background: none;
            cursor: pointer;
        }

        @media (max-width: 650px) {
            td {
                display: block;
            }

            th {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workersidebar.php' ?>
    <section id="main" class="main">
        <h2>Ongoing Jobs</h2>
        <div class="scrollable-table">
            <table class="my_table">
                <thead>
                    <tr class="t_head">
                        <th>No</th>
                        <th class="th_one">Employer Name</th>
                        <th>JOb Title</th>
                        <th>Work Budget</th>
                        <th>Chat</th>
                        <th>Location</th>
                    </tr>
                </thead>

                <?php
                $no = 0;
                if (is_array($data)) {
                    foreach ($data as $item) {
                        $no++;
                        // show($item);

                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $item->emp_name ?></td>
                                <td><?php echo $item->title ?></td>
                                <td>Rs <?php echo $item->budget ?> /= per day</td>
                                <td> <button class="chat-btn" id="toggle-chat-btn" onclick="toggleChat('<?php echo $item->emp_id ?>')">
                                        <i class="bx bx-message-rounded-dots bx-flashing-hover chat-icon" id="chat-msg"></i>
                                    </button></td>
                                <td>
                                    <button class="map-btn" id="viewlocation" onclick="openRequest('<?php echo $item->location ?>')">
                                        <i class='bx bxs-map'></i>
                                    </button>
                                </td>
                            </tr>

                        </tbody>

                <?php
                    }
                }

                ?>
            </table>
        </div>
    </section>
    <div class="popup-view">
        <form method="POST">
            <h2>Job Location</h2>
            <div id="map"></div>
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="cancelRequest()">Cancel</button>
            </div>
        </form>
    </div>
    <div id="overlay2" class="overlay"></div>
    <div id="map"></div>
    <script>
        let popupRequest = document.querySelector(".popup-view");
        let overlay2 = document.getElementById("overlay2");

        function openRequest(location) {
            console.log(location);
            popupRequest.classList.add("open-popup-view");
            overlay2.classList.add("overlay-active");
            var coordinates = location.split(',');
            var latitude = parseFloat(coordinates[0]);
            var longitude = parseFloat(coordinates[1]);
            console.log(latitude);
            console.log(longitude);
            initMap(latitude, longitude);
        }

        function cancelRequest() {
            popupRequest.classList.remove("open-popup-view");
            overlay2.classList.remove("overlay-active");
        }

        function initMap(latitude, longitude) {
            var jobLocation = {
                lat: latitude,
                lng: longitude
            };
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: jobLocation,
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: latitude,
                    lng: longitude
                },
                map: map,
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GOvTVdWC3aNfI8Jg4gOkyk74hiOB0RE&libraries=places&callback=initMap"></script>


    <div class="chat-popup" id="chat-popup">
        <div class="chat-container">
            <div class="chat-header">
                <span class="close-btn" onclick="toggleChat()">×</span>

                <!-- 👋 Hi, message us with any questions. We're happy to help! -->

                <div class="main-content">
                    <img class="userImg" src="<?= ROOT ?>/assets/images/profileImages/prof.jpg" alt="" />
                    <div class="user">
                        <p id="header-user"><?php echo $item->emp_name ?></p>
                        <div class="user-status hide">
                            <div class="status" id="status-c" style="background: rgb(0, 238, 0)"></div>
                            <p id="typing" class="user-online">Offline</p>
                            <div id="userOnline"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="chat-body" id="chat-body"></div>
            <div class="chat-input">
                <input type="text" id="message-input" onkeyup="typing()" placeholder="Type a message..." required />
                <button id="sendbtn" onclick="emptycheck()" accesskey="enter">
                    <span><i class="bx bxl-telegram bx-flashing-hover send_icon"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        let chatVisible = false;

        var chatBoxData

        var userID
        var socket = null;

        var chatInput = document.querySelector(".chat-input");
        var userStatus = document.querySelector(".user-status");
        var userImge = document.querySelector(".userImg");
        //console.log(chatInput);

        let selectChatId = 0;

        var onlineUser;

        var chatBody = document.getElementById('chat-body');

        chatBody.scrollTop = chatBody.scrollHeight + 100;

        chatBody.scrollTo({
            bottom: chatBody.scrollHeight,
            behavior: 'smooth'
        });


        function toggleChat(to_id) {
            //console.log(to_id);
            const chatPopup = document.getElementById("chat-popup");
            const toggleChatBtn = document.getElementById("toggle-chat-btn");
            const chat_msg = document.getElementById("chat-msg");

            if (!chatVisible) {
                // If chat is not visible, show it
                chatPopup.style.display = "block";
                chatPopup.classList.add("slide-in");
                chat_msg.classList.remove(
                    "bx-message-rounded-dots",
                    "bx-flashing-hover"
                );
                chat_msg.classList.add(
                    "bx-chevron-up",
                    "bx-flashing",
                    "bx-rotate-180"
                );

                getUserChat(to_id);


            } else {
                // If chat is visible, hide it with animation
                chatPopup.classList.remove("slide-in");
                chatPopup.classList.add("slide-out");

                chat_msg.classList.remove(
                    "bx-chevron-up",
                    "bx-flashing",
                    "bx-rotate-180"
                );
                chat_msg.classList.add(
                    "bx-message-rounded-dots",
                    "bx-flashing-hover"
                );

                // Set a timeout to remove the chat after the animation completes
                setTimeout(() => {
                    chatPopup.style.display = "none";
                    chatPopup.classList.remove("slide-out");
                }, 400); // Adjust the timeout to match the animation duration
            }

            chatVisible = !chatVisible;

        }

        //first time chat msg one time display
        oneDisplay = true;

        function getUserChat(to_id) {
            // console.log(to_id);

            data = {
                to_id: to_id
            }
            $.ajax({
                type: "POST",
                url: "<?= ROOT ?>/employer/chatbox",
                data: data,
                cache: false,
                success: function(res) {
                    try {

                        Jsondata = JSON.parse(res)
                        //console.log(Jsondata);
                        var imageUrl = "<?= ROOT ?>/assets/images/profileImages/" + Jsondata.empImage;
                        userImge.setAttribute("src", imageUrl);

                        // User is first time chat with Company then display msg
                        if ((Jsondata == null || Jsondata.chatMsgs == false)) {

                            document.getElementById("chat-body").textContent = ''

                            oneDisplay = false;
                            var p = document.createElement("p");

                            p.style.padding = "10px";
                            p.style.marginBottom = "10px";
                            p.style.borderRadius = "5px";
                            p.style.display = "inline-block";
                            p.style.fontSize = "13px";
                            p.style.lineHeight = "20px";
                            p.style.maxWidth = "70%";
                            p.innerHTML = "👋 Hi, message us with any questions. We're happy to help! 😀";

                            p.style.alignSelf = "flex-start";
                            p.style.flexDirection = "column";
                            p.style.background = "white";
                            p.style.color = "black";

                            document.getElementById("chat-body").appendChild(p);

                            //     console.log("data")

                        } else {

                            document.getElementById("chat-body").textContent = ''
                        }

                        // get that data using local variable when to use futures
                        chatBoxData = Jsondata

                        selectChatId = Jsondata.chat[0].chat_id
                        //console.log(selectChatId);
                        Jsondata.chatMsgs.forEach(element => {

                            loadMessage(element, Jsondata.log_user);
                        });
                        userID = Jsondata.log_user
                        // messages load time socket opend
                        socket.onopen = function(e) {
                            console.log('Connection established!');
                        };

                        // isOnlineUser();

                    } catch (error) {

                    }
                },
                error: function(xhr, status, error) {
                    // return xhr;
                }
            })
        }
        socket = new WebSocket('ws://localhost:8080?userId=${userID}');
        loadWithTime = 0;

        function loadMessage(chatMsg, userId) {
            console.log(chatMsg);
            console.log(userId);
            console.log(chatMsg.user_id);


            var dateTime = new Date(chatMsg.time);
            console.log(formatTime(dateTime));
            console.log(dateTime);
            var div = document.createElement("div");
            var p = document.createElement("p");


            p.style.padding = "10px";
            p.style.marginBottom = "10px";
            p.style.borderRadius = "5px";
            p.style.display = "inline-block";
            p.style.fontSize = "13px";
            p.style.lineHeight = "20px";
            p.style.maxWidth = "100%";
            p.innerHTML = chatMsg.msg + "<br>" + formatTime(dateTime);
            console.log(chatMsg.msg);
            div.style.color = "white";
            div.style.fontSize = "14px";

            if (loadWithTime != formatDate(dateTime)) {

                loadWithTime = formatDate(dateTime);

                div.innerHTML = loadWithTime;
                div.style.maxWidth = "100%";
                div.style.textAlign = "center";
            }

            // if (reciveTimedisplay && sendTimedisplay) {

            //     div.innerHTML = formatDate(dateTime);
            //     div.style.maxWidth = "100%";
            //     div.style.textAlign = "center";

            //     sendTimedisplay = false;
            // }

            if (userId === chatMsg.user_id) {

                p.style.background = "black";
                p.style.color = "white";
                p.style.alignSelf = "flex-end";
                // p.style.textAlign = "end";
                // p.style.marginLeft= "auto";
                // p.style.float = "right";

            } else {
                p.style.textAlign = "start";
                p.style.alignSelf = "flex-start";
                p.style.flexDirection = "column";
                p.style.background = "white";
                p.style.color = "black";

            }

            p.style.transition = "opacity 1s ease-in-out, transform 1s ease-in-out";

            document.getElementById("chat-body").appendChild(div);
            document.getElementById("chat-body").appendChild(p);

            // messages trantion
            // var delay = chatMsg.log_user ? 0 : 30000;

            // setTimeout(function() {
            //     p.style.opacity = "1";
            //     p.style.transform = "translateY(0)";
            // }, delay);

        }
        document.onkeyup = enter;

        function enter(e) {
            if (e.which == 13) emptycheck();
        }

        function emptycheck() {
            var text = document.getElementById("message-input").value;

            if (text == "") {
                return;
            } else {
                document.getElementById("message-input").value = "";
                send(text);
            }
        }


        function send(query) {
            //console.log(chatBoxData);

            var currentDate = new Date();

            socket.send(JSON.stringify({
                'chat_id': chatBoxData.chat[0].chat_id,
                'msg': query,
                'user_id': chatBoxData.log_user,
                'date': formatDate(currentDate),
                'time': formatTime(currentDate)
            }));

            sendMessage(query, formatDate(currentDate), formatTime(currentDate));
        }
        sendTimedisplay = true;

        function sendMessage(query, formattedDate, formattedTime) {

            var div = document.createElement("div");
            var p = document.createElement("p");
            p.style.background = "black";
            p.style.color = "white";
            p.style.padding = "10px";
            p.style.marginBottom = "10px";
            p.style.borderRadius = "5px";
            p.style.display = "inline-block";
            p.style.maxWidth = "70%";
            p.style.fontSize = "13px";
            p.style.lineHeight = "20px";
            p.innerHTML = query + "<br> <small> <em>" + formattedTime + "</em></small>";

            // p.style.float = "right";
            div.style.color = "white";
            div.style.fontSize = "14px";


            // if (reciveTimedisplay && sendTimedisplay) {

            //     div.innerHTML = formattedDate;
            //     div.style.maxWidth = "100%";
            //     div.style.textAlign = "center";

            //     sendTimedisplay = false;
            // }


            document.getElementById("chat-body").appendChild(div);
            document.getElementById("chat-body").appendChild(p);


            let data = {
                'msg': query,
                'chat_id': chatBoxData.chat[0].chat_id,
                'user_id': chatBoxData.log_user,
            };

            $.ajax({
                type: "POST",
                url: "<?= ROOT ?>/employer/saveMsg",
                data: data,
                cache: false,
                success: function(res) {
                    data = JSON.parse(res)
                },
                error: function(xhr, status, error) {
                    // return xhr;
                }
            });


        }

        reciveTimedisplay = true;

        function formatDate(currentDate) {
            //formatted date ("Jan 28, 2024")
            var formattedDate = currentDate.toLocaleDateString('en-US', {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
            return formattedDate;
        }

        function formatTime(currentDate) {
            //formatted time ("12:06:34 PM")
            var formattedTime = currentDate.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });
            return formattedTime;
        }
    </script>
</body>

</html>