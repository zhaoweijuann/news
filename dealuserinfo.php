<html>
<meta charset="utf-8">
<?php
	include_once("dbConnect/db.php");	
	$username=$_GET['id'];//用户原名
	
	//mysql_query("set names gbk");
	$name=$_GET['name'];
	$sex=$_GET['sex'];	
	
	error_reporting(E_ALL);	
	$birthday=$_GET['birthday'];
	
	$sql="UPDATE `users` SET `name`='$name',`birthday`=(select STR_TO_DATE('$birthday','%Y-%m-%d')),`sex`='$sex' WHERE `name`='$username'";
	$result=mysql_query($sql);
	if($result)
	{	
		?>
        <script>
		alert("修改成功");
 		top.location.href="../index.php";
  		</script>		
		<?PHP }else
		{ 
			
			echo "<center>修改失败！！！</center>";
		}
		mysql_close();
		?>
		
        </html>