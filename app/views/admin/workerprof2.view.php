<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>

<!--    <link rel="stylesheet" href="--><?php //= ROOT ?><!--/assets/css/admin/dashboard.css">-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/workerprofile.css">
<!--    <link rel="stylesheet" href="--><?php //= ROOT ?><!--/assets/css/employer/jobpopup.css">-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/admin/style-bar.css">



    <style>
        .profile-container3 {
            top: 75px;
            left: 100px;
        }

        .homenavbar {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
        }

        .close-button {
            margin-top: 10px;
            float: right;
            width: 171px;
            border-radius: 20px;
            background-color: #ff7f00;
            color: #fff;
            font-size: 16px;
            border: none;
            cursor: pointer;
            height: 50px;
        }

        .icon i {
            float: right;
            font-size: 27px;
            color: red;
        }

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
            max-height: 80%;
            object-fit: contain;
        }



        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 20px;
            z-index: 9999;
            display: none;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
            animation: fadeIn 0.5s ease forwards;
        }

        .popup button {
            margin-top: 20px;
            padding: 15px 30px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .popup button.yes-button {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .popup button.no-button {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .popup img {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .ground-archive{
            margin-top: 10px;
            margin-bottom: 50px;

            float: right;
            width: 171px;
            border-radius: 20px;
            background-color: lightgreen;
            color: #fff;
            font-size: 16px;
            border: none;
            cursor: pointer;
            height: 50px;
        }

        .ground-unarchive{
            margin-top: 10px;
            margin-bottom: 50px;
            float: right;
            width: 171px;
            border-radius: 20px;
            background-color: red;
            color: #fff;
            font-size: 16px;
            border: none;
            cursor: pointer;
            height: 50px;
        }
    </style>

    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

</head>

<body>
<?php include 'sidebar.php' ?>

<?php include 'navigationbar.php' ?>


<?php
if (is_array($data)) {
//show($data);
foreach ($data as $item) {

?>
<div class="main-container4">


    <div >

        <!--        <form style="margin: 20px " method="post" action="--><?php //= ROOT ?><!--/member/verification2?id=--><?php //= $data['newData']['work_id'] ?><!--"-->
        <!--        <input type="submit" style="margin: 20px class="archive-button --><?php //= $data['newData']['verified'] ? 'unarchive' : 'archive' ?><!--"-->
        <!--               value="--><?php //= $data['newData']['verified'] ? 'Unverify' : 'Verify' ?><!--" name="--><?php //= $data['newData']['verified'] ? 'Unverify' : 'Verify' ?><!--">-->
        <!--        </form>-->
        <!---->
        <!---->


    </div>

    <div class="profile-container3">

        <!-- <a><button class="close-button">Edit profile</button></a> -->

        <div class="container-left">

            <a style="top:0; position: relative; margin: 20px" href="<?= ROOT ?>/admin/workers2"><button style="top:0; position: relative; margin: 20px" class="close-button">Close</button></a><br>
            <button class="ground-unarchive" onclick="showConfirmationPopup(<?= $data['newData']['work_id'] ?>)">Delete</button>

            <?php if ($data['newData']['verified']) : ?>
                <span style="color: lightgreen; margin-bottom: 50px"><i class="fas fa-check-circle"></i> Verified</span>
            <?php else : ?>
                <span style="color: red; margin-bottom: 50px"><i class="fas fa-times-circle"></i> Not Verified</span>
            <?php endif; ?>

            <div class="picture">
                <img class="image" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $data['newData']['profile_image'] ?>" alt="placeholder" id="workerprofile_image_placeholder">
            </div>

            <div class="form-upload">
                <a href="<?= ROOT ?>/admin/editworkerprof?id=<?=$data["newData"]["work_id"]?>"><button style="background: #00BFFF" class="close-button"><i class="bx bxs-image-add icon"></i></button></a>
            </div>
            <div class="row">
                <div class="review_percent">
                    <h1 class="text-warning ">
                        <b><span id="average_rating">0.0</span> / 5</b>
                    </h1>
                    <div>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                    </div>
                    <h3><span id="total_review">0</span> Review</h3>
                </div>

                <div class="review-bar">
                    <div class="one-bar">
                        <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
                        <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar" id="five_star_progress"></div>
                        </div>
                    </div>


                    <div class="one-bar">
                        <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                        <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar" id="four_star_progress"></div>
                        </div>
                    </div>

                    <div class="one-bar">
                        <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                        <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar" id="three_star_progress"></div>
                        </div>
                    </div>
                    <div class="one-bar">
                        <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                        <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar" id="two_star_progress"></div>
                        </div>
                    </div>
                    <div class="one-bar">
                        <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                        <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar" id="one_star_progress"></div>
                        </div>
                    </div>

                    <!-- Repeat the structure for other star ratings -->


                </div>
            </div>

            <div class="picture">
                <img class="image1" src="<?= ROOT ?>/assets/images/worker/certifiImages/<?php echo $data['newData']['certificate_image'] ?>" onclick="openModal(this.src)" alt="placeholder" id="workergs_image_placeholder">
            </div>
            <div class="ctag">
                View GS Certificate
            </div>

            <!--            <button onclick="openRequest()" class="close-button">Request Worker</button>-->

        </div>


        <div class="pro_container-right">
            <h3>USER ID: <?= $data["newData"]["emp_id"]?></h3>
            <?php if ($data["newData"]["email_verified"]) :?>
                <h3 style="color: #1eea07">
                    Email Verified <i class='bx bxs-flag-alt'></i>
                </h3>
            <?php else:?>
                <h3 style="color: red">
                    Email Not Verified <i class='bx bxs-flag-alt'></i>
                </h3>
            <?php endif;?>

            <div class="tags">
                <h2 class="info">Worker Information</h2>
            </div>

            <h3>
                Full Name
            </h3>
            <input type="hidden" id="worker_id" name="id" value="<?php echo $data['newData']['work_id'] ?>">
            <input type="text" name="fullname" value="<?php echo $data['newData']['name'] ?>" placeholder="Empty Full Name" class="edit-gen" readonly>
            <h3>
                NIC
            </h3>
            <input type="text" name="fullname" value="<?php echo $data['newData']['nic'] ?>" placeholder="Empty Full Name" class="edit-gen" readonly>

            <h3>
                Gender
            </h3>
            <input type="text" name="city" value="<?php echo $data['newData']['gender'] ?> " class="edit-gen" readonly>
            <h3>
                City
            </h3>
            <input type="text" name="city" value="<?php echo $data['newData']['city'] ?> " class="edit-gen" readonly>
            <h3>
                Username
            </h3>
            <input type="text" name="city" value="<?php echo $data['newData']['email'] ?> " class="edit-gen" readonly>
<!--            <h3>-->
<!--                UserID-->
<!--            </h3>-->
<!--            <input type="text" name="city" value="--><?php //echo $data['newData']['emp_id'] ?><!-- " class="edit-gen" readonly>-->
            <h3>
                WorkerID
            </h3>
            <input type="text" name="city" value="<?php echo $data['newData']['work_id'] ?> " class="edit-gen" readonly>
            <h3>
                Category
            </h3>
            <input type="text" name="profession" value='<?php echo $data['newData']['category'] ?>' class="edit-gen" readonly>
            <h3>
                Address
            </h3>
            <input type="text" name="address" value="<?php echo $data['newData']['address'] ?>" class="edit-gen" readonly>
            <h3>
                Date of Birth
            </h3>
            <input type="text" name="birthday" value='<?php echo $data['newData']['dob'] ?>' class="edit-gen" readonly>

            <h3>
                Skills
            </h3>
            <input type="text" name="skills" value="<?php echo $data['newData']['skills'] ?>" class="edit-gen-skill" readonly>
            <h3>
                Expierience
            </h3>
            <input type="text" name="expierience" value="<?php echo $data['newData']['experience'] ?>" class="edit-gen-skill" readonly>

            <h3>
                Registered
            </h3>
            <input type="text" name="birthday" value='<?php echo $data['newData']['created'] ?>' class="edit-gen" readonly>

        </div>
        <!--        <div class="icon">-->
        <!--            <a href="--><?php //= ROOT ?><!--/employer/services"><i class='bx bxs-x-circle'></i></a>-->
        <!--        </div>-->
    </div>

    <?php

    }
    }
    ?>
    <!--    <div class="popup-view">-->
    <!--        <form method="POST">-->
    <!--            <h2>Send Job Request</h2>-->
    <!--            <h4>Job Title : </h4>-->
    <!--            <input name="title" type="text" placeholder="Enter Tiltle of the Job">-->
    <!--            <h4>Budget : </h4>-->
    <!--            <input name="budget" type="text" placeholder="Enter your Budget">-->
    <!--            <h4>Location : </h4>-->
    <!--            <input name="city" type="text" placeholder="Select Location">-->
    <!--            <h4>Description : </h4>-->
    <!--            <input name="description" type="text" placeholder="Enter your problem">-->
    <!--            <div class="btns">-->
    <!--                <button type="button" class="cancelR-btn" onclick="closeRequest()">Cancel</button>-->
    <!--                <button name="reqWorker" type="submit" value="POST" class="close-btn" onclick="closeRequest()">Submit </button>-->
    <!--            </div>-->
    <!--        </form>-->
    <!--    </div>-->
    <div id="overlay2" class="overlay"></div>

    <div id="myModal" class="modal">
        <img class="modal-content" id="modalImage">
    </div>


    <div class="popup" id="deleteConfirmationPopup">
        <img src="<?=ROOT?>/assets/images/logoe.png" alt="Close" >
        <p>Are you sure you want to Delete?</p>
        <form id="deleteForm" method="post">
            <button type="submit" class="yes-button">Yes</button>
            <button type="button" class="no-button" onclick="hideConfirmationPopup()">No</button>
        </form>
    </div>
</body>
<!--<script src="--><?php //= ROOT ?><!--/assets/js/employer/requestjob.js"></script>-->

<script>
    const images = document.querySelectorAll('.image1');
    const modalImage = document.getElementById('modalImage');

    function openModal(src) {
        modalImage.src = src;
        document.getElementById('myModal').style.display = 'flex';

    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';

    }
    window.onclick = function(event) {
        if (event.target == document.getElementById('myModal')) {
            closeModal();
        }
    };

    function showConfirmationPopup(id) {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'block';
        // Set the action URL for the form
        const form = document.getElementById('deleteForm');
        form.action = `<?= ROOT ?>/admin/workerprof?id=${id}`;

        console.log(form.action)
    }

    function hideConfirmationPopup() {
        const popup = document.getElementById('deleteConfirmationPopup');
        popup.style.display = 'none';
    }

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".rating-bar").each(function() {
            var rating = $(this).data("rating");
            var progressBar = $(this).find(".progress-bar");
            var totalReview = $(this).find(".total-review");

            $(this).on("click", function() {
                var userRating = rating;

                // Update the total reviews and progress bar
                var currentReviews = parseInt(totalReview.text());
                totalReview.text(currentReviews + 1);

                var newWidth = (currentReviews + 1) * (100 / userRating) + "%";
                progressBar.width(newWidth);
            });
        });
    });

    load_rating_data();

    function load_rating_data() {
        var id = $('#worker_id').val();
        console.log(id);
        $.ajax({
            url: "<?= ROOT ?>/admin/fetchworkerratingsreviews",
            method: "POST",
            data: {
                id: id,

            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function() {
                    count_star++;
                    if (Math.ceil(data.average_rating) >= count_star) {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                if (data.review_data.length > 0) {
                    var html = '';

                    for (var count = 0; count < data.review_data.length; count++) {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                        html += '<div class="card-body">';

                        for (var star = 1; star <= 5; star++) {
                            var class_name = '';

                            if (data.review_data[count].rating >= star) {
                                class_name = 'text-warning';
                            } else {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }
</script>

</html>