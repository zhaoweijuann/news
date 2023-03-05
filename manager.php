<html>
<?php 
$id=@$_GET[id]; 
?>
<body background="../picc/《no.100000》15.jpg">
<center>
<div style="height:100px"></div>
<table border="1" width=200px >

<tr height="50px" align="center" > <td><a href="manager/addnews.php" target="show" style="text-decoration:none;color:#666">添加新闻</a><br/></td> </tr>
<tr height="50px" align="center"> <td><a href="manager/listnews.php?page=1" target="show" style="text-decoration:none;color:#666">显示新闻</a><br/> </td></tr>
<tr height="50px" align="center"><td> <a href="manager/adduser.php" target="show" style="text-decoration:none;color:#666">添加管理员</a><br/> </td></tr>
<tr height="50px" align="center"><td> <a href="manager/modadmin.php?id=<?php echo $id; ?>" target="show" style="text-decoration:none;color:#666">密码修改</a><br/> </td></tr>
<tr height="50px" align="center"> <td><a href="manager/listuser.php" target="show" style="text-decoration:none;color:#666">显示管理员账户</a><br/> </td></tr>
<tr height="50px" align="center" > <td><a href="listpeo.php" target="show" style="text-decoration:none;color:#666">显示用户</a><br/></td> </tr>
<tr height="50px" align="center" > <td><a href="listreview.php" target="show" style="text-decoration:none;color:#666">显示评论</a><br/></td> </tr>
<tr height="50px" align="center"> <td><a href="index2.php" target="_top" style="text-decoration:none;color:#666">退出登录</a><br/> </td></tr>


</table>

</center>	
	
	
</body>	
	
</html>