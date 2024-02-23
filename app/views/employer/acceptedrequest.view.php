<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <?php include 'employernav2.php' ?>
    <?php include 'myjobsidebar.php' ?>
    <section id="main" class="main">

        <table>
            <thead>
                <tr>
                    <th>Worker Name</th>
                    <th>JOb Title</th>
                    <th>Budget</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>Dasun Shanaka</td>
                    <td>නිවසක ජල නල සවි කිරීම</td>
                    <td>4000</td>
                    <td></td>
                </tr>
                <!-- Add more rows if needed -->
            </tbody>
        </table>

    </section>
</body>

</html>