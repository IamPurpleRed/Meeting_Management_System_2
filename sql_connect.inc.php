<meta charset="utf-8">
<?php
    $db_server = '127.0.0.1'; 
    $db_name = 'meeting-system';
    $db_user = 'root';
    $db_passwd = ''; 
    $sql = "mysql:host=$db_server;port=3306;dbname=$db_name";
    try {
        $sql_qry = new PDO($sql, $db_user, $db_passwd);
    } catch (PDOException $e) {
        die ("資料庫連線失敗");
    } 
?>