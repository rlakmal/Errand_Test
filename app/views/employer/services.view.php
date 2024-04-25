<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/services.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/emphome.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/workerPost.css">


    <title>Document</title>
</head>

<body>
    <?php include 'employernav.php' ?>
    <?php include 'empfilter2.php' ?>
    <div class="set-margin" id="set-marginid">
        <?php
        if (is_array($data)) {
            foreach ($data as $item) {


        ?>
                <div class="main-container2">
                    <div class="profile-container2">
                        <div class="picture">
                            <img class="image" src="<?= ROOT ?>/assets/images/worker/profileImages/<?php echo $item->profile_image ?>" alt="">
                        </div>
                        <div class="index">
                            <div class="profile-name"><?php echo $item->name ?></div>
                            <div class="profile-type"><?php echo $item->category ?></div>
                            <div class="profile-ratings">Ratings  <?php echo $item->avg_rating ?></div>
                            <div class="job-count">Jobs Completed: 50+</div>

                        </div>
                        <div class="bottom-index">
                            <div class="location">
                                <div class="location"><?php echo $item->city ?><i class="bx bxs-map icon"></i></div>
                            </div>
                            <div class="buton_bar">
                                <a href="<?= ROOT ?>/employer/workerprof?id=<?php echo $item->emp_id ?>"><button class="view-profile-button">View Profile</button></a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        <script>
            function searchTable() {
                var input, filter, data, items, i, txtValue, category, location;
                data = document.getElementById("set-marginid");
                items = data.getElementsByClassName("main-container2");
                category = document.getElementById("category").value.toUpperCase();
                console.log(category);
                location = document.getElementById("locationdata").value.toUpperCase();
                console.log(location);

                for (i = 0; i < items.length; i++) {
                    txtValue = items[i].textContent || items[i].innerText;
                    var categoryMatch = txtValue.toUpperCase().indexOf(category) > -1 || category === 'ALL';
                    var locationMatch = txtValue.toUpperCase().indexOf(location) > -1 || location === 'ALL';
                    console.log(categoryMatch);
                    console.log(locationMatch);

                    if (categoryMatch && locationMatch) {
                        items[i].style.display = "";
                    } else {
                        items[i].style.display = "none";
                    }
                }
            }

            function searchInput() {
                var input, filter, data, items, i, txtValue;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                data = document.getElementById("set-marginid");
                items = data.getElementsByClassName("main-container2");

                for (i = 0; i < items.length; i++) {
                    txtValue = items[i].textContent || items[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        items[i].style.display = "";
                    } else {
                        items[i].style.display = "none";
                    }
                }
            }
        </script>


</body>

</html>