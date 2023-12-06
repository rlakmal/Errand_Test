<!DOCTYPE html>
<html>

<head>
  <title>Painter Profile</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">
</head>

<body>
  <?php include 'workernav.php' ?>
  <?php include 'workerfilter.php' ?>
  <style>
    .main-container4 {
      margin-left: 450px;
      min-width: 900px;
      max-width: 500px;
      margin-top: 120px;
      margin-bottom: 10px;

    }

    .profile-container3 {
      background-color: #ffffff;
      width: auto;
      box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      height: 500px;
      position: absolute;
      border-radius: 20px;
    }

    .index {
      margin-top: -290px;
    }

    .index div {
      font-size: 16px;
    }

    .emp-name {
      padding-left: 100px;
    }
  </style>

  <?php
  if ($data) {
    foreach ($data as $item) {
  ?>

      <div class="main-container4">
        <div class="profile-container3">

          <div class="picture">
            <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="">
          </div>
          <h3 class="emp-name">
            <?php echo $item->name  ?>
          </h3>
          <div class="picture">
            <img class="rates" src="<?= ROOT ?>/assets/images/worker/rates.png" alt="">
          </div>

          <div class="index">

            <h3>
              JOb Title
            </h3>

            <div type="text" name="fullname" value="" class="edit-gen" readonly><?php echo $item->title  ?></div>
            <h3>
              City
            </h3>
            <div type="text" name="city" value="" class="edit-gen" readonly><?php echo $item->city ?></div>
            <h3>
              Address
            </h3>
            <div type="text" name="address" value="" class="edit-gen" readonly><?php echo $item->address ?></div>
            <h3>
              Budget
            </h3>
            <div type="text" name="birthday" value='' class="edit-gen" readonly>Rs <?php echo $item->budget ?> Per Day</div>
            <h3>
              Description
            </h3>
            <div type="text" name="birthday" value='' class="edit-gen" readonly><?php echo $item->description ?></div>
            <h3>
              Request Budget
            </h3>
            <input type="text" name="birthday" value='' class="edit-gen">

          </div>
          <a href="<?= ROOT ?>/worker/home"><button class="close-button">Request</button></a>
          <a href="<?= ROOT ?>/worker/home"><button class="close-button">Back</button></a>


        </div>
    <?php

    }
  }

    ?>


</body>

</html>