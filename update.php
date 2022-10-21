<?php
include("check.php") ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
$status = "" ;
$msg = "" ;
if(!empty($_POST['txt_companyname']) && !empty($_POST['id']))
{
  $id = $_POST['id'] ;
  $sql = "update company set companyname='". $conn->escape_string($_POST['txt_companyname'])."',position='". $conn->escape_string($_POST['txt_position'])."',amount=".$conn->escape_string($_POST['txt_amount']).",salary='".$conn->escape_string($_POST['txt_salary'])."',location='".$conn->escape_string($_POST['txt_location'])." where id='". $id ."' " ;
  $rs = $conn->query($sql) ;
  if($rs)
  {
    $status = "ok" ;
    $msg = "แก้ไขข้อมูลเรียบร้อย" ;
  }
  else
  {
    $msg = "แก้ไขข้อมูลไม่ได้" ;
  }
}
else {
  $msg = "ข้อมูลไม่ครบ" ;
}
echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
