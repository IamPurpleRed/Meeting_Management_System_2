<?php
require_once("sql_connect.inc.php");
session_start();
$ID = $_SESSION["loginMember"]["使用者編號"];
$name = $_POST["name"];
$sex = $_POST["gender"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$new_password = $_POST["newPassword"];
$old_password = $_POST["oldPassword"];
$identity = $_SESSION["identity"];

$select = $sql_qry->query("SELECT * FROM `使用者` WHERE `使用者編號`= $ID ;");
$result = $select->fetch(PDO::FETCH_ASSOC);

if ($old_password == $result["密碼"]) {
    if ($new_password != "") {
        $qry = "UPDATE `使用者` SET `密碼`='$new_password' WHERE `使用者編號`='$ID';";
        $op = $sql_qry->query($qry);
    }
    $qry = "UPDATE `使用者` SET `姓名`='$name',`性別`='$sex',`個人電話`='$phone',`Email`='$email' WHERE `使用者編號`='$ID';";
    //mysqli_query($sql,$qry);
    $op = $sql_qry->query($qry);
    if ($_SESSION["identity"] == "系上老師") {
        $rank = $_POST["schoolTeacherJob"];
        //$tel=$_POST["tel"];

        $qry = "UPDATE `系上老師` SET `辦公室電話`='$tel' WHERE `使用者編號`='$ID';";
        // mysqli_query($sql,$qry);
        $op = $sql_qry->query($qry);
    } elseif ($_SESSION["identity"] == "系助理") {
        $tel = $_POST["assistantTel"];

        $qry = "UPDATE `系助理` SET `辦公室電話`='$tel' WHERE `使用者編號`='$ID';";
        // mysqli_query($sql,$qry);
        $op = $sql_qry->query($qry);
    } elseif ($_SESSION["identity"] == "校外老師") {
        $school = $_POST["outsideTeacherSchool"];
        $department = $_POST["outsideTeacherDepartment"];
        $job_name = $_POST["outsideTeacherJob"];
        $tel = $_POST["outsideTeacherTel"];
        $address = $_POST["outsideTeacherAddr"];
        $bank_account = $_POST["outsideTeacherBank"];

        $qry = "UPDATE `校外老師` SET `任職學校`='$school',`系所`='$department',`職稱`='$job_name',`辦公室電話`='$tel',`聯絡地址`='$address',`銀行帳號`='$bank_account' WHERE `使用者編號`='$ID';";
        // mysqli_query($sql,$qry);
        $op = $sql_qry->query($qry);
    } elseif ($_SESSION["identity"] == "業界專家") {
        $company = $_POST["industryExpertCompanyInput"];
        $job_name = $_POST["industryExpertTitleInput"];
        $tel = $_POST["industryExpertTelInput"];
        $address = $_POST["industryExpertAddrInput"];
        $bank_account = $_POST["industryExpertBankInput"];

        $qry = "UPDATE `業界專家` SET `任職公司`='$company',`職稱`='$job_name',`辦公室電話`='$tel',`聯絡地址`='$address',`銀行帳號`='$bank_account' WHERE `使用者編號`='$ID';";
        // mysqli_query($sql,$qry);
        $op = $sql_qry->query($qry);
    } elseif ($_SESSION["identity"] == "學生代表") {
        $student_ID = $_POST["stdId"];
        $schoolSystem = $_POST["stdSystem"];
        $degree = $_POST["stdClass"];

        $qry = "UPDATE `學生代表` SET `學號`='$student_ID',`學制`='$schoolSystem',`班級`='$degree' WHERE `使用者編號`='$ID';";
        //mysqli_query($sql,$qry);
        $op = $sql_qry->query($qry);
    }
    header("Location:/mms.csie.nuk.edu.tw/profile.php");
} ?>
<?php
echo "舊密碼輸入錯誤\n";
?>
<a href="/mms.csie.nuk.edu.tw/profile.php">回上一頁</a>