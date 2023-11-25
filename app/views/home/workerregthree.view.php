<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerreg.css">
    <title>Registration - Step 3</title>
</head>
<body>
<div class="container">
    <h1>Step 3: Certification Upload</h1>
    <form action="<?=ROOT?>/home/workerregfour" method="POST">
        <div class="form-group">
            <label class="label" for="certification">Certification Upload:</label>
            <input class="input" type="file" id="certification" name="certification" accept="image/*" >
        </div>
        <button class="button" type="submit">Next</button>
        <a href="<?= ROOT ?>/home/workerregnext" class="active"><button class="button" type="button">Back</button></a>
    </form>
</div>
</body>
</html>
