<?php
session_start();

    $DB_HOST	= "localhost";	  //数据库主机位置
	$DB_LOGIN	= "root";	  //数据库的使用账号
	$DB_PASSWORD	= "root";	  //数据库的使用密码
	$DB_NAME	= "login";           //数据库名称
	$conn = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD);
	mysqli_select_db($conn,$DB_NAME);
    mysqli_query($conn,"SET NAMES UTF8");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "UPDATE Course SET username='$username',password='$password'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>";
        echo "alert(\"success\")";
        echo "location.herf = \"mana.php\"";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert(\"fail\")";
        echo "location='javascript:history.go(-1)'";
        echo "</script>";
    }

?>