<!DOCTYPE html>
<html>

<head>
  <title>Painter Profile</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerprofile.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobpopup.css">

  <style>
    .profile-container3 {
      top: 75px;
      left: 100px;
    }

    .homenavbar {
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 10;
    }

    .close-button {
      margin-top: 10px;
      float: right;
      width: 171px;
      border-radius: 20px;
      background-color: #ff7f00;
      color: #fff;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    .icon i {
      float: right;
      font-size: 27px;
      color: red;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      justify-content: center;
      align-items: center;
      z-index: 999;
    }

    .modal-content {
      min-width: 50%;
      max-height: 80%;
      object-fit: contain;
    }
  </style>
</head>

<body>
  <?php include 'employernav.php' ?>
  <?php include 'empfilter.php' ?>


  <?php
  if (is_array($data)) {
    foreach ($data as $item) {

  ?>

      <div class="main-container4">
        <div class="profile-container3">

          <!-- <a><button class="close-button">Edit profile</button></a> -->

          <div class="container-left">
            <div class="picture">
              <img class="image" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $item->profile_image ?>" alt="placeholder" id="workerprofile_image_placeholder">
            </div>

            <div class="picture">
              <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
            </div>

            <div class="picture">
              <img class="image1" src="<?= ROOT ?>/assets/images/worker/certifiImages/<?php echo $item->certificate_image ?>" onclick="openModal(this.src)" alt="placeholder" id="workergs_image_placeholder">
            </div>
            <div class="ctag">
              View GS Certificate
            </div>

            <button onclick="openRequest()" class="close-button">Request Worker</button>

          </div>


          <div class="pro_container-right">


            <div class="tags">
              <h2 class="info">Personal Information</h2>
            </div>

            <h3>
              Full Name
            </h3>

            <input type="text" name="fullname" value="<?php echo $item->name ?>" placeholder="Empty Full Name" class="edit-gen" readonly>
            <h3>
              City
            </h3>
            <input type="text" name="city" value="<?php echo $item->city ?> " class="edit-gen" readonly>
            <h3>
              Profession
            </h3>
            <input type="text" name="profession" value='<?php echo $item->category ?>' class="edit-gen" readonly>
            <h3>
              Address
            </h3>
            <input type="text" name="address" value="<?php echo $item->address ?>" class="edit-gen" readonly>
            <h3>
              Date of Birth
            </h3>
            <input type="text" name="birthday" value='<?php echo $item->dob ?>' class="edit-gen" readonly>

            <h3>
              Skills
            </h3>
            <input type="text" name="skills" value="<?php echo $item->skills ?>" class="edit-gen-skill" readonly>
            <h3>
              Expierience
            </h3>
            <input type="text" name="expierience" value="<?php echo $item->expierience ?>" class="edit-gen-skill" readonly>

          </div>
          <div class="icon">
            <a href="<?= ROOT ?>/employer/services"><i class='bx bxs-x-circle'></i></a>
          </div>
        </div>

    <?php

    }
  }
    ?>
    <div class="popup-view">
      <form method="POST">
        <h2>Send Job Request</h2>
        <h4>Job Title : </h4>
        <input name="title" type="text" placeholder="Enter Tiltle of the Job">
        <h4>Budget : </h4>
        <input name="budget" type="text" placeholder="Enter your Budget">
        <h4>Location : </h4>
        <input name="city" type="text" placeholder="Select Location">
        <h4>Description : </h4>
        <input name="description" type="text" placeholder="Enter your problem">
        <div class="btns">
          <button type="button" class="cancelR-btn" onclick="closeRequest()">Cancel</button>
          <button name="reqWorker" type="submit" value="POST" class="close-btn" onclick="closeRequest()">Submit </button>
        </div>
      </form>
    </div>
    <div id="overlay2" class="overlay"></div>

    <div id="myModal" class="modal">
      <img class="modal-content" id="modalImage">
    </div>
</body>
<script src="<?= ROOT ?>/assets/js/employer/requestjob.js"></script>

<script>
  const images = document.querySelectorAll('.image1');
  const modalImage = document.getElementById('modalImage');

  function openModal(src) {
    modalImage.src = src;
    document.getElementById('myModal').style.display = 'flex';

  }

  function closeModal() {
    document.getElementById('myModal').style.display = 'none';

  }
  window.onclick = function(event) {
    if (event.target == document.getElementById('myModal')) {
      closeModal();
    }
  };
</script>

</html>