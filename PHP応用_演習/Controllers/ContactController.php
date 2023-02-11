<?php
session_start();
$_SESSION['nameError'] = true ;
$_SESSION['kanaError'] = true ;
$_SESSION['telError'] = true ;
$_SESSION['emailError'] = true ;
$_SESSION['bodyError'] = true ;
require_once('../Models/Contact.php');
require_once('../Models/DbConnect.php');
require_once(ROOT_PATH."database.php");

class ContactController {
  private $request;
  private $Contact;

  public function __construct() {
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;
    $this->Contact = new Contact();
  }

  public function create() {
    if(isset($_POST['submit'])) {
      $hasError = null;
      $nameError = true;
      $kanaError = true;
      $telError = true;
      $emailError = true;
      $bodyError = true;
    
      $_SESSION['name']= htmlspecialchars($_POST['name']);
      $_SESSION['kana']= htmlspecialchars($_POST['kana']);
      $_SESSION['tel']= htmlspecialchars($_POST['tel']);
      $_SESSION['email']= htmlspecialchars($_POST['email']);
      $_SESSION['body']= htmlspecialchars($_POST['body']);

      // 氏名
      if (empty($_SESSION['name'])) {
        $hasError = false;
        $nameError = "氏名の入力は必須です";
      }
      if(mb_strlen($_SESSION['name']) > 10) {
        $hasError = false;
        $nameError = "氏名は10文字以内で入力してください(半角、全角区別なし)";
      }
      // フリガナ
      if (empty($_SESSION['kana'])) {
        $hasError = false;
        $kanaError = "フリガナの入力は必須です";
      }
      if(mb_strlen($_SESSION['kana']) > 10) {
        $hasError = false;
        $kanaError = "フリガナは10文字以内で入力してください(半角、全角区別なし)";
      }
      if(preg_match('/[^ァ-ヶー]/u', $_SESSION['kana'])) {
        $hasError = false;
        $kanaError = "フリガナはカタカナで入力してください";
       }
      // 電話番号
      if(!preg_match("/^[0-9]+$/", $tel) && empty(!$tel)) {
        $hasError = false;
        $telError = "電話番号は半角数字のみ(ハイフンなし)で入力してください";
      }
      // メールアドレス
      if(empty($_SESSION['email'])) {
        $hasError = false;
        $emailError = "メールアドレスの入力は必須です";
      }
      if(!preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $_SESSION['email'])) {
        $hasError = false;
        $emailError = "メールアドレスは適切な形式(xxx@xxx)で入力してください";
      }
      // お問い合わせ内容
      if(empty($_SESSION['body'])) {
        $hasError = false;
        $bodyError = "お問い合わせ内容の入力は必須です";
      }

      $_SESSION['nameError'] = $nameError ;
      $_SESSION['kanaError'] = $kanaError ;
      $_SESSION['telError'] = $telError ;
      $_SESSION['emailError'] = $emailError ;
      $_SESSION['bodyError'] = $bodyError ;
      if(isset($hasError)) {
        return;
        echo "お問い合わせに失敗しました";
      }else {
        header('Location: confirm.php');
      }
    }
  }

  public function confirm() {
    if (!empty($_POST['confirm'])) {
      try {
        $dbh = dbConnect();
        $sql = "INSERT INTO contacts(name, kana, tel, email, body) VALUE(:name, :kana, :tel, :email, :body)"; 
        $dbh->beginTransaction();
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':name', $_SESSION['name'], PDO::PARAM_STR);
        $stmt->bindParam(':kana', $_SESSION['kana'], PDO::PARAM_STR);
        $stmt->bindParam(':tel', $_SESSION['tel'], PDO::PARAM_STR_CHAR);
        $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
        $stmt->bindParam(':body', $_SESSION['body'], PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
        $_SESSION['name']= null;
        $_SESSION['kana']= null;
        $_SESSION['tel']= null;
        $_SESSION['email']= null;
        $_SESSION['body']= null;
        header('Location: complete.php');
      } catch (PDOException $e) {
          echo "登録に失敗しました";
          $dbh->rollBack();
          exit($e);
      }
    }
  }

  public function back() {
    if (isset($_POST['back'])) {
      header("location: contact.php");
    }
  }

  public function index() {
    $contacts = $this->Contact->findAll();
    $params = [
      'contacts' => $contacts,
    ];
    return $params;
  }

  public function show() {
    $contact = $this->Contact->findById($this->request['get']['id']);
    $params = ['contact' => $contact ];
    return $params;
  }

  public function edit() {
    if(isset($_POST['update'])) {
      $hasError = null;
      $nameError = true;
      $kanaError = true;
      $telError = true;
      $emailError = true;
      $bodyError = true;
      $id = $_GET["id"];
      $_SESSION['name']= htmlspecialchars($_POST['name']);
      $_SESSION['kana']= htmlspecialchars($_POST['kana']);
      $_SESSION['tel']= htmlspecialchars($_POST['tel']);
      $_SESSION['email']= htmlspecialchars($_POST['email']);
      $_SESSION['body']= htmlspecialchars($_POST['body']);

      // 氏名
      if (empty($_SESSION['name'])) {
        $hasError = false;
        $nameError = "氏名の入力は必須です";
      }
      if(mb_strlen($_SESSION['name']) > 10) {
        $hasError = false;
        $nameError = "氏名は10文字以内で入力してください(半角、全角区別なし)";
      }
      // フリガナ
      if (empty($_SESSION['kana'])) {
        $hasError = false;
        $kanaError = "フリガナの入力は必須です";
      }
      if(mb_strlen($_SESSION['kana']) > 10) {
        $hasError = false;
        $kanaError = "フリガナは10文字以内で入力してください(半角、全角区別なし)";
      }
      if(preg_match('/[^ァ-ヶー]/u', $_SESSION['kana'])) {
        $hasError = false;
        $kanaError = "フリガナはカタカナで入力してください";
       }
      // 電話番号
      if(!preg_match("/^[0-9]+$/", $tel) && empty(!$tel)) {
        $hasError = false;
        $telError = "電話番号は半角数字のみ(ハイフンなし)で入力してください";
      }
      // メールアドレス
      if(empty($_SESSION['email'])) {
        $hasError = false;
        $emailError = "メールアドレスの入力は必須です";
      }
      if(!preg_match('/^[a-z0-9._+^~-]+@[a-z0-9.-]+$/i', $_SESSION['email'])) {
        $hasError = false;
        $emailError = "メールアドレスは適切な形式(xxx@xxx)で入力してください";
      }
      // お問い合わせ内容
      if(empty($_SESSION['body'])) {
        $hasError = false;
        $bodyError = "お問い合わせ内容の入力は必須です";
      }
      $_SESSION['nameError'] = $nameError;
      $_SESSION['kanaError'] = $kanaError;
      $_SESSION['telError'] = $telError;
      $_SESSION['emailError'] = $emailError;
      $_SESSION['bodyError'] = $bodyError;
      if(isset($hasError)) {
        return;
        echo "更新に失敗しました";
      }else {
        try {
          $dbh = dbConnect();
          $sql = "UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id";
          $dbh->beginTransaction();
          $stmt = $dbh->prepare($sql);
          $stmt->bindParam(':name', $_SESSION['name'], PDO::PARAM_STR);
          $stmt->bindParam(':kana', $_SESSION['kana'], PDO::PARAM_STR);
          $stmt->bindParam(':tel', $_SESSION['tel'], PDO::PARAM_STR_CHAR);
          $stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
          $stmt->bindParam(':body', $_SESSION['body'], PDO::PARAM_STR);
          $stmt->bindParam(":id", $id, PDO::PARAM_INT);
          $stmt->execute();
          $dbh->commit();
          $_SESSION['name']= null;
          $_SESSION['kana']= null;
          $_SESSION['tel']= null;
          $_SESSION['email']= null;
          $_SESSION['body']= null;
          header('Location: contact.php');
        } catch (PDOException $e) {
            echo "更新に失敗しました";
            $dbh->rollBack();
            exit($e);
        }
      }
    }
  }

  public function backContact() {
    if (isset($_POST['show-back'])) {
      header("location: contact.php");
    }
  }

  public function delete() {
    if (isset($_POST['delete'])) {
      $dbh = dbConnect();
      $sql = ("DELETE FROM contacts WHERE id = :id");
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(":id", $_POST["delete_id"], PDO::PARAM_INT);
      $stmt->execute();
      header('location: contact.php');
    }
  }
}
?>