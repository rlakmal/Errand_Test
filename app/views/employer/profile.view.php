<!DOCTYPE html>
<html>

<head>
  <title>Painter Profile</title>
  <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css"> -->
</head>

<body>
  <?php include 'employernav.php' ?>
  <?php include 'requestpopup.php' ?>
  <style>
    body {
      font-family: "Arial", sans-serif;
      background-color: #f4f4f4;
    }

    .main-container4 {
      display: flex;
      border-radius: 40px;
      margin: 10%;
      margin-top: 2%;
      width: 80%;
      height: 100%;
      background: #f3f3f3;
      flex-direction: column;
      align-content: center;
      justify-content: center;

    }

    .profile-container3 {
      display: flex;
      margin: 1%;
      position: relative;
      padding: 15px;
      background-color: #ffffff;
      width: 98%;
      height: 578px;
      box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
      border-radius: 20px;
    }

    .pro_container-right {
      position: relative;
      display: flex;
      width: 160%;
      line-height: 28px;
      flex-direction: column;
      left: 5%;
      justify-content: center;
    }

    .info {
      margin: 10px;
      display: flex;
      margin-left: -7%;
      color: #4d5151;
      /* margin-right: 3%; */
      justify-content: center;
    }

    .pro_container-right input {
      width: 90%;
      padding: 10px;
      font-size: 16px;
      border: none;
      outline: none;
    }

    .picture .image {
      width: 165px;
      border-radius: 50%;
      height: 160px;
    }

    .picture .rates {
      max-width: 400px;
    }

    .container-left {
      display: flex;
      position: relative;
      width: 100%;
      flex-wrap: nowrap;
      flex-direction: column;
      justify-content: center;
      /* align-content: center; */
      align-items: center;
      background: #ffffff;
      border-radius: 28px;
      box-shadow: 2px 2px 2px 2px rgb(255 136 66 / 32%);
    }

    .edit-gen {
      width: 75%;
      font-size: 16px;
      font-weight: 300;
      color: #3e3e3e;
      font-family: "Lato", sans-serif;
      margin: 10px 0;
      border: 2px solid #e7e7e7;
      padding: 10px;
    }

    .view-profile-button {
      float: right;
      background-color: #ff7f00;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      display: block;
      text-align: center;
      margin-top: -40px;
    }

    .close-button {
      width: 171px;
      top: 10px;
      right: 10px;
      border-radius: 20px;
      background-color: #ff7f00;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    @media only screen and (max-width: 600px) {
      .main-container4 {
        height: 100%;
        display: flex;
        margin-left: 40px;
        margin-top: 20%;
        max-width: 200%;
        justify-content: center;
        flex-direction: column;
      }

      .profile-container3 {
        height: 80%;
        display: flex;
        width: 100%;
        margin-left: 0;
        flex-direction: column;
      }

      .close-button {
        align-items: center;
      }

      .container-left {
        height: 478px;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;

      }

      .pro_container-right {
        display: flex;
        height: 550px;
        width: 100%;
        flex-direction: column;
        flex-wrap: nowrap;
      }

      .index_img {
        display: flex;
      }

      .picture .rates {

        display: flex;
        margin-left: 1%;
        width: 284px;
        flex-direction: column;

      }


      .bottum_index {
        display: flex;
        justify-content: center;

      }

    }
  </style>

  <div class="main-container4">
    <div class="profile-container3">


      <div class="container-left">


        <div class="picture">
          <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $data['newData']['profile_image']  ?>" alt="placeholder" id="profile_image_placeholder">

        </div>
        <div class="form-upload">
          <a href="<?= ROOT ?>/employer/editprofile"><button class="close-button">Edit profile</button></a>
        </div>

        <div class="picture">
          <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
        </div>


      </div>

      <div class="pro_container-right">
        <h2 class="info">Personal Information</h2>


        <h3>
          Full Name
        </h3>
        <input type="text" name="fullname" value="<?php echo ucfirst($data['newData']['name']); ?>" placeholder="Empty Full Name" class="edit-gen" readonly>
        <h3>
          NIC Number
        </h3>

        <input type="text" name="nic" value="<?php echo $data['newData']['nic']; ?>" placeholder="Empty NIC Number" class="edit-gen" readonly>
        <h3>
          City
        </h3>
        <input type="text" name="city" value="<?php echo ucfirst($data['newData']['city']); ?>" class="edit-gen" placeholder="Empty City" readonly>
        <h3>
          Address
        </h3>
        <input type="text" name="address" value="<?php echo $data['newData']['address']; ?>" class="edit-gen" placeholder="Empty Address" readonly>
        <h3>
          Date of Birth
        </h3>
        <input type="text" name="birthday" value="<?php echo $data['newData']['dob']; ?>" class="edit-gen" placeholder="Empty Date of Birth" readonly>
      </div>
    </div>

  </div>
</body>

</html>