<body background="../picc/《no.100000》15.jpg"> 

<meta charset="utf-8">
<div style="height:100px"></div>
<center>
<table border=1 align="center">
<tr height="50px" align="center">
	<td width="200px">账户</td>
	<td width="200px">密码</td>
    <td width="200px">注册时间</td>
	<td width="200px">出生日期</td>
	<td width="200px">性别</td>
    <td width="200px">修改</td>
	<td width="200px">删除</td>
</tr>	
<?php
	include_once '../user/dbConnect/db.php';
	$sql="select * from users";
	$result=mysql_query($sql);	
	while($array=mysql_fetch_array($result))
	{
		echo
			"<tr height=\"50px\" align=\"center\">					
					<td>$array[name]</td>
					<td>$array[password]</td>
					<td>$array[regtime]</td>
					<td>$array[birthday]</td>
					<td>$array[sex]</td>
					<td><a href='modpeo.php?id=$array[name]' style=\"text-decoration:none;color:#666;\">modify</a></td>
					<td><a href='dealdelete.php?id=$array[name]' style=\"text-decoration:none;color:#666;\">drop</a></td>
			</tr>";		
	}
?>	
</table>
</center>
</body>