<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/myworkerrequest.css">
    <title>Document</title>
    <script src="https://sandbox.payhere.lk/lib/payhere.js"></script>
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
            max-width: 50px;
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
                    <input type="hidden" name="id" value="<?php echo $item->


if($_SERVER['REQUEST_METHOD'] !== 'POST'){
http_response_code(405);
exit;
}

// Replace with your actual merchant ID and secret
const PAYHERE_MERCHANT_ID = 'YOUR_MERCHANT_ID';
const PAYHERE_MERCHANT_SECRET = 'YOUR_MERCHANT_SECRET';

$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);

if (!$amount) {
    http_response_code(400);
    exit(json_encode(['error' => 'Invalid amount']));
}

// Generate a unique reference ID
$referenceId = uniqid();

// Generate a signed token for payment request
$token = generateSignedToken($amount, $referenceId);

if (!$token) {
    http_response_code(500);
    exit(json_encode(['error' => 'Failed to generate payment token']));
}

// Respond with JSON containing success and token
echo json_encode([
    'success' => true,
    'token' => $token,
]);

function generateSignedToken($amount, $referenceId)
{
    $data = [
        'merchant_id' => PAYHERE_MERCHANT_ID,
        'currency' => 'LKR',
        'amount' => $amount,
        'order_id' => $referenceId,
        'items' => [
            ['name' => 'Payment for worker request', 'description' => 'Payment for hiring a worker from your request', 'amount' => $amount]
        ],
    ];

    $signature = hash_hmac('sha256', json_encode($data), PAYHERE_MERCHANT_SECRET);

    $data['signature'] = $signature;

    return base64_encode(json_encode($data));
}

    }
</script>
</body>

</html>
