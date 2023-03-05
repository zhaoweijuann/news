<html>
<meta charset="utf-8" />
<?php
	error_reporting(0);
	mysql_query("set names gbk");
	include_once("../../user/dbConnect/db.php");
	$pass=$_POST['password1'];
	$name=$_GET['id'];
	$password=$_POST['password2'];
	
	$sql="select * from admin where username='$name'";
	$que=mysql_query($sql);
	$res=mysql_fetch_array($que);
	
	if(strcmp($res[userpwd],$pass)==0){
		$sqll="UPDATE `admin` SET `userpwd`='$password' WHERE `username`='$name'";
		$query=mysql_query($sqll);
		$result=mysql_fetch_array($query);
		if($result){
			echo "修改失败！！！";
			}else{
				echo "修改成功！！";
				}
		}else{
			echo "密码错误！！";
			}
	?>
	
	</html>

