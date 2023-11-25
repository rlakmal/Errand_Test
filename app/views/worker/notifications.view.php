<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/emphome.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobPost.css">
    <style>
        /* Add your new CSS styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .set-margin {
            padding: 20px;
        }

        .post-container {
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .profile-container2 {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .picture img {
            max-width: 100%;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .index {
            flex: 1;
            padding-left: 20px;
        }

        .profile-name {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .profile-type {
            margin-top: 5px;
            font-size: 16px;
            color: #555;
        }

        .budget {
            margin-top: 5px;
            font-size: 16px;
            color: #777;
        }

        .location {
            margin-top: 5px;
            font-size: 16px;
            color: #777;
            display: flex;
            align-items: center;
        }

        .location i {
            margin-right: 5px;
            color: #3498db;
        }

        .view-profile-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .view-profile-button:hover {
            background-color: #297fb8;
        }
    </style>
    <title>Document</title>
</head>

<body>

<?php include 'workernav.php' ?>
<?php include 'workerfilter.php' ?>
<div class="set-margin" id="set-marginid">
    <?php
    if (is_array($data)) {
        foreach ($data as $item) {
            ?>
            <div class="post-container">
                <div class="profile-container2">
                    <div class="picture">
                        <!-- <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt=""> -->
                    </div>
                    <div class="index">
                        <div class="profile-name"><?php echo $item->title ?></div>
                        <div class="profile-type"><?php echo $item->body ?></div>
                        <div class="budget">Posted: <?php echo $item->created ?></div>
                        <div class="location">
                            <!-- <?php echo $item->city ?> -->
                            <i class="bx bxs-map icon"></i>
                        </div>
                        <a href="#" class="view-profile-button">View</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

</body>

</html>
