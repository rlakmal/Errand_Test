<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=helo, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/postedjobrequest.css">
    <title>Document</title>
</head>

<body>
    <?php include 'employernav2.php' ?>
    <?php include 'myjobsidebar.php' ?>
    <div class="set-margin" id="set-marginid">
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {

        ?>
                <div class="post-container">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
                        </div>
                        <div class="index">
                            <div class="profile-name">POST Title - <?php echo $item->title ?></div>
                            <div class="profile-ratings"><?php echo $item->created ?></div>
                            <div class="profile-type">WORKER- <?php echo $item->worker_name ?></div>
                            <div class="budget">WORKER's NOTE - <?php echo $item->newbudget ?></div>
                            <div class="location">Kadawatha</div>



                        </div>
                        <div class="index-right">

                            <a></a><button class="view-profile-button">Accept</button></a>
                            <a></a><button class="edit-profile-button">Reject</button></a>
                            <a href="<?= ROOT ?>/employer/workerprof"><button class="worker-profile-button">Worker Profile</button></a>
                        </div>
                    </div>
                </div>


        <?php
            }
        }
        ?>
    </div>

</body>

</html>