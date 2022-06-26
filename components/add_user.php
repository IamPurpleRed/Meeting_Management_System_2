<?php
  $memberType = $_GET["mt"];
?>
<div id="main_container">
     <div id="form_area">
       <form action="src/php/insert_user.php?mt=<?php echo $memberType ?>" method="post" enctype="multipart/form-data">
         <div id="identity">身分: 
          <?php
            if ($memberType == '學生代表') echo '學生代表';
            else if ($memberType == '系助理') echo '系助理';
            else if ($memberType == '系上老師') echo '系上老師';
            else if ($memberType == '校外老師') echo '校外老師';
            else if ($memberType == '業界專家') echo '業界專家';
          ?>
         </div>
         <div class="input_area">
           <input class="input" id="account" name="account" type="text" required>
           <span class="label">帳號</span>
         </div>
         <div class="input_area">
           <input class="input" id="the_password" name="thePassword" type="password" required>
           <span class="label">密碼</span>
         </div>
         <div class="input_area">
           <input class="input" id="chk_password" name="chkPassword" type="password" required>
           <span class="label">確認密碼</span>
         </div>
         <div class="input_area">
           <input class="input" id="name" name="name" type="text" required>
           <span class="label">全名</span>
         </div>
         <div class="radio_btn_area">
           <span class="label">性別</span>
           <div class="container">
               <div>
                 <input class="input" id="gender_male" name="gender" type="radio" value="男" checked="true">
                 <span>男</span>
               </div>
               <div>
                 <input class="input" id="gender_female" name="gender" type="radio" value="女">
                 <span>女</span>
               </div>
           </div>
         </div>
         <div class="radio_btn_area">
           <span class="label">管理員</span>
           <div class="container">
               <div>
                 <input class="input" id="not_manager" name="manager" type="radio" value="非管理員" checked="true">
                 <span>非管理員</span>
               </div>
               <div>
                 <input class="input" id="is_manager" name="manager" type="radio" value="管理員">
                 <span>管理員</span>
               </div>
           </div>
         </div>
         <div class="input_area">
           <input class="input" id="email" name="email" type="email" required>
           <span class="label">電子信箱</span>
         </div>
         <div class="input_area">
           <input class="input" id="tel" name="phone" type="tel" required>
           <span class="label">電話</span>
         </div>

         <!-- 學生代表專屬欄位 START -->
         <?php if ($memberType == '學生代表') : ?>
           <div class="input_area">
             <input class="input" id="std_id" name="stdId" type="text" required>
             <span class="label">學號</span>
           </div>
           <div class="input_area">
             <input class="input" id="std_system" name="stdSystem" type="text" required>
             <span class="label">學制</span>
           </div>
           <div class="input_area">
             <input class="input" id="std_class" name="stdClass" type="text" required>
             <span class="label">班級</span>
           </div>
         <?php endif; ?>
         <!-- 學生代表專屬欄位 END -->

         <!-- 系助理專屬欄位 START -->
         <?php if ($memberType == '系助理') : ?>
          <div class="input_area">
             <input class="input" id="assistant_tel" name="assistantTel" type="tel" required>
             <span class="label">辦公室電話</span>
          </div>
         <?php endif; ?>
         <!-- 系助理專屬欄位 END -->
         
         <!-- 系上老師專屬欄位 START -->
         <?php if ($memberType == '系上老師') : ?>
          <div class="input_area">
             <input class="input" id="school_teacher_job" name="schoolTeacherJob" type="text" required>
             <span class="label">職級</span>
          </div>
          <div class="input_area">
             <input class="input" id="school_teacher_tel" name="schoolTeacherTel" type="tel" required>
             <span class="label">辦公室電話</span>
           </div>
         <?php endif; ?>
         <!-- 系上老師專屬欄位 END -->

         <!-- 校外老師專屬欄位 START -->
         <?php if ($memberType == '校外老師') : ?>
          <div class="input_area">
             <input class="input" id="outside_teacher_school" name="outsideTeacherSchool" type="text" required>
             <span class="label">任職學校</span>
           </div>
           <div class="input_area">
             <input class="input" id="outside_teacher_department" name="outsideTeacherDepartment" type="text"  required>
             <span class="label">系所</span>
           </div>
           <div class="input_area">
             <input class="input" id="outside_teacher_job" name="outsideTeacherJob" type="text" required>
             <span class="label">職稱</span>
           </div>
           <div class="input_area">
             <input class="input" id="outside_teacher_tel" name="outsideTeacherTel" type="tel" required>
             <span class="label">辦公室電話</span>
           </div>
           <div class="input_area">
             <input class="input" id="outside_teacher_addr" name="outsideTeacherAddr" type="text" required>
             <span class="label">聯絡地址</span>
           </div>
           <div class="input_area">
             <input class="input" id="outside_teacher_bank" name="outsideTeacherBank" type="text" required>
             <span class="label">銀行帳號</span>
           </div>
         <?php endif; ?>
         <!-- 校外老師專屬欄位 END -->

         <!-- 業界專家專屬欄位 START -->
         <?php if ($memberType == '業界專家') : ?>
          <div class="input_area">
             <input class="input" id="expert_company" name="industryExpertCompanyInput" type="text" required>
             <span class="label">任職公司</span>
           </div>
           <div class="input_area">
             <input class="input" id="expert_title" name="industryExpertTitleInput" type="text" required>
             <span class="label">職稱</span>
           </div>
           <div class="input_area">
             <input class="input" id="expert_tel" name="industryExpertTelInput" type="text" required>
             <span class="label">辦公室電話</span>
           </div>
           <div class="input_area">
             <input class="input" id="expert_addr" name="industryExpertAddrInput" type="text" required>
             <span class="label">聯絡地址</span>
           </div>
           <div class="input_area">
             <input class="input" id="expert_bank" name="industryExpertBankInput" type="text" required>
             <span class="label">銀行帳號</span>
           </div>
         <?php endif; ?>
         <!-- 業界專家專屬欄位 END -->

         <div id="btn_area">
           <button class="btn" id="add_btn" type="submit">
             <span class="material-icons">save</span>
             <span class="text">新增</span>
           </button>
         </div>

         <input type="file" id="userPhotoFile" name="userPhotoFile" accept="image/gif, image/jpeg, image/png" hidden/>
         
       </form>
      </div>
          <div id="photo_area">
            <img id="previewFile" src="src/images/profile-default.png">
            <label class="btn" for="userPhotoFile">
              <span class="material-icons">perm_media</span>
              <span class="text">選擇大頭貼</span>
            </label>
            <span id="hint">* 照片比例需為 1:1</span>
          </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="src/js/add_user.js"></script>
         