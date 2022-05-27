<meta charset="utf-8">
<?php
    $db_server = 'localhost'; 
    $db_name = 'meeting-system';
    $db_user = 'root';
    $db_passwd = '12345678'; 
    $sql = "mysql:host=$db_server;dbname=$db_name";
    try {
        $sql_qry = new PDO($sql, $db_user, $db_passwd);
    } catch (PDOException $e) {
        die ("資料庫連線失敗");
    } 
?>