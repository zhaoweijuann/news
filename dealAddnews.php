<?php
	header("Content-type:text/html;charset=gbk");
	include_once '../../user/dbConnect/db.php';
	mysql_query("set names gbk");
	$id=$_POST['id'];	 
	$newclass=$_POST['class']; 
	$title=$_POST['title'];
	$content=$_POST['content'];
	$adduser=$_POST['adduser'];	
	$allowedexts=array("gif","jpeg","jpg","pgn");
	$temp = explode(".",$_FILES["pic"]["name"]);
	$extension = end($temp);
	
	if((($_FILES["pic"]["type"]=="image/gif")||($_FILES["pic"]["type"]=="image/jprg")||($_FILES["pic"]["type"]=="image/jpg")||($_FILES["pic"]["type"]=="image/pjpeg")||($_FILES["pic"]["type"]=="image/png"))&&($_FILES["pic"]["size"]<204800)&&in_array($extension,$allowedexts)){
		echo $_FILES["pic"]["name"];
		if($_FILES["pic"]["error"]>0){
			echo "出错";
			}else{
			$dir = iconv("UTF-8","GBK","../../picc");
			if(!file_exists($dir)){
				mkdir($dir,0777,true);
				}
				
			if(file_exists("../../picc/".$_FILES["pic"]["name"])){
				echo "已存在";
				}else{
					move_upload_file($_FILES["pic"]["tmp_name"],"../../picc/".$_FILES["pic"]["name"]);
					echo "yes";
				}
			}
		}
	$destination = "../../picc/".$_FILES["pic"]["name"];
	
	$sql="INSERT INTO `news` ( `id` , `newclass`,`title` , `content` , `adduser` ,`pic`)
VALUES (\"$id\",\"$newclass\",\"$title\",\"$content\",\"$adduser\",\"$destination\")";
	
		$result=mysql_query($sql) or die(mysql_error());
		
		if($result!=null)
		{?>
        <script>
		alert("添加成功");
 		window.location.href="listnews.php";
  		</script>		
		<?PHP }else
		{ ?>
		<script>
		alert("添加失败");
 		window.location.href="listnews.php";
  		</script>
		<?php }
		mysql_close();
		?>
	




