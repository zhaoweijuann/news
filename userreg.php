
<html>
<meta charset="utf-8">
<head><title>注册</title></head>	
	<body background="../picc/IMG_0039.JPG">
		<br/><br/><br/>
		<center>
			<h2>欢迎来到注册界面</h2>
		<form action="dealreg.php" method="post">
        <table>
        
        <tr>
        	<td width="150px">用户名</td>
            <td><input type="text" name="username" id="username" autocomplete="off"></td>
        </tr>
        <tr>
        	<td width="150px">密  码</td>
            <td><input type="password" name="password" id="password" autocomplete="off"></td>
        </tr>
        <tr>
            	<td width="150px">再输入一次密码</td>
            	<td><input type="password" name="password1" id="password1"></td>
            </tr>
        </table>
        </br>
		<input type="submit" value="注册" onclick="return check()">
			
		</form>					
		</center>
        <script language="javascript" type="text/javascript">
				
		function check()
		{
			var user=document.getElementById("username").value;
			var pass=document.getElementById("password").value;
			var pass1=document.getElementById("password1").value;
			
			if(user=="" || pass=="")
			{
				alert("用户名或密码不能为空");
				return false;
			}
	
			if(pass.length<4)
			{
				alert("密码不能少于4位");
				return false;
				
			}
			if(pass!=pass1)
			{
				alert("两次输入的密码不一样，请重新输入");
				return false;
			}
			
		return true;
		}
		
	</script>
	</body>	
    
</html>