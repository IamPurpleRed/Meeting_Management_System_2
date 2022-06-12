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
</head>
<body>
  <?php
  require_once("components/navigation.php");
  ?>
  <!-- 
    若使用者今天有會議，插入 /components/no_meeting_banner.html
    否則插入 /components/has_meeting_banner.html
   -->
  <?php
  require_once("components/no_meeting_banner.php");
  ?>
  <div class="container">
    <div class="box">
      <a href="profile.php?=<?php echo $_SESSION["name"]?>">
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
      <a href="#">
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
      <a href="#">
        <div class="icon">
          <span class="material-icons" style="color: #f5af19;">folder_shared</span>
        </div>
        <div class="content">
          <h3>Personnel Overview</h3>
          <p>You can view the public basic information of all personnel using this system</p>
        </div>
      </a>
    </div>

    <div class="box">
      <a href="#">
        <div class="icon">
          <span class="material-icons" style="color: #0f9b0f;">add</span>
        </div>
        <div class="content">
          <h3>Generate Meeting</h3>
          <p>The system administrator can generate new meeting by operating this system, fill in the meeting type,
            meeting name, meeting time, place, participants, discussion items and generate the meeting agenda.</p>
        </div>
      </a>
    </div>

    <div class="box">
      <a href="#">
        <div class="icon">
          <span class="material-icons" style="color: #ee0979;">edit_calendar</span>
        </div>
        <div class="content">
          <h3>Meeting Management</h3>
          <p>Only the system administrator has permission to operate this system</p>
        </div>
      </a>
    </div>

    <div class="box">
      <a href="#">
        <div class="icon">
          <span class="material-icons" style="color: #7F00FF;">manage_accounts</span>
        </div>
        <div class="content">
          <h3>Personnel Management</h3>
          <p>Personnel management, such as a new teacher, can create a new user account.
            Or a student has graduated,administrator can delete the student's account.</p>
        </div>
      </a>
    </div>
  </div>

  <script src="src/js/nav.js"></script>
</body>
</html>
