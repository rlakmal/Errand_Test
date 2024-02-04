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
        .pop-view {
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

        .open-pop-view {
            position: fixed;
            visibility: visible;
            transform: translate(-50%, -50%) scale(1);
            z-index: 101;
        }

        .pop-view h2 {
            text-align: center;
            padding-top: 2%;
            padding-bottom: 4%;
            margin: 4px;
            font-weight: bold;
        }

        .pop-view h4 {
            text-align: left;
            padding-left: 10%;
            padding-bottom: 2%;
        }

        .pop-view input {
            position: relative;
            left: 9%;
            width: 80%;
            background: #d5dfe7d5;
            border-radius: 20px;
            border-style: solid;
            border: #000;
            outline-width: 1px;
            padding: 10px 30px;
            margin-bottom: 2%;
            transition: all 0.3s ease;
            color: var(--dark);
            font-size: 17px;
        }

        .pop-report .btns,
        .pop-view .btns {
            position: relative;
            left: 40%;
            width: 50%;
            height: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pop-report .close-btn,
        .pop-view .close-btn,
        .cancelR-btn {
            position: absolute;
            right: 1%;
            font-size: 16px;
            color: var(--red);
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 6px;
            color: white;
            border: none;
            background-color: orangered;
        }

        .pop-report .cancelR-btn,
        .cancelR-btn {
            right: 28%;
            color: white;
            background-color: orangered;
        }

        .overlay {
            position: fixed;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            pointer-events: none;
        }

        .overlay-active {
            opacity: 1;
            pointer-events: all;
            z-index: 100;
        }

        .bttns {
            position: relative;
            top: -12%;
            float: right;
            width: 33%;
            height: 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar {
            margin-top: -12px;
        }

        .confirm-btn {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            cursor: pointer;
        }

        .confirm-btn:disabled {
            background-color: lightgreen;
            cursor: not-allowed;
        }

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
    </style>
</head>

<body>



<?php include 'employernav2.php' ?>
<?php include 'myjobsidebar.php' ?>
<div class="set_margin">
    <section id="main" class="main">
        <h2>Your Request to Workers</h2>
        <div class="scrollable-table">
            <table class="table">
                <thead>
                <tr>
                    <th>No </th>
                    <th class="desc">Request To:</th>
                    <th class="ordId">Job Title</th>
                    <th class="stth">Budget</th>
                    <th class="cost">Location</th>
                    <th>Status</th>
                    <th class="thcancel">Action</th>
                    <th class="thconfirm">Confirm Payment</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $no = 0;
                if (is_array($data)) {
                    foreach ($data as $item) {
                        $no++;
                        ?>
                        <tr>
                            <td class="proimage"><?php echo $no ?></td>
                            <td class="proimage">
                                <img class="image" src="<?= ROOT ?>/assets/images/profileImages/<?php echo $_SESSION['USER']->profile_image ?>" alt="profile image">
                                <a class="wkname" href="<?= ROOT ?>/employer/workerprof?id=<?php echo $item->worker_id ?>"><?php echo $item->worker_name ?></a>
                            </td>
                            <td><?php echo $item->title ?></td>
                            <td>RS <?php echo $item->budget ?>/=</td>
                            <td><?php echo $item->city ?></td>
                            <td><button class="<?php if ($item->status == "Pending" || $item->status == "Accepted") {
                                    echo "pendingbutton";
                                } elseif ($item->status == "Rejected" || $item->status == "Requested") {
                                    echo "rejectedbutton";
                                } else {
                                    echo "expirebutton";
                                }

                                ?>"><?php echo $item->status ?></button></td>
                            <?php
                            if ($item->status == 'Pending') {
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                    <td class="thcancel"><button type="submit" name="Cancel" value="Cancel" class="cancelbutton">Cancel Request</button></td>
                                </form>
                                <?php
                            } elseif ($item->status == 'Requested') {
                                ?>
                                <input type="hidden" name="id" value="<?php echo $item->id ?>">
                                <td class="thcancel"><button type="submit" name="viewRequest" value="viewRequest" onclick="openEdit()" class="viewbutton">View Request</button></td>
                                <?php
                            } else {
                                ?>
                                <td class="thcancel"></td>
                                <?php
                            }
                            ?>
                            <td class="thconfirm">
                                <?php
                                if ($item->status == 'Accepted' && $item->paid == false) {
                                    ?>
                                    <button class="confirm-btn" onclick="openPaymentPopup(<?php echo $item->budget * 0.1 ?>, <?=$item->id?>)">Confirm</button>
                                    <?php
                                } elseif ($item->status == 'Accepted' && $item->paid == true) {
                                    ?>
                                    <button class="confirm-btn" disabled>Paid</button>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="pop-view">
            <form method="POST">
                <h2>Worker has negotiated your budget</h2>
                <h4>Budget : </h4>
                <button>Accept Offer</button>
                <button>Reject</button>
            </form>
        </div>
    </section>
</div>

<div class="popup-payment">
    <h2>Payment Confirmation</h2>
    <h4>Pay Amount: <span id="payAmount"> /=</span></h4>

    <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
        <input type="hidden" name="merchant_id" value="1225403">    <!-- Replace your Merchant ID -->
        <input type="hidden" name="return_url" value="<?=ROOT?>/public/employer/myworkerreq">
        <input type="hidden" name="cancel_url" value="<?=ROOT?>/public/employer/myworkerreq">
        <input type="hidden" name="notify_url" value="<?=ROOT?>/public/employer/paynotify">
        <input type="hidden" name="order_id" id = "id">
        <input type="hidden" name="items" value="Request Accept">
        <input type="hidden" name="currency" value="LKR">
        <input type="hidden" name="amount" id = "amount">
        <input type="hidden" name="first_name" value="<?=$_SESSION["USER"]->name?>">
        <input type="hidden" name="last_name" value="">
        <input type="hidden" name="email" value="<?=$_SESSION["USER"]->email?>">
        <input type="hidden" name="phone" value="0771234567">
        <input type="hidden" name="address" value="No.1, Galle Road">
        <input type="hidden" name="city" value="Colombo">
        <input type="hidden" name="country" value="Sri Lanka">
        <input type="hidden" name="hash" id = "hash">    <!-- Replace with generated hash -->
        <button type="submit" value="Continue" onclick="continuePayment()">Continue</button>
    </form>
    <div class="payment-logos">
<!--        <i class="fab fa-cc-visa"></i>-->
<!--        <i class="fab fa-cc-mastercard"></i>-->
    </div>
    <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_short_banner.png" alt="PayHere" width="400" align="right"/></a>

</div>



<script>

    let popupEdit = document.querySelector(".pop-view");
    let popupPayment = document.querySelector(".popup-payment");

    function openEdit() {
        popupEdit.classList.add("open-pop-view");
    }

    function closeEdit() {
        popupEdit.classList.remove("open-pop-view");
    }

    function openPaymentPopup(amount, id) {
        console.log("Bossa");

        let merchantSecret  = 'MzU1NTkwOTc4MTE2NzA3ODYzMDI1MjA1NDQyNDkxMzQ2MTgwMDA2';
        let merchantId      = '1225403';
        let orderId         = String(id);
        let hashedSecret    = CryptoJS.md5(merchantSecret).toString().toUpperCase();
        let amountFormated  = parseFloat( amount ).toLocaleString( 'en-us', { minimumFractionDigits : 2 } ).replaceAll(',', '');
        let currency        = 'LKR';
        let hash            = CryptoJS.md5(merchantId + orderId + amountFormated + currency + hashedSecret).toString().toUpperCase();

        document.getElementById("payAmount").innerText = amount + "/=";
        document.getElementById("amount").value = amount;
        document.getElementById("id").value = orderId;
        document.getElementById("hash").value = hash;
        popupPayment.classList.add("open-popup-payment");
    }

    function closePaymentPopup() {
        popupPayment.classList.remove("open-popup-payment");
    }

    function continuePayment() {
        closePaymentPopup();
        // Handle payment continuation logic here
        // You may want to redirect the user to the payment page or use an API to process payment
        // After handling the payment, you can close the payment popup
    }
</script>
</body>

</html>
