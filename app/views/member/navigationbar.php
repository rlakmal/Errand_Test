    <!-- Navigation Bar -->
<!--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->

    <style>
        .logo-admin{
            width: 20%;
            font-size: 30px;
            margin-left: 5%;
        }

        .logo-admin img{
            display: flex;
            position: relative;
            height: 60px;
            cursor: pointer;
        }

        .nav-link2{
            margin-right: 35px;
            font-size: 20px;
            color: #191919;
            position: relative;
        }
        nav .nav-link2 .icon {
            font-size: 25px;
            color: #ffffff;
            margin-right: 0px;
            align-self: center;
        }
        .home-section {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            /*padding: 15px;*/
            background: #f16a2d;
            /*position: fixed;*/
            top: 0;
            left: 0;
            width: 100%;
            transition: all 0.5s ease;
        }
        /*.home-section .nav-icons {*/
        /*    margin-left: auto;*/
        /*}*/

        .sidebar.expanded ~ nav {
            left: 172px;
            width: calc(100% - 172px);
        }

        nav .pro_img{
            height: 50px;
            border-radius: 50%;
            width: 50px;
        }


    </style>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/chat.css">

    <section class="home-section" id="navbar" >
        <nav style="background: #f16a2d;  display: flex; height: fit-content;padding: 15px; margin-left: auto" >
            <div class ="logo-admin"><a href="<?= ROOT ?>/member/home"><img src="<?=ROOT?>/assets/images/logoe3.png"></a></div>
            <div style="position: relative; right: -65%">
                <img class="pro_img" style="" src="<?= ROOT ?>/assets/images/member/profileImages/<?php echo $_SESSION["USER"]->profile_image  ?>">
            </div>
            <div   class="nav-icons" style="right: -67%; display: flex; position: relative; justify-content: center ;align-content: center; align-items: center">



                <button style="background: #f16a2d; border: none" class="nav-link2" onclick="toggleChat('7')">
                    <i class='bx bxs-chat icon'></i>
<!--                    <span class="chat-notification">8</span>-->
                </button>

                <a href="<?=ROOT?>/member/account" class="nav-link2" >
                    <i class='bx bxs-user icon'></i>
                    <!--                    <span class="bell-notification">5</span>-->
                </a>

                <!-- <a href="#" class="nav-link-profile">
          <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
        </a> -->
            </div>
        </nav>
    </section>

    <div class="chat-popup" id="chat-popup">
        <div class="chat-container">
            <div class="chat-header">
                <span class="close-btn" onclick="toggleChat()">×</span>

                <!-- 👋 Hi, message us with any questions. We're happy to help! -->

                <div class="main-content">
<!--                    <img class="userImg" src="--><?php //= ROOT ?><!--/assets/images/profileImages/prof.png" alt="" />-->
                    <div class="user">
                        <p id="header-user">Admin User</p>
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
            const chatPopup = document.getElementById("chat-popup");
            const toggleChatBtn = document.getElementById("toggle-chat-btn");
            // const chat_msg = document.getElementById("chat-msg");

            if (!chatVisible) {

                // If chat is not visible, show it
                chatPopup.style.display = "block";
                chatPopup.classList.add("slide-in");
                // chat_msg.classList.remove(
                //     "bx-message-rounded-dots",
                //     "bx-flashing-hover"
                // );
                // chat_msg.classList.add(
                //     "bx-chevron-up",
                //     "bx-flashing",
                //     "bx-rotate-180"
                // );

                getUserChat(to_id);


            } else {
                // If chat is visible, hide it with animation
                chatPopup.classList.remove("slide-in");
                chatPopup.classList.add("slide-out");

                // chat_msg.classList.remove(
                //     "bx-chevron-up",
                //     "bx-flashing",
                //     "bx-rotate-180"
                // );
                // chat_msg.classList.add(
                //     "bx-message-rounded-dots",
                //     "bx-flashing-hover"
                // );

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

            data = {
                to_id: to_id
            }
            $.ajax({
                type: "POST",
                url: "<?= ROOT ?>/admin/crewchatbox",
                data: data,
                cache: false,
                success: function(res) {
                    try {
                        console.log(res);

                        Jsondata = JSON.parse(res)
                        //console.log(Jsondata);
                        //var imageUrl = "<?php //= ROOT ?>///assets/images/profileImages/" + Jsondata.empImage;
                        //userImge.setAttribute("src", imageUrl);

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
        console.log(userID)
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
                url: "<?= ROOT ?>/admin/crewsaveMsg",
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

