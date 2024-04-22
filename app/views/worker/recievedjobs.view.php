<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/recievdjob.css">

</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workersidebar.php' ?>
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

                                <div class="status"><?php echo remain_Time($timeRemaining, $item->status); ?></div>
                            </div>
                            <div class="bottom-index">
                                <div class="location">
                                    <div class="location"><?php echo $item->city ?><i class="bx bxs-map icon"></i></div>
                                </div>
                                <div class="buton_bar">
                                    <?php
                                    // Display buttons only if time has not expired
                                    if ($item->status == 'Pending') {
                                    ?>
                                        <div class="bttns">
                                            <button type="submit" id="editButton" data-order='<?= json_encode($item) ?>' onclick="openEdit(this)" class="request-profile-button">Request Budget</button>
                                            <form class="form" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                                <input type="hidden" name="emp_id" value="<?php echo $item->emp_id ?>">
                                                <input type="hidden" name="worker_id" value="<?php echo $item->worker_id ?>">
                                                <input type="hidden" name="title" value="<?php echo $item->title ?>">
                                                <input type="hidden" name="worker_name" value="<?php echo $item->worker_name ?>">
                                                <input type="hidden" name="budget" value="<?php echo $item->budget ?>">
                                                <button type="submit" name="Accept" value="Accept" class="edit-profile-button" onclick="return confirm('Are you sure you want to accept this?');">Accept</button>
                                                <button type="submit" name="Reject" value="Reject" class="view-profile-button" onclick="return confirm('Are you sure you want to reject this?');">Reject</button>
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
                                </div>
                            </div>
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