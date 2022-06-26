<?php
require_once("sql_connect.inc.php");
session_start();
$id = $_GET["id"];
echo $id;
$op = $sql_qry->query("DELETE FROM `使用者` WHERE `使用者編號`=$id");
if ($_SESSION["last_page"] == "overview")
  header("Location:/mms.csie.nuk.edu.tw/personnel_overview.php");
elseif ($_SESSION["last_page"] == "management")
  header("Location:/mms.csie.nuk.edu.tw/personnel_management.php");
