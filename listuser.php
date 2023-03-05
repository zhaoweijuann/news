
<body background="../../picc/¡¶no.100000¡·15.jpg" > 
<div style="height:100px"></div>
<center>
<table border=1 align="center">
	
<tr height="50px" align="center">
		
	<td width="200px">ÕË»§Ãû</td>
	<td width="200px">ÃÜÂë</td>
	<td width="200px">É¾³ı</td>
</tr>	
<?php
	include_once '../../user/dbConnect/db.php';
	
	$sql="select * from admin";
	$result=mysql_query($sql);	
	while($array=mysql_fetch_array($result))
	{
		echo
			"<tr height=\"50px\" align=\"center\">					
					<td>$array[username]</td>
					<td>$array[userpwd]</td>
					<td><a href='dealDeleteuser.php?id=$array[username]' style=\"text-decoration:none;color:#666;\">É¾³ı</a></td>
			</tr>";
		
	}
	
	
	

?>

	
	
</table>

</center>

</body>