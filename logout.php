<?php
session_start();
$_SESSION['loginstatus']='';
header("location:login.php");
exit;

?>