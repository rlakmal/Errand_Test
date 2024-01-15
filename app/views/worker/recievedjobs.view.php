<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/recievdjob.css">
    <style>
        .popup-view {
            position: absolute;
            height: fit-content;
            width: 35%;
            background: #ffffff;
            margin-top: -3%;
            margin-bottom: 3%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 0 0 1px var(--blue), 0 0 0 4px var(--light-blue);
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

        .popup-view h2 {
            text-align: center;
            padding-top: 2%;
            padding-bottom: 4%;
            margin: 4px;
            font-weight: bold;
        }

        .popup-view h4 {
            text-align: left;
            padding-left: 10%;
            padding-bottom: 2%;
        }

        .popup-view input {
            position: relative;
            left: 9%;
            /* min-width: 500px; */
            width: 80%;
            background: #d5dfe7d5;
            border-radius: 20px;
            border-style: solid;
            border: #000;
            outline-width: 1px;
            padding: 10px 30px;
            margin-bottom: 2%;
            transition: all 0.3s ease;
            color: var(--dark);
            font-size: 17px;
        }

        .popup-report .btns,
        .popup-view .btns {
            position: relative;
            left: 40%;
            width: 50%;
            height: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .popup-report .close-btn,
        .popup-view .close-btn,
        .cancelR-btn {
            position: absolute;
            right: 1%;
            font-size: 16px;
            color: var(--red);
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 6px;
            color: white;
            border: none;
            background-color: orangered;

        }

        .popup-report .cancelR-btn,
        .cancelR-btn {
            right: 28%;
            color: white;
            background-color: orangered;
        }

        .overlay {
            position: fixed;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            pointer-events: none;
        }

        .overlay-active {
            opacity: 1;
            pointer-events: all;
            z-index: 100;
        }

        .bttns {
            position: relative;
            top: -12%;
            float: right;
            width: 33%;
            height: 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'jobnav.php' ?>
    <div class="set_margin">

        <?php
        // Check if there is data in @item
        if (isset($data['data']) && is_array($data['data']) && count($data['data']) > 0) {
            for ($i = 0; $i < count($data['data']); $i++) {
                $item = $data['data'][$i];
                $image = $images['images'][$i];
                // Fixed 3-day countdown
                $expirationDate = $item->time_remain + (3 * 24 * 60 * 60); // 3 days in seconds
                $timeRemaining = max(0, $expirationDate - time()); // Ensure the remaining time is non-negative
        ?>
                <?php
                if (!($item->status == 'Canceled')) {
                ?>
                    <div class="post-container2">
                        <div class="profile-container2">
                            <div class="picture">
                                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $image ?>" alt="placeholder">
                            </div>
                            <div class="index">
                                <div class="profile-name"><?php echo $item->emp_name ?></div>
                                <div class="profile-ratings"><?php echo $item->created ?></div>
                                <div class="profile-type"><?php echo $item->title ?></div>
                                <div class="budget"><?php echo $item->budget ?> /= per day</div>
                                <div class="location"><?php echo $item->city ?></div>
                                <div class="status"><?php echo remain_Time($timeRemaining, $item->status); ?></div>
                            </div>
                            <?php
                            // Display buttons only if time has not expired
                            if ($item->status == 'Pending') {
                            ?>
                                <div class="bttns">
                                    <button type="submit" id="editButton" data-order='<?= json_encode($item) ?>' onclick="openEdit(this)" class="request-profile-button">Request Budget</button>
                                    <form class="form" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                        <button type="submit" name="Accept" value="Accept" class="edit-profile-button">Accept</button>
                                        <button type="submit" name="Reject" value="Reject" class="view-profile-button">Reject</button>
                                    </form>


                                </div>
                            <?php
                            } else {
                            ?>
                                <a><button class="<?php if ($item->status == 'Accepted') {
                                                        echo "greenbutton";
                                                    } elseif ($item->status == 'Rejected' || $item->status == 'Expired') {
                                                        echo "redbutton";
                                                    } elseif ($item->status == 'Requested') {
                                                        echo "orangebutton";
                                                    }

                                                    ?>"><?php echo $item->status ?></button></a>
                            <?php
                            }
                            ?>
                        <?php
                    }
                        ?>
                        </div>
                    </div>
                    <!-- <script>
                        setInterval(function() {
                            checkJobStatus(<?php echo $item->id ?>);
                        }, 60000); // Repeat the check every 60 seconds
                    </script> -->

            <?php
            }
        }

        function remain_Time($seconds, $status)
        {
            if ($seconds >= 60 && $status == 'Pending') {
                $days = floor($seconds / (24 * 60 * 60));
                $hours = floor(($seconds % (24 * 60 * 60)) / (60 * 60));
                $minutes = floor(($seconds % (60 * 60)) / 60);
                return "Expire in $days days $hours hours $minutes minutes";
            } elseif ($status == 'Expired') {
                return "Expired";
            }
        }
            ?>
            <div class="popup-view">
                <form method="POST">
                    <h2>Enter Your Budget</h2>
                    <h4>Budget : </h4>
                    <input name="newbudget" type="text" value="" required placeholder="Enter your Budget" autocomplete="off">
                    <input name="emp_id" type="hidden" value="">
                    <input name="title" type="hidden" value="">
                    <input name="budget" type="hidden" value="">
                    <input name="id" type="hidden" value="">
                    <input name="city" type="hidden" value="">
                    <input name="description" type="hidden" value="">
                    <input name="worker_id" type="hidden" value="">
                    <input name="emp_name" type="hidden" value="">
                    <input name="created" type="hidden" value="">
                    <input name="worker_name" type="hidden" value="">
                    <input name="status" type="hidden" value="">
                    <div class="btns">
                        <button type="button" class="cancelR-btn" onclick="closeEdit()">Cancel</button>
                        <button name="ReqBudget" type="submit" value="Post" class="close-btn">Send</button>
                    </div>
                </form>
            </div>
            <div id="overlay" class="overlay"></div>

            <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
            <script>
                function checkJobStatus(id) {
                    // $.ajax({
                    //     url: 'your_endpoint_to_get_job_status.php?id=' + id,
                    //     method: 'GET',
                    //     dataType: 'json',
                    //     success: function(response) {
                    //         if (response.status === 'Expired') {
                    //             // Update the UI or take appropriate action
                    //             alert('Job has expired!');
                    //             // You can redirect or update the UI as needed
                    //             // window.location.reload();
                    //         }
                    //     }
                    // });
                }

                let popupEdit = document.querySelector(".popup-view");
                let overlay1 = document.getElementById("overlay");
                var editButton = document.getElementById("editButton");

                // editButton.addEventListener("click", openEdit);

                function openEdit(button) {
                    const itemData = button.getAttribute("data-order");
                    console.log(itemData);
                    const data = JSON.parse(itemData);
                    console.log(data);
                    dataBindtoForm(data);
                    popupEdit.classList.add("open-popup-view");
                    overlay1.classList.add("overlay-active");
                }

                function closeEdit() {
                    popupEdit.classList.remove("open-popup-view");
                    overlay1.classList.remove("overlay-active");
                }

                function dataBindtoForm(data) {
                    console.log(data);

                    document.querySelector('.popup-view input[name="emp_id"]').value = data.emp_id;
                    document.querySelector('.popup-view input[name="title"]').value = data.title;
                    document.querySelector('.popup-view input[name="budget"]').value = data.budget;
                    document.querySelector('.popup-view input[name="id"]').value = data.id;
                    document.querySelector('.popup-view input[name="city"]').value = data.city;
                    document.querySelector('.popup-view input[name="description"]').value = data.description;
                    document.querySelector('.popup-view input[name="worker_id"]').value = data.worker_id;
                    document.querySelector('.popup-view input[name="emp_name"]').value = data.emp_name;
                    document.querySelector('.popup-view input[name="created"]').value = data.created;
                    document.querySelector('.popup-view input[name="worker_name"]').value = data.worker_name;
                    document.querySelector('.popup-view input[name="status"]').value = data.status;
                }
            </script>
    </div>

</body>

</html>