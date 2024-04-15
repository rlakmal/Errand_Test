<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Review Requests</title>
    <style>
        table {
            margin: 3%;
            margin-left: 3%;
            width: 94%;
            border: 3px solid #bbbbbb;
            border-radius: 6px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .my_table {
            left: 10%;

        }

        .t_head {
            height: 73px;
            border: 1px solid black;
        }

        .th_one {
            border: 23px;
        }

        .review_btn {
            background: #f16a2d;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            cursor: pointer;
            width: 70%;

        }

        .after_reiew {
            background: #9b3001;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            width: 70%;

        }

        .review_btn:hover {
            background: #2a3441;
        }



        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #review_modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .rating-modal-content {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            margin: 12% 0% 0% 40%;

        }

        .rating-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .modal-title {
            margin: 0;
            font-size: 18px;
        }

        .close {
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        /* Your existing styles for stars, form elements, and button */
        .submit_star {
            font-size: 24px;
            color: #ffd700;
            cursor: pointer;
        }

        .rating-form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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
        }

        .review_percent {
            display: flex;
            flex-direction: column;
            margin: 20px;
        }

        .review-bar {
            display: flex;
            flex-direction: column;
            width: 35%;
            margin: 33px;

        }

        .one-bar {
            margin: 2%;
        }
    </style>
</head>

<body>
<?php include 'employernav2.php' ?>
<?php include 'myjobsidebar.php' ?>
<section id="main" class="main">
    <h2>Review your Jobs</h2>
    <table class="my_table">
        <thead>
        <tr class="t_head">
            <th>No</th>
            <th class="th_one">Worker Name</th>
            <th>JOb Title</th>
            <th>Work Budget</th>
            <th>Status</th>
        </tr>
        </thead>

        <?php
        $no = 0;
        if (is_array($data)) {
            foreach ($data as $item) {
                $no++;

                ?>


                <tbody>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $item->worker_name ?></td>
                    <td><?php echo $item->title ?></td>
                    <td>Rs <?php echo $item->budget ?>.00</td>
                    <?php if ($item->review_status == "Mark As Completed") {
                        ?>
                        <td><button onclick="markAsCompleted(<?php echo $item->id ?>)" class="<?php if ($item->review_status == "Mark As Completed") {
                                echo "review_btn";
                            }
                            ?>"><?php echo $item->review_status ?></button></td>
                        <?php
                    } else {
                    ?>
                    <td><button type="button" name="add_review" id="add_review" class="btn-primary" onclick="openModal(<?php echo $item->worker_id ?>)">Review</button>

                        <?php
                        }
                        ?>
                </tr>


                </tbody>



                <?php
            }
        }

        ?>
    </table>

    <div id="review_modal">
        <div class="rating-modal-content">
            <div class="rating-modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="rating-form-group">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                </div>
                <div class="rating-form-group">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class=" text-center mt-4">
                    <button type="button" class="btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>


</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
    function markAsCompleted(id) {

        var confirmAction = confirm("Are you sure you want to mark this job as completed?");
        console.log(id);
        if (confirmAction) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    alert(xhttp.responseText);
                    location.reload();
                }
            };
            xhttp.open("GET", "<?= ROOT ?>/employer/markascompleted?id=" + id, true);
            xhttp.send();
        }



    }
</script>

<script>
    function openModal(worker_id) {
        document.getElementById('review_modal').style.display = 'block';
        $('#save_review').data('worker_id', worker_id);
    }


    function closeModal() {
        document.getElementById('review_modal').style.display = 'none';
    }

    var rating_data = 0;

    $(document).on('mouseenter', '.submit_star', function() {

        var rating = $(this).data('rating');
        console.log(rating);

        reset_background();

        for (var count = 1; count <= rating; count++) {
            $('#submit_star_' + count).removeClass('star-light').addClass('text-warning');
        }

    });

    // when mouse leave remove colors
    $(document).on('mouseleave', '.submit_star', function() {
        reset_background();
        for (var count = 1; count <= rating_data; count++) {
            $('#submit_star_' + count).removeClass('star-light').addClass('text-warning');
        }
    });

    // click on the star then store the rating
    $(document).on('click', '.submit_star', function() {
        rating_data = $(this).data('rating');
        console.log(rating_data);
    });

    // function to reset background
    function reset_background() {
        for (var count = 1; count <= 5; count++) {
            $('#submit_star_' + count).addClass('star-light').removeClass('text-warning');
        }
    }

    $('#save_review').click(function() {
        var worker_id = $(this).data('worker_id');
        var user_name = $('#user_name').val();
        var user_review = $('#user_review').val();
        console.log(user_name);
        console.log(user_review);
        console.log(worker_id);

        if (user_name == '' || user_review == '') {
            alert("Please Fill Both Fields");
            return false;
        } else {
            $.ajax({
                url: "<?= ROOT ?>/employer/ratingsreviews",
                method: "POST",
                data: {
                    worker_id: worker_id,
                    rating_data: rating_data,
                    user_name: user_name,
                    user_review: user_review
                },
                success: function(data) {
                    closeModal();
                    // load_rating_data();
                    console.log(data);
                    alert(data);
                }
            });
        }
    });
</script>
</body>

</html>