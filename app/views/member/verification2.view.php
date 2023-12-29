<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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

        .archive-button.unarchive {
            background-color: #2ecc71;
            color: #fff;
        }

        .verification-badge {
            font-size: 18px;
            color: #2ecc71; /* Green color for verified */
        }

        .not-verified-badge {
            font-size: 18px;
            color: #e74c3c; /* Red color for not verified */
        }

        .stripe-status {
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<?php include 'sidebar.php' ?>

<?php include 'navigationbar.php' ?>

<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<div class="main-container3">
    <div class="profile-container2">
        <a href="<?= ROOT ?>/member/workers"><button class="close-button">Close</button></a>
        <form method="post" action="<?= ROOT ?>/member/verification2?id=<?= $data->id ?>">
            <input type="submit" class="archive-button <?= $data->verified ? 'unarchive' : 'archive' ?>"
                   value="<?= $data->verified ? 'Unverify' : 'Verify' ?>" name="<?= $data->verified ? 'Unverify' : 'Verify' ?>">
        </form>

        <?php if ($data->verified) : ?>
            <span class="verification-badge"><i class="fas fa-check-circle"></i> Verified</span>
        <?php else : ?>
            <span class="not-verified-badge"><i class="fas fa-times-circle"></i> Not Verified</span>
        <?php endif; ?>

        <div class="picture">
            <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
        </div>
        <div class="picture">
            <img class="rates" src="<?= ROOT ?>/assets/images/employer/rates.png" alt="">
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

            <input type="text" name="fullname" value="<?php echo $data->name ?>" class="edit-gen" readonly>
            <h3>
                City
            </h3>
            <input type="text" name="city" value="<?php echo $data->city ?>" class="edit-gen" readonly>
            <h3>
                Address
            </h3>
            <input type="text" name="address" value=<?= $data->address ?> class="edit-gen" readonly>
            <h3>
                Date of Birth
            </h3>
            <input type="text" name="birthday" value='2012-12-12' class="edit-gen" readonly>
            <h3>
                Profession
            </h3>
            <input type="text" name="profession" value='<?php echo $data->category ?>' class="edit-gen" readonly>

            <h3>
                Skills
            </h3>
            <input type="text" name="skills" value="" class="edit-gen-skill" readonly>
            <h3>
                Expierience
            </h3>
            <input type="text" name="expierience" value="" class="edit-gen-skill" readonly>

        </div>

        <!-- Stripe Account Integration Status and Details -->
        <div class="stripe-status">
            <h3>Stripe Account Integration Status:</h3>
            <?php if ($data->stripe_integration) : ?>
                <p>Integrated</p>
                <h3>Stripe Account Details:</h3>
                <!-- Display Stripe Account Details here -->
            <?php else : ?>
                <p>Not Integrated</p>
            <?php endif; ?>
        </div>

    </div>
</div>

</body>
<script src="<?= ROOT ?>/assets/js/employer/requestjob.js"></script>

</html>
