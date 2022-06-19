<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>人員總覽 | 高大資工會議管理系統</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/personnel_overview.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <?php
  include("components/navigation.php");
  include("src/php/sql_connect.inc.php");
  $theSelectedUser = null;

  $select_students = $sql_qry->query("SELECT * FROM `學生代表`");
  $count_students = $sql_qry->query("SELECT count(*) FROM `學生代表`");

  $select_assistants = $sql_qry->query("SELECT * FROM `系助理`");
  $count_assistants = $sql_qry->query("SELECT count(*) FROM `系助理`");

  $select_ourTeachers = $sql_qry->query("SELECT * FROM `系上老師`");
  $count_ourTeachers = $sql_qry->query("SELECT count(*) FROM `系上老師`");

  $select_otherTeachers = $sql_qry->query("SELECT * FROM `校外老師`");
  $count_otherTeachers = $sql_qry->query("SELECT count(*) FROM `校外老師`");

  $select_experts = $sql_qry->query("SELECT * FROM `業界專家`");
  $count_experts = $sql_qry->query("SELECT count(*) FROM `業界專家`");
  ?>

  <div id="side_menu">
    <div class="group" id="std_group">
      <div class="header">
        <span class="title">學生代表 (<?php echo $count_students->fetchColumn(); ?>)</span>
        <span class="material-icons toggle">keyboard_arrow_down</span>
      </div>
      <div class="container">
        <?php
        while ($result_students = $select_students->fetch(PDO::FETCH_ASSOC))
        {
          $userID = $result_students['使用者編號'];
          $select_theUser = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$userID'");
          $result_theUser = $select_theUser->fetch(PDO::FETCH_ASSOC);
          echo '<div class="item" onclick="makeActive(this)" id="'.$userID.'">';
            echo '<img src="'.$result_theUser['頭貼'].'">';
            echo '<div class="text_area">';
              echo '<span class="name">'.$result_theUser['姓名'].'</span>';
              echo '<span class="identity">學生代表</span>';
            echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <div class="group" id="assistant_group">
      <div class="header">
        <span class="title">系助理 (<?php echo $count_assistants->fetchColumn(); ?>)</span>
        <span class="material-icons toggle">keyboard_arrow_down</span>
      </div>
      <div class="container">
        <?php
        while ($result_assistants = $select_assistants->fetch(PDO::FETCH_ASSOC))
        {
          $userID = $result_assistants['使用者編號'];
          $select_theUser = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$userID'");
          $result_theUser = $select_theUser->fetch(PDO::FETCH_ASSOC);
          echo '<div class="item" onclick="makeActive(this)" id="'.$userID.'">';
            echo '<img src="'.$result_theUser['頭貼'].'">';
            echo '<div class="text_area">';
              echo '<span class="name">'.$result_theUser['姓名'].'</span>';
              echo '<span class="identity">系助理</span>';
            echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <div class="group" id="school_teacher_group">
      <div class="header">
        <span class="title">系上老師 (<?php echo $count_ourTeachers->fetchColumn(); ?>)</span>
        <span class="material-icons toggle">keyboard_arrow_down</span>
      </div>
      <div class="container">
        <?php
        while ($result_ourTeachers = $select_ourTeachers->fetch(PDO::FETCH_ASSOC))
        {
          $userID = $result_ourTeachers['使用者編號'];
          $select_theUser = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$userID'");
          $result_theUser = $select_theUser->fetch(PDO::FETCH_ASSOC);
          echo '<div class="item" onclick="makeActive(this)" id="'.$userID.'">';
            echo '<img src="'.$result_theUser['頭貼'].'">';
            echo '<div class="text_area">';
              echo '<span class="name">'.$result_theUser['姓名'].'</span>';
              echo '<span class="identity">系上老師</span>';
            echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <div class="group" id="outside_teacher_group">
      <div class="header">
        <span class="title">校外老師 (<?php echo $count_otherTeachers->fetchColumn(); ?>)</span>
        <span class="material-icons toggle">keyboard_arrow_down</span>
      </div>
      <div class="container">
        <?php
        while ($result_otherTeachers = $select_otherTeachers->fetch(PDO::FETCH_ASSOC))
        {
          $userID = $result_otherTeachers['使用者編號'];
          $select_theUser = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$userID'");
          $result_theUser = $select_theUser->fetch(PDO::FETCH_ASSOC);
          echo '<div class="item" onclick="makeActive(this)" id="'.$userID.'">';
            echo '<img src="'.$result_theUser['頭貼'].'">';
            echo '<div class="text_area">';
              echo '<span class="name">'.$result_theUser['姓名'].'</span>';
              echo '<span class="identity">校外老師</span>';
            echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>

    <div class="group" id="expert_group">
      <div class="header">
        <span class="title">業界專家 (<?php echo $count_experts->fetchColumn(); ?>)</span>
        <span class="material-icons toggle">keyboard_arrow_down</span>
      </div>
      <div class="container">
        <?php
        while ($result_experts = $select_experts->fetch(PDO::FETCH_ASSOC))
        {
          $userID = $result_experts['使用者編號'];
          $select_theUser = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$userID'");
          $result_theUser = $select_theUser->fetch(PDO::FETCH_ASSOC);
          echo '<div class="item" onclick="makeActive(this)" id="'.$userID.'">';
            echo '<img src="'.$result_theUser['頭貼'].'">';
            echo '<div class="text_area">';
              echo '<span class="name">'.$result_theUser['姓名'].'</span>';
              echo '<span class="identity">業界專家</span>';
            echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>

  <div id="content"></div>

  <script>
    var clicking = null;
    function makeActive(which) {
      $(which).attr("class", "item active");
      if(clicking)
      {
        $(clicking).attr("class", "item");
      }
      clicking = which;

      if (window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      else{
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      var PageToSendTo = "components/personnel_content.php?";
      var MyVariable = clicking.id;
      var VariablePlaceholder = "ID=";
      var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;
      
      xmlhttp.open("GET", UrlToSend, false);
      xmlhttp.send();
      console.log(xmlhttp.responseText);

      $("#content").html(xmlhttp.responseText);
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="src/js/nav.js"></script>
  <script src="src/js/personnel_overview.js"></script>
</body>
</html>
