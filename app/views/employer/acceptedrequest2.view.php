<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myworkerrequest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
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
            background: green;
            border: #f16a2d;
            padding: 8px;
            border-radius: 20px;
            color: white;
            cursor: pointer;
        }

        .before_pay:hover {
            background: #2a3441;
        }

        /* Payment Status Indicators */
        .payment-status {
            padding: 6px 12px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .paid {
            background-color: #28a745;
            color: white;
        }

        .unpaid {
            background-color: #dc3545;
            color: white;
        }

        .chargeback {
            background-color: #ffc107;
            color: black;
        }

        .pending {
            background-color: #007bff;
            color: white;
        }

        .failed {
            background-color: #dc3545;
            color: white;
        }

        /* Payment Popup CSS */
        .popup-payment {
            position: absolute;
            height: fit-content;
            width: 35%;
            background: #ffffff;
            margin-top: -3%;
            margin-bottom: 3%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 0 0 1px var(--blue), 0 0 0 4px var(--light-blue);
            visibility: hidden;
            transition: transform 0.5s, top 0.5s;
            justify-content: center;
        }

        .open-popup-payment {
            position: fixed;
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
            z-index: 101;
        }

        .payment-logos {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .payment-logos img {
            max-width: 200px;
        }

        .popup-payment h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .popup-payment h4 {
            margin-top: 10px;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 20px;
        }

        .payment-logos {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .payment-logos img {
            max-width: 70px;
        }

        .popup-payment button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .popup-payment button:hover {
            background-color: #218838;
        }

        .close-popup {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .close-popup:hover {
            background-color: #c82333;
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
                    <td>
                        <?php
                        $hash = strtoupper(
                            md5(
                                "1225403" .
                                strval($item->id) .
                                number_format($item->budget * 0.1, 2, '.', '') .
                                "LKR" .
                                strtoupper(md5("MzU1NTkwOTc4MTE2NzA3ODYzMDI1MjA1NDQyNDkxMzQ2MTgwMDA2"))
                            )
                        );
                        ?>
                        <?php if ($item->payment_stat == 'paid'): ?>
                            <span class="payment-status paid">Paid</span>
                        <?php elseif ($item->payment_stat == 'Pay Now'): ?>
                            <span class="payment-status unpaid">Not Paid</span>
                            <button class="before_pay" onclick="openPaymentPopup(<?php echo $item->budget * 0.1 ?>, '<?=$hash?>', <?=$item->id?>)">Make Payment</button>
                        <?php elseif ($item->payment_stat == 'cancelled'): ?>
                            <span class="payment-status unpaid">Cancelled</span>
                            <button class="before_pay" onclick="openPaymentPopup(<?php echo $item->budget * 0.1 ?>, '<?=$hash?>', <?=$item->id?>)">Make Payment</button>
                        <?php elseif ($item->payment_stat == 'chargedback'): ?>
                            <span class="payment-status chargeback">Charged Back</span>
                        <?php elseif ($item->payment_stat == 'pending'): ?>
                            <span class="payment-status pending">Pending</span>
                        <?php elseif ($item->payment_stat == 'failed'): ?>
                            <span class="payment-status failed">Failed</span>
                            <button class="before_pay" onclick="openPaymentPopup(<?php echo $item->budget * 0.1 ?>, '<?=$hash?>', <?=$item->id?>)">Make Payment</button>

                        <?php else: ?>
                            <span class="payment-status">Unknown</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Add more rows if needed -->
                </tbody>

                <?php
            }
        }
        ?>
    </table>
</section>

<!-- Payment Popup -->
<div class="popup-payment">
    <h2>Payment Confirmation</h2>
    <h4>Pay Amount: <span id="payAmount"> /=</span></h4>

    <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
        <input type="hidden" name="merchant_id" value="1225403"> <!-- Replace your Merchant ID -->
        <input type="hidden" name="return_url" value="<?= ROOT ?>/employer/acceptedreq">
        <input type="hidden" name="cancel_url" value="<?= ROOT ?>/employer/acceptedreq">
        <input type="hidden" name="notify_url" value="<?= ROOT ?>/employer/paynotify">
        <input type="hidden" name="order_id" id="id">
        <input type="hidden" name="items" value="Request Accept">
        <input type="hidden" name="currency" value="LKR">
        <input type="hidden" name="amount" id="amount">
        <input type="hidden" name="first_name" value="<?=$_SESSION["USER"]->name?>">
        <input type="hidden" name="last_name" value="">
        <input type="hidden" name="email" value="<?=$_SESSION["USER"]->email?>">
        <input type="hidden" name="phone" value="0771234567">
        <input type="hidden" name="address" value="No.1, Galle Road">
        <input type="hidden" name="city" value="Colombo">
        <input type="hidden" name="country" value="Sri Lanka">
        <input type="hidden" name="hash" id="hash"> <!-- Replace with generated hash -->
        <button type="submit" value="Continue" onclick="continuePayment()">Continue</button>
    </form>
    <div class="payment-logos">
        <!-- Add payment logos if needed -->
    </div>
    <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner.png" alt="PayHere" width="400" align="right" /></a>
    <button class="close-popup" onclick="closePaymentPopup()">Close</button>
</div>
<!-- End Payment Popup -->

<!-- JavaScript for payment -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
<script>
    let popupPayment = document.querySelector(".popup-payment");

    // JavaScript for payment
    function openPaymentPopup(amount, hash, id) {
        console.log("Bossa")
        document.getElementById("payAmount").innerText = amount + "/=";
        document.getElementById("amount").value = amount;
        document.getElementById("id").value = id;
        document.getElementById("hash").value = hash;
        popupPayment.classList.add("open-popup-payment");
    }

    function continuePayment() {
        closePaymentPopup();
        // Handle payment continuation logic here
        // You may want to redirect the user to the payment page or use an API to process payment
        // After handling the payment, you can close the payment popup
    }

    function closePaymentPopup() {
        popupPayment.classList.remove("open-popup-payment");
    }
</script>
</body>

</html>
