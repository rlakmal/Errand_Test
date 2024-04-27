<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerprof.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/style-bar.css">
<!--    <link rel="stylesheet" href="--><?php //= ROOT ?><!--/assets/css/admin/dashboard.css">-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</head>

<body>
<?php include 'sidebar.php' ?>

<?php include 'navigationbar.php' ?>
<script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

<style>
    body {
        font-family: "Arial", sans-serif;
        background-color: white;
    }

    .main-container4 {
        display: flex;
        border-radius: 40px;
        margin: 10%;
        margin-top: 2%;
        width: 80%;
        height: fit-content;
        background: #f4f4f4;
        flex-direction: column;
        align-content: center;
        justify-content: center;

    }

    .profile-container3 {
        display: flex;
        margin: 1%;
        position: relative;
        padding: 15px;
        background-color: #f4f4f4;
        width: 98%;
        height: fit-content;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
        border-radius: 20px;
    }

    .pro_container-right {
        position: relative;
        display: flex;
        width: 175%;
        /*line-height: 28px;*/
        flex-direction: column;
        height: fit-content;
        left: 0%;
        justify-content: center;
        background: white;
        padding: 35px;
        border: 1px solid #d8d0d0;
        border-radius: 20px;
    }

    .info {
        margin: 10px;
        display: flex;
        margin-left: -7%;
        color: #4d5151;
        /* margin-right: 3%; */
        justify-content: center;
    }

    .pro_container-right input {
        width: 90%;
        padding: 10px;
        font-size: 16px;
        border: none;
        outline: none;
        margin-left: 5%;
        border-radius: 20px;
        background: lightgray;
    }

    .picture .image {
        width: 165px;
        border-radius: 50%;
        height: 160px;
    }

    .picture .rates {
        max-width: 400px;
    }

    .container-left {
        display: flex;
        position: relative;
        width: 90%;
        flex-wrap: nowrap;
        flex-direction: column;
        justify-content: center;
        /* align-content: center; */
        align-items: center;
        background: #f4f4f4;
        border-radius: 28px;
    }

    .edit-gen {
        width: 75%;
        font-size: 16px;
        font-weight: 300;
        color: #3e3e3e;
        font-family: "Lato", sans-serif;
        margin: 10px 0;
        border: 2px solid #e7e7e7;
        padding: 10px;
    }

    .view-profile-button {
        float: right;
        background-color: #ff7f00;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        display: block;
        text-align: center;
        margin-top: -40px;
    }

    .close-button {
        font-size: 25px;
        background: orange;
        border: none;
        cursor: pointer;
        color: white;
        height: 40px;
        width: 100px;
        border-radius: 15px;
    }

    .tags {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        margin: 25px;
    }

    .tags i {
        font-size: 28px;
        color: #ff7f00;
    }

    .progress-label-left {
        float: left;
        margin-right: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }

    .text-warning {
        color: #ffc107;

    }

    .star-light {
        color: #e9ecef;
    }

    .progress {
        height: 20px;
        background-color: #e9ecef;
        border-radius: 5px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        width: 0;
        background-color: #ffc107;
        /* Set your desired progress bar color */
        text-align: center;
        line-height: 20px;
        color: #000;
        /* Set your desired text color */
        font-weight: bold;
        transition: width 0.3s ease-in-out;
    }

    .row {
        display: flex;
        width: 100%;
        flex-direction: column;
        align-items: center;
    }

    .review_percent {
        display: flex;
        flex-direction: column;
        margin: 20px;
    }

    .review-bar {
        display: flex;
        flex-direction: column;
        width: 65%;
        margin: 33px;

    }

    .one-bar {
        margin: 2%;
    }

    .container-left-parent {
        display: flex;
        position: relative;
        width: 100%;
        flex-wrap: nowrap;
        flex-direction: column;
        justify-content: center;
        /* align-content: center; */
        align-items: center;
        background: #ffece2;
        border-radius: 28px;
        box-shadow: 2px 2px 2px 2px rgb(255 136 66 / 32%);
        /*height: 100%;*/
    }

    @media only screen and (max-width: 600px) {
        .main-container4 {
            height: fit-content;
            display: flex;
            margin-left: 40px;
            margin-top: 20%;
            max-width: 200%;
            justify-content: center;
            flex-direction: column;
        }

        .profile-container3 {
            height: fit-content;
            display: flex;
            width: 100%;
            margin-left: 0;
            flex-direction: column;
        }

        .close-button {
            align-items: center;
            height: 30px;
            width: 80px;
            background: orange;
        }

        .container-left {
            height: fit-content;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;

        }

        .pro_container-right {
            display: flex;
            height: fit-content;
            width: 100%;
            flex-direction: column;
            flex-wrap: nowrap;
            padding: 30px;
        }

        .index_img {
            display: flex;
        }

        .picture .rates {

            display: flex;
            margin-left: 1%;
            width: 284px;
            flex-direction: column;

        }


        .bottum_index {
            display: flex;
            justify-content: center;

        }

    }


    .popup {
        position: fixed;
        top: 40%;
        left: 40%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px; /* Increase padding for a bigger popup */
        border-radius: 20px; /* Add curved edges */
        z-index: 1000;
        display: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
        animation: popup-animation 0.5s ease forwards; /* Add animation */
        font-size: 16px;
        width: 400px;
    }

    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }

    /* Animation keyframes */
    @keyframes popup-animation {
        0% { transform: scale(0.5); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }

    .popup img {
        position: absolute;
        top: -20px;
        right: -20px;
        width: 100px; /* Adjust size of the image */
        height: 50px; /* Adjust size of the image */
        border-radius: 50%; /* Make the image round */
        border: 2px solid #fff; /* Add border for contrast */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
    }

    .archive-button {
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        font-size: 14px;
        border: none;
        margin-top: 100px;
        margin-right: 15px;
        width: 100px;
    }

    .archive-button.archive {
        background-color: #e74c3c;
        color: #fff;
    }

    .review-container {
        display: flex;
        margin: 1%;
        position: relative;
        padding: 15px;
        background-color: #ffffff;
        width: 98%;
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
        border-radius: 20px;
        flex-direction: column;
        transition: transform 0.3s;
    }

    .review-container :hover{
        transform: scale(1.02);
    }

    .review_info {
        border: 1px solid #e8e8e8;
        margin: 15px;
        margin-left: 115px;
        padding: 10px;
        border-radius: 20px;
    }

    .review_info h2 {
        font-size: 16px;
    }
    .text-warning {
        margin-top: 20px;
        color: #ffc107;
    }

    .star-light {
        margin-top: 20px;
        color: #e9ecef;
    }

</style>

<div class="main-container4">
    <div class="profile-container3">

        <div style="flex-direction: column">
            <a href="<?= ROOT ?>/admin/employers"><button style="width: 100px; cursor: pointer; background-color: orange;height: 40px; color: white; border-radius: 20px; border-color: bisque">Close</button></a>
            <div>
                <button style="width: 100px; background-color: red;height: 40px; cursor: pointer; color: white; border-radius: 20px; border-color: darkred; margin-top: 15px" id="delete-button">Delete</button>

            </div>
        </div>


        <div class="container-left">


            <div class="picture">
                <img class="image" style="margin-top: 15px" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $data['newData']['profile_image']  ?>" alt="placeholder" id="profile_image_placeholder">

            </div>
            <div class="form-upload">
                <a href="<?= ROOT ?>/admin/editemployeracc?id=<?= $data['newData']['id'] ?>"><button class="close-button"><i class="bx bxs-edit-alt icon"></i></button></a>
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
                    <h3><span id="total_review">0</span> Reviews</h3>
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

        <div class="pro_container-right">
            <h3>ID: <?= $data["newData"]["id"]?></h3>
            <?php if ($data["newData"]["verified"]) :?>
            <h3 style="color: #1eea07">
                Email Verified <i class='bx bxs-flag-alt'></i>
            </h3>
            <?php else:?>
            <h3 style="color: red">
                Email Not Verified <i class='bx bxs-flag-alt'></i>
            </h3>
            <?php endif;?>
            <div class="tags">
                <h2 class="info">Employer Details</h2>
<!--                <a href="--><?php //= ROOT ?><!--/admin/editemployeracc?id=--><?php //= $data['newData']['id'] ?><!--"><i class="bx bxs-edit-alt icon"></i></a>-->
            </div>

            <h3>
                Full Name
            </h3>
            <input type="text" name="fullname" value="<?php echo ucfirst($data['newData']['name']); ?> " placeholder="Empty Full Name" class="edit-gen" readonly>

            <h3>
                User Name
            </h3>
            <input type="text" name="fullname" value="<?php echo ucfirst($data['newData']['email']); ?> " placeholder="Empty Full Name" class="edit-gen" readonly>

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
            <h3>
                Registered
            </h3>
            <input type="text" name="birthday" value="<?php echo $data['newData']['created']; ?>" class="edit-gen" placeholder="Empty Date of Birth" readonly>
        </div>
    </div>

    <div class="review-container">
        <div class="tags">
            <h2 class="info">Reviews</h2>
        </div>
        <?php
        if (is_array($data["reviews"])) {
            foreach ($data["reviews"] as $item) {
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

<div class="popup" id="popup">
    <img src="<?=ROOT?>/assets/images/logoe.png" alt="Image" /> <!-- Add your image here -->
    <h2 style="font-size: 16px">Are you sure you want to delete?</h2>
    <div style="flex-direction: row; display: flex">
        <form method="post" action="<?= ROOT ?>/admin/employeracc?id=<?= $data['newData']['id'] ?>">
            <input  type="submit" class="archive-button archive" value="Yes" name="Delete">
        </form>
        <button style="background-color: #f16a2d; " class="archive-button archive" id="cancel-delete">No</button>
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

    load_rating_data(<?= $data['newData']['id'] ?>);

    function load_rating_data(id) {
        $.ajax({
            url: "<?= ROOT ?>/admin/fetchratingsreviews",
            method: "POST",
            data: {
                action: 'load_data',
                id: id
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
<script>
    // Function to display popup when delete button is clicked
    document.getElementById('delete-button').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'block';
        document.getElementById('popup-overlay').style.display = 'block';
    });

    // Function to close popup when cancel button is clicked
    document.getElementById('cancel-delete').addEventListener('click', function() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popup-overlay').style.display = 'none';
    });

</script>


</body>

</html>