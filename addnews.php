<?php

include_once '../../user/dbConnect/db.php';
?>
<html>

	<head><title>添加新闻</title></head>	
	<body background="../../《no.100000》15.jpg">
		<center>
			<h2>添加新闻</h2>
			<form action="dealAddnews.php" method="post" enctype="multipart/form-data">
				标题<br/>
				<input type="text" name="title"><br/>
                编号(0-999999)<br/>
                <input type="text" name="id"><br/>
                类型<br/>
                <select name="class">
                <option>国内新闻</option>
                <option>国际新闻</option>
                <option>体育新闻</option>
                <option>娱乐新闻</option>
                <option>校园新闻</option>
                <option>其他新闻</option>
                </select><br/>
				内容<br/>
				<textarea name="content" cols ="70" rows = "25"></textarea><br/>
                图片<br/>
                &emsp;&emsp;&emsp;&emsp;<input name="pic" type="file" >
                <br/>
                作者<br/>
                <input type="text" name="adduser"><br/>
				<input type="submit" value="提交">
				
				
			</form>	
			
			
		</center>	
		
		
		
	</body>
	
	
</html>
<script>
 function getFullPath(obj)
        {
            if(obj)
            {
                //ie
                if (window.navigator.userAgent.indexOf("MSIE")>=1)
                {
                    obj.select();
                    return document.selection.createRange().text;
                }
                //firefox
                else if(window.navigator.userAgent.indexOf("Firefox")>=1)
                {
                    if(obj.files)
                    {
                        return obj.files.item(0).getAsDataURL();
                    }
                    return obj.value;
                }
                return obj.value;
            }
        } 
</script>

<!--<script>
function previewFile(){
	var preview = document.querySelector('img');
	var file = document.querySelector('input[typefile]'.files[0]);
	var reader = new FileReader();
	reader.onload = function(){
		preview.src = reader.result;
		}
		if(file){
			reader.readAsDataURL(file);
			}else{
				preview.src="";
				}
	}
</script>
-->
