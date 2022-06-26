<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新增會議 | 高大資工會議管理系統</title><!-- 新增會議 or 編輯會議 -->
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/edit_meeting.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- 插入 /components/navigation.php -->
  <?php
  include("components/navigation.php");
  include("src/php/sql_connect.inc.php");
  ?>
  <?php
  $meeting_id = $_GET["meetingID"];
  $select = $sql_qry->query("SELECT * FROM `會議` WHERE `會議編號` = '$meeting_id'");
  $result = $select->fetch(PDO::FETCH_ASSOC);
  ?>
  <h2 id="page_title">編輯會議</h2><!-- 新增會議 or 編輯會議 -->
  <hr id="page_hr">
  <div id="main_container">
    <div id="number">會議編號:<?php echo $meeting_id ?> </div>
    <form action="src/php/edit_meeting.php?meeting_id=<?php echo $meeting_id ?>" method="post" enctype="multipart/form-data">
      <!-- 基本資料區域 START -->
      <div class="area_container">
        <h3>基本資料</h3>
        <div class="input_area">
          <input class="input" id="title" name="title" type="text" value=<?php echo $result["會議名稱"]; ?> required>
          <span class="label">會議名稱</span>
        </div>
        <div class="input_area">
          <input class="input" id="date" name="date" type="datetime-local" value=<?php echo $result["開會時間"]; ?> required>
        </div>
        <div class="input_area">
          <input class="input" id="place" name="place" type="text" value=<?php echo $result["開會地點"]; ?> required>
          <span class="label">開會地點</span>
        </div>
        <div class="text_area">
          <textarea class="input" id="chairman_speak" name="chairmanSpeak" value="" required><?php echo $result["主席致詞"]; ?></textarea>
          <span class="label">主席致詞</span>
        </div>
        <div class="text_area">
          <textarea class="input" id="meeting_content" name="meetingContent" value="" required><?php echo $result["報告內容"]; ?></textarea>
          <span class="label">報告內容</span>
        </div>
      </div>
      <!-- 基本資料區域 END -->

      <!-- 人員權限區域 START -->
      <?php
      $select = $sql_qry->query("SELECT * FROM `參與` WHERE `會議編號` = '$meeting_id'");
      ?>
      <div class="area_container">
        <h3>人員權限</h3>

        <table>
          <thead>
            <tr>
              <th>帳號</th>
              <th>姓名</th>
              <th id="identity">身分</th>
              <th id="view">檢視</th>
              <th id="edit">編輯</th>
              <th id="append">是否參與</th>
            </tr>
          </thead>
          <tbody id="members">

            <!-- 非系統管理員之情況 START -->
            <?php

            while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
              $member_unm = $result["使用者編號"];
              $select_person = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$member_unm'");
              $result_person = $select_person->fetch(PDO::FETCH_ASSOC);
            ?>
              <?php if ($result_person["管理員"] != "管理員") : ?>
                <tr id="user<?php echo $member_unm; ?>">
                  <td><?php echo $result_person["帳號"] ?></td>
                  <td><?php echo $result_person["姓名"] ?></td>
                  <td><?php echo $result_person["身分"] ?></td>
                  <td><input id="view<?php echo $member_unm ?>" name="view<?php echo $member_unm ?>" value="1" type="checkbox" <?php if ($result["閱讀權限"] == 1) : ?>checked<?php endif; ?>></td>
                  <td><input id="edit<?php echo $member_unm ?>" name="edit<?php echo $member_unm ?>" value="1" type="checkbox" <?php if ($result["編輯權限"] == 1) : ?>checked<?php endif; ?>></td>
                  <td>
                    <input id="append<?php echo $member_unm ?>_yes" name="append<?php echo $member_unm ?>" type="radio" value="1" <?php if ($result["角色"] != 0) : ?>checked<?php endif; ?>>
                    <label>Yes</label>
                    <select id="role<?php echo $member_unm ?>" name="role<?php echo $member_unm ?>" disabled>
                      <option value="" selected disabled hidden>請選擇參與身分</option>
                      <option value="1" <?php if ($result["角色"] == 1) : ?>selected="true" <?php endif; ?>>會議主席</option>
                      <option value="2" <?php if ($result["角色"] == 2) : ?>selected="true" <?php endif; ?>>書記</option>
                      <option value="3" <?php if ($result["角色"] == 3) : ?>selected="true" <?php endif; ?>>與會人員</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;
                    <input id="append<?php echo $member_unm ?>_no" name="append<?php echo $member_unm ?>" type="radio" value="0" <?php if ($result["角色"] == 0) : ?>checked<?php endif; ?>>
                    <label>No</label>
                  </td>
                </tr>
              <?php endif; ?>
              <!-- 非系統管理員之情況 END -->

              <!-- 系統管理員之情況 START -->
              <?php if ($result_person["管理員"] == "管理員") : ?>
                <tr id="user<?php echo $member_unm; ?>">
                  <td><?php echo $result_person["帳號"] ?></td>
                  <td><?php echo $result_person["姓名"] ?></td>
                  <td><?php echo $result_person["身分"] ?></td>
                  <td><input id="view<?php echo $member_unm ?>" name="view<?php echo $member_unm ?>" type="checkbox" value="1" checked disabled></td>
                  <td><input id="edit<?php echo $member_unm ?>" name="edit<?php echo $member_unm ?>" type="checkbox" value="1" checked disabled></td>
                  <td>
                    <input id="append<?php echo $member_unm ?>_yes" name="append<?php echo $member_unm ?>" type="radio" value="1" <?php if ($result["角色"] != 0) : ?>checked <?php endif; ?>>
                    <label>Yes</label>
                    <select id="role<?php echo $member_unm ?>" name="role<?php echo $member_unm ?>" disabled>
                      <option value="" selected disabled hidden>請選擇參與身分</option>
                      <option value="1" <?php if ($result["角色"] == 1) : ?>selected="true" <?php endif; ?>>會議主席</option>
                      <option value="2" <?php if ($result["角色"] == 2) : ?>selected="true" <?php endif; ?>>書記</option>
                      <option value="3" <?php if ($result["角色"] == 3) : ?>selected="true" <?php endif; ?>>與會人員</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;
                    <input id="append<?php echo $member_unm ?>_no" name="append<?php echo $member_unm ?>" type="radio" value="0" <?php if ($result["角色"] == 0) : ?>checked <?php endif; ?>>
                    <label>No</label>
                  </td>
                </tr>
              <?php endif; ?>
            <?php } ?>
            <!-- 系統管理員之情況 END -->
          </tbody>
        </table>

      </div>

      <!-- 人員權限區域 END -->

      <!-- 討論事項區域 START -->
      <div class="area_container" id="discussion_container">
        <h3>討論事項</h3>
        <button class="btn" id="add_discussion_btn" type="button">
          <span class="material-icons">add</span>
          <span class="text">新增討論事項</span>
        </button>

        <?php
        $select_dis = $sql_qry->query("SELECT * FROM `討論事項` WHERE `會議編號` = '$meeting_id'");
        $i = 1;
        ?>
        <?php while ($result_dis = $select_dis->fetch(PDO::FETCH_ASSOC)) { ?>
          <?php $origin_dis = $result_dis["討論事項編號"] ?>
          <div class="discussion_item" id="discussion<?php echo $i; ?>">
            <button class="btn del" id="del_discussion<?php echo $i; ?>_btn" type="button">
              <span class="material-icons">delete</span>
              <span class="text">刪除</span>
            </button>
            <div class="text_area">
              <textarea class="input" id="discussion<?php echo $i; ?>_title" name='discussion<?php echo $i; ?>Title' value="" required><?php echo $result_dis["案由"] ?></textarea>
              <span class="label">案由</span>
            </div>
            <div class="text_area">
              <textarea class="input" id="discussion<?php echo $i; ?>_content" name="discussion<?php echo $i; ?>Content" value="" required><?php echo $result_dis["說明"] ?></textarea>
              <span class="label">說明</span>
            </div>
            <div class="text_area">
              <textarea class="input" id="discussion<?php echo $i; ?>_resolution" name="discussion<?php echo $i; ?>Resolution" value="" required><?php echo $result_dis["決議事項"] ?></textarea>
              <span class="label">決議事項</span>
            </div>
            <div class="text_area">
              <textarea class="input" id="discussionimplementation<?php echo $origin_dis ?>" name="discussion<?php echo $i; ?>Implementation" value="" required><?php echo $result_dis["執行情況"] ?></textarea>
              <span class="label">執行情況</span>
            </div>
          </div>
        <?php $i++;
        } ?>
      </div>
      <!-- 討論事項區域 END -->

      <!-- 附件區域 START -->
      <div class="area_container">
        <h3>附件</h3>
        <button class="btn" id="add_attachment_btn" type="button">
          <span class="material-icons">add</span>
          <span class="text">新增附件</span>
        </button>
        <ol id="file_area">
        </ol>
      </div>
      <?php
      $select_attach = $sql_qry->query("SELECT * FROM `附件` WHERE `會議編號` = '$meeting_id'");
      ?>
      <!-- 附件區域 END -->

      <div class="area_container">
        <button class="btn" id="send_meeting_btn" name="sendMeetingBtn" type="submit">
          <span class="material-icons">save</span>
          <span class="text">儲存會議</span>
        </button>
      </div>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="src/js/nav.js"></script>
  <script src="src/js/edit_meeting.js"></script>
</body>

</html>