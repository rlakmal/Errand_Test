<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">
</head>

<body>
<?php include 'workernav.php'?>
<?php include 'workerfilter.php'?>

    <div class="main-container3">
        <div class="profile-container2">
            <a href="<?=ROOT?>/worker/services"><button  class="close-button">Close</button></a>
            <div class="picture">
                <img class="image" src="<?=ROOT?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="picture">
                <img class="rates" src="<?=ROOT?>/assets/images/employer/rates.png" alt="">
            </div>
            <div class="gsc">
                <h3>
                    View GS cerificate
                </h3>   
                <input type="text" name="fullname" value="Click Here" readonly>
            </div>
            <div class="index">
   
                    <h3>
                      Full Name
                    </h3>
                  
                    <input type="text" name="fullname" value="Dasun Shanaka" class="edit-gen" readonly>
                    <h3>
                      City
                    </h3>
                    <input type="text" name="city" value="Hambanthota" class="edit-gen" readonly>
                    <h3>
                      Address
                    </h3>
                    <input type="text" name="address" value="27/A, School Road, Sooriyawewa"
                      class="edit-gen" readonly>
                    <h3>
                      Date of Birth
                    </h3>
                    <input type="text" name="birthday" value='2012-12-12' class="edit-gen" readonly>
                    <h3>
                      Profession
                    </h3>
                    <input type="text" name="profession" value='Electrician' class="edit-gen" readonly>
                  
                    <h3>
                      Skills
                    </h3>
                    <input type="text" name="skills" value="" class="edit-gen-skill" readonly>
                    <h3>
                      Expierience
                    </h3>
                    <input type="text" name="expierience" value="" class="edit-gen-skill" readonly>                 
           

        </div>

    </div>    
</body>

</html>