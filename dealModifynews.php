<?php
	include_once '../../user/dbConnect/db.php';
	mysql_query("set names gbk");
	$title=$_POST['title'];
	$content=$_POST['content'];
	$id=$_GET['id'];
	$pic="../../picc/".$_POST['pic'];
	$adduser=$_POST['adduser'];
	
	$sql="update news set title='$title',content='$content',pic='$pic',adduser='$adduser' where id=$id";
	
	$result=mysql_query($sql);
	if($result)
	{?>
        <script>
		alert("修改成功");
 		window.location.href="listnews.php";
  		</script>		
		<?PHP }else
		{ ?>
		<script>
		alert("修改失败");
 		window.location.href="listnews.php";
  		</script>
		<?php }
		mysql_close();
		?>