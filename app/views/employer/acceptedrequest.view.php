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
<?php include 'employernav2.php' ?>
<?php include 'myjobsidebar.php' ?>
<section id="main" class="main">
    <h2>Accepted Request to Your Jobs</h2>
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
                        <td><?php echo $item->worker_name ?></td>
                        <td><?php echo $item->title ?></td>
                        <td>Rs <?php echo $item->budget ?>.00</td>
                        <td><button onclick="paymentGateway(<?php echo $item->id ?>);" class="<?php if ($item->payment_stat == "Pay Now") {
                                echo "before_pay";
                            } else {
                                echo "after_pay";
                            }
                            ?>"><?php echo $item->payment_stat ?></button></td>
                    </tr>

                    </tbody>



                    <?php
                }
            }

            ?>
        </table>
    </div>
</section>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>
    function paymentGateway(itemId) {
        console.log(itemId);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                alert(xhttp.responseText);
                var obj = JSON.parse(xhttp.responseText);
                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {
                    alert("Payment completed. OrderID:" + orderId);
                    updateStatsus(orderId);
                    console.log("oncomplete" + orderId);

                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    alert("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    alert("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1226438", // Replace your Merchant ID
                    "return_url": "http:localhost/Errand_Test/public/employer/acceptedreq",
                    "cancel_url": "http:localhost/Errand_Test/public/employer/acceptedreq", // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj.order_id,
                    "items": "Door bell wireles",
                    "amount": "1000.00",
                    "currency": obj.currency,
                    "hash": obj.hash, // *Replace with generated hash retrieved from backend
                    "first_name": "Saman",
                    "last_name": "Perera",
                    "email": "samanp@gmail.com",
                    "phone": "0771234567",
                    "address": "No.1, Galle Road",
                    "city": "Colombo",
                    "country": "Sri Lanka",
                    "delivery_address": "No. 46, Galle road, Kalutara South",
                    "delivery_city": "Kalutara",
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };
                payhere.startPayment(payment);
            }
        };
        xhttp.open("GET", "<?= ROOT ?>/employer/paymentgate?id=" + itemId, true);
        xhttp.send();

    }

    function updateStatsus(orderId) {
        console.log("on func" + orderId);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                alert(xhttp.responseText);
                location.reload();
            }
        };
        xhttp.open("GET", "<?= ROOT ?>/employer/paidstatus?id=" + orderId, true);
        xhttp.send();
    }
</script>



</body>

</html>