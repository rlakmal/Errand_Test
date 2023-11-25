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
    <a href="<?=ROOT?>/employer/myjob"><button class="nav-button">Posted Jobs</button></a>
    <a href="<?=ROOT?>/employer/postedjobsrequest"><button class="nav-button">Worker Requests</button></a>
    <a href="<?=ROOT?>/employer/myworkerreq"><button class="nav-button">My Requests</button></a>
    </div>
  </div>
</body>
</html>
