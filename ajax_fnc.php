<?php
include("check.php") ;
header('Content-Type: charset=utf-8');
include("connect.php") ;
$status = "" ;
$msg = "" ;

// if($_POST['action'] =='edit')
// {
//   if( !empty($_POST['id']))
//   {
//     $id = $conn->escape_string($_POST['id']) ;
//     $sql = "select * from  company where Id='". $id."' limit 1 " ;
//     $rs = $conn->query($sql) ;
//     $row = $rs->fetch_array() ;
//     echo json_encode($row) ;
//     exit() ;
//   }
// }



// delete function
if($_POST['action'] =='delete')
{
  if(!empty($_POST['id']))

  {
    $id = $conn->escape_string($_POST['id']) ;
    $sql = "delete from company where Id='". $id ."' " ;
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
  exit() ;
}



if($_POST['action'] =='add')
{
  if( !empty($_POST['txt_companyname']))
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
  exit() ;
}

// if($_POST['action'] =='update')
// {
//   if(!empty($_POST['txt_companyname']) && !empty($_POST['id']))
//   {
//     $id = $conn->escape_string($_POST['id']) ;
//     $sql = "update company set companyname='". $conn->escape_string($_POST['txt_companyname'])."',position='". $conn->escape_string($_POST['txt_position'])."',amount=".$conn->escape_string($_POST['txt_amount']).",salary='".$conn->escape_string($_POST['txt_salary'])."',location='".$conn->escape_string($_POST['txt_location'])." where id='". $id ."' " ;
//     $rs = $conn->query($sql) ;
//     if($rs)
//     {
//       $status = "ok" ;
//       $msg = "แก้ไขข้อมูลเรียบร้อย" ;
//     }
//     else
//     {
//       $msg = "แก้ไขข้อมูลไม่ได้" ;
//     }
//   }
//   else {
//     $msg = "ข้อมูลไม่ครบ" ;
//   }

//   echo '{"status":"'.$status.'","msg":"'.$msg.'"}' ;
//   exit() ;
// }
?>

