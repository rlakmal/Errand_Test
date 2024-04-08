<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .review_btn:hover {
            background: #2a3441;
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
                            <td><button onclick="markAsCompleted(<?php echo $item->id ?>)" class="<?php if ($item->review_status == "Mark As Completed") {
                                                                                                        echo "review_btn";
                                                                                                    } else {
                                                                                                        echo "after_review";
                                                                                                    }
                                                                                                    ?>"><?php echo $item->review_status ?></button></td>
                        </tr>

                    </tbody>



            <?php
                }
            }

            ?>
        </table>

    </section>
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
</body>

</html>