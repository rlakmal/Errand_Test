<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
        table {
            margin: 2%;
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



        table.table {
            border-collapse: collapse;
            margin: 0px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            width: 100%;
            border-radius: 12px;
            padding-right: 15px;
        }

        table thead tr {
            background-color: #f4f7fc;
            color: #191919;
            text-align: justify;
            border-radius: 12px;
        }

        table th,
        table td {
            padding: 12px 30px 12px 20px;
            width: -1px;
            background-color: #e7e9ff;
        }

        table tr,
        table td {
            background: #ffffff;
        }

        table tbody tr {
            border-top: 1px solid #cdcdcd;
            height: 60px;
        }

        table tbody tr:nth-of-type(even) {
            background-color: #191919;
        }

        table tbody tr:last-of-type {
            border-top: 2px solid #bcc2ce;
        }

        table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }





        .acceptbutton {
            background-color: #393b5e;
            /* border: none; */
            border: solid 1px #393b5e;
            border-radius: 18px;
            color: #ffffff;
            font-weight: bold;
            width: 130px;
            height: 30px;
            font-weight: 300;
            cursor: pointer;
        }

        .scrollable-table {
            max-height: 600px;
            overflow-y: auto;
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
            z-index: 2;
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
            background-color: #164271;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            width: 70%;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;

        }

        .text-warning {
            color: #ffc107;

        }

        .star-light {
            color: #e9ecef;
        }


        @media (max-width: 650px) {
            td {
                display: block;
            }

            th {
                display: none;
            }

            .rating-modal-content {
                margin: 54% 0% 0% 23%;
                width: 283px;
            }
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workersidebar.php' ?>
    <section id="main" class="main">
        <h2>Accepted Job Request</h2>
        <div class="scrollable-table">
            <table class="my_table">
                <thead>
                    <tr class="t_head">
                        <th>No</th>
                        <th class="th_one">Worker Name</th>
                        <th>JOb Title</th>
                        <th>Work Budget</th>
                        <th>Charges</th>
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
                                <td><?php echo $item->emp_name ?></td>
                                <td><?php echo $item->title ?></td>
                                <td>Rs <?php echo $item->budget ?> /= per day</td>
                                <!-- <td><button class="acceptbutton">Rate Employer</button></td> -->
                                <?php if ($item->worker_review == 'Not_Rated') {

                                ?>
                                    <td><button type="button" name="add_review" id="add_review" class="btn-primary" onclick="openModal(<?php echo $item->emp_id ?>, <?php echo $item->id ?>)">Rate Employer</button>
                                    <?php } else { ?>
                                    <td>Rated</td>
                                <?php } ?>

                            </tr>

                        </tbody>

                <?php
                    }
                }

                ?>
            </table>
        </div>

    </section>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script>
        function openModal(emp_id, id) {
            document.getElementById('review_modal').style.display = 'block';
            $('#save_review').data('emp_id', emp_id);
            $('#save_review').data('id', id);
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
            var emp_id = $(this).data('emp_id');
            var id = $(this).data('id');
            var user_name = $('#user_name').val();
            var user_review = $('#user_review').val();
            console.log(user_name);
            console.log(user_review);
            console.log(emp_id);

            if (user_name == '' || user_review == '') {
                alert("Please Fill Both Fields");
                return false;
            } else {
                $.ajax({
                    url: "<?= ROOT ?>/employer/ratingsreviews",
                    method: "POST",
                    data: {
                        emp_id: emp_id,
                        id: id,
                        rating_data: rating_data,
                        user_name: user_name,
                        user_review: user_review
                    },
                    success: function(data) {
                        closeModal();
                        console.log(data);
                        alert(data);
                        location.reload();
                    }
                });
            }
        });
    </script>
</body>

</html>