<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
?>
<?php
session_start();
include("../src/php/sql_connect.inc.php");
$theSelectedMeeting = $_GET["ID"];

$select = $sql_qry->query("SELECT * FROM `會議` WHERE `會議編號` = '$theSelectedMeeting'");
$result = $select->fetch(PDO::FETCH_ASSOC);

$select_dis = $sql_qry->query("SELECT * FROM `討論事項` WHERE `會議編號` = '$theSelectedMeeting'");

$select_attach = $sql_qry->query("SELECT * FROM `附件` WHERE `會議編號` = '$theSelectedMeeting'");

?>
<link rel="stylesheet" href="../src/css/style.css">
<link rel="stylesheet" href="../src/css/meeting_content.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
<h2><?php echo $result["會議名稱"] ?></h2>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">schedule</span>
    <span>時&emsp;&emsp;間：</span>
  </span>
  <span><?php echo $result["開會時間"] ?></span>
</div>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">place</span>
    <span>地&emsp;&emsp;點：</span>
  </span>
  <span><?php echo $result["開會地點"] ?></span>
</div>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">event_seat</span>
    <span>主&emsp;&emsp;席：</span>
  </span>
  <span>
    <?php
    $select_person = $sql_qry->query("SELECT * FROM `參與` WHERE `會議編號` = '$theSelectedMeeting'");
    while ($result_person = $select_person->fetch(PDO::FETCH_ASSOC)) {
      if ($result_person["角色"] == 1) {
        $uid = $result_person["使用者編號"];
        $select_chairman = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = $uid ;");
        $result_chairman = $select_chairman->fetch(PDO::FETCH_ASSOC);
        echo  $result_chairman["姓名"] . '(' . $result_chairman["身分"] . ')';
      }
    } ?>
  </span>
</div>
<div class="attribute">
  <span class="prefix">
    <span class=" material-icons">edit</span>
    <span>書&emsp;&emsp;記：</span>
  </span>
  <span>
    <?php
    $select_person = $sql_qry->query("SELECT * FROM `參與` WHERE `會議編號` = '$theSelectedMeeting'");
    while ($result_person = $select_person->fetch(PDO::FETCH_ASSOC)) {
      if ($result_person["角色"] == 2) {
        $uid = $result_person["使用者編號"];
        $select_record = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = $uid ;");
        $result_record = $select_record->fetch(PDO::FETCH_ASSOC);
        echo  $result_record["姓名"] . '(' . $result_record["身分"] . ')';
      }
    } ?>
  </span>
</div>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">groups</span>
    <span>與會人員：</span>
  </span>

  <span>
    <?php
    $select_person = $sql_qry->query("SELECT * FROM `參與` WHERE `會議編號` = '$theSelectedMeeting'");
    while ($result_person = $select_person->fetch(PDO::FETCH_ASSOC)) {
      if ($result_person["角色"] == 3) {
        $uid = $result_person["使用者編號"];
        $select_member = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = $uid ;");
        $result_member = $select_member->fetch(PDO::FETCH_ASSOC);
        echo  $result_member["姓名"] . '(' . $result_member["身分"] . ')' . '、';
      }
    } ?>
  </span>
</div>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">chat</span>
    <span>主席致詞：</span>
  </span>
  <span><?php echo $result["主席致詞"] ?></span>
</div>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">description</span>
    <span>報告內容：</span>
  </span>
  <span><?php echo $result["報告內容"] ?></span>
</div>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">fact_check</span>
    <span>討論事項：</span>
  </span>
</div>
<div id="discussion_container">
  <!-- 一個討論事項 START -->
  <?php $i = 1; ?>
  <?php while ($result_dis = $select_dis->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="item">
      <div class="discussion_index">提案 <?php echo $i; ?></div>
      <div class="wrap">
        <span class="subtitle">案&emsp;&emsp;由：</span>
        <span><?php echo $result_dis["案由"] ?></span>
      </div>
      <div class="wrap">
        <span class="subtitle">說&emsp;&emsp;明：</span>
        <span><?php echo $result_dis["說明"] ?></span>
      </div>
      <div class="wrap">
        <span class="subtitle">決議事項：</span>
        <span><?php echo $result_dis["決議事項"] ?></span>
      </div>
      <div class="wrap">
        <span class="subtitle">執行情況：</span>
        <span><?php echo $result_dis["執行情況"] ?></span>
      </div>
    </div>
  <?php $i++;
  } ?>
  <!-- 一個討論事項 END -->


</div>
<div class="attribute">
  <span class="prefix">
    <span class="material-icons">attachment</span>
    <span class="subtitle">附&emsp;&emsp;件：</span>
  </span>
</div>
<?php while ($result_attach = $select_attach->fetch(PDO::FETCH_ASSOC)) { ?>
  <ol id="attachment_container">
    <li><a href=<?php echo $result_attach["附件檔案"] ?>><?php echo $result_attach["附件名稱"]; ?></a></li>
  </ol>
<?php } ?>
<!-- 有選取會議 END -->
<div id="actions">
  <!-- 擁有編輯權限才看的到編輯按鈕 -->
  <?php
  $uid = $_SESSION["loginMember"]["使用者編號"];
  $select_person = $sql_qry->query("SELECT * FROM `參與` WHERE `會議編號` = '$theSelectedMeeting' AND `使用者編號`='$uid' ;");
  $result_person = $select_person->fetch(PDO::FETCH_ASSOC);
  if ($result_person["編輯權限"] == 1) :
  ?>
    <a href="/mms.csie.nuk.edu.tw/change_meeting_info.php?meetingID=<?php echo $theSelectedMeeting ?>">
      <button class="btn" id="edit_btn" type="button">
        <span class="material-icons">edit</span>
        <span class="text">編輯</span>
      </button>

    </a>
  <?php endif; ?>
  <!-- 系統管理員才看的到刪除按鈕 -->
  <?php if ($_SESSION["loginMember"]["管理員"] == "管理員") : ?>
    <a href="/mms.csie.nuk.edu.tw/src/php/delete_meeting.php?meetingID=<?php echo $theSelectedMeeting ?>">
    <button class="btn del" id="del_btn" type="button">
      <span class="material-icons">delete</span>
      <span class="text">移除</span>
    </button>
    </a>
  <?php endif; ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/mms.csie.nuk.edu.tw/src/js/meeting_content.js"></script>