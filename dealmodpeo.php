<html>

<?php
	include_once("../user/dbConnect/db.php");	
	$username=$_GET['id'];
	
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
        <meta charset="utf-8">
        <script>
		alert("修改成功");
 		
  		</script>		
		<?PHP }else
		{ 
			
			echo "<center>修改失败！！！</center>";
		}
		mysql_close();
		?>
		
        </html>