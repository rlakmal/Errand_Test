<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myworkerrequest.css">
    <title>Document</title>
    <style>
        .sidebar {
            margin-top: -12px;
        }
    </style>
</head>

<body>
<?php include 'employernav.php' ?>
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
                    <th class="thcancel"></th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no = 0;
                if (is_array($data)) {
                    foreach ($data as $item) {
                        // show($item);
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
                            <td><button class="<?php if ($item->status == "Pending") {
                                    echo "pendingbutton";
                                } elseif ($item->status == "Rejected") {
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
                            } else {
                                ?>
                                <td class="thcancel"></td>
                                <?php
                            }
                            ?>

                        </tr>

                        <!-- Add more rows with dummy data as needed -->

                        <!-- <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image  ?>" alt="">
                        </div>
                        <div class="index">
                            <div class="profile-name">My Post - <?php echo $item->title ?></div>
                            <div class="profile-ratings"><?php echo $item->created ?></div>
                            <div class="profile-type">Request To - <?php echo $item->worker_name ?></div>

                            <div class="budget">Budget - <?php echo $item->budget ?> /= per day</div>
                            <div class="location"><?php echo $item->city ?></div>

                        </div>
                        <a><button class="view-profile-button">Pending</button></a>
                        <a><button class="worker-profile-button">Cancel</button></a>

                    </div>
                </div> -->

                        <?php
                    }
                }


                ?>
                </tbody>
            </table>
        </div>
    </section>
</diV>




</body>

</html>