<?php
session_start();
// if(!isset($_SESSION["name"])){
//     header('location:login.html');
//     exit();
// }else if($_SESSION["role"]<>"mana"){
//     header('location:login.html');
//     exit();
// }
    $DB_HOST	= "localhost";	  //数据库主机位置
	$DB_LOGIN	= "root";	  //数据库的使用账号
	$DB_PASSWORD	= "root";	  //数据库的使用密码
	$DB_NAME	= "login";           //数据库名称
	$conn = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD);
	mysqli_select_db($conn,$DB_NAME);
    mysqli_query($conn,"SET NAMES UTF8");
// $StuNo=$_SESSION['manname'];
$Show_sql = "SELECT * FROM userinfo Order by username"; 
$ShowResult = mysqli_query($conn,$Show_sql);  
// echo "enen";
?>
<html>
<title>Modify user information</title>
<body>
<center>
<form method="post" action="modify1.php?username=<?php echo $username ?>" enctype="multipart/form-data">
<table>
<!-- <tr bgcolor="#0066CC">
<td colspan="3" columspan="2"><div align="center"><font color="#FFFFFF">修改课程细节</font></div></td>
</font></tr> -->


<tr>
  <td>user name</td>
  <td><input type = text name = "username" size = 30 value="<?php echo $row['username'] ?>" ></td>
</tr>



<tr>
  <td>password</td>
  <td><input type = text name = "password" size = 2 value="<?php echo $row['password'] ?>" ></td>
</tr>



</table>
<input type="submit" value="modify" name="B1">
<input type="reset" value="reset" name="B2">
<form>
</center>
</body>
</html>



