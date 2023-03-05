<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cookie限制</title>
</head>

<body>
<?php
	header('content-type:texy/html;charset=utf-8');
	if( ($_POST['username']!=null) && ($_POST['password']!=null) ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = mysqli_connect('localhost','root','root','login');
        mysqli_select_db($conn,'login');
        $sql = "select * from userinfo where username='$username'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($res);
        if($row['username']!=$username or $row['password']!=$password){
            echo '不能登录';
            header('location:fail.php');
        }
        else{
            setcookie('username',$username,time()+3600);
            echo '登录成功';
            header('location:index.html');
        }
    }

?>
</body>
</html>
