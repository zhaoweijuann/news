<meta charset="utf-8">
<?php

include_once '../user/dbConnect/db.php';
	$reid=$_GET['id'];
	$sql="delete from review where review_id=\"$reid\"";
	
		$result=mysql_query($sql);	
		if($result!=false)
		{?>
        <script>
		alert("删除成功");
 		window.location.href="listreview.php";
  		</script>		
		<?PHP }else
		{ ?>
		<script>
		alert("删除失败");
 		window.location.href="listreview.php";
  		</script>
			
	<?php }
	


?>