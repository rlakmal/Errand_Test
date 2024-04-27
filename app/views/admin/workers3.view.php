<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registered Workers</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/chat.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: hidden; /* Make the body scrollable */
        }

        .main {
            padding: 20px;
            width: calc(100% - 260px); /* Adjust based on your sidebar width */
            overflow-x: scroll;
        }

        .form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background: #f4f4f4;
        }

        .form-group {
            padding: 10px;
            margin-right: 10px;
            border-radius: 20px; /* Making borders round */
            border: 1px solid #ccc;
            background-color: #fff; /* Adding background color */
        }

        .icon {
            font-size: 24px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border-right: 1px #ddd;
            padding: 8px;
            text-align: left;
            background: white;
            height: fit-content;
        }

        .table tr{
            height: 70px;

        }
        .table th {
            background-color: #f4f4f4;
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
</head>

<body>
<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- Navigation bar -->
<?php include 'navigationbar.php' ?>
<!-- Scripts -->
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<!-- content  -->
<section id="main" class="main">
    <h2 style="background: #f4f4f4; font-family: 'Arial', sans-serif">Registered Workers</h2>
    <form style="background: #f4f4f4">
        <div class="form">
            <!-- Category Selector -->
            <select class="form-group" name="category">
                <option value="all">All Categories</option>
                <option value="Technicians">Technicians</option>
                <option value="AC Repairs">AC Repairs</option>
                <option value="CCTV">CCTV</option>
                <option value="Constructions">Constructions</option>
                <option value="Electricians">Electricians</option>
                <option value="Electronic Repairs">Electronic Repairs</option>
                <option value="Glass & Aluminium">Glass & Aluminium</option>
                <option value="Iron Works">Iron Works</option>
                <option value="Masonry">Masonry</option>
                <option value="Odd Jobs">Odd Jobs</option>
                <option value="Pest Controllers">Pest Controllers</option>
                <option value="Plumbing">Plumbing</option>
                <option value="Wood Works">Wood Works</option>
                <!-- Add more categories as needed -->
            </select>
            <!-- Search bar -->
            <input id="searchInput2" class="form-group" type="text" placeholder="Search Location...">
            <input id="searchInput3" class="form-group" type="text" placeholder="Search Worker ID">
            <input style="margin-right: 10%" id="searchInput" class="form-group" type="text" placeholder="Search by Name or ID">
        </div>
    </form>
    <div style="overflow-y: scroll; height: 700px">

        <table class="table" >
            <thead>
            <tr>
                <th class="ordId"></th>
                <th class="ordId">ID</th>
                <th class="ordId">Worker ID</th>
                <th class="ordId"></th>
                <th class="ordId">Worker Name</th>
                <th class="desc">Category</th>
                <th class="stth">Username</th>
                <th class="stth">Location</th>
                <th class="cost">Verified</th>
<!--                <th class="cost">message</th>-->
                <th class="verified">Profile</th>
            </tr>
            </thead>

            <tbody >
            <?php $index = 0;
            foreach ($data as $worker) : $index = $index + 1?>
                <tr>
                    <td><?= $index ?></td>
                    <td><?= $worker->emp_id ?></td>
                    <td><?= $worker->work_id ?></td>
                    <td>
                        <div style="position: relative">
<!--                            --><?php //var_dump($worker)?>
                            <img style="height: 50px; border-radius: 50%; width: 50px" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $worker->profile_image ?>">
                        </div>
                    </td>
                    <td><a href="#" class="worker-link"><?= $worker->name ?></a></td>
                    <td><?= $worker->category ?></td>
                    <td><?= $worker->email ?></td>
                    <td><?= $worker->city ?></td>
                    <td class="verified-widget">
                        <?php if ($worker->verified) : ?>
                            <i class="bx bx-check-circle verified-icon"></i>
                            <span>Verified</span>
                        <?php else : ?>
                            <i class="bx bx-x-circle not-verified-icon"></i>
                            <span>Not Verified</span>
                        <?php endif; ?>
                    </td>
                    <td class="edit-view-profile"><a href="<?= ROOT ?>/admin/workerprof&id=<?= $worker->work_id ?>">
                            <span class="link_name"><i class="fas fa-user icon"></i></span>
                        </a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
                    <p id="header-user"><?php echo $worker->name ?></p>
                    <div class="user-status hide">
                        <div class="status" id="status-c" style="background: rgb(0, 238, 0)"></div>
                        <p id="typing" class="user-online">Online</p>
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



<!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>-->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get select element
        let categorySelect = document.querySelector('select[name="category"]');
        let tableRows = document.querySelectorAll('.table tbody tr');

        // Add event listener to category select
        categorySelect.addEventListener('change', function() {
            let selectedCategory = categorySelect.value;

            // Loop through all table rows
            tableRows.forEach(function(row) {
                let categoryCell = row.querySelector('td:nth-child(6)').textContent; // Adjusted index for category cell

                // Check if selected category is "All Categories" or matches row's category
                if (selectedCategory === 'all' || categoryCell === selectedCategory) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Get input elements
        let searchInput = document.getElementById('searchInput');
        let searchInput2 = document.getElementById('searchInput2');
        let searchInput3 = document.getElementById('searchInput3');

        // Add event listener for searchInput
        searchInput.addEventListener('input', function() {
            let searchText = searchInput.value.trim(); // Trimmed whitespace
            let isNumeric = /^\d+$/.test(searchText); // Check if input is numeric

            // Loop through all table rows
            tableRows.forEach(function(row) {
                let id = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Adjusted index for ID cell
                let name = row.querySelector('td:nth-child(5)').textContent.toLowerCase(); // Adjusted index for name cell

                // Check if input is numeric
                if (isNumeric) {
                    // Check if search text matches ID
                    if (id.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                } else {
                    // Check if search text matches name
                    if (name.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });

        searchInput3.addEventListener('input', function() {
            let searchText3 = searchInput3.value.trim(); // Trimmed whitespace

            // Loop through all table rows
            tableRows.forEach(function(row) {
                let work_id = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // Adjusted index for ID cell

                // Check if input is numeric
                    // Check if search text matches ID
                    if (work_id.includes(searchText3)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }

            });
        });

        // Add event listener for searchInput2
        searchInput2.addEventListener('input', function() {
            let searchText2 = searchInput2.value.trim().toLowerCase(); // Trimmed whitespace

            // Loop through all table rows
            tableRows.forEach(function(row) {
                let location = row.querySelector('td:nth-child(8)').textContent.toLowerCase(); // Adjusted index for location cell

                // Check if search text matches location
                if (location.includes(searchText2)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

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
            url: "<?= ROOT ?>/admin/workchatbox",
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
                    console.log(userID)
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
            url: "<?= ROOT ?>/admin/worksaveMsg",
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
