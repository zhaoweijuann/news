
<?php 
	session_start();
	
	if((($_SESSION['name'])==NULL)&&($_SESSION['name']!=$namee)){
		?>
		<script>
		alert("先登录");
        window.location.href="../index.php";</script>
		
		<?php }?>
<?php
	header("Content-type:text/html;charset=gbk");
	include_once 'dbConnect/db.php';
	//mysql_query("set names gbk");
	$content=$_POST['content'];
	$userna=$_GET[xm];
	$id=@$_GET[id];
	
	if(($content!=NULL)&&($userna!=NULL)&&($id!=NULL)){
		
	$sql="INSERT INTO `review`(`userna`, `id`, `content`) VALUES (\"$userna\",$id,\"$content\")";
	
	
	$result=mysql_query($sql);
	
	if($result !=false)
	{?><script>
	
 window.location.href="usernewsdetail.php?id=<?php echo $id;?>&&xm=<?php echo  $userna;?>";
 </script>
	<?php }
	else
	{?><script>
		alert("评论失败");
 window.location.href="usernewsdetail.php?id=<?php echo $id;?>&&xm=<?php echo  $userna;?>";
  </script>
		 <?php }}
	else{?><script>
		alert("评论失败");
 window.location.href="usernewsdetail.php?id=<?php echo $id;?>&&xm=<?php echo  $userna;?>";
  </script>
		<?php }?>
	
	
	


