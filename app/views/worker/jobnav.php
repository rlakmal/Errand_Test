<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/jobnav.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.nav-button');

  buttons.forEach(function (button) {
    button.addEventListener('click', function () {
      buttons.forEach(function (btn) {
        btn.classList.remove('active');
      });
      button.classList.add('active');
    });
  });
});

  </script>
  <div class="navbar">
    <div class="title">My Jobs</div>
    <div class="buttons">
    <a href="<?=ROOT?>/worker/myjobs"><button class="nav-button">Requested Jobs</button></a>
    <a href="<?=ROOT?>/worker/recievedjobs"><button class="nav-button">Recieved Jobs</button></a>
    <a href="<?=ROOT?>/worker/acceptedjobs"><button class="nav-button">Accepted Jobs</button></a>
    <a href="<?=ROOT?>/worker/completedjobs"><button class="nav-button">Completed Jobs</button></a>
    </div>
  </div>
</body>
</html>
