<?php
require_once("sql_connect.inc.php");
session_start();
$meeting_id = $_GET["meeting_id"];
//會議基本資料輸入
$title = $_POST["title"];
$date = $_POST["date"];
$place = $_POST["place"];
$chairman_speak = $_POST["chairmanSpeak"];
$meeting_content = $_POST["meetingContent"];
$op = $sql_qry->query("UPDATE `會議` SET `會議名稱`='$title',`開會地點`='$place', `開會時間`='$date',`主席致詞`='$chairman_speak',`報告內容`='$meeting_content' WHERE `會議編號`=$meeting_id");
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
  $select = $sql_qry->query("SELECT `身分` FROM `使用者` WHERE `使用者編號`=$id ;");
  $result = $select->fetch(PDO::FETCH_ASSOC);
  if ($member[$id] == 1) {
    $role = $_POST["role$id"];
  } else {
    $role = 0;
  }
  if ($result["管理員"] == "管理員") {
    $view = 1;
    $edit = 1;
  } else {
    if (isset($_POST["edit$id"])) {
      $edit = $_POST["edit$id"];
      $view = 1;
    } else {
      $edit = 0;
      if (isset($_POST["view$id"]))
        $view = $_POST["view$id"];
      else
        $view = 0;
    }
  }
  $op = $sql_qry->query("UPDATE`參與` SET `角色`='$role',`閱讀權限`='$view' , `編輯權限`='$edit' WHERE `會議編號`=$meeting_id AND `使用者編號`=$id");
}

//參與人員輸入結束


//討論事項輸入
$op = $sql_qry->query("DELETE FROM `討論事項` WHERE `會議編號`=$meeting_id");


for ($i = 1; $i < 21; $i++) {
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
$file_path = $_SERVER['DOCUMENT_ROOT'] . '/mms.csie.nuk.edu.tw/src/attachment/' . $meeting_id;
if (!file_exists($file_path)) {
  mkdir($file_path);
}

//附件輸入
// $select = $sql_qry->query("SELECT * FROM `附件` WHERE `會議編號`=$meeting_id ;");
// while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
//   $fname = $result["附件名稱"];
//   if()
// }
for ($i = 1; $i < 21; $i++) {
  if (isset($_FILES["attachment$i"])) {
    if ($_FILES["attachment$i"]['error'] === UPLOAD_ERR_OK) {
      if (file_exists('upload/' . $_FILES["attachment$i"]['name'])) {
        echo '檔案已存在。<br/>';
      } else {
        $file = $_FILES["attachment$i"]['tmp_name'];
        $dest = $_SERVER['DOCUMENT_ROOT'] . '/mms.csie.nuk.edu.tw/src/attachment/' . $meeting_id . '/' . $_FILES["attachment$i"]['name'];
        $path = 'src/attachment/' . $meeting_id . '/' . $_FILES["attachment$i"]['name'];
        $name = $_FILES["attachment$i"]['name'];
        # 將檔案移至指定位置
        move_uploaded_file($file, $dest);

        $op = $sql_qry->query("INSERT INTO `附件`(`會議編號`,`附件檔案`,`附件名稱`) values('$meeting_id','$path','$name');");
      }
    } else {
    }
  }
}
//附件輸入結束
header("Location:../../meeting_overview.php");
