<!DOCTYPE html>
<html>

<head>
  <title>Painter Profile</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'navigationbar.php' ?>
  <?php include 'sidebar.php' ?>
  <style>
      .archive-button {
          padding: 10px 20px;
          border-radius: 5px;
          cursor: pointer;
          font-size: 16px;
          margin-bottom: 20px;
          border: none;
      }

      .archive-button.archive {
          background-color: #e74c3c;
          color: #fff;
      }
    .main-container4 {
      margin-left: 200px;
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

      .popup {
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color: white;
          padding: 40px; /* Increase padding for a bigger popup */
          border-radius: 20px; /* Add curved edges */
          z-index: 1000;
          display: none;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
          animation: popup-animation 0.5s ease forwards; /* Add animation */
      }

      .popup-overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5);
          z-index: 999;
          display: none;
      }

      /* Animation keyframes */
      @keyframes popup-animation {
          0% { transform: scale(0.5); opacity: 0; }
          100% { transform: scale(1); opacity: 1; }
      }

      .popup img {
          position: absolute;
          top: -20px;
          right: -20px;
          width: 100px; /* Adjust size of the image */
          height: 50px; /* Adjust size of the image */
          border-radius: 50%; /* Make the image round */
          border: 2px solid #fff; /* Add border for contrast */
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
      }

  </style>

  <div class="main-container4">
    <div class="profile-container3">
      <a href="<?= ROOT ?>/admin/employers"><button class="close-button">Close</button></a>
        <button style="border-radius: 20px; background-color: red" class="close-button" id="delete-button">Delete</button>


        <div class="picture">
        <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $data['newData']['profile_image']  ?>" alt="Image">
      </div>
      <div class="picture">
        <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
      </div>

      <div class="index">

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

      <div class="popup" id="popup">
          <img src="<?=ROOT?>/assets/images/logoe.png" alt="Image" /> <!-- Add your image here -->
          <h2>Are you sure you want to delete?</h2>
          <form method="post" action="<?= ROOT ?>/admin/employeracc?id=<?= $data['newData']['id'] ?>">
              <input style="margin-top: 5px; border-radius: 20px" type="submit" class="archive-button archive" value="Yes, Delete" name="Delete">
          </form>
          <button style="background-color: #1eea07; border-radius: 20px" class="archive-button archive" id="cancel-delete">No, Cancel</button>
      </div>
</body>

<script>
    // Function to display popup when delete button is clicked
    document.getElementById('delete-button').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'block';
        document.getElementById('popup-overlay').style.display = 'block';
    });

    // Function to close popup when cancel button is clicked
    document.getElementById('cancel-delete').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popup-overlay').style.display = 'none';
    });

</script>

</html>