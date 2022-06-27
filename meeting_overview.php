<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>會議總覽 | 高大資工會議管理系統</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/meeting_side_menu.css">
  <link rel="stylesheet" href="src/css/meeting_overview.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- 插入nav -->
  <?php
  include("components/navigation.php");
  include("components/meeting_side_menu.php");
  ?>

  <div id="no_active_meeting">
    <h3>請至左側選單點選項目以顯示會議內容</h3>
  </div>
  <div id="content" name="insertContent"></div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="src/js/nav.js"></script>
  <script src="src/js/meeting.js"></script>
</body>

</html>