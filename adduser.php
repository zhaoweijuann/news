<html>
<body background="../../《no.100000》15.jpg">
	<center>
	<b><h2>添加管理员</h2></b><br/>
    <div>
		<form action="dealAdduser.php" method="post">
        <table>
        	<tr>
            	<td>用户名</td>
            	<td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
            	<td>密码</td>
            	<td><input type="password" name="password"  id="password"></td>
            </tr>
            <tr>
            	<td>再输入一次密码</td>
            	<td><input type="password" name="password1" id="password1"></td>
            </tr>
        </table>
		</br>
		<input type="submit" value="注册" onClick=" return check1()">
				
		</form>
	</div>
		</center>
	<script language="javascript" type="text/javascript">
				
		function check1()
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