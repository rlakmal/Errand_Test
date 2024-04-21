<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/requestjob.css">

    <style>
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

    <?php include 'workernav.php' ?>
    <?php include 'workerfilter.php' ?>


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
                            Address
                        </h3>
                        <div type="text" name="address" value="" class="edit-gen" readonly><?php echo $item->address ?></div>
                        <h3>
                            Budget
                        </h3>
                        <div type="text" name="budget" value='' class="edit-gen" readonly>Rs <?php echo $item->budget ?> Per Day</div>
                        <h3>
                            Description
                        </h3>
                        <div type="text" name="description" value='' class="edit-gen" readonly><?php echo $item->description ?></div>
                        <h3>
                            Request Other Budget
                        </h3>

                        <input name="newbudget" type="text" value='' class="newbudget edit-gen">

                        <input type="hidden" name="id" value="<?php echo $item->id ?>">

                        <div class="job_images">
                            <img class="jobimage1" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image  ?>" alt="" onclick="openModal(this.src,0)">
                            <img class="jobimage1" src="<?= ROOT ?>/assets/images/jobimages/<?php echo $item->job_image1  ?>" alt="" onclick="openModal(this.src,1)">
                        </div>
                    </div>
                </div>
                <div class="index_bottom">
                    <button type="button" name="Rquest" value="Request" class="close-button" onclick="markAsCompleted(<?php echo $item->id ?>)">Request</button>

                    <a href="<?= ROOT ?>/worker/home"><button class="close-button">Back</button></a>
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
        console.log(images);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function markAsCompleted(id) {
            var budget = $(event.target).closest('.main-container4').find('.newbudget').val();
            console.log(budget);
            console.log(id);
            if (!confirm('Are you sure want to Request this Job?')) {
                return; // If user cancels, do nothing
            }
            $.ajax({
                url: '<?= ROOT ?>/worker/workerrequestjob',
                type: 'POST',
                data: {
                    id: id,
                    newbudget: budget,
                    Rquest: 'Request'
                },
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
        }
    </script>

</body>




</html>