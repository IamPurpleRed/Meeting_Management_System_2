<?php  
ini_set('display_errors', 'on'); 
error_reporting(E_ALL); 
?> 
<?php
    $uID = $_POST['ID'];
    include("sql_connect.inc.php");
    $sql_getpwd="SELECT `密碼` FROM `使用者` WHERE `使用者編號`='$uID'";
    $getpwd = $sql_qry->query($sql_getpwd);
    $result = $getpwd->fetch(PDO::FETCH_ASSOC);
    $sql_changepwd = "UPDATE `使用者` SET `密碼` = '123' WHERE `使用者編號` = '$uID'";
    if($sql_qry->exec($sql_changepwd)) {
      echo "密碼已重設為123";
    }
    else if ($result['密碼'] == '123') {
      echo "原先密碼即為123";
    }
    else {
      echo "密碼重設失敗";
    }
?>