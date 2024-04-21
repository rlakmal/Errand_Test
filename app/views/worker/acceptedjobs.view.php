<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>

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

        .before_pay {
            background: #f16a2d;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            cursor: pointer;
            width: 70%;

        }

        .after_pay {
            background-color: #423d4e;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            width: 70%;

        }

        .before_pay:hover {
            background: #2a3441;
        }

        .scrollable-table {
            overflow: auto;
            max-height: 700px;
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workersidebar.php' ?>
    <section id="main" class="main">
        <h2>Accepted Job Requests</h2>
        <div class="scrollable-table">
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
                if (isset($data['data']) && is_array($data['data']) && count($data['data']) > 0) {
                    for ($i = 0; $i < count($data['data']); $i++) {
                        $item = $data['data'][$i];
                        $image = $images['images'][$i];
                        $no++;
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $item->emp_name ?></td>
                                <td><?php echo $item->title ?></td>
                                <td>Rs <?php echo $item->budget ?> /= per day</td>
                                <td><button class="">Accepted</button></td>
                            </tr>

                        </tbody>

                <?php
                    }
                }

                ?>
            </table>
        </div>
    </section>


    <!-- <?php
            if (isset($data['data']) && is_array($data['data']) && count($data['data']) > 0) {
                for ($i = 0; $i < count($data['data']); $i++) {
                    $item = $data['data'][$i];
                    $image = $images['images'][$i];
            ?>

            <div class="post-container2">
                <div class="profile-container2">
                    <div class="picture">
                        <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $image ?>" alt="placeholder">
                    </div>
                    <div class="index">
                        <div class="profile-name"><?php echo $item->emp_name ?></div>
                        <div class="profile-ratings"><?php echo $item->created ?></div>
                        <div class="profile-type"><?php echo $item->title ?></div>
                        <div class="budget"><?php echo $item->budget ?> /= per day</div>
                        <div class="location"><?php echo $item->city ?></div>
                    </div>
                    <a><button class="view-profile-button" id="request-button">Pending Payment</button></a>
                </div>
            </div>

    <?php
                }
            }
    ?> -->
</body>

</html>