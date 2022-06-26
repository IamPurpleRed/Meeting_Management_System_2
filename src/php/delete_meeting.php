<?php
require_once("sql_connect.inc.php");
$mid = $_GET["meetingID"];
$op = $sql_qry->query("DELETE FROM `會議` WHERE `會議編號`=$mid");
header("Location:/mms.csie.nuk.edu.tw/meeting_overview.php");
