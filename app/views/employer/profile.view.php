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
      width: 155%;
      line-height: 28px;
      flex-direction: column;
      left: 0%;
      justify-content: center;
      background: #eeeeee;
      padding: 35px;
      border: 1px solid #d8d0d0;
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
      font-size: 28px;
      background: white;
      border: none;
      cursor: pointer;
      color: #ff7f00;
    }

    .tags {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin: 25px;
    }

    .tags i {
      font-size: 28px;
      color: #ff7f00;
    }

    .progress-label-left {
      float: left;
      margin-right: 0.5em;
      line-height: 1em;
    }

    .progress-label-right {
      float: right;
      margin-left: 0.3em;
      line-height: 1em;
    }

    .text-warning {
      color: #ffc107;

    }

    .star-light {
      color: #e9ecef;
    }

    .progress {
      height: 20px;
      background-color: #e9ecef;
      border-radius: 5px;
      overflow: hidden;
    }

    .progress-bar {
      height: 100%;
      width: 0;
      background-color: #ffc107;
      /* Set your desired progress bar color */
      text-align: center;
      line-height: 20px;
      color: #000;
      /* Set your desired text color */
      font-weight: bold;
      transition: width 0.3s ease-in-out;
    }

    .row {
      display: flex;
      width: 100%;
      flex-direction: column;
      align-items: center;
    }

    .review_percent {
      display: flex;
      flex-direction: column;
      margin: 20px;
    }

    .review-bar {
      display: flex;
      flex-direction: column;
      width: 65%;
      margin: 33px;

    }

    .one-bar {
      margin: 2%;
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
          <a href="<?= ROOT ?>/employer/editprofile"><button class="close-button"><i class="bx bxs-image-add icon"></i></button></a>
        </div>

        <div class="row">
          <div class="review_percent">
            <h1 class="text-warning ">
              <b><span id="average_rating">0.0</span> / 5</b>
            </h1>
            <div>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
            </div>
            <h3><span id="total_review">0</span> Review</h3>
          </div>

          <div class="review-bar">
            <div class="one-bar">
              <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
              <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar" id="five_star_progress"></div>
              </div>
            </div>


            <div class="one-bar">
              <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
              <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar" id="four_star_progress"></div>
              </div>
            </div>

            <div class="one-bar">
              <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
              <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar" id="three_star_progress"></div>
              </div>
            </div>
            <div class="one-bar">
              <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
              <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar" id="two_star_progress"></div>
              </div>
            </div>
            <div class="one-bar">
              <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
              <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
              <div class="progress">
                <div class="progress-bar" id="one_star_progress"></div>
              </div>
            </div>

            <!-- Repeat the structure for other star ratings -->
          </div>

        </div>


      </div>

      <div class="pro_container-right">
        <div class="tags">
          <h2 class="info">Personal Information</h2>
          <a href="<?= ROOT ?>/employer/editprofile"><i class="bx bxs-edit-alt icon"></i></a>
        </div>

        <h3>
          Full Name
        </h3>
        <input type="text" name="fullname" value="<?php echo ucfirst($data['newData']['name']); ?> " placeholder="Empty Full Name" class="edit-gen" readonly>


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