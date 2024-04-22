<!DOCTYPE html>

<html>

<head>
    <title>Account</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">

    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: lightcyan;
            align-content: center;
            justify-content: center;
        }

        .container6 {
            display: flex;
            border-radius: 40px;
            margin: 10%;
            margin-top: 12%;
            width: 80%;
            height: fit-content;
            background: darkcyan;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);

        }

        .container4 {
            display: flex;
            margin: 1%;
            position: relative;
            padding: 15px;
            background-color: lightgoldenrodyellow;
            width: 98%;
            height: fit-content;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
        }

        .pro_container-right {
            position: relative;
            display: flex;
            width: 175%;
            /*line-height: 28px;*/
            flex-direction: column;
            height: fit-content;
            left: 0%;
            justify-content: center;
            background: white;
            padding: 35px;
            border: 1px solid #d8d0d0;
            border-radius: 20px;
        }

        .tag {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin: 25px;
        }

        .title {
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
            outline: none;
            margin-left: 5%;
            border-radius: 20px;
            background: lightgray;
            font-weight: 300;
            color: #3e3e3e;
            font-family: "Lato", sans-serif;
            /*margin: 10px;*/
            border: 2px solid #e7e7e7;
            margin-bottom: 20px;

        }



        .prof_img .image {
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
            width: 90%;
            flex-wrap: nowrap;
            flex-direction: column;
            justify-content: center;
            /* align-content: center; */
            align-items: center;
            background: lightgoldenrodyellow;
            border-radius: 28px;
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
            font-size: 25px;
            background: orange;
            border: none;
            cursor: pointer;
            color: white;
            height: 40px;
            width: 100px;
            border-radius: 15px;
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

        .form-upload {
            /* margin-top: -30px; */
            /* margin-left: 250px; */
            cursor: pointer;
            /* width: 110px; */
            height: 32px;
            background-color: darkmagenta;
            color: white;
            border-radius: 20px;
            font-size: 15px;
            align-items: center;
            text-align: center;
            align-content: center;
            width: 100px;
        }

        .form-upload input[type="file"] {
            display: none;
        }

        .form-upload label {
            cursor: pointer;
        }


        #popup {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>


</head>

    <body>

        <?php include 'sidebar.php' ?>

        <?php include 'navigationbar.php' ?>

        <div id = "nopopup" class="container6">
            <div class="container4">
                <div class="container-left">
                    <div class="prof_img">
                        <img class="image" style="margin-top: 15px" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $data[0]->profile_image  ?>" alt="placeholder" id="profile_image_placeholder">

                    </div>
                    <div>
                        <button class="close-button" onclick="openedit()"><i class='bx bx-edit-alt' ></i></button>
                    </div>
                </div>
                <div class="pro_container-right">
                    <h3>USER ID: <?= $data[0]->emp_id?></h3>
                    <h3>CREW MEMBER ID: <?= $data[0]->id?></h3>


                    <div class="tag">
                        <div class="title">
                            <h2>Profile</h2>
                        </div>
                    </div>

                    <h3>Name</h3>
                    <input type="text" value="<?= $data[0]->name?>" readonly>

                    <h3>User Name</h3>
                    <input type="text" value="<?= $data[0]->email?>" readonly>

                    <h3>Registered</h3>
                    <input type="text" value="<?= $data[0]->created?>" readonly>


                </div>

            </div>
        </div>


        <div id = "popup" style="display: none; z-index: 9999;flex-direction: row">
            <div class="container6"  style="background: purple">
                <form enctype="multipart/form-data" method="post" action="<?= ROOT ?>/member/account" class="container4" style="background: lightpink">
<!--                    <form >-->
                        <div class="container-left" style="width: 150%; margin-right: 15px">
<!--                            <div class = "form-drag-area" >-->
                                <div class="prof_img">
                                    <img class="image" style="margin-top: 15px" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $data[0]->profile_image  ?>" alt="placeholder" id="profile_image_placeholder">

                                </div>


                                <div class="form-upload">
                                    <input type="file" name="profile_image" id="profile_image">
                                    <label for="profile_image"><i class='bx bx-image-add'></i></label>
                                </div>
<!--                            </div>-->

                        </div>
                        <div class="pro_container-right" style="background: lightpink; border: none">


                            <div class="tag">
                                <div class="title">
                                    <h2>Update Profile</h2>
                                </div>
                            </div>

                            <h3>Name</h3>
                            <input name="name" type="text" value="<?= $data[0]->name?>" >

                            <h3>User Name</h3>
                            <input name = "email" type="text" value="<?= $data[0]->email?>" >

                            <h3>Password</h3>
                            <input name = "password" type="text" >

                            <div style="flex-direction: row; text-align: right">
                                <button type="submit"  class="close-button" style="font-size: 16px">Done</button>
                                <button class="close-button" onclick="closeedit()" style="font-size: 16px">Close</button>
                            </div>
                        </div>
<!--                    </form>-->


                </form>
            </div>
        </div>


    </body>

     <script src="<?= ROOT ?>/assets/js/member/imageUpload.js"></script>


    <script>

        function openedit(){
            var popup = document.getElementById("popup");
            var nopopup = document.getElementById("nopopup");
            nopopup.style.display = "none"
            popup.style.display = "flex";
        }

        function closeedit(){
            var popup = document.getElementById("popup");
            popup.style.display = "none";
            var nopopup = document.getElementById("nopopup");
            nopopup.style.display = "block"
        }

    </script>

</html>