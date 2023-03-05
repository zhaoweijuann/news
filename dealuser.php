<!-- 实现用户信息主页跳转 -->
<?php  
	session_start();
	$_SESSION["username"]=@$_GET[id];
	$id = @$_GET[id];
	if((($_SESSION["username"])==NULL)){
	?>
<script>alert("先登录");
 window.location.href="../index.php";</script>
<?php }?>

<html>
<meta charset="utf-8">
<head><title>该用户信息页面</title></head>	
	<frameset cols="%20,80%">   
		<frame src="listdis.php?id=<?php echo $id; ?>" name="listdis"/>
    
		<frame src="show.php?id=<?php echo $id;?>" name="show"/>		
	</frameset><noframes></noframes>
</html>