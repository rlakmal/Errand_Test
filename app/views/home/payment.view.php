<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <script src="https://www.payhere.lk/lib/payhere.js"></script>
</head>

<body>
<h1>Payment Page</h1>

<!-- Payment Form -->
<form id="paymentForm">
    <!-- Your Payment Form Fields -->
    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="amount" required>

    <button type="button" onclick="makePayment()">Make Payment</button>
</form>

<script>
    function makePayment() {
        var payment = new PayHere.Payment({
            "sandbox": true,
            "merchant_id": 1225403,
            "return_url": "YOUR_RETURN_URL",
            "cancel_url": "YOUR_CANCEL_URL",
            "notify_url": "YOUR_NOTIFY_URL",
            "order_id": "ORDER_ID",
            "items": "Payment for items",
            "amount": document.getElementById("amount").value,
            "currency": "LKR",
            "first_name": "John",
            "last_name": "Doe",
            "email": "john@example.com",
            "phone": "0771234567",
            "address": "No. 1, Street Name",
            "city": "Colombo",
            "country": "Sri Lanka",
            "delivery_address": "No. 2, Street Name",
            "delivery_city": "Kandy",
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
        });

        payment.start();
    }
</script>
</body>

</html>
