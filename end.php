<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>退出登录</title>
</head>

<body>
<?php
	ini_set("error_reporting","E_ALL $ ~E_NOTICE");
	header('content-type:text/html;charset=utf-8');
	if(isset($_cookie['username'])){
		setcookie('username',$username,time()-3600);
		echo '注销成功';
		}
?>
</body>
</html>