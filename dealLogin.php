<?php
	error_reporting(0);
	session_start();
	include_once "dbConnect/db.php";
	$user = $_POST['user'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if($user=="1"){	//管理员
	$sql="select * from admin where username='$username'";
	$ordresult=mysql_query($sql);
	$result=mysql_fetch_array($ordresult);
		if($result['userpwd']==$password)
	{
		$_SESSION['username']=$username;
		header("Location:../admin/index.php?id=$username");		
	}else{ ?>
    <meta charset="utf-8">
		<script>
		alert("无该账户或密码出错");
        window.location.href="../index.php";</script>
		<?php } 
	}else if($user=="2"){//用户
		$sql="select * from users where name='$username'";
	$ordresult=mysql_query($sql);
	$result=mysql_fetch_array($ordresult);
		if($result['password']==$password)
	{	session_start();
		$_SESSION["username"]=$username;
		header("Location:index.php");
	}else{  ?>
    <meta charset="utf-8">
		<script>
		alert("无该账户或密码出错");
        window.location.href="../index.php";</script>
		<?php  } 
		}?>
	
	

