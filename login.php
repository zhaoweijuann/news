<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
</head>

<body>
<?php	
	if($_POST['zhanghao']!=null && $_POST['mima']!=null){
	$name=$_POST['zhanghao'];
	$pwd=$_POST['mima'];
	$role=$_POST['role'];
	//创建数据库连接，使用字符集
	$link=mysqli_connect('localhost','root','root','login');
	if ($role=="mana"){
		$sql = "select * from maninfo where manname='$name'";

	}elseif ($role=="user") {
		$sql = "select * from userinfo where username='$name'";

	}
	$result=mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	mysqli_set_charset($link,'utf8');
	if($role=="mana"){
		if($row['manname']!=$name or $row['passwd']!=$pwd){
			header('location:fail.php');
			 }
		 else{			
			header('location:mana.php');
			}
	}else{
		if($row['username']!=$name or $row['password']!=$pwd){
			header('location:fail.php');
			 }
		 else{			
			header('location:index.html');
			}
	}
		 
	}
	


?>

</body>
</html>
