 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/requestjob.css">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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

         .text-warning {
             color: #ffc107;
         }

         .star-light {
             color: #afb3b6;
         }

         .review_percent {
             display: flex;
             flex-direction: column;
             margin: 20px;
             align-items: center;
             line-height: 2;
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
                         <h2 class="emp-name">
                             <?php echo $item->name  ?>
                         </h2>


                         <!-- <img class="rates" src="<?= ROOT ?>/assets/images/worker/rates.png" alt=""> -->
                         <div class="review_percent">


                             <h1 class="text-warning ">
                                 <b><span id="average_rating">0.0</span> / 5</b>
                             </h1>
                             <div>
                                 <i class="fas fa-star star-light main_star"></i>
                                 <i class="fas fa-star star-light main_star"></i>
                                 <i class="fas fa-star star-light main_star"></i>
                                 <i class="fas fa-star star-light main_star"></i>
                                 <i class="fas fa-star star-light main_star"></i>
                             </div>
                             <h3><span id="total_review">0</span> Review</h3>
                         </div>


                     </div>

                     <div class="container-right">
                         <div type="text" name="fullname" value="" class="title-line" readonly><?php echo $item->title  ?></div>
                         <h3>
                             Location
                         </h3>
                         <input type="hidden" id="emp_id" name="id" value="<?php echo $item->emp_id ?>">
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
     <!-- <script src="<?= ROOT ?>/assets/js/jquery-3.7.1.min.js"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <script>
         load_rating_data();

         function load_rating_data() {
             var id = $('#emp_id').val();
             console.log(id);
             $.ajax({
                 url: "<?= ROOT ?>/employer/fetchrating",
                 method: "POST",
                 data: {
                     id: id,

                 },
                 dataType: "JSON",
                 success: function(data) {
                     console.log(data.average_rating);
                     $('#average_rating').text(data.average_rating);
                     $('#total_review').text(data.total_review);

                     var count_star = 0;

                     $('.main_star').each(function() {
                         count_star++;
                         if (Math.ceil(data.average_rating) >= count_star) {
                             $(this).addClass('text-warning');
                             $(this).removeClass('star-light');
                         }
                     });
                     console.log(count_star);
                     console.log(Math.ceil(data.average_rating));
                 }
             })
         }
     </script>

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