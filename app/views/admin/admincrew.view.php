<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/chat.css">

    <style>
        body{
            overflow-y: hidden;
        }
        .table-container{
            overflow-y: scroll;
            height: 800px;
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
<section id="main" class="main" style="margin-top: 15px">

    <h2 style="background: white">Crew Members details</h2>

    <form style="background: white">
        <div class="form" >
            <input id="searchInput" class="form-group" type="text" placeholder="Search...">
            <i class='bx bx-search icon'></i>
            <input class="btn" type="button" onclick="openReport()" value="New Registration">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        </div>

    </form>

    <div class="table-container">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th class="ordId">Member ID</th>
                <th class="stth">Name</th>
                <th class="desc">Username</th>
                <th></th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            <?php
            if (is_array($data)) {
                $i = 1;
                foreach ($data as $item) {

                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                            <div style="position: relative">
                                <img style="height: 50px; border-radius: 50%" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image ?>">
                            </div>
                        </td>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td><?php echo $item->email; ?></td>
<?php //var_dump($item)?>
                        <td> <button class="chat-btn" id="toggle-chat-btn" onclick="toggleChat('<?php echo $item->emp_id ?>')">
                                <i class="bx bx-message-rounded-dots bx-flashing-hover chat-icon" id="chat-msg"></i>
                            </button>
                        </td>


                        <td class="edit-icon"><a type="hidden" data-order=<?= json_encode($item); ?> onclick="openView(this)">
                                <i class="bx bxs-edit-alt"></i>
                                <span class="link_name"></span>
                            </a></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                <button name="active" value="valid" class="
                                <?php if ($item->active) {
                                    echo "is_active_btn";
                                } else {
                                    echo "is_deactive_btn";
                                } ?>">
                                    <?php if ($item->active) {
                                        echo "Delete";
                                    } else {
                                        echo "Delete";
                                    } ?>
                                </button>
                            </form>

                        </td>

                    </tr>

                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>

</section>


<!-- add members -->
<div class="popup-report">
    <h2>New Crew Member Registration</h2>
    <h4> name : </h4>
    <form method="POST">

        <input name="name" type="text" placeholder="Enter Member name">
        <h4>Email : </h4>
        <input name="email" type="text" placeholder="Enter Member email">
        <h4>Password : </h4>
        <input name="password" type="text" placeholder="Enter Member password">
        <div class="btns">
            <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
            <button type="submit" name="memberRegister" value="Submit" class="close-btn" onclick="closeReport()">Submit</button>
        </div>
    </form>
</div>

<!-- update members -->
<div class="popup-view">
    <h2>Update Crew Member</h2>
    <form method="POST">

        <h4> name : </h4>
        <input name="name" type="text" placeholder="Enter Member name">
        <h4>Email : </h4>
        <input name="email" type="text" placeholder="Enter Member email">
        <h4>Password : </h4>
        <input name="password" type="text" placeholder="Enter Member email">
        <input type="hidden" name="id">
        <div class="btns">
            <button type="button" class="cancelR-btn" onclick="closeView()">Cancel</button>
            <button type="submit" name="member" value="Update" class="close-btn" onclick="closeView()">Update</button>
        </div>

    </form>
</div>



<div id="overlay" class="overlay"></div>


<div class="chat-popup" id="chat-popup">
    <div class="chat-container">
        <div class="chat-header">
            <span class="close-btn" onclick="toggleChat()">×</span>

            <!-- 👋 Hi, message us with any questions. We're happy to help! -->

            <div class="main-content">
                <img class="userImg" src="<?= ROOT ?>/assets/images/profileImages/prof.png" alt="" />
                <div class="user">
                    <p id="header-user"><?php echo $item->name ?></p>
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

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<!-- <script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script> -->
<script src="<?= ROOT ?>/assets/js/admin/crewMembers.js"></script>


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
            url: "<?= ROOT ?>/admin/crewchatbox",
            data: data,
            cache: false,
            success: function(res) {
                try {

                    Jsondata = JSON.parse(res)
                    console.log(Jsondata);
                    // Add employee image
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


<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.getElementById('tableBody').getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
            var nameColumn = rows[i].getElementsByTagName('td')[2]; // Assuming name is in the third column
            var idColumn = rows[i].getElementsByTagName('td')[1]; // Assuming id is in the second column
            if (nameColumn.innerText.toLowerCase().includes(searchValue) || idColumn.innerText.includes(searchValue)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>

</body>

</html>
