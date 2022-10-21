<?php
include("check.php") ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
$status = "" ;
$msg = "" ;
if(!empty($_GET['id']))
{
  $id = $_GET['id'] ;
  $sql = "delete from company where Id=". $id ." " ;
  $rs = $conn->query($sql) ;
  if($rs)
  {
    $status = "ok" ;
    $msg =  "ลบข้อมูลเรียบร้อย" ;
  }
  else
  {
    $msg = "ลบข้อมูลไม่ได้" ;
  }
}
else {
  $msg = "ข้อมูลไม่ครบ" ;
}
echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
?>
