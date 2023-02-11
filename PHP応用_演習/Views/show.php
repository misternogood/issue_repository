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
  $params = $controller->show();
  $controller->edit($params['contact']['id']);
  $controller->backContact();
?>
<body>
  <div class="main" >
    <div class="container-fruid" >
      <div class="col-md-12 col-xs-10 px-0" style="background-color:lightgray;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightgray;">
        <h1 class="index_level1" class="navbar-brand">Casteria</h1>
      </div>
      <form action="show.php?id=<?=$params['contact']['id']?>" method="POST">
        <div class="form-group">
          <!-- エラーメッセージ -->
        <?php
            if (isset($_POST['update'])) {
              if ($_SESSION['nameError'] !== true) {
                echo $_SESSION['nameError'];
              }
            }
        ?>
        <?php
            if (isset($_POST['update'])) {
              if ($_SESSION['kanaError'] !== true) {
                echo $_SESSION['kanaError'];
              }
            }
        ?>
        <?php
            if (isset($_POST['update'])) {
              if ($_SESSION['telError'] !== true) {
                echo $_SESSION['telError'];
              }
            }
        ?>
        <br>
        <?php
            if (isset($_POST['update'])) {
              if ($_SESSION['emailError'] !== true) {
                echo $_SESSION['emailError'];
              }
            }
        ?>
        <?php
            if (isset($_POST['update'])) {
              if ($_SESSION['bodyError'] !== true) {
                echo $_SESSION['bodyError'];
              }
            }
        ?>
          <div class='form-text-wrap'>
            <label class="form-text">氏名</label>
            <input class="name" type="text"name="name"placeholder="※必須"  value="<?php echo $params["contact"]["name"] ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">フリガナ</label>
            <input class="kana" type="text"name="kana"placeholder="※必須" value="<?php echo $params["contact"]["kana"] ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">電話番号</label>
            <input class="tel" type="text"name="tel"placeholder="任意" value="<?php echo $params["contact"]["tel"] ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">メールアドレス</label>
            <input class="email" type="email"name="email"placeholder="※必須" value="<?php echo $params["contact"]["email"] ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">お問い合わせ内容</label>
            <textarea class="body" name="body" placeholder="※必須" ><?php echo $params["contact"]["body"] ?></textarea>
          </div>
          <div class="message">上記の内容でよろしいですか？
          </div>
        </div>
        <div class="register-btn-group">
          <input type="submit" name="show-back" value="キャンセル" >
          <input type="submit" name="update" value="更新" >
        </div>
      </form>
    </div>
    <?php include("footer.php") ?>
  </div>
</body>
</html>