<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myworkerrequest.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/view_reqpopup.css">
    <title>Document</title>
    <style>

    </style>
</head>

<body>

<?php include 'employernav2.php' ?>
<?php include 'myjobsidebar.php' ?>
<diV class="set_margin">
    <section id="main" class="main">
        <h2>Your Request to Workers</h2>
        <div class="scrollable-table">
            <table class="table">
                <thead>
                <tr>
                    <th>No </th>

                    <th class="desc">Request To:</th>
                    <th class="ordId">Job Title</th>
                    <th class="stth">Budget</th>
                    <th class="cost">Location</th>
                    <th>Status</th>
                    <th class="thcancel">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
               
                        if (is_array($data)) {
                            foreach ($data as $item) {
                                //show($item);
                                $no++;
                        ?>
                                <tr>
                                    <td class="proimage"><?php echo $no ?></td>

                                    <td class="proimage">
                                        <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image ?>" alt="profile image">
                                        <!-- </td>
                                        <td class="proname"> -->
                                        <a class="wkname" href="<?= ROOT ?>/employer/workerprof?id=<?php echo $item->worker_id ?>"><?php echo $item->worker_name ?></a>
                                    </td>
                                    <td><?php echo $item->title ?></td>
                                    <td>RS <?php echo $item->budget ?>/=</td>
                                    <td><?php echo $item->city ?></td>
                                    <td><button class="<?php if ($item->status == "Pending" || $item->status == "Accepted") {
                                                            echo "pendingbutton";
                                                        } elseif ($item->status == "Rejected" || $item->status == "Requested") {
                                                            echo "rejectedbutton";
                                                        } else {
                                                            echo "expirebutton";
                                                        }

                                                        ?>"><?php echo $item->status ?></button></td>
                                    <?php
                                    if ($item->status == 'Pending') {
                                    ?>
                                        <form method="POST">
                                            <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                            <td class="thcancel"><button type="submit" name="Cancel" value="Cancel" class="cancelbutton">Cancel Request</button></td>
                                        </form>

                                    <?php
                                    } elseif ($item->status == 'Requested') {
                                    ?>
                                        <!-- <form method="POST"> -->
                                        <input type="hidden" name="id <?php echo $item->id ?>" value="<?php echo $item->id ?>">
                                        <td class="thcancel">
                                            <button id="viewRequestbtn_<?php echo $item->id ?>" name="viewRequest" value="viewRequest" onclick="openEdit( <?= $item->id ?> )" class="viewbutton">View Request</button>
                                        </td>
                                        <!-- </form> -->
                                    <?php
                                    } else {
                                    ?>
                                        <td class="thcancel"></td>
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

            </div>

        </section>

    </div>
    <div class="pop-view">
        <form id="pop-form" method="POST">
            <div id="pop-header">Worker want to negotiate your budget</div>
            <h4 id="newBudgetLabel">New Budget: </h4>
            <div class="pop-btn">
                <form method="POST">
                    <input type="hidden" name="id" id="pop-hidden-id" value="">
                    <input type="hidden" name="newbudget" id="pop-hidden-budget" value="">
                    <input type="hidden" name="emp_id" value="<?php echo $item->emp_id ?>">
                    <input type="hidden" name="worker_id" value="<?php echo $item->worker_id ?>">
                    <input type="hidden" name="title" value="<?php echo $item->title ?>">
                    <input type="hidden" name="worker_name" value="<?php echo $item->worker_name ?>">
                    <button name="pop-accept-btn" class="pop-accept">Accept Offer</button>
                    <button name="pop-reject-btn" class="pop-reject">Reject</button>
                </form>

            </div>
        </form>

    </div>
    <div id="pop-overlay" class="pop-overlay"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        let popupEdit = document.querySelector(".pop-view");
        let overlay1 = document.getElementById("pop-overlay");
        current_id = 0;

        function openEdit(id) {
            current_id = id;
            popupEdit.classList.add("open-pop-view");
            overlay1.classList.add("pop-overlay-active");
        }

        function closeEdit() {
            popupEdit.classList.remove("open-pop-view");
            overlay1.classList.remove("pop-overlay-active");
        }




        document.addEventListener("DOMContentLoaded", () => {
            $(document).ready(function() {
                $("[id^='viewRequestbtn_']").click(function(event) {
                    event.preventDefault();
                    // Extract the id from the button's id attribute
                    let current_id = this.id.split("_")[1];
                    data = {
                        id: current_id
                }
                console.log(data);

                $.ajax({
                    type: "POST",
                    url: "<?= ROOT ?>/employer/view_request",
                    data: data,
                    cache: false,
                    success: function(res) {
                        //console.log("Response:", res);
                        newData = JSON.parse(res);
                        console.log(newData);
                        $("#newBudgetLabel").text("New Budget: " + "Rs " + newData.newbudget + " Per Day");
                        $("#pop-hidden-id").val(newData.id);
                        $("#pop-hidden-budget").val(newData.newbudget);
                        try {} catch (error) {

                        }
                    },
                    error: function(xhr, status, error) {
                        // return xhr;
                    }
                })

            })

        })

    })
</script>

</body>



</html>