<?php
session_start();
if(!isset($_SESSION["appno"])){
header("Location: login.php");
exit(); }
?>