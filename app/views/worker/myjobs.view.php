<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobpopup.css"> -->
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
            background-color: #4fbb07;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            width: 70%;

        }

        .before_pay:hover {
            background: #2a3441;
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

        .pendingbutton {
            background-color: rgb(255 116 32);
            /* border: none; */
            border: solid 1px #eb7431;
            border-radius: 18px;
            color: #ffffff;
            width: 100px;
            height: 30px;
            font-weight: 300;
        }

        .rejectbutton {
            background-color: rgb(255 61 61);
            border: solid 1px #fe6161;
            border-radius: 18px;
            color: #ffffff;
            width: 100px;
            height: 30px;
            font-weight: 300;
        }

        .acceptbutton {
            background-color: #393b5e;
            /* border: none; */
            border: solid 1px #393b5e;
            border-radius: 18px;
            color: #ffffff;
            font-weight: bold;
            width: 100px;
            height: 30px;
            font-weight: 300;
        }

        .table-container {
            max-height: 600px;
            overflow-y: auto;
        }

        @media (max-width: 650px) {
            td {
                display: block;
            }

            th {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php include 'workernav.php' ?>
    <?php include 'workersidebar.php' ?>
    <section id="main" class="main">
        <h2>Your Request to Jobs</h2>
        <div class="table-container">
            <table class="my_table">
                <thead>
                    <tr class="t_head">
                        <th>No</th>
                        <th class="th_one">Worker Name</th>
                        <th>JOb Title</th>
                        <th>Work Budget</th>
                        <th>City</th>
                        <th>Description</th>
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
                                <td><?php echo $item->emp_name ?></td>
                                <td><?php echo $item->title ?></td>
                                <td>Rs <?php echo $item->newbudget ?>.00</td>
                                <td><?php echo $item->city ?></td>
                                <td><?php echo $item->description ?></td>
                                <td><button class="<?php if ($item->status == "Pending") {
                                                        echo "pendingbutton";
                                                    } elseif ($item->status == "Accepted") {
                                                        echo "acceptbutton";
                                                    } else {
                                                        echo "rejectbutton";
                                                    }
                                                    ?>"><?php echo $item->status ?></button></td>

                            </tr>

                        </tbody>



                <?php
                    }
                }

                ?>
            </table>
        </div>
    </section>
</body>

</html>