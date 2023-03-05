


<?php
		include_once("dbConnect/db.php");		
		$username=$_GET['id'];//用户原名
		$sql="select * from users where name=\"$username\"";
		$result=mysql_query($sql);
		$array=mysql_fetch_array($result);
		?>
	<html>
    <meta charset="utf-8">
	<head><title>修改用户信息</title></head>	
	<body background="../picc/pic.png">
		
        	<div style="height:10px"></div>
			<h2 align="center">修改用户信息</h2>
			<form action="" method="post" enctype="multipart/form-data">
            <div style="height:10px"></div>
			昵&emsp;称：&emsp;&emsp;&emsp;&emsp;<input type="text" id="name" name="name" value="<?php echo $username;?>"/>
            <div style="height:10px"></div>
		    <br/>            
            <div style="height:10px"></div>
			性&emsp;别：&emsp;&emsp;&emsp;&emsp;<input type="text" name="sex" value="<?php echo $array['sex'];?>"/>&emsp;&emsp;&emsp;&emsp;修改为:&emsp;&emsp;&emsp;&emsp;<select name="sex" id="sex" >
            <option>男</option>
            <option>女</option>
            </select>
            <div style="height:10px"></div>
		    <br/>            
            <div style="height:10px"></div>
            出生日期：&emsp;&emsp;&emsp;<input type="date" id="date" name="birthday" value="<?php echo $array['birthday'];?>"/>
            <div style="height:10px"></div>
		    <br/>            
            <div style="height:10px"></div>
			<center><input type="button" value="修改" onClick="timefuc()"/></center>
			</form>	
								
			
	
	</body>
    <script>
	function timefuc(){
	var usna='<?php echo $username ?>';
	var na=document.getElementById("name").value;
	var se=document.getElementById("sex").value;
   	var tm=document.getElementById("date").value;
	var url="dealuserinfo.php?id="+usna+"&&birthday="+tm+"&&name="+na+"&&sex="+se;
	window.location.href=url;
	}
    </script>
</html>