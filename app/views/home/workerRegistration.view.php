<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/registration.css">
  <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">/ -->
  <title>Errand</title>
</head>

<body>
  <div class="containerStu">

    <div>
      <div class="title">
        Register as Worker
      </div>

      <span>
        <a href="<?= ROOT ?>/home">
          <ion-icon name="chevron-back-outline"></ion-icon>
          <!-- <ion-icon name="chevron-back-circle-outline"></ion-icon> -->
          Back
        </a>
      </span>

    </div>

    <!-- <span class="title">Student & Parent Registration</span> -->
    <form method="POST">
      <div>
        <h3>

          Personal Information
        </h3>
      </div>
      <div class="user-details">
        <div class="input-box">
          <span class="details">Full Name</span>
          <input name="name" type="text" placeholder="Your Full Name" required />
        </div>

        <div class="input-box">
          <span class="details">NIC Number</span>
          <input name="nic" type="text" placeholder="Your NIC Number" required />
        </div>

        <div class="input-box">
          <span class="details">Address</span>
          <input name="address" type="text" placeholder="Your Address" required />
        </div>

        <div class="input-box">
          <span class="details">City</span>
          <input name="city" type="text" placeholder="Your City" required />
        </div>

        <div class="input-box">
          <span class="details">Select Category</span>
          <select name="category" id="department" required>

            <option value="Technicians">All</option>
            <option value="Technicians">Technicians</option>
            <option value="AC Repairs">AC Repairs</option>
            <option value="CCTV">CCTV</option>
            <option value="Constructions">Constructions</option>
            <option value="Electricians">Electricians</option>
            <option value="Electronic Repairs">Electronic Repairs</option>
            <option value="Glass & Aluminium">Glass & Aluminium</option>
            <option value="Iron Works">Iron Works</option>
            <option value="Masonry">Masonry</option>
            <option value="Odd Jobs">Odd Jobs</option>
            <option value="Pest Controllers">Pest Controllers</option>
            <option value="Plumbing">Plumbing</option>
            <option value="Wood Works">Wood Works</option>
          </select>
        </div>

        <div class="input-box">
          <span class="details">Date of Birth</span>
          <input name="dob" type="date" placeholder="Garment email" required />
        </div>

      </div>

      <div class="stugender-details">
        <input type="radio" name="gender" id="dot-1" checked="male" />
        <input type="radio" name="gender" id="dot-2" checked="female" />
        <span class="gender-title">Gender</span>
        <div class="category">
          <label for="dot-1">
            <span class="dot one" value="male"></span>
            <span class="gender">Male</span>
          </label>

          <label for="dot-2">
            <span class="dot two" value="female"></span>
            <span class="gender">Female</span>
          </label>
        </div>
      </div>

      <div>
        <h3>

          Login Credintials
        </h3>
      </div>
      <div class="parent-details">

        <!-- <div class="input-box">
          <span class="details">Parent with relationship</span>
          <select name="department" id="department" required>
            <option value="Mother">
              Mother
            </option>
            <option value="Father">Father</option>
            <option value="Other">Other</option>
          </select>
        </div> -->

        <div class="input-box">
          <span class="details">E-mail Adddress</span>
          <input name="email" type="email" placeholder="Your email" required />
        </div>
        <div class="input-box">
          <span class="details">Password</span>
          <input name="password" type="text" placeholder="Password" required />
        </div>

        <div class="input-box">
          <span class="details">Confirm Password</span>
          <input name="re-password" type="text" placeholder="Confirm Password" required />
        </div>
      </div>


      <div class="button">
        <input type="submit" value="Register" name="worker_register" />
      </div>
    </form>
  </div>
</body>

</html>