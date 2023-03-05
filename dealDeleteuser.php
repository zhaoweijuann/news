<?php
include_once '../../user/dbConnect/db.php';
	$username=$_GET['id'];
	$sql="delete from admin where username=\"$username\"";
	if($username != 'root'){
		$result=mysql_query($sql);	
		if($result!=false)
		{?>
        <script>
		alert("删除成功");
 		window.location.href="listuser.php";
  		</script>		
		<?PHP }else
		{ ?>
			<script>
		alert("删除失败");
 		window.location.href="listuser.php";
  		</script>
		<?php }}
		else{?>
        <script>
		alert("该用户不能删除！！！");
 		window.location.href="listuser.php";
  		</script>
        <?php }?>


