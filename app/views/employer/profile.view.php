<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/profile.css">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</head>

<body>
<?php include 'employernav.php' ?>
<!-- <?php include 'requestpopup.php' ?> -->

<div class="main-container4">
    <div class="profile-container3">


        <div class="container-left">


            <div class="picture">
                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $data['newData']['profile_image']  ?>" alt="placeholder" id="profile_image_placeholder">

            </div>
            <div class="form-upload">
                <a href="<?= ROOT ?>/employer/editprofile"><button class="close-button"><i class="bx bxs-image-add icon"></i></button></a>
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


        </div>
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

        <div class="pro_container-right">
            <div class="tags">
                <h2 class="info">Personal Information</h2>
                <a href="<?= ROOT ?>/employer/editprofile"><i class="bx bxs-edit-alt icon"></i></a>
            </div>

            <h3>
                Full Name
            </h3>
            <input type="text" name="fullname" value="<?php echo ucfirst($data['newData']['name']); ?> " placeholder="Empty Full Name" class="edit-gen" readonly>


            <h3>
                NIC Number
            </h3>

            <input type="text" name="nic" value="<?php echo $data['newData']['nic']; ?>" placeholder="Empty NIC Number" class="edit-gen" readonly>
            <h3>
                City
            </h3>
            <input type="text" name="city" value="<?php echo ucfirst($data['newData']['city']); ?>" class="edit-gen" placeholder="Empty City" readonly>
            <h3>
                Address
            </h3>
            <input type="text" name="address" value="<?php echo $data['newData']['address']; ?>" class="edit-gen" placeholder="Empty Address" readonly>
            <h3>
                Date of Birth
            </h3>
            <input type="text" name="birthday" value="<?php echo $data['newData']['dob']; ?>" class="edit-gen" placeholder="Empty Date of Birth" readonly>
        </div>
    </div>
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

</div>

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
        $.ajax({
            url: "<?= ROOT ?>/employer/fetchratingsreviews",
            method: "POST",
            data: {
                action: 'load_data'
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