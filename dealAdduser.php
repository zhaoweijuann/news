<?php
	include_once '../../user/dbConnect/db.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="insert into admin values('$username','$password')";
	
	$result=mysql_query($sql);
	
	if($result !=false)
	{?>
        <script>
		alert("添加成功");
 		window.location.href="listuser.php";
  		</script>		
		<?PHP }else
		{ ?>
		<script>
		alert("添加失败");
 		window.location.href="listuser.php";
  		</script>
		<?php }
		mysql_close();
		?>