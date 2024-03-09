<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

        }

        .before_pay:hover {
            background: #2a3441;
        }
    </style>
</head>

<body>
<?php include 'employernav2.php' ?>
<?php include 'myjobsidebar.php' ?>
<section id="main" class="main">
    <h2>Accepted Request to Your Jobs</h2>
    <table class="my_table">
        <thead>
        <tr class="t_head">
            <th>No</th>
            <th class="th_one">Worker Name</th>
            <th>JOb Title</th>
            <th>Budget</th>
            <th>Payment Status</th>
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
                    <td><?php echo $item->budget ?></td>
                    <td><button class="<?php if ($item->payment_stat == "Make Payment") {
                            echo "before_pay";
                        } else {
                            echo "after_pay";
                        }
                        ?>"><?php echo $item->payment_stat ?></button></td>
                </tr>
                <!-- Add more rows if needed -->
                </tbody>



                <?php
            }
        }

        ?>
    </table>



</section>
</body>

</html>