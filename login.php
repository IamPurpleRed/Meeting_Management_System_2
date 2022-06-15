<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登入 | 高大資工會議管理系統</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/login.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <img id="bg" src="src/images/login-bg.jpg">
  <div class="container">
    <h3 id="name">高大資工會議管理系統</h3>
    <img class="icon" id=user1 src="src/images/login-account-circle.jpg" />
    <form action="src/php/login_verify.php" method="post">
      <input type="text" name="account" placeholder="帳號">
      <input type="password" name="password" placeholder="密碼">
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == 1) echo "<font style='color:red; padding: 15px 0' size='5'>Wrong account or password!</font>";
      }
      ?>
      <button class="btn" id="login_btn" type="submit">
        <span class="material-icons">login</span>
        <span class="text">登入</span>
      </button>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="src/js/login.js"></script>
</body>
</html>