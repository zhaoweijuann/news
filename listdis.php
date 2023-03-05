<!-- 用户信息主页 -->
<html>
<?php  
	$id = @$_GET['id'];
?>
<body background="../picc/pic.png">
<center>
<div style="height:100px"></div>
<table border="1" width=200px >
<tr height="50px" align="center">
	<td> <a href="index.php?xm=<?php echo $id;?>" target="_top" style="text-decoration:none;color:#666">新闻首页</a><br/>
 	</td></tr>
<tr height="50px" align="center" > 
	<td><a href="userinfor.php?id=<?php echo $id;?>" target="show" style="text-decoration:none;color:#666">显示信息</a><br/>
    </td> </tr>
<tr height="50px" align="center"> 
	<td><a href="usermod.php?id=<?php echo $id;?>" target="show" style="text-decoration:none;color:#666">修改信息</a><br/>
	</td></tr>
<tr height="50px" align="center">
	<td> <a href="modpass.php?id=<?php echo $id;?>" target="show" style="text-decoration:none;color:#666">修改密码</a><br/>
	</td></tr>
</table>

</center>	
	
	
</body>	
	
</html>