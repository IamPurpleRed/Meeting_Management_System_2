<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>個人資料 | 高大資工會議管理系統</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/profile.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <!-- 插入 /components/navigation.html -->
  <?php
  include("components/navigation.php");
  ?>
  <?php
  include("src/php/sql_connect.inc.php");
  session_start();
  $id = $_SESSION["loginMember"]["使用者編號"];
  $account = $_SESSION["loginMember"]["帳號"];
  $qry = "SELECT * FROM `使用者` WHERE `使用者編號`= $id;";
  $select = $sql_qry->query($qry);
  $result = $select->fetch(PDO::FETCH_ASSOC);
  $_SESSION["identity"] = $result["身分"];

  ?>

  <h2 id="page_title">個人資料</h2>
  <hr id="page_hr">
  <div id="main_container">
    <div id="form_area">
      <form action="src/php/change_member_info.php" method="post">
        <div id="number">使用者編號: <?php echo $result["使用者編號"] ?></div>
        <div id="identity">身分: <?php echo $_SESSION["identity"] ?></div>
        <div class="input_area">
          <input class="input" id="account" name="account" type="text" value=<?php echo $result["帳號"] ?> required disabled>
          <span class="label">帳號</span>
        </div>
        <div class="input_area">
          <input class="input" id="old_password" name="oldPassword" type="password" required disabled> <!-- 此欄位需留空 -->
          <span class="label">舊密碼</span>
        </div>
        <div class="input_area">
          <input class="input" id="new_password" name="newPassword" type="password" required disabled> <!-- 此欄位需留空 -->
          <span class="label">新密碼</span>
        </div>
        <div class="input_area">
          <input class="input" id="name" name="name" type="text" value="<?php echo $result["姓名"] ?>" required disabled>
          <span class="label">全名</span>
        </div>
        <div class="radio_btn_area">
          <span class="label">性別</span>
          <div class="container">
            <?php if ($result["性別"] == "男") : ?>
              <div>
                <input class="input" id="gender_male" name="gender" type="radio" value="男" disabled checked="true">
                <span>男</span>
              </div>
              <div>
                <input class="input" id="gender_female" name="gender" type="radio" value="女" disabled>
                <span>女</span>
              </div>
            <?php endif; ?>
            <?php if ($result["性別"] == "女") : ?>
              <div>
                <input class="input" id="gender_male" name="gender" type="radio" value="男" disabled>
                <span>男</span>
              </div>
              <div>
                <input class="input" id="gender_female" name="gender" type="radio" value="女" disabled checked="true">
                <span>女</span>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="input_area">
          <input class="input" id="email" name="email" type="email" value=<?php echo $result["Email"] ?> required disabled>
          <span class="label">電子信箱</span>
        </div>
        <div class="input_area">
          <input class="input" id="tel" name="phone" type="tel" value=<?php echo $result["個人電話"] ?> required disabled>
          <span class="label">電話</span>
        </div>


        <!-- 學生代表專屬欄位 START -->
        <?php if ($_SESSION["identity"] == "學生代表") : ?>
          <?php
          $qry = "SELECT * FROM `學生代表` WHERE `使用者編號`= $id;";
          $select = $sql_qry->query($qry);
          $result = $select->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="input_area">
            <input class="input" id="std_id" name="stdId" type="text" value=<?php echo $result["學號"] ?> required disabled>
            <span class="label">學號</span>
          </div>
          <div class="input_area">
            <input class="input" id="std_system" name="stdSystem" type="text" value=<?php echo $result["學制"] ?> required disabled>
            <span class="label">學制</span>
          </div>
          <div class="input_area">
            <input class="input" id="std_class" name="stdClass" type="text" value=<?php echo $result["班級"] ?> required disabled>
            <span class="label">班級</span>
          </div>
        <?php endif; ?>
        <!-- 學生代表專屬欄位 END -->

        <!-- 系助理專屬欄位 START -->
        <?php if ($_SESSION["identity"] == "系助理") : ?>
          <?php
          $qry = "SELECT * FROM `系助理` WHERE `使用者編號`= $id;";
          $select = $sql_qry->query($qry);
          $result = $select->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="input_area">
            <input class="input" id="assistant_tel" name="assistantTel" type="tel" value=<?php echo $result["辦公室電話"] ?> required disabled>
            <span class="label">辦公室電話</span>
          </div>
        <?php endif; ?>
        <!-- 系助理專屬欄位 END -->

        <!-- 系上老師專屬欄位 START -->
        <?php if ($_SESSION["identity"] == "系上老師") : ?>
          <?php
          $qry = "SELECT * FROM `系上老師` WHERE `使用者編號`= $id;";
          $select = $sql_qry->query($qry);
          $result = $select->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="input_area">
            <input class="input" id="school_teacher_job" name="schoolTeacherJob" type="text" value=<?php echo $result["職級"] ?> required disabled>
            <span class="label">職級</span>
          </div>
        <?php endif; ?>
        <!-- 系上老師專屬欄位 END -->

        <!-- 校外老師專屬欄位 START -->
        <?php if ($_SESSION["identity"] == "校外老師") : ?>
          <?php
          $qry = "SELECT * FROM `校外老師` WHERE `使用者編號`= $id;";
          $select = $sql_qry->query($qry);
          $result = $select->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="input_area">
            <input class="input" id="outside_teacher_school" name="outsideTeacherSchool" type="text" value=<?php echo $result["任職學校"] ?> required disabled>
            <span class="label">任職學校</span>
          </div>
          <div class="input_area">
            <input class="input" id="outside_teacher_department" name="outsideTeacherDepartment" type="text" value=<?php echo $result["系所"] ?> required disabled>
            <span class="label">系所</span>
          </div>
          <div class="input_area">
            <input class="input" id="outside_teacher_job" name="outsideTeacherJob" type="text" value=<?php echo $result["職稱"] ?> required disabled>
            <span class="label">職稱</span>
          </div>
          <div class="input_area">
            <input class="input" id="outside_teacher_tel" name="outsideTeacherTel" type="tel" value=<?php echo $result["辦公室電話"] ?> required disabled>
            <span class="label">辦公室電話</span>
          </div>
          <div class="input_area">
            <input class="input" id="outside_teacher_addr" name="outsideTeacherAddr" type="text" value=<?php echo $result["聯絡地址"] ?> required disabled>
            <span class="label">聯絡地址</span>
          </div>
          <div class="input_area">
            <input class="input" id="outside_teacher_bank" name="outsideTeacherBank" type="text" value=<?php echo $result["銀行帳號"] ?> required disabled>
            <span class="label">銀行帳號</span>
          </div>
        <?php endif; ?>
        <!-- 校外老師專屬欄位 END -->

        <!-- 業界專家專屬欄位 START -->
        <?php if ($_SESSION["identity"] == "業界專家") : ?>
          <?php
          $qry = "SELECT * FROM `業界專家` WHERE `使用者編號`= $id;";
          $select = $sql_qry->query($qry);
          $result = $select->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="input_area">
            <input class="input" id="expert_company" name="industryExpertCompanyInput" type="text" value=<?php echo $result["任職公司"] ?> required disabled>
            <span class="label">任職公司</span>
          </div>
          <div class="input_area">
            <input class="input" id="expert_title" name="industryExpertTitleInput" type="text" value=<?php echo $result["職稱"] ?> required disabled>
            <span class="label">職稱</span>
          </div>
          <div class="input_area">
            <input class="input" id="expert_tel" name="industryExpertTelInput" type="text" value=<?php echo $result["辦公室電話"] ?> required disabled>
            <span class="label">辦公室電話</span>
          </div>
          <div class="input_area">
            <input class="input" id="expert_addr" name="industryExpertAddrInput" type="text" value=<?php echo $result["聯絡地址"] ?> required disabled>
            <span class="label">聯絡地址</span>
          </div>
          <div class="input_area">
            <input class="input" id="expert_bank" name="industryExpertBankInput" type="text" value=<?php echo $result["銀行帳號"] ?> required disabled>
            <span class="label">銀行帳號</span>
          </div>
        <?php endif; ?>
        <!-- 業界專家專屬欄位 END -->

        <div id="btn_area">
          <button class="btn" id="edit_btn" type="button">
            <span class="material-icons">edit</span>
            <span class="text">編輯</span>
          </button>
          <button class="btn" id="save_btn" type="submit">
            <span class="material-icons">save</span>
            <span class="text">儲存</span>
          </button>
        </div>
      </form>
    </div>
    <div id="photo_area">
      <img src="src/user_data/1.jpg">
      <button class="btn" href="#">
        <span class="material-icons">perm_media</span>
        <span class="text">選擇大頭貼</span>
      </button>
      <span id="hint">* 照片比例需為 1:1</span>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="src/js/nav.js"></script>
  <script src="src/js/profile.js"></script>
</body>

</html>