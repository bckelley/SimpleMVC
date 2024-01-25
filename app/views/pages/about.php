<?php require APP_ROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?PHP echo $data['title']; ?></h1>
        <p class="lead"><?PHP echo $data['description'] ?></p>
        <p class="lead"><span class="h5">Version: </span> <?PHP echo $data['version'] ?></p>
    </div>
  </div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
