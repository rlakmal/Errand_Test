<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--    <link rel="stylesheet" href="--><?php //= ROOT ?><!--/assets/css/employer/emphome.css">-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobPost.css">
    <title>Document</title>
    <style>
        .archived {
            color: red;
        }

        .not-archived {
            color: green;
        }
    </style>
</head>

<body>

<?php include 'navigationbar.php' ?>
<?php include 'sidebar.php' ?>
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<div class="set-margin" id="set-marginid">
    <?php
    if (is_array($data)) {

        foreach ($data as $item) {
            // show($item);
            // තණකොළ කැපීමට සේවකයෙකු අවශ්‍යයි

            // echo $times_ago;;
            ?>
            <div class="post-container" style="padding-bottom: 5px">
                <div class="profile-container2" style="padding-bottom: 5px justify-content: flex-start" >
                    <!--                    <div class="picture">-->
                    <!--                        <img class="image" src="--><?php //= ROOT ?><!--/assets/images/profileImages/--><?php //echo $item->profile_image  ?><!--" alt="placeholder">-->
                    <!--                    </div>-->
                    <div >
                        <div class="profile-name"><?php echo $item->title ?></div>
                        <div class="profile-ratings"><?php echo $item->created ?></div>
                        <div class="profile-type"><?php echo $item->description ?></div>

                        <!--                        <div class="budget">--><?php //echo $item->budget ?><!--</div>-->
                        <div class="budget <?php echo $item->archived ? 'archived' : 'not-archived' ?>">
                            <?php echo $item->archived ? 'Archived' : 'Not Archived' ?>
                        </div>
                        <div class="location"> User ID:
                            <?php echo $item->user ?> <?php echo $item->status ?>
                            <i class="bx bxs-map icon"></i>
                        </div><br>
                        <div class="location"> Ticket ID:
                            <?php echo $item->ticket_id ?>
                            <i class="bx bxs-map icon"></i>
                        </div>


                    </div>
                    <a href="<?=ROOT?>/member/ticket?id=<?=$item->ticket_id?>"><button class="view-profile-button" style="padding-bottom: 5px" id="request-button">View</button></a>

                    <!-- <a></a><button class="edit-profile-button">Edit</button></a> -->

                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

</body>

</html>
