<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>個人資料 | 高大資工會議管理系統</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/profile.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <?php
  include("components/navigation.php");
  ?>

  <h2 id="page_title">個人資料</h2>
  <hr id="page_hr">

  <?php
  include("src/php/sql_connect.inc.php");
  session_start();
  $id = $_SESSION["loginMember"]["使用者編號"];
  $account = $_SESSION["loginMember"]["帳號"];
  $qry = "SELECT * FROM `使用者` WHERE `使用者編號`= $id;";
  $select = $sql_qry->query($qry);
  $result = $select->fetch(PDO::FETCH_ASSOC);
  $identity = $result["身分"];
  ?>

  <?php
  include("components/profile.php");
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="src/js/nav.js"></script>
</body>
</html>