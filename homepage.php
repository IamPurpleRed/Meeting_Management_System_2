<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>首頁 | 高大資工會議管理系統</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/homepage.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include("components/navigation.php");
  include("src/php/sql_connect.inc.php");
  $userID = $_SESSION['loginMember']['使用者編號'];

  $select_attend = $sql_qry->query("SELECT * FROM `參與` WHERE `使用者編號` = '$userID' ");
  $result_attend = $select_attend->fetch(PDO::FETCH_ASSOC);
  $_SESSION["go_meetingID"] = $result_attend["會議編號"];

  if (isset($result_attend["角色"])) {
    if ($result_attend["角色"] != 0)
      include("components/homepage/has_meeting_banner.php");
  } else {
    include("components/homepage/no_meeting_banner.php");
  }
  ?>

  <div class="container">
    <div class="box">
      <a href="profile.php">
        <div class="icon">
          <span class="material-icons" style="color: #ff7a63;">assignment_ind</span>
        </div>
        <div class="content">
          <h3>Profile</h3>
          <p>Users can modify personal information here,such as name, password and telephone number,
            but some specific fields such as identity cannot be changed</p>
        </div>
      </a>
    </div>

    <div class="box">
      <a href="search.php">
        <div class="icon">
          <span class="material-icons" style="color: #12c2e9;">search</span>
        </div>
        <div class="content">
          <h3>Search</h3>
          <p>Query and view the conference materials you have participated in.</p>
        </div>
      </a>
    </div>

    <div class="box">
      <a href="personnel_overview.php">
        <div class="icon">
          <span class="material-icons" style="color: #f5af19;">folder_shared</span>
        </div>
        <div class="content">
          <h3>Personnel Overview</h3>
          <p>You can view the public basic information of all personnel using this system</p>
        </div>
      </a>
    </div>

    <?php
    //若使用者為管理員，插入 /components/homepage/manager_boxes.html
    if ($_SESSION['loginMember']['管理員'] == '管理員') {
      include("components/homepage/manager_boxes.html");
    }
    ?>
  </div>

  <script src="src/js/nav.js"></script>
</body>

</html>