<!DOCTYPE html>
<html>

<head>
  <title>Painter Profile</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerprofile.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
  <?php include 'workernav.php' ?>
  <div class="main-container4">
    <div class="profile-container3">
      <!-- <a><button class="close-button">Edit profile</button></a> -->

      <div class="container-left">
        <div class="picture">
          <img class="image" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $data['newData']['profile_image']  ?>" alt="placeholder" id="workerprofile_image_placeholder">
        </div>
        <div class="form-upload">
          <a href="<?= ROOT ?>/worker/editprofile"><button class="close-button"><i class="bx bxs-image-add icon"></i></button></a>
        </div>
        <div class="picture">
          <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
        </div>

        <div class="picture">
          <img class="image1" src="<?= ROOT ?>/assets/images/worker/certifiImages/<?php echo $data['newData']['certificate_image'] ?>" alt="placeholder" id="workergs_image_placeholder">
        </div>
        <div class="ctag">
          View GS Certificate
        </div>

      </div>


      <div class="pro_container-right">
        <div class="tags">
          <h2 class="info">Personal Information</h2>
          <a href="<?= ROOT ?>/worker/editprofile"><i class="bx bxs-edit-alt icon"></i></a>
        </div>

        <h3>
          Full Name
        </h3>

        <input type="text" name="fullname" value="<?php echo ucfirst($data['newData']['name']); ?> " placeholder="Empty Full Name" class="edit-gen" readonly>
        <h3>
          City
        </h3>
        <input type="text" name="city" value="<?php echo ucfirst($data['newData']['city']); ?> " class="edit-gen" readonly>
        <h3>
          Profession
        </h3>
        <input type="text" name="profession" value='<?php echo ucfirst($data['newData']['category']); ?> ' class="edit-gen" readonly>
        <h3>
          Address
        </h3>
        <input type="text" name="address" value="<?php echo ucfirst($data['newData']['address']); ?> " class="edit-gen" readonly>
        <h3>
          Date of Birth
        </h3>
        <input type="text" name="birthday" value='<?php echo ucfirst($data['newData']['dob']); ?> ' class="edit-gen" readonly>

        <h3>
          Skills
        </h3>
        <input type="text" name="skills" value="<?php echo ucfirst($data['newData']['skills']); ?> " class="edit-gen-skill" readonly>
        <h3>
          Expierience
        </h3>
        <input type="text" name="expierience" value="<?php echo ucfirst($data['newData']['expierience']); ?> " class="edit-gen-skill" readonly>

      </div>
    </div>


  </div>


</body>

</html>