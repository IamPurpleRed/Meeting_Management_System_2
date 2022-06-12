<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登入 | 高大資工會議管理系統</title>
  <link rel="stylesheet" href="../src/css/style.css">
  <link rel="stylesheet" href="../src/css/login.css">
</head>
<body>
  <img id="bg" src="../src/images/login-bg.jpg">
  <div class="container">
    <h3 id="name">高大資工會議管理系統</h3>
    <input type="image" class="icon" id=user1 src="../src/images/login-account-circle.jpg" />
    <?php 
      if(isset($_GET["error"])){
        if($_GET["error"] == 1) echo "<font style='color:red' size='5'>帳號或密碼錯誤!</font>";
      }
    ?>
    <form action="../src/php/login_verify.php" method="post">
      <input type="text" placeholder="帳號" name="account"required/>
      <input type="password" placeholder="密碼" name="password"required/>
      <button type="submit">
        <span class="material-icons">arrow_forward</span>
      </button>
    </form>
    
  </div>
  

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>
</html>
