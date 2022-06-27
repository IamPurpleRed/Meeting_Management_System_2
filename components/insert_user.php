<?php  
ini_set('display_errors', 'on'); 
error_reporting(E_ALL); 
?> 
<?php
require_once("sql_connect.inc.php");
$account = $_POST["account"];
$the_password = $_POST["thePassword"];
$chk_password = $_POST["chkPassword"];
$name = $_POST["name"];
$sex = $_POST["gender"];
$manager = $_POST["manager"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$memberType = $_GET["mt"];
$query = "SHOW TABLE STATUS LIKE '使用者'";
$result = $sql_qry->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);

if ($_FILES["userPhotoFile"]['error'] === UPLOAD_ERR_OK){
  $temp = explode(".", $_FILES["userPhotoFile"]["name"]);
  $newfilename = $row["Auto_increment"].'.' . end($temp);
  $userPhoto = 'src/user_photo/' . $newfilename;
  $dest = $_SERVER['DOCUMENT_ROOT'] . '/mms.csie.nuk.edu.tw/src/user_photo/' . $newfilename;
  # 檢查檔案是否已經存在
  if (file_exists($dest)){
    $upload_result = 2;
  } else {
    $file = $_FILES['userPhotoFile']['tmp_name'];

    # 將檔案移至指定位置
    move_uploaded_file($file, $dest); 
    $upload_result = 1;
  }
} else {
  $upload_result = 0;
}

if ($upload_result == 1 && $the_password == $chk_password) {
  $sql="INSERT INTO `使用者`(`姓名`, `性別`, `個人電話`, `Email`, `帳號`, `密碼`, `身分`, `管理員`, `頭貼`) 
  VALUES ('$name', '$sex', '$phone', '$email', '$account', '$the_password', '$memberType', '$manager', '$userPhoto')";
    $op = $sql_qry->exec($sql);
    $uid = $sql_qry->lastInsertId();

    if ($memberType == "學生代表") {
        $student_ID = $_POST["stdId"];
        $schoolSystem = $_POST["stdSystem"];
        $degree = $_POST["stdClass"];

        $sql = "INSERT INTO `學生代表`(`使用者編號`, `學號`, `學制`, `班級`) VALUES('$uid', '$student_ID', '$schoolSystem', '$degree')";
        $op = $sql_qry->exec($sql);
      
    } elseif ($memberType == "系助理") {
        $tel = $_POST["assistantTel"];

        $sql = "INSERT INTO `系助理`(`使用者編號`, `辦公室電話`) VALUES('$uid', '$tel')";
        $op = $sql_qry->exec($sql);

    } else if ($memberType == "系上老師") {
        $rank = $_POST["schoolTeacherJob"];
        $tel = $_POST["schoolTeacherTel"];

        $sql = "INSERT INTO `系上老師`(`使用者編號`, `職級`, `辦公室電話`) VALUES('$uid', '$rank', '$tel')";
        $op = $sql_qry->exec($sql);

    } elseif ($memberType == "校外老師") {
        $school = $_POST["outsideTeacherSchool"];
        $department = $_POST["outsideTeacherDepartment"];
        $job_name = $_POST["outsideTeacherJob"];
        $tel = $_POST["outsideTeacherTel"];
        $address = $_POST["outsideTeacherAddr"];
        $bank_account = $_POST["outsideTeacherBank"];

        $sql = "INSERT INTO `校外老師`(`使用者編號`, `任職學校`, `系所`, `職稱`, `辦公室電話`, `聯絡地址`, `銀行帳號`) VALUES('$uid', '$school', '$department', '$job_name', '$tel', '$address', '$bank_account')";
        $op = $sql_qry->exec($sql);

    } elseif ($memberType == "業界專家") {
        $company = $_POST["industryExpertCompanyInput"];
        $job_name = $_POST["industryExpertTitleInput"];
        $tel = $_POST["industryExpertTelInput"];
        $address = $_POST["industryExpertAddrInput"];
        $bank_account = $_POST["industryExpertBankInput"];

        $sql = "INSERT INTO `業界專家`(`使用者編號`, `任職公司`, `職稱`, `辦公室電話`, `聯絡地址`, `銀行帳號`) VALUES('$uid', '$company', '$job_name', '$tel', '$address', '$bank_account')";
        $op = $sql_qry->exec($sql);

    } 
    echo "<script> alert('新增成功！')</script>";
    echo '<script>window.location.href="../../personnel_overview.php";</script>';
} 
else if ($upload_result == 0) {
  echo "頭貼無法上傳，新增失敗！\n";
}
else if ($upload_result == 2) {
  echo "頭貼檔案已存在，新增失敗！\n";
}
else {
  unlink($dest);
  echo "密碼不一致，新增失敗！\n";
}
?>
<a href="/mms.csie.nuk.edu.tw/personnel_overview.php">回上一頁</a>