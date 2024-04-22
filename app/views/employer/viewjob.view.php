
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/requestjob.css">
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
    </style>
</head>

<body>
<?php include 'employernav.php' ?>
<?php include 'empfilter.php' ?>
<?php
if ($data) {
    foreach ($data as $item) {
        //show($data);
        ?>

        <div class="main-container4">
            <div class="profile-container3">
                <div class="container-left">

                    <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $item->profile_image  ?>" alt="">
                    <h3 class="category">
                        Category
                    </h3>
                    <h3 class="emp-name">
                        <?php echo $item->name  ?>
                    </h3>

                    <img class="rates" src="<?= ROOT ?>/assets/images/worker/rates.png" alt="">

                </div>

                <div class="container-right">
                    <div type="text" name="fullname" value="" class="title-line" readonly><?php echo $item->title  ?></div>
                    <h3>
                        Location
                    </h3>
                    <div type="text" name="city" value="" class="edit-gen" readonly><?php echo $item->city ?></div>
                    <h3>
                        Category
                    </h3>
                    <div type="text" name="category" value="" class="edit-gen" readonly><?php echo $item->category ?></div>
                    <h3>
                        Budget
                    </h3>
                    <div type="text" name="budget" value='' class="edit-gen" readonly>Rs <?php echo $item->budget ?> Per Day</div>
                    <h3>
                        Description
                    </h3>
                    <div type="text" name="description" value='' class="edit-gen" readonly><?php echo $item->description ?></div>
                    <div class="job_images">
                        <img class="jobimage1" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image  ?>" alt="" onclick="openModal(this.src,0)">
                        <img class="jobimage1" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image1  ?>" alt="" onclick="openModal(this.src,1)">
                    </div>

                </div>
            </div>
            <div class="index_bottom">
                <a href="<?= ROOT ?>/employer/home"><button class="close-button">Back</button></a>
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
