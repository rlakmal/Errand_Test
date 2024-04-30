<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/crewmember/tickets.css">
    <title>Tickets</title>
    <style>
        /*body{*/
        /*    display: flex;*/
        /*    flex-direction: column;*/
        /*}*/
        .archived {
            color: red;
        }

        .not-archived {
            color: green;
        }

        /* Additional styles */
        .search-container {
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Added for vertical alignment */
        }

        .search-input {
            width: 50%;
            padding: 10px 30px 10px 10px;
            /* Adjusted padding to accommodate icon */
            border: 1px solid #ccc;
            border-radius: 20px;
            /* Adjusted border-radius for a rounded search bar */
            font-size: 16px;
            outline: none;
            background-image: url('search-icon.png');
            /* Add your search icon image here */
            background-size: 20px;
            /* Adjusted size of the search icon */
            background-repeat: no-repeat;
            background-position: calc(100% - 10px) center;
            /* Adjusted position of the search icon */
        }

        /* Button Styles */
        .filter-button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .filter-button:hover {
            opacity: 0.8;
        }

        .filter-button.archived {
            background-color: red;
            color: white;
        }

        .filter-button.unarchived {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>

    <?php include 'sidebar.php' ?>
    <?php include 'navigationbar.php' ?>

    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

    <div style="margin-top: -2%; position: relative; flex-direction: column">

        <div style="position: fixed; width: 100%; height: fit-content">
            <h2 style="margin-top: 55px; text-align: center;">Tickets</h2>

            <!-- Search Bar -->
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder="Search ID or Title">
            </div>

            <!-- Add Filter Buttons -->
            <div style="text-align: center; margin-bottom: 60px; ">
                <button class="filter-button archived" onclick="filterItems(true)">Show Archived</button>
                <button class="filter-button unarchived" onclick="filterItems(false)">Show Unarchived</button>
            </div>
        </div>
        <!-- Title -->


        <div class="set-margin" id="set-marginid" style="position: fixed; height: 60%; margin-top: 230px; justify-content: center; overflow-y: scroll; width: 100%">
            <?php
            if (is_array($data)) {
                foreach ($data as $item) {
            ?>
                    <div class="post-container" style="padding-bottom: 5px">
                        <div class="profile-container2" style="padding-bottom: 5px; justify-content: flex-start">
                            <div>
                                <div class="profile-name"><?php echo $item->title ?></div>
                                <div class="profile-ratings"><?php echo $item->created ?></div>
                                <div class="profile-type"><?php echo $item->description ?></div>
                                <div class="budget <?php echo $item->archived ? 'archived' : 'not-archived' ?>">
                                    <?php echo $item->archived ? 'Archived' : 'Not Archived' ?>
                                </div>
                                <div class="location"> User ID:
                                    <?php echo $item->user ?> <?php echo $item->status ?>
                                    <i class="bx bxs-map icon"></i>
                                </div><br>
                                <div class="location"> Ticket ID:
                                    <?php echo $item->ticket_id ?>
                                    <i class="bx bxs-map icon"></i>
                                </div>
                            </div>
                            <a href="<?= ROOT ?>/member/ticket?id=<?= $item->ticket_id ?>"><button class="view-profile-button" style="padding-bottom: 5px" id="request-button">View</button></a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <script>
        var filterState = {
            archived: false,
            unarchived: false
        };

        function filterItems(archived) {
            var posts = document.querySelectorAll('.post-container');

            if (archived) {
                filterState.archived = !filterState.archived;
            } else {
                filterState.unarchived = !filterState.unarchived;
            }

            posts.forEach(function(post) {
                var isArchived = post.querySelector('.budget').textContent.trim() === 'Archived';
                var display = 'block';

                if ((filterState.archived && !isArchived) || (filterState.unarchived && isArchived)) {
                    display = 'none';
                }

                post.style.display = display;
            });
        }

        // Add event listener to search input
        document.getElementById("searchInput").addEventListener("input", function() {
            var searchTerm = this.value.toLowerCase(); // Convert input to lowercase for case-insensitive search
            var posts = document.querySelectorAll('.post-container');

            posts.forEach(function(post) {
                var title = post.querySelector('.profile-name').textContent.toLowerCase();
                var ticketID = post.querySelector('.location').textContent.toLowerCase().replace('ticket id:', '').trim();

                // Check if title contains the search term or if ticket ID matches the search term
                if (title.includes(searchTerm) || ticketID.includes(searchTerm)) {
                    post.style.display = 'block';
                } else {
                    post.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>