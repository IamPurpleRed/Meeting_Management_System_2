<?php

  
  include("src/php/sql_connect.inc.php");
  $theSelectedUser = null;
  $select_meeting = $sql_qry->query("SELECT * FROM `會議`");
  $count_meeting = $sql_qry->query("SELECT count(*) FROM `會議`");

  $select_user = $sql_qry->query("SELECT * FROM `使用者`");
  $count_user = $sql_qry->query("SELECT count(*) FROM `使用者`");

  include("src/php/search_function.php");
?>
  
	
	

  
  <div id="result_area">
  <div id="user_group">
    <div class="group_header">
      <span class="group_title">使用者  (<?php echo $count_user->fetchColumn(); ?>)</span>
      <span id="user_group_toggle" class="material-icons">keyboard_arrow_down</span>
    </div>
    <div class="container" id="user_container">
    <?php
    while ($result_user = $select_user->fetch(PDO::FETCH_ASSOC))
    {
      $userID = $result_user['使用者編號'];
      $select_theUser = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$userID'");
      $result_theUser = $select_theUser->fetch(PDO::FETCH_ASSOC);
      echo '<div class="group_items">';
        echo '<div class="user_item" class="group_items">';
          echo '<img class="user_photo" src="src/user_photo/'.$userID.'.png">';
          echo '<span class="user_name">'.$result_theUser['姓名'].'&nbsp</span>';
          echo '<span class="user_identity">'.$result_theUser['身分'].'&nbsp</span>';
          echo '<span class="user_email">'.$result_theUser['帳號'].'@mail.nuk.edu.tw</span>';
        echo '</div>';
      echo '</div>';
    }
    ?>
    </div>
  </div>
  

  <div id="meeting_group">
    <div class="group_header">
      <span class="group_title">會議  (<?php echo $count_meeting->fetchColumn(); ?>)</span>
      <span id="meeting_group_toggle" class="material-icons">keyboard_arrow_down</span>
    </div>

    

    <div class="container"  id="meeting_container">
      <?php
      while ($result_meeting = $select_meeting->fetch(PDO::FETCH_ASSOC))
      {
        $meetingID = $result_meeting['會議編號'];
        $select_theMeeting = $sql_qry->query("SELECT * FROM `會議` WHERE `會議編號` = '$meetingID'");
        $result_theMeeting = $select_theMeeting->fetch(PDO::FETCH_ASSOC);
        echo '<div id="meeting_group_items" class="group_items" onclick="makeActive(this)" id="' . $meetingID . '">';
          echo '<div class="meeting_item" >';
            echo '<span class="material-icons">groups</span>';
            echo '<span class="meeting_name">'.$result_theMeeting['會議名稱'].'</span>';
            echo '<span class="meeting_date">'.$result_theMeeting['開會時間'].'</span>';
          echo '</div>';
          
        echo '</div>';
      }
      ?>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="src/js/search.js"></script>
