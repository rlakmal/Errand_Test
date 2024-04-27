<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/chat.css">
    <title>Review Requests</title>
    <style>
        table {
            margin: 3%;
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

        .review_btn {
            background: #f16a2d;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            cursor: pointer;
            width: 70%;

        }

        .after_reiew {
            background: #ff4646;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            width: 70%;

        }

        .review_btn:hover {
            background: #2a3441;
        }



        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #review_modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .rating-modal-content {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            margin: 12% 0% 0% 40%;

        }

        .rating-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .modal-title {
            margin: 0;
            font-size: 18px;
        }

        .close {
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        /* Your existing styles for stars, form elements, and button */
        .submit_star {
            font-size: 24px;
            color: #ffd700;
            cursor: pointer;
        }

        .rating-form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #164271;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            width: 70%;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;

        }

        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }

        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }

        .text-warning {
            color: #ffc107;

        }

        .star-light {
            color: #e9ecef;
        }

        .progress {
            height: 20px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0;
            background-color: #ffc107;
            /* Set your desired progress bar color */
            text-align: center;
            line-height: 20px;
            color: #000;
            /* Set your desired text color */
            font-weight: bold;
            transition: width 0.3s ease-in-out;
        }

        .row {
            display: flex;
            width: 100%;
        }

        .review_percent {
            display: flex;
            flex-direction: column;
            margin: 20px;
        }

        .review-bar {
            display: flex;
            flex-direction: column;
            width: 35%;
            margin: 33px;

        }

        .one-bar {
            margin: 2%;
        }

        .scrollable-table {
            overflow: auto;
            max-height: 700px;
        }
    </style>
</head>

<body>
    <?php include 'employernav2.php' ?>
    <?php include 'myjobsidebar.php' ?>
    <section id="main" class="main">
        <h2>Review your Jobs</h2>
        <div class="scrollable-table">
            <table class="my_table">
                <thead>
                    <tr class="t_head">
                        <th>No</th>
                        <th class="th_one">Worker Name</th>
                        <th>JOb Title</th>
                        <th>Work Budget</th>
                        <th>Status</th>
                        <th>chat</th>
                    </tr>
                </thead>

                <?php
                $no = 0;
                if (is_array($data)) {
                    foreach ($data as $item) {
                        $no++;
                        //show($item);
                ?>


                        <tbody>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $item->worker_name ?></td>
                                <td><?php echo $item->title ?></td>
                                <td>Rs <?php echo $item->budget ?>.00</td>
                                <?php if ($item->review_status == "Mark As Completed") {
                                ?>
                                    <td><button onclick="markAsCompleted(<?php echo $item->id ?>,<?php echo $item->job_id ?>)" class="<?php if ($item->review_status == "Mark As Completed") {
                                                                                                                                            echo "review_btn";
                                                                                                                                        }
                                                                                                                                        ?>"><?php echo $item->review_status ?></button></td>
                                    <td> <button class="chat-btn" id="toggle-chat-btn" onclick="toggleChat('<?php echo $item->worker_id ?>')">
                                            <i class="bx bx-message-rounded-dots bx-flashing-hover chat-icon" id="chat-msg"></i>
                                        </button></td>
                                <?php
                                } else if ($item->review_status == "Completed") {
                                ?>
                                    <td><button type="button" name="add_review" id="add_review" class="btn-primary" onclick="openModal(<?php echo $item->worker_id ?>, <?php echo $item->id ?>)">Review</button>

                                    <?php
                                } else {
                                    ?>
                                    <td><button class="after_reiew"><?php echo $item->review_status ?></button></td>


                                <?php
                                }
                                ?>
                            </tr>


                        </tbody>



                <?php
                    }
                }

                ?>
            </table>

            <div id="review_modal">
                <div class="rating-modal-content">
                    <div class="rating-modal-header">
                        <h5 class="modal-title">Submit Review</h5>
                        <span class="close" onclick="closeModal()">&times;</span>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center mt-2 mb-4">
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                        </h4>
                        <div class="rating-form-group">
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                        </div>
                        <div class="rating-form-group">
                            <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                        </div>
                        <div class=" text-center mt-4">
                            <button type="button" class="btn-primary" id="save_review">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="chat-popup" id="chat-popup">
        <div class="chat-container">
            <div class="chat-header">
                <span class="close-btn" onclick="toggleChat()">×</span>

                <!-- 👋 Hi, message us with any questions. We're happy to help! -->

                <div class="main-content">
                    <img class="userImg" src="<?= ROOT ?>/assets/images/worker/profileImages/profile.jpg" alt="" />
                    <div class="user">
                        <p id="header-user"><?php echo $item->worker_name ?></p>
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
    <script src="<?= ROOT ?>/assets/js/jquery-3.7.1.min.js"></script>
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

        // first time chat msg one time display
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
                        console.log(Jsondata);
                        // Add employee image
                        var imageUrl = "<?= ROOT ?>/assets/images/worker/profileImages/" + Jsondata.empImage;
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
                            p.innerHTML = "👋 Hi,😀";

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

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->

    <script>
        function markAsCompleted(id, job_id) {

            var confirmAction = confirm("Are you sure you want to mark this job as completed?");
            console.log(id);
            console.log(job_id);
            if (confirmAction) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        alert(xhttp.responseText);
                        location.reload();
                    }
                };
                xhttp.open("GET", "<?= ROOT ?>/employer/markascompleted?id=" + id + "&job_id=" + job_id, true);
                xhttp.send();
            }



        }
    </script>

    <script>
        function openModal(worker_id, id) {
            document.getElementById('review_modal').style.display = 'block';
            $('#save_review').data('worker_id', worker_id);
            $('#save_review').data('id', id);
        }

        function closeModal() {
            document.getElementById('review_modal').style.display = 'none';
        }

        var rating_data = 0;

        $(document).on('mouseenter', '.submit_star', function() {
            var rating = $(this).data('rating');
            console.log(rating);

            reset_background();

            for (var count = 1; count <= rating; count++) {
                $('#submit_star_' + count).removeClass('star-light').addClass('text-warning');
            }
        });

        // when mouse leave remove colors
        $(document).on('mouseleave', '.submit_star', function() {
            reset_background();
            for (var count = 1; count <= rating_data; count++) {
                $('#submit_star_' + count).removeClass('star-light').addClass('text-warning');
            }
        });

        // click on the star then store the rating
        $(document).on('click', '.submit_star', function() {
            rating_data = $(this).data('rating');
            console.log(rating_data);
        });

        // function to reset background
        function reset_background() {
            for (var count = 1; count <= 5; count++) {
                $('#submit_star_' + count).addClass('star-light').removeClass('text-warning');
            }
        }

        $('#save_review').click(function() {
            var worker_id = $(this).data('worker_id');
            var id = $(this).data('id');
            var user_name = $('#user_name').val();
            var user_review = $('#user_review').val();
            console.log(user_name);
            console.log(user_review);
            console.log(worker_id);

            if (user_name == '' || user_review == '') {
                alert("Please Fill Both Fields");
                return false;
            } else {
                $.ajax({
                    url: "<?= ROOT ?>/employer/ratingsreviews",
                    method: "POST",
                    data: {
                        worker_id: worker_id,
                        id: id,
                        rating_data: rating_data,
                        user_name: user_name,
                        user_review: user_review
                    },
                    success: function(data) {
                        closeModal();
                        console.log(data);
                        alert(data);
                    }
                });
            }
        });
    </script>
</body>

</html>