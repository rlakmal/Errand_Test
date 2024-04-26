<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobpopup.css">

    <style>
        .homenavbar {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
        }

        .profile-container3 {
            top: 75px;
            left: 10%;
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

        .review-container {
            display: flex;
            margin-top: 1%;
            position: relative;
            padding: 15px;
            background-color: #ffffff;
            width: 75%;
            height: 50%;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            flex-direction: column;
            top: 75px;
            left: 10%;
        }

        .review_info {
            border: 1px solid #e8e8e8;
            margin: 15px;
            margin-left: 115px;
            padding: 10px;
        }

        #map {
            height: 300px;
            width: 85%;
            margin-left: 6%;
        }

        @media only screen and (max-width: 600px) {
            .review-container {
                height: 80%;
                display: flex;
                width: 94%;
                margin-left: 0;
                flex-direction: column;
                left: 10%;
            }
        }
    </style>
</head>

<body>
    <?php include 'employernav2.php' ?>
    <?php include 'empfilter.php' ?>

    <div class="main-container4">
        <?php
        if (is_array($data)) {
            //show($data);
            foreach ($data as $item) {

        ?>
                <div class="profile-container3">

                    <!-- <a><button class="close-button">Edit profile</button></a> -->

                    <div class="container-left">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $item->profile_image ?>" alt="placeholder" id="workerprofile_image_placeholder">
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
                            <img class="image1" src="<?= ROOT ?>/assets/images/worker/certifiImages/<?php echo $item->certificate_image ?>" onclick="openModal(this.src)" alt="placeholder" id="workergs_image_placeholder">
                        </div>
                        <div class="ctag">
                            View GS Certificate
                        </div>

                        <button onclick="openRequest()" class="close-button">Request Worker</button>

                    </div>


                    <div class="pro_container-right">


                        <div class="tags">
                            <h2 class="info">Personal Information</h2>
                        </div>

                        <h3>
                            Full Name
                        </h3>
                        <input type="hidden" id="worker_id" name="id" value="<?php echo $item->id ?>">
                        <input type="text" name="fullname" value="<?php echo $item->name ?>" placeholder="Empty Full Name" class="edit-gen" readonly>
                        <h3>
                            City
                        </h3>
                        <input type="text" name="city" value="<?php echo $item->city ?> " class="edit-gen" readonly>
                        <h3>
                            Profession
                        </h3>
                        <input type="text" name="profession" value='<?php echo $item->category ?>' class="edit-gen" readonly>
                        <h3>
                            Address
                        </h3>
                        <input type="text" name="address" value="<?php echo $item->address ?>" class="edit-gen" readonly>
                        <h3>
                            Date of Birth
                        </h3>
                        <input type="text" name="birthday" value='<?php echo $item->dob ?>' class="edit-gen" readonly>

                        <h3>
                            Skills
                        </h3>
                        <input type="text" name="skills" value="<?php echo $item->skills ?>" class="edit-gen-skill" readonly>
                        <h3>
                            Expierience
                        </h3>
                        <input type="text" name="expierience" value="<?php echo $item->expierience ?>" class="edit-gen-skill" readonly>

                    </div>
                    <div class="icon">
                        <a href="<?= ROOT ?>/employer/services"><i class='bx bxs-x-circle'></i></a>
                    </div>
                </div>

        <?php

            }
        }
        ?>

        <div class="review-container">
            <div class="tags">
                <h2 class="info">Reviews</h2>
            </div>
            <?php
            if (is_array($results)) {
                foreach ($results as $item) {
            ?>
                    <div class="review_info">
                        <h2><?php echo $item->user_name ?></h2>
                        <div class="review_star">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                if ($item->rating_data >= $i) {
                            ?>
                                    <i class="fas fa-star text-warning"></i>
                                <?php
                                } else {
                                ?>
                                    <i class="fas fa-star star-light"></i>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <p><?php echo $item->user_review ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="popup-view">
            <form method="POST" enctype="multipart/form-data">
                <h2>Send Job Request</h2>
                <h4>Job Title : </h4>
                <input name="title" type="text" placeholder="Enter Tiltle of the Job">
                <h4>Budget : </h4>
                <input name="budget" type="text" placeholder="Enter your Budget">
                <h4>City : </h4>
                <input name="city" type="text" placeholder="Select Location">
                <h4>Select Your Location : </h4>
                <div id="map"></div>
                <input type="hidden" id="location" name="location">
                <h4>Description : </h4>
                <input name="description" type="text" placeholder="Enter your problem">
                <div class="postjobimages">
                    <div class="form-drag-area">

                        <div class="form-upload">
                            <input type="file" id="job_image" style="display: none;" name="job_image">
                            <div class="jobpicture">
                                <img class="jobimage" src="<?= ROOT ?>/assets/images/jobimages/job.png" alt="placeholder" id="job_image_placeholder">
                            </div>
                            Choose Image
                        </div>
                    </div>
                    <div class="form-drag-area1">
                        <div class="jobpicture">

                        </div>
                        <div class="form-upload1">
                            <input type="file" id="job_image1" style="display: none;" name="job_image1">
                            <img class="jobimage" src="<?= ROOT ?>/assets/images/jobimages/job.png" alt="placeholder" id="job_image1_placeholder">
                        </div>
                    </div>
                </div>
                <div class="btns">
                    <button type="button" class="cancelR-btn" onclick="cancelRequest()">Cancel</button>
                    <button name="reqWorker" type="submit" value="POST" class="close-btn" onclick="closeRequest()">Submit </button>
                </div>
            </form>
        </div>
        <div id="overlay2" class="overlay"></div>

        <div id="myModal" class="modal">
            <img class="modal-content" id="modalImage">
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/js/employer/jobimageUpload.js"></script>
    <script src="<?= ROOT ?>/assets/js/employer/requestjob.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GOvTVdWC3aNfI8Jg4gOkyk74hiOB0RE&libraries=places&callback=initMap"></script>

    <script>
        let map, marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 6.871802506297455,
                    lng: 79.9266435985261
                },
                zoom: 7.8
            });

            marker = new google.maps.Marker({
                position: {
                    lat: 6.871802506297455,
                    lng: 79.9266435985261
                },
                map: map,
                draggable: true
            });

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });
        }

        function placeMarker(location) {
            marker.setPosition(location);
            document.getElementById("location").value = `${location.lat()}, ${location.lng()}`;
        }

        function openReport() {
            document.getElementById("map").style.display = "block";
            initMap();
        }

        function closeReport() {
            document.getElementById("map").style.display = "none";
        }

        google.maps.event.addDomListener(window, "load", initMap);
    </script>
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
                url: "<?= ROOT ?>/employer/fetchworkerratingsreviews",
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
</body>



</html>