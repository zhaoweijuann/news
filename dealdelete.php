<meta charset="utf-8">
<?php

include_once '../user/dbConnect/db.php';
	$username=$_GET['id'];
	$sql="delete from users where name=\"$username\"";
	
		$result=mysql_query($sql);	
		if($result!=false)
		{
			?>
        <script>
		alert("删除成功");
 		window.location.href="listpeo.php";
  		</script>		
		<?PHP }else
		{ ?>
		<script>
		alert("删除失败");
 		window.location.href="listpeo.php";
  		</script>
			
	<?php }
	


?>