<meta charset="utf-8">
<?php
    session_start(); 
    
    if(isset($_POST["account"]) && isset($_POST["password"])){
        require_once("sql_connect.inc.php");
        
        $account = $_POST["account"];
        $password = $_POST["password"];
        
        $select = $sql_qry->query("SELECT * FROM `使用者` WHERE `帳號` = '$account' AND `密碼` = '$password'");
        $result = $select -> fetch(PDO::FETCH_ASSOC);
        
        if ($result['帳號'] == $account && $result['密碼'] == $password) {
            $_SESSION['loginMember'] = $result;
            header("Location:../../pages/homepage/homepage.php");
        }
        else {
            header("Location:../../pages/login.php?error=1");
        }
    }
?>
