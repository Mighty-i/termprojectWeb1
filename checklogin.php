<?php
include("connect.php") ;
$login = $conn->escape_string($_POST['txt_login']);
$pass = sha1($conn->escape_string($_POST['txt_password']));
if(!empty($login) && !empty($pass))
{
    $sql = "select login from users where login='$login' and password='$pass' limit 1";
    $rs = $conn->query($sql);
    $user = $rs->fetch_array()['login'];
    if($user == $login)
    {
        session_start();
        $_SESSION['loginstatus'] = 1;
        header('location:index.php');
    }
    else{
        echo"ไม่พบผู้ใข้ในระบบ <a href='login.php'>ย้อนกลับ</a>";
    }
}
else{
    echo "ข้อมูลไม่ครบ <a href='login.php'>ย้อนกลับ</a>";
}
?>