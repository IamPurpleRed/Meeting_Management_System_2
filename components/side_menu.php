<?php
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