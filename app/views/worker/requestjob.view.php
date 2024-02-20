<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/requestjob.css">
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workerfilter.php' ?>

    <?php
    if ($data) {
        foreach ($data as $item) {
            //show($data);
    ?>

            <div class="main-container4">
                <div class="profile-container3">
                    <div class="container-left">

                        <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="">
                        <h3 class="category">
                            Category
                        </h3>
                        <h3 class="emp-name">
                            <?php echo $item->name  ?>
                        </h3>

                        <img class="rates" src="<?= ROOT ?>/assets/images/worker/rates.png" alt="">

                    </div>

                    <div class="container-right">
                        <div type="text" name="fullname" value="" class="title-line" readonly><?php echo $item->title  ?></div>
                        <h3>
                            Location
                        </h3>
                        <div type="text" name="city" value="" class="edit-gen" readonly><?php echo $item->city ?></div>
                        <h3>
                            Address
                        </h3>
                        <div type="text" name="address" value="" class="edit-gen" readonly><?php echo $item->address ?></div>
                        <h3>
                            Budget
                        </h3>
                        <div type="text" name="budget" value='' class="edit-gen" readonly>Rs <?php echo $item->budget ?> Per Day</div>
                        <h3>
                            Description
                        </h3>
                        <div type="text" name="description" value='' class="edit-gen" readonly><?php echo $item->description ?></div>
                        <h3>
                            Request Other Budget
                        </h3>
                        <form method="POST">
                            <input name="newbudget" type="text" name="bargain" value='' class="edit-gen">
                            <input type="hidden" name="id" value="<?php echo $item->id ?>">



                            <div class="job_images">
                                <img class="jobimage" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image  ?>" alt="">
                                <img class="jobimage1" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image1  ?>" alt="">
                            </div>

                    </div>
                </div>
                <div class="index_bottom">
                    <button type="submit" name="Rquest" value="Request" class="close-button">Request</button>
                    </form>
                    <a href="<?= ROOT ?>/worker/home"><button class="close-button">Back</button></a>
                </div>
            </div>

    <?php

        }
    }

    ?>


</body>

</html>