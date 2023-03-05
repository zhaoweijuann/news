
<html>
<head><title>登录</title></head>	
<meta charset="utf-8" />
	<body background="IMG_0039.JPG">
		<br/><br/><br/>
		<center>
			<h2>欢迎来到密码修改界面</h2>
            <?php 
			
			$name=@$_GET[id];
			
			?>
		<form action="dealmodamdin.php?id=<?php echo $name;?>" enctype="multipart/form-data" method="post">
        <table>       
          <tr>
        	<td width="50px">旧密码</td>
            <td><input type="password" name="password1"></td>
        </tr>
        <tr>
        	<td width="50px">新密码</td>
            <td><input type="password" name="password2"></td>
        </tr>
        </table>
        </br>
		<input type="submit" value="提交">
			
		</form>	
			
		</center>
	</body>	
</html>
