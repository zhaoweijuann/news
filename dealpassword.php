<?php
	error_reporting(0);
	mysql_query("set names gbk");
	include_once "dbConnect/db.php";
	$pass=$_POST['password1'];
	$name=$_GET['id'];
	$password=$_POST['password2'];
	
	$sql="select * from users where name='$name'";
	$que=mysql_query($sql);
	$res=mysql_fetch_array($que);
	
	if(strcmp($res[password],$pass)==0){
		$sqll="UPDATE `users` SET `password`='$password' WHERE `name`='$name'";
		$query=mysql_query($sqll);
		$result=mysql_fetch_array($query);
		if($result){
			?>
        <script>
		alert("修改失败");
 	
  		</script>		
		<?PHP 
			}else{
				?>
        <script>
		alert("修改成功");

  		</script>		
		<?PHP 
				}
		}else{
			echo "密码错误！！";
			}
	?>
	
	

