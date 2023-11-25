<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerreg.css">
    <title>Registration - Step 4</title>
</head>
<body>
<div class="container">
    <h1>Step 4: Electronic Signature and Photo Upload</h1>
    <form action="<?=ROOT?>/home/workerregfive" method="POST">
        <div class="form-group">
            <label class="label" for="signature">Electronic Signature:</label>
            <input class="input" type="text" id="signature" name="signature" >
        </div>
        <div class="form-group">
            <label class="label" for="photo">Photo Upload:</label>
            <input class="input" type="file" id="photo" name="photo" accept="image/*" >
        </div>
        <button class="button" type="submit">Next</button>
        <a href="<?= ROOT ?>/home/workerregthree" class="active"><button class="button" type="button">Back</button></a>
    </form>
</div>
</body>
</html>
