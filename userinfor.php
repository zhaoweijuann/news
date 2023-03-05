<body background="../picc/pic.png"> 

<div style="height:100px"></div>
<center>
<table border=1 align="center">
<tr height="50px" align="center">
	<td width="200px">昵称</td>
    <td width="200px">注册时间</td>
	<td width="200px">出生日期</td>
	<td width="200px">性别</td>    
</tr>	
<?php
	$name=@$_GET['id'];
	
	
	include_once("dbConnect/db.php");
	$sql="select * from users where name=\"$name\"";
	$result=mysql_query($sql);	
	while($array=mysql_fetch_array($result)){
		echo  "<tr height=\"50px\" align=\"center\">					
					<td>$array[name]</td>
					<td>$array[regtime]</td>
					<td>$array[birthday]</td>
					<td>$array[sex]</td>
					
			</tr>";		
	}
?>	

</table>
</center>
</body>