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
            <table class="table">
                <thead>
                    <tr>
                        <th>No </th>
                        <th class="ordId">Job Title</th>
                        <th class="desc">Request To:</th>
                        <th class="stth">Budget</th>
                        <th class="cost">Location</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
                <?php
                $no = 0;
                if (is_array($data)) {
                    foreach ($data as $item) {
                        $no++;


                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $item->title ?></td>
                                <td><a href="<?= ROOT ?>/employer/workerprof?id=<?php echo $item->worker_id ?>"><?php echo $item->worker_name ?></a></td>
                                <td>RS <?php echo $item->budget ?>/=</td>
                                <td><?php echo $item->city ?></td>
                                <td><button><?php echo $item->status ?></button></td>
                                <td><button>Cancel</button></td>

                            </tr>

                            <!-- Add more rows with dummy data as needed -->
                        </tbody>
                        <!-- <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image  ?>" alt="">
                        </div>
                        <div class="index">
                            <div class="profile-name">My Post - <?php echo $item->title ?></div>
                            <div class="profile-ratings"><?php echo $item->created ?></div>
                            <div class="profile-type">Request To - </div>
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
            </table>
        </section>
    </diV>




</body>

</html>