<?php
session_start() ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
if(!empty($_POST['txt_login']) && !empty($_POST['txt_password']))
{
  $password = sha1($_POST['txt_password']) ;
  $rs = $conn->query("select * from users where login='". $conn->escape_string($_POST['txt_login']). "' and password='". $conn->escape_string($password) ."' limit 1") ;
  echo $conn->error ;
  $login = $rs->fetch_array()['login'] ;
  if($login == $_POST['txt_login'])
  {
    $_SESSION['logStatus'] = 1;
    $status = "ok" ;
    $msg = "ok" ;
  }
  else {
    $msg = "รหัสผ่านไม่ถูกต้อง" ;
    $status = "" ;
  }
}
else {
  $msg =  "ข้อมูลไม่ครบ" ;
  $status = "" ;
}
// return JSON
echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
