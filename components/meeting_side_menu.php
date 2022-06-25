<?php
include("src/php/sql_connect.inc.php");
$theSelectedMeeting = null;

$select_meeting = $sql_qry->query("SELECT * FROM `會議`");
$count_meeting = $sql_qry->query("SELECT count(*) FROM `會議`");

?>

<div id="meeting_side_menu">
  <div class="group" id="meeting_group">
    <div class="container">
      <?php
      while ($result_meeting = $select_meeting->fetch(PDO::FETCH_ASSOC)) {

        $meetingID = $result_meeting['會議編號'];
        $select_theMeeting = $sql_qry->query("SELECT * FROM `會議` WHERE `會議編號` = '$meetingID'");
        $result_theMeeting = $select_theMeeting->fetch(PDO::FETCH_ASSOC);
        echo '<div class="item" onclick="makeActive(this)" id="' . $meetingID . '">';
        echo '  <div class="item">';
        echo '<span class="name">' . $result_meeting["會議名稱"] . '</span>';
        echo '<span class="datetime">' . $result_meeting["開會時間"] . '</span>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</div>