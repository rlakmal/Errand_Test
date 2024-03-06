<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Imperial+Script&family=Poppins:wght@300;400;500;600;700&family=Roboto:ital,wght@0,400;1,100&family=Ubuntu:wght@300;400;500;700&display=swap">
  <style>
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
      max-width: 700px;
      width: 100%;
      background: #ececec;
      padding: 25px 30px;
      border-radius: 15px;
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

    #dot-1:checked ~ .category label .one,
    #dot-2:checked ~ .category label .two {
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
        /* border: 2px solid #9b59b6; */
        /* padding: 10px; */
        /* margin: 5px; */
        /* border-radius:10px ; */
      }
    }

    /* Animation Styles */

    .hero {
      background-color: #0040C1;
      position: relative;
      height: 100vh;
      overflow: hidden;
      font-family: "Montserrat", sans-serif;
    }

    .hero__title {
      color: #fff;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 50px;
      z-index: 1;
    }

    .cube {
      position: absolute;
      top: 80vh;
      left: 45vw;
      width: 10px;
      height: 10px;
      border: solid 1px #003298;
      transform-origin: top left;
      transform: scale(0) rotate(0deg) translate(-50%, -50%);
      -webkit-animation: cube 12s ease-in forwards infinite;
              animation: cube 12s ease-in forwards infinite;
    }

    .cube:nth-child(2n) {
      border-color: #0051f4;
    }
    .cube:nth-child(2) {
      -webkit-animation-delay: 2s;
              animation-delay: 2s;
      left: 25vw;
      top: 40vh;
    }
    .cube:nth-child(3) {
      -webkit-animation-delay: 4s;
              animation-delay: 4s;
      left: 75vw;
      top: 50vh;
    }
    .cube:nth-child(4) {
      -webkit-animation-delay: 6s;
              animation-delay: 6s;
      left: 90vw;
      top: 10vh;
    }
    .cube:nth-child(5) {
      -webkit-animation-delay: 8s;
              animation-delay: 8s;
      left: 10vw;
      top: 85vh;
    }
    .cube:nth-child(6) {
      -webkit-animation-delay: 10s;
              animation-delay: 10s;
      left: 50vw;
      top: 10vh;
    }

    @-webkit-keyframes cube {
      from {
        transform: scale(0) rotate(0deg) translate(-50%, -50%);
        opacity: 1;
      }
      to {
        transform: scale(20) rotate(960deg) translate(-50%, -50%);
        opacity: 0;
      }
    }

    @keyframes cube {
      from {
        transform: scale(0) rotate(0deg) translate(-50%, -50%);
        opacity: 1;
      }
      to {
        transform: scale(20) rotate(960deg) translate(-50%, -50%);
        opacity: 0;
      }
    }
  </style>
</head>
<body>

<!-- Your HTML content here -->

</body>
</html>
