<?php
	include_once 'dbConnect/db.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="insert into users (`user_id`, `name`, `password`, `birthday`, `sex`) values('','$username','$password','','')";
	
	$result=mysql_query($sql);
	
	if($result !=false)
	{?>
    	<meta charset="utf-8">
		<script>
		
		alert("注册成功");
        window.location.href="../index.php";
        </script>
        <?php
	}
	else
	{?>
		<meta charset="utf-8">
		<script>
		
		alert("注册失败");
        window.location.href="userreg.php";
        </script>
	<?PHP }?>
	
	
	


