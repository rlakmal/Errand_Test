<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerreg.css">
    <title>Registration - Step 5</title>
</head>
<body>
<div class="container">
    <h1>Step 5: Agreement and Consent</h1>
    <form action="<?=ROOT?>/home" method="POST">
        <div class="form-group">
            <label class="label">Terms and Conditions Agreement:</label>
            <input class="checkbox" type="checkbox" id="terms" name="terms" >
        </div>
<!--        <div class="form-group">-->
<!--            <label class="label">Consent:</label>-->
<!--            <input class="checkbox" type="checkbox" id="consent" name="consent" required>-->
<!--        </div>-->
        <div class="form-group">
            <label class="label">Confirmation of Validity of the Information Provided:</label>
            <input class="checkbox" type="checkbox" id="confirmation" name="confirmation" >
        </div>
        <button class="button" type="submit">Submit</button>
    </form>
</div>
</body>
</html>