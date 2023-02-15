<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../js/index.js"></script>
</head>
<?php
  require_once(ROOT_PATH.'/Controllers/ContactController.php');
  $controller = new ContactController();
?>
<body>
  <div class="main" >
    <div class="container-fruid" >
      <div class="col-md-12 col-xs-10 px-0" style="background-color:lightgray;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightgray;">
        <h1 class="index_level1" class="navbar-brand">Casteria</h1>
      </div>
      <div class="complete">
        <span class="complete-message">お問い合わせ内容を送信しました。<br>ありがとうございました。</span>
      </div>
      <a href="/index.php" class="btn btn-default">トップへ</a>
      <?php include("footer.php") ?>
    </div>
  </div>
</body>