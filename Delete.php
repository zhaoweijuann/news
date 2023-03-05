<?php
session_start(); 

$DB_HOST	= "localhost";	  //数据库主机位置
$DB_LOGIN	= "root";	  //数据库的使用账号
$DB_PASSWORD	= "root";	  //数据库的使用密码
$DB_NAME	= "login";           //数据库名称
$conn = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD);
mysqli_select_db($conn,$DB_NAME);
mysqli_query($conn,"SET NAMES UTF8");
  $username = $_GET['username'];
  $Delete_SQL = "DELETE FROM userinfo WHERE username = '$username'";
  $Delete_Result = mysqli_query($conn,$Delete_SQL);

if ($Delete_Result) {
    header('location:mana.php');
} else { 
    echo "出错";
}

?>  