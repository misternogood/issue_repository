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
  $controller->create();
  $controller->delete();
  $params = $controller->index();
  $name = htmlspecialchars($_SESSION["name"]);
  $kana = htmlspecialchars($_SESSION["kana"]);
  $tel = htmlspecialchars($_SESSION["tel"]);
  $email = htmlspecialchars($_SESSION["email"]);
  $body = htmlspecialchars($_SESSION["body"]);

?>
<body>
  <div class="main" >
    <div class="container-fruid" >
      <div class="col-md-12 col-xs-10 px-0" style="background-color:lightgray;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:lightgray;">
        <h1 class="index_level1" class="navbar-brand">Casteria</h1>
      </div>
      <form action="contact.php" method="POST" >
        <div class="form-group">
          <!-- エラーメッセージ -->
        <?php
            if (isset($_POST['submit'])) {
              if ($_SESSION['nameError'] !== true) {
                echo $_SESSION['nameError'];
              }
            }
        ?>
        <?php
            if (isset($_POST['submit'])) {
              if ($_SESSION['kanaError'] !== true) {
                echo $_SESSION['kanaError'];
              }
            }
        ?>
        <?php
            if (isset($_POST['submit'])) {
              if ($_SESSION['telError'] !== true) {
                echo $_SESSION['telError'];
              }
            }
        ?>
        <br>
        <?php
            if (isset($_POST['submit'])) {
              if ($_SESSION['emailError'] !== true) {
                echo $_SESSION['emailError'];
              }
            }
        ?>
        <?php
            if (isset($_POST['submit'])) {
              if ($_SESSION['bodyError'] !== true) {
                echo $_SESSION['bodyError'];
              }
            }
        ?>
          <!-- 入力画面 -->
          <div class='form-text-wrap'>
            <label class="form-text">氏名</label>
            <input class="name" type="text"name="name"placeholder="※必須"  value="<?php echo isset($name) ? $name : ''; ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">フリガナ</label>
            <input class="kana" type="text"name="kana"placeholder="※必須" value="<?php echo isset($kana) ? $kana : ''; ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">電話番号</label>
            <input class="tel" type="text"name="tel"placeholder="任意" value="<?php echo isset($tel) ? $tel : ''; ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">メールアドレス</label>
            <input class="email" type="email"name="email"placeholder="※必須" value="<?php echo isset($email) ? $email : ''; ?>">
          </div>
          <div class='form-text-wrap'>
            <label class="form-text">お問い合わせ内容</label>
            <textarea class="body" name="body" placeholder="※必須" ><?php echo isset($body) ? $body: ''; ?></textarea>
          </div>
        </div>
        <div class='register-btn-group'>
          <input type="submit" name="submit" class="register-btn">
        </div> 
      </form>
    </div>
    お問い合わせ一覧
    <div class="form-group">
      <table class="table">
        <tr>
          <th>氏名</th>
          <th>フリガナ</th>
          <th>電話番号</th>
          <th>メールアドレス</th>
          <th>お問い合わせ内容</th>
        </tr>
        <?php foreach($params['contacts'] as $contact): ?>
        <tr>
          <td><?php echo $contact['name'] ?></td>
          <td><?php echo $contact['kana'] ?></td>
          <td><?php echo $contact['tel'] ?></td>
          <td><?php echo $contact['email'] ?></td>
          <td><?php echo nl2br($contact['body']) ?></td>
          <td class='actions'>
            <a href="show.php?id=<?=$contact['id'] ?>">編集</a>
          </td>
          <td>
            <form action="contact.php" method="post" onSubmit="return check()">
              <input type="hidden" name="delete_id" value="<?php echo $contact["id"]; ?>">
              <input type="submit" value="削除" name="delete">
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
    <?php include("footer.php") ?>
  </div>
  <script>
  function check(){

    if(window.confirm('削除してよろしいですか？')){
      return true;
    }else {
      window.alert('キャンセルしました');
      return false;
    }
  }
</script>
</body>
</html>