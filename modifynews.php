<?php
	include_once '../../user/dbConnect/db.php';
	mysql_query("set names gbk");
	$id=$_GET['id'];
	//echo $id;
	$sql="select * from news where id=$id";
	
	$result=mysql_query($sql);
	
	$array=mysql_fetch_array($result);
	$title=$array['title'];
	$content=$array['content'];
	$id=$array['id'];
	$adduser=$array['adduser'];
	$class=$array['newclass'];
	

?>
<html>
	<head><title>修改新闻</title></head>	
	<body>
		<center>
        	<div style="height:10px"></div>
			<h2>修改新闻</h2>
			<form action="dealModifynews.php?id=<?php echo $id; ?>" method="post">
            <div style="height:10px"></div>
			标题<br/>
            <div style="height:10px"></div>
		    <input type="text" name="title" value="<?php echo $title;  ?>"><br/>
            <div style="height:10px"></div>
            <select name="class" name="<?php echo $class;?>">
                <option>国内新闻</option>
                <option>国际新闻</option>
                <option>体育新闻</option>
                <option>娱乐新闻</option>
                <option>校园新闻</option>
                <option>其他新闻</option>
                </select>
                <br/>
             <div style="height:10px"></div>
			内容<br/>
            <div style="height:10px"></div>
			<textarea name="content" cols ="70" rows = "25" ><?php echo $content; ?></textarea><br/>
            图片<br/>
            &emsp;&emsp;&emsp;&emsp;<input name="pic" type="file" >
            <div style="height:10px"></div>
            作者<br/>
            <input type="text" name="adduser" value="<?php echo $adduser;  ?>"><br/>
            <div style="height:10px"></div>
            <div style="height:10px"></div>
			<input type="submit" value="修改">
			</form>	
								
			</center>	
	
	</body>

</html>
