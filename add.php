<?php
include("check.php") ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
$status = "" ;
$msg = "" ;
if(!empty($_POST['txt_companyname']))
{
    $sql = "insert into company set companyname='". $conn->escape_string($_POST['txt_companyname'])."',position='". $conn->escape_string($_POST['txt_position'])."',amount=".$conn->escape_string($_POST['txt_amount']).",salary='".$conn->escape_string($_POST['txt_salary'])."',location='".$conn->escape_string($_POST['txt_location'])."'" ;

  $rs = $conn->query($sql) ;
  if($rs)
  {
    $status = "ok" ;
    $msg = "เพิ่มข้อมูลเรียบร้อย" ;
  }
  else
  {
    $msg = "เพิ่มข้อมูลไม่ได้" ;
  }
}
else {
  $msg = "ข้อมูลไม่ครบ" ;
}
echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
