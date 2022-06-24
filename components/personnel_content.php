<?php  
ini_set('display_errors', 'on'); 
error_reporting(E_ALL); 
?> 
<?php 
session_start();
include("../src/php/sql_connect.inc.php");
$theSelectedUser = $_GET["ID"];
$select = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號` = '$theSelectedUser'");
$result = $select->fetch(PDO::FETCH_ASSOC);
?>
<img src="<?php echo $result['頭貼'] ?>">

<div class="data_area" id="person_title">
  <span id="name"><?php echo $result['姓名'] ?></span>
  <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
  <span id="identity"><?php echo $result['身分'] ?></span>
</div>
<div class="data_area" id="phone">
  <span class="material-icons">phone</span>
  <span><?php echo $result['個人電話'] ?></span>
</div>
<div class="data_area" id="email">
  <span class="material-icons">email</span>
  <span><?php echo $result['Email'] ?></span>
</div>

<?php
if ($result['身分'] == '學生代表') {
    $select_specific = $sql_qry->query("SELECT * FROM `學生代表` WHERE `使用者編號` = '$theSelectedUser'");
    $result_specific = $select_specific->fetch(PDO::FETCH_ASSOC);
    echo '
    <div class="data_area" id="std_system">
        <span>學制</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['學制'].'</span>
    </div>
    <div class="data_area" id="std_class">
        <span>班級</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['班級'].'</span>
    </div>';
}
else if ($result['身分'] == '系助理') {
    $select_specific = $sql_qry->query("SELECT * FROM `系助理` WHERE `使用者編號` = '$theSelectedUser'");
    $result_specific = $select_specific->fetch(PDO::FETCH_ASSOC);
    echo '
    <div class="data_area" id="assistant_tel">
        <span>辦公室電話</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['辦公室電話'].'</span>
    </div>';
}
else if ($result['身分'] == '系上老師') {
    $select_specific = $sql_qry->query("SELECT * FROM `系上老師` WHERE `使用者編號` = '$theSelectedUser'");
    $result_specific = $select_specific->fetch(PDO::FETCH_ASSOC);
    echo '
    <div class="data_area" id="school_teacher_job">
        <span>職級</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['職級'].'</span>
    </div>';
}
else if ($result['身分'] == '校外老師') {
    $select_specific = $sql_qry->query("SELECT * FROM `校外老師` WHERE `使用者編號` = '$theSelectedUser'");
    $result_specific = $select_specific->fetch(PDO::FETCH_ASSOC);
    echo '
    <div class="data_area" id="outside_teacher_school">
        <span>任職學校</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['任職學校'].'</span>
    </div>
    <div class="data_area" id="outside_teacher_department">
        <span>系所</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['系所'].'</span>
    </div>
    <div class="data_area" id="outside_teacher_tel">
        <span>辦公室電話</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['辦公室電話'].'</span>
    </div>';
}
else if ($result['身分'] == '業界專家') {
    $select_specific = $sql_qry->query("SELECT * FROM `業界專家` WHERE `使用者編號` = '$theSelectedUser'");
    $result_specific = $select_specific->fetch(PDO::FETCH_ASSOC);
    echo '
    <div class="data_area" id="expert_company">
        <span>任職公司</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['任職公司'].'</span>
    </div>
    <div class="data_area" id="expert_title">
        <span>職稱</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['職稱'].'</span>
    </div>
    <div class="data_area" id="expert_tel">
        <span>辦公室電話</span>
        <span id="divide">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
        <span>'.$result_specific['辦公室電話'].'</span>
    </div>';
}

if ($_SESSION['loginMember']['管理員'] == '管理員') {
    echo '
    <div id="actions">
        <button class="btn" id="edit_btn" type="button">
            <span class="material-icons">edit</span>
            <span class="text">編輯資料</span>
        </button>
        <button class="btn" id="reset_pwd_btn" type="button">
            <span class="material-icons">refresh</span>
            <span class="text">重設密碼</span>
            <!-- 將會跳出 alert 視窗 -->
        </button>
    </div>';
}
?>

<script type="text/javascript">
    var uID = <?php echo json_encode($theSelectedUser); ?>;
</script>
<script src="src/js/personnel_content.js"></script>