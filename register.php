<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
</head>

<body>
<?php
	$name=$_POST['username'];
	$pwd=$_POST['password'];
	//创建数据库连接，使用字符集
	$link=mysqli_connect('localhost','root','root','login');
	mysqli_set_charset($link,'utf8');
	//获取结果
	$sql="INSERT INTO userinfo (username, password)
	VALUES ('$name', '$pwd')";
 	if (mysqli_query($link, $sql)) {
		header('Location: login.html');
		} 
	else {
    		header('location:fail.php');
		} 
	mysqli_close($link);
	


?>

</body>
</html>


