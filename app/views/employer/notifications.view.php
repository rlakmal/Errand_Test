<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/emphome.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobPost.css">
    <style>
        /* Add your new CSS styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .set-margin {
            padding: 20px;
        }

        .post-container {
            display: flex;
            margin-bottom: 20px;

        }

        .profile-container2 {
            flex: 1;
            display: flex;
            align-items: center;
            background-color: #ffffff;
            max-width: 70%;
            box-shadow: 0 2px 5px 1px rgba(64, 60, 67, 0.16);
            height: 150px;
            border-radius: 20px;

        }

        .picture img {
            max-width: 100%;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .index {
            flex: 1;
            padding-left: 20px;
        }

        .profile-name {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .profile-type {
            margin-top: 5px;
            font-size: 16px;
            color: #555;
        }

        .budget {
            margin-top: 5px;
            font-size: 16px;
            color: #777;
        }

        .location {
            margin-top: 5px;
            font-size: 16px;
            color: #777;
            display: flex;
            align-items: center;
        }

        .location i {
            margin-right: 5px;
            color: #3498db;
        }

        .view-profile-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .view-profile-button:hover {
            color: #297fb8;
        }

        .newicons i {
            color: #3498db;
            /* Default color */
        }

        .newicons.clicked i {
            color: #f4f4f4
        }
    </style>

    </style>
    <title>Document</title>
</head>

<body>

    <?php include 'employernav.php' ?>
    <?php include 'empfilter.php' ?>

    <div class="set-margin" id="set-marginid">
        <div>
            <h2 style="text-align: center">Notifications</h2>
        </div>
        <div style="position: relative;">
            <input type="text" id="searchInput" placeholder="Search..." style="width: 15%; background-color: lightgray; border-radius: 20px; margin-left: 30%; margin-top: 40px; padding-left: 40px;">
            <i class="bx bx-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #777;"></i>
        </div>
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {
        ?>
                <div style="border-radius: 20px" class="post-container">
                    <div class="profile-container2">
                        <div class="index" data-post-id="<?php echo $item->n_id ?>">
                            <div class="profile-name" style="margin-top: 40px"><?php echo $item->notification_name ?></div>
                            <div class=".profile-type"><?php echo $item->message ?></div>
                        </div>
                        <div class="<?php if ($item->active == 1) {
                                        echo 'newicons';
                                    } else {
                                        echo 'newicons clicked';
                                    } ?>">
                            <div><i class='bx bxs-circle'></i></div>

                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        <?php
        if (is_array($results)) {
            foreach ($results as $item) {
        ?>
                <div style="border-radius: 20px" class="post-container">
                    <div class="profile-container2">
                        <div class="index">
                            <div class="profile-name" style="margin-top: 40px">System</div>
                            <div class=".profile-type">Posted: <?php echo $item->body ?></div>
                            <!-- <a href="#" class="view-profile-button" style="border-radius: 20px; background-color: indigo">Admin</a> -->
                        </div>
                        <div class="bottom_index">
                            <div></div>

                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.post-container').click(function() {
                var postId = $(this).find('.index').data('post-id');
                console.log('Post ID:', postId);
                $.ajax({
                    url: "<?= ROOT ?>/employer/notifyupdate",
                    method: 'POST',
                    data: {
                        n_id: postId
                    },
                    success: function(response) {
                        // Add the 'clicked' class to change icon color
                        $('.newicons').addClass('clicked');
                        // Reload the page
                        location.reload();
                        // Handle success response if needed
                        console.log('Notification read successfully');
                    },
                    error: function(xhr, status, error) {
                        // Handle error response if needed
                        console.error('Error deactivating post:', error);
                    }
                });
            });
        });
    </script>

    <script>
        const searchInput = document.getElementById('searchInput');
        const posts = document.querySelectorAll('.post-container');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            posts.forEach(post => {
                const title = post.querySelector('.profile-name').textContent.toLowerCase();
                const description = post.querySelector('.profile-type').textContent.toLowerCase();
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    post.style.display = 'flex';
                } else {
                    post.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>