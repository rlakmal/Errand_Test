<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/job.css">

    <title>viewjob</title>
    <style>
        /* .job_images {
            margin-top: 20px;
        }

        .jobimage1 {
            height: auto;
            cursor: pointer;
            transition: width 0.3s ease-in-out;
        }

        .jobimage1:hover {
            width: 400px;
            /* Set the increased width on hover */
        /* } */

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-content {
            min-width: 50%;
            max-height: 70%;
            object-fit: contain;
        }

        .edit-gen2 {
            width: 150%;
            padding: 10px;
            font-size: 16px;
            border: none;
            outline: none;
            border-radius: 20px;
            background: grey;
            margin: 15px;

        }

    </style>
</head>

<body>
<?php include 'navigationbar.php' ?>
<?php include 'sidebar.php' ?>
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<?php
if ($data) {
    foreach ($data as $item) {
        //show($data);
        ?>

        <div class="main-container4">
            <div class="profile-container3">
                <div class="container-left">

                    <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="">
<!--                    <h3 class="category">-->
<!--                        Category-->
<!--                    </h3>-->
                    <h3 class="emp-name">
                        <?php echo $item->name  ?>
                    </h3>

                    <a style="font-size: 40px" href="<?= ROOT ?>/admin/employeracc&id=<?= $item->emp_id ?>"><i class="bx bxs-user-detail"></i></a>

<!--                    <img class="rates" src="--><?php //= ROOT ?><!--/assets/images/worker/rates.png" alt="">-->

                </div>

                <div class="container-right">
                    <h3>ID: <?php echo $item->id ?></h3>
                    <div type="text" name="fullname" value="" class="title-line" readonly><?php echo $item->title  ?></div>
                    <h3>
                        Location
                    </h3>
                    <input type="text" name="city" value="<?php echo $item->city ?>" class="edit-gen2" readonly>
                    <h3>
                        Address
                    </h3>
                    <input type="text" name="address" value="<?php echo $item->address ?>" class="edit-gen2" readonly>
                    <h3>
                        Budget
                    </h3>
                    <input type="text" name="budget" value='Rs <?php echo $item->budget ?> Per Day' class="edit-gen2" readonly>
                    <h3>
                        Description
                    </h3>
                    <input type="text" name="description" value='<?php echo $item->description ?>' class="edit-gen2" readonly>

                    <h3>
                        Created
                    </h3>
                    <input type="text" name="description" value='<?php echo $item->job_created ?>' class="edit-gen2" readonly>
                    <div class="job_images">
                        <img class="jobimage1" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image  ?>" alt="" onclick="openModal(this.src,0)">
                        <img class="jobimage1" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image1  ?>" alt="" onclick="openModal(this.src,1)">
                    </div>

                </input>
            </div>
            <div class="index_bottom">
                <a href="<?= ROOT ?>/admin/jobs"><button style="background-color: #ff904b; border-color: darkorange;color: white; height: 40px; width: 100px; border-radius: 20px; cursor: pointer" class="close-button">Back</button></a>
            </div>
        </div>

        <?php

    }
}

?>
<div id="myModal" class="modal">
    <img class="modal-content" id="modalImage">
</div>
<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.jobimage1');
    console.log(currentIndex);
    const modalImage = document.getElementById('modalImage');

    function openModal(src, index) {
        currentIndex = index;
        modalImage.src = src;
        document.getElementById('myModal').style.display = 'flex';
        document.addEventListener('keydown', handleKeyPress);
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
        document.removeEventListener('keydown', handleKeyPress);
    }

    function handleKeyPress(event) {
        switch (event.key) {
            case 'ArrowRight':
                showNextImage();
                break;
            case 'ArrowLeft':
                showPreviousImage();
                break;
            case 'Escape':
                closeModal();
                break;
            default:
                break;
        }
    }

    function showNextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        modalImage.src = images[currentIndex].src;
    }

    function showPreviousImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        modalImage.src = images[currentIndex].src;
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('myModal')) {
            closeModal();
        }
    };
</script>
</body>

</html>