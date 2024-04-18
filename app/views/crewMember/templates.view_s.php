<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/registration.css">
  <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">/ -->
  <title>Errand</title>
</head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Great+Vibes&family=Imperial+Script&family=Poppins:wght@300;400;500;600;700&family=Roboto:ital,wght@0,400;1,100&family=Ubuntu:wght@300;400;500;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    padding: 10px;
    /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
  }

  .containerStu {
    max-width: 50%;
    width: 50%;
    height: 100%;
    background: #ececec;
    padding: 25px 30px;
    border-radius: 15px;
    position: fixed;
  }

  .containerStu .title {
    font-size: 25px;
    font-weight: 500;
    margin-bottom: 13px;
    position: relative;
    /* float: left; */
  }

  .containerStu .back {
    float: right;
    text-decoration: none;
  }

  .containerStu .back a {
    text-decoration: none;
  }

  /* 
.containerStu .title::before {
  content: "";
  position: absolute;
  left: 374px;
  bottom: 11px;
  height: 4px;
  width: 50px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
} */

  /* student form details  */

  .containerStu form .user-details,
  .containerStu form .parent-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 10px 0 12px 0;
  }

  form .user-details .input-box,
  form .parent-details .input-box {
    margin-bottom: 10px;
    width: calc(100% / 2 - 20px);
  }

  .user-details .input-box .details,
  .parent-details .input-box .details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }

  .user-details .input-box input,
  select,
  .parent-details .input-box input {
    width: 100%;
    height: 45px;
    outline: none;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding-left: 15px;
    font-size: 15px;
    transition: all 0.3s ease-in;
    border-bottom-width: 2px;
  }

  .user-details .input-box input:focus,
  .user-details .input-box input:valid,
  .parent-details .input-box input:focus,
  .parent-details .input-box input:valid,
  .user-details .input-box select:focus {
    border-color: #373538;
  }

  /* gender details */

  form .stugender-details .gender-title {
    font-size: 16px;
    display: flex;
    width: 15%;
    float: left;
    font-weight: 500;
    margin-right: 10px;
    /* background: red; */
  }

  form .stugender-details .category {
    display: flex;
    width: 30%;
    justify-content: space-between;
    margin: 5px 0;
    margin-right: 5px;

    /* background: red; */
  }

  .stugender-details .category label {
    display: flex;
    align-items: center;
    margin-right: 1%;
  }

  form .stugender-details .category .dot {
    height: 18px;
    width: 18px;
    background: #d9d9d9;
    border-radius: 50%;
    margin-right: 10px;
    border: 5px solid transparent;
    transition: all 0.3s ease-in;
  }

  #dot-1:checked~.category label .one,
  #dot-2:checked~.category label .two {
    border-color: #d9d9d9;
    background: #373538;
  }

  form input[type="radio"] {
    display: none;
  }

  /* submit button */

  form .button {
    height: 45px;
    cursor: pointer;
    /* margin: 45px 0; */
  }

  form .button input {
    height: 100%;
    width: 100%;
    background: linear-gradient(135deg, #ffffff, rgb(242, 102, 46));
    outline: none;
    color: white;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 1.2px;
    border: none;
    border-radius: 10px;
    transition: all 1s ease-in;
  }

  form .button input:hover {
    /* background: linear-gradient(-135deg, #71b7e6, #9b59b6); */
    background: #000000;
    transition: all 0.3s ease-in;
  }

  form .response {
    color: rgb(9, 167, 9);
    font-weight: 700;
    font-size: 18px;
    text-align: center;
    /* margin-left: 10px; */
  }

  form .error {
    color: red;
    font-weight: 700;
    font-size: 18px;
    text-align: center;
    /* margin-left: 10px; */
  }

  @media (max-width: 584px) {
    .containerStu {
      max-width: 100%;
    }

    form .user-details .input-box,
    form .parent-details .input-box {
      margin-bottom: 10px;
      width: 100%;
    }

    .containerStu form .user-details,
    .containerStu form .parent-details {
      max-height: 220px;
      overflow-y: scroll;
      float: ce
        /* border: 2px solid #9b59b6; */
        /* padding: 10px; */
        /* margin: 5px; */
        /* border-radius:10px ; */
    }
  }

  @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

  * {
    margin: 0px;
    padding: 0px;
  }

  body {
    font-family: 'Exo', sans-serif;
  }


  .context {
    width: 100%;
    position: absolute;
    top: 50vh;

  }

  .context h1 {
    text-align: center;
    color: #fff;
    font-size: 50px;
  }


  .area {
    background: #e78c0d;
    background: -webkit-linear-gradient(to left, #060823, #e95f04);
    width: 100%;
    height: 100vh;


  }

  .circles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  .circles li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(227, 224, 224, 0.999);
    animation: animate 25s linear infinite;
    bottom: -150px;

  }

  .circles li:nth-child(1) {
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
  }


  .circles li:nth-child(2) {
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
  }

  .circles li:nth-child(3) {
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
  }

  .circles li:nth-child(4) {
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
  }

  .circles li:nth-child(5) {
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
  }

  .circles li:nth-child(6) {
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
  }

  .circles li:nth-child(7) {
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
  }

  .circles li:nth-child(8) {
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
  }

  .circles li:nth-child(9) {
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
  }

  .circles li:nth-child(10) {
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
  }



  @keyframes animate {

    0% {
      transform: translateY(0) rotate(0deg);
      opacity: 1;
      border-radius: 0;
    }

    100% {
      transform: translateY(-1000px) rotate(720deg);
      opacity: 0;
      border-radius: 50%;
    }

  }
</style>

<body>
  <div class="area">

    <ul class="circles">

      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>




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

    </div><br>

    <!-- <span class="title">Student & Parent Registration</span> -->
    <form method="POST">
      <div>
        <h3>


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

    </div><br>

    <!-- <span class="title">Student & Parent Registration</span> -->
    <form method="POST">
      <div>
        <h3>

          Personal Information
        </h3><br>
      </div>
      <div class="user-details">
        <div class="input-box">
          <span class="details" required>Full Name</span>
          <input name="name" type="text" placeholder="Your Full Name" required />
        </div>
        <br>

        <div class="input-box">
          <span class="details">NIC Number</span>
          <input name="nic" type="text" placeholder="Your NIC Number" required />
        </div><br>

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