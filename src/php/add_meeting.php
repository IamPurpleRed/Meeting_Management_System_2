<?php
require_once("sql_connect.inc.php");
$meeting_id = $_GET["meeting_id"];
//會議基本資料輸入
$title = $_POST["title"];
$date = $_POST["date"];
$place = $_POST["place"];
$chairman_speak = $_POST["chairmanSpeak"];
$meeting_content = $_POST["meetingContent"];
$op = $sql_qry->query("INSERT INTO `會議`(`會議名稱`,`開會地點`,`開會時間`,`主席致詞`,`報告內容`) values('$title','$date','$place','$chairman_speak','$meeting_content');");
//會議基本資料輸入結束


//參與人員輸入
$select = $sql_qry->query("SELECT `使用者編號` FROM `使用者` ;");
$i = 0;
while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
  $user_id[$i] = $result["使用者編號"];
  $i = $i + 1;
}
foreach ($user_id as $id) {
  $member[$id] = $_POST["append$id"];
  if ($member[$id] == 1) {
    $role = $_POST["role$id"];
    if (isset($_POST["view$id"]))
      $view = $_POST["view$id"];
    else
      $view = 0;
    if (isset($_POST["edit$id"]))
      $edit = $_POST["edit$id"];
    else
      $edit = 0;

    $op = $sql_qry->query("INSERT INTO `參與`(`會議編號`,`使用者編號`,`角色`,`閱讀權限`,`編輯權限`) values('$meeting_id','$id','$role','$view','$edit');");
  }
}
//參與人員輸入結束


//討論事項輸入
for ($i = 1; $i < 11; $i++) {
  $a = "discussion" . $i . "Title";
  $b = "discussion" . $i . "Content";
  $c = "discussion" . $i . "Resolution";
  $d = "discussion" . $i . "Implementation";
  if (isset($_POST[$a])) {
    $disTitle = $_POST[$a];
    $disContent = $_POST[$b];
    $disResolution = $_POST[$c];
    $disImplementation = $_POST[$d];
    $op = $sql_qry->query("INSERT INTO `討論事項`(`會議編號`,`案由`,`說明`,`決議事項`,`執行情況`) values('$meeting_id','$disTitle','$disContent','$disResolution','$disImplementation');");
  }
}
//討論事項輸入結束
header("Location:../../edit_meeting.php");
