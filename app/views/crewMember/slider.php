<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slider</title>
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
    </style>
</head>
<body>
    
</body>
</html>