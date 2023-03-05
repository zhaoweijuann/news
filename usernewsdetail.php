<?php  
	session_start();
	$_SESSION["username"]=@$_GET[xm];
	$xm = @$_GET[xm];
	if((($_SESSION["username"])==NULL)){
	?>
<script>alert("先登录");
 window.location.href="../index.php";</script>
<?php }?>
<html>
<style>
.panel-footer a{
	text-decoration:none;
	font-family: PingFang SC,STHeiti,"Microsoft YaHei",simsun,sans-serif,Arial;
  font-weight: 400;
  color:#000
}
.footer{
	font-size:20px;}

.friends-content .view-title {
  padding: 29px 0 27px;
  overflow: hidden;
  border-top: 1px solid #ddd;
  line-height: 1;
  font-family: PingFang SC,STHeiti,"Microsoft YaHei",simsun,sans-serif,Arial;
  font-size: 12px;
  font-weight: 400;

}
.friends-content  {
  font-size: 20px;
  float: left;
  margin-right: 39px;
  line-height: 32px;
  color: #000;
  font-weight: 600;
}
#headd a{
        float:left; /*更改元素类型，也可以使用display：block；复制使用时，请注意中英文符号*/
        width: 100px;
        white-space: nowrap; 
        overflow: hidden; 
        text-overflow: ellipsis;
}
#headd a:hover{
	background-color: #A3F173;
	}
#headd td:hover{
	background-color: #A3F173;
	}
#content a{
	float:left; /*更改元素类型，也可以使用display：block；复制使用时，请注意中英文符号*/
        width: 350px;
        white-space: nowrap; 
        overflow: hidden; 
        text-overflow: ellipsis;
}
</style>
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 

<script>

var ming='<?php echo $_SESSION["username"] ?>';
function display(a){
	
	
	if(a=="1"){
	var newsclass="国内新闻"
	
	var url="../user/usernewsclass.php?newsclass="+newsclass+"&&xm="+ming;
	
	window.location.href=url;
	}else if(a=="2"){
	
	var newsclass="国际新闻"
	var url="../user/usernewsclass.php?newsclass="+newsclass+"&&xm="+ming;
	window.location.href=url;
		}else if(a=="3"){
	
	var newsclass="娱乐新闻"
	var url="../user/usernewsclass.php?newsclass="+newsclass+"&&xm="+ming;
	window.location.href=url;
		}else if(a=="4"){
	
	var newsclass="体育新闻"
	var url="../user/usernewsclass.php?newsclass="+newsclass+"&&xm="+ming;
	window.location.href=url;
		}else if(a=="5"){

	var newsclass="校园新闻"
	var url="../user/usernewsclass.php?newsclass="+newsclass+"&&xm="+ming;
	window.location.href=url;
		}else if(a=="6"){

	var newsclass="其他新闻"
	var url="../user/usernewsclass.php?newsclass="+newsclass+"&&xm="+ming;
	window.location.href=url;
		}else if(a=="7"){
	<?php session_destroy(); ?>
	var url="../admin/index2.php"
	window.location.href=url;
		}
	
	}
</script> 
</head>

<body background="../picc/pic.png" style=" margin:0px;">
<!--菜单栏-->
<div id="headd" >

<table  style="background-color:#fcfcfc;float:left">
<tr style="width:700px" height="50px" align="center" >
<td width="100px"><a href="index.php?xm=<?php echo $xm; ?>"><img src="../picc/head.png" style="width:100px;height:50px;"/></a></td>
	<td width="100px"><a  href="index.php?xm=<?php echo $xm; ?>" style="text-decoration:none;color:#000;">首页</a></td>
	<td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(1)">国内新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(2)">国际新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(3)">娱乐新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(4)">体育新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(5)">校园新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(6)">其他新闻</a></td><td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(7)">退出登录</a></td>
    
</tr>
</table>
</div>
<div >
<?php

//error_reporting(0);
include_once("dbConnect/db.php");
//某条新闻详细信息显示
$id=@$_GET[id];

$sql1="select *from news where id=\"$id\"";
$sql2="update news set hits=hits+1 where id=\"$id\"";
$result=mysql_query($sql1);
$q2=mysql_query($sql2);

while($array=mysql_fetch_array($result))
	{?>
    <center>
   <div style="height:50px; margin-top:10px;"></div>
    <div align="left" style="font-size:16px;width:700px;margin-left:150px;">
		<p style="line-height:30px">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
					<?php 
										 
					echo "$array[content]","</br>";
					?></p>
         <?php if($array[pic]!=NULL){ ?>
          <img src="<?php echo "$array[pic]" ?>" width="100%"></br>
        <?php  } ?>
       <p> <?php
	echo "</br>","$array[adduser]","</br>",
					"$array[settime]","</br>";
	}
?></p>
</div>
<div style="height:30px"></div>
<form action="dealreview.php?id=<?php echo $id;?>&xm=<?php echo $xm;?>" method="post">
            <div class="form-group" style=";width:850px;">
           
                <p align="left" style="font-weight:200">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;编辑评论</p>
            
               <div align="right"> <textarea name="content"  rows="6" cols="80" ></textarea>
             
            <input  align="right" type='submit' value="提交"></button> 
            </div>
            </div>
</form>
<div class="line-divider" style="margin:20px; height:2px;"></div>
  <!--评论浏览区 -->
   
<?php 
//显示某条新闻的评论
$sql3="select *from review where id=\"$id\"";
$rs=mysql_query($sql3);
$usname=$_SESSION['name'];
while($ary=mysql_fetch_array($rs)){
	?>
    <div style="width:780px;">
   <table align="right" style="width:690px;">
   		<tr align="left" height="20px">
        
        	<th style="font-weight:200; background-color:#DEEEDE;">
  		 	&emsp; <?PHP echo $ary['userna'];?>
        	 &emsp;&emsp;&emsp;&emsp;&emsp;
  			 <?php echo $ary['putime']; ?>
             </th></tr>
  		 <tr align="left" height="50px">
         	<th style=" background-color:#E9E9E9;">
			&emsp;<?php echo $ary['content'];?>
   			</th></tr>
   </table>
   </div>
	<?php  }
?>  

</center>

</div>
<footer class="panel-footer" style="width: 100%; overflow: hidden;margin-left:10px; margin-top:50px">
<p class="friends-text">相关网站</p>
<div class="view-title">

<div class="friends-img-content"><a href="https://www.cls.cn/" target="_blank"><img alt="" src="https://res.jiemian.com/assets/pc/indexnew/img/cailianshe@2x.png" width="98" height="32"> </a> <a href="https://www.lanjinger.com/" target="_blank"> <img alt="" src="https://res.jiemian.com/assets/pc/indexnew/img/lanjingcaijin@2x.png" width="110" height="32"> </a> <a href="https://www.moer.cn/" target="_blank"> <img alt="" src="https://img.jiemian.com/101/original/20210909/163117593533702100.png" width="120" height="32"> </a></div>
</div>
<div class="friends-main">


<div class="friends-list">
<p><a href="http://www.xinhuanet.com/" target="_blank">新华社</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.stcn.com/" target="_blank">证券时报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.eeo.com.cn/" target="_blank">经济观察报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.cb.com.cn/" target="_blank">中国经营报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.zqrb.cn/" target="_blank">证券日报</a>&nbsp;&nbsp;|&nbsp;<a href="https://www.thecover.cn/" target="_blank">封面新闻</a>&nbsp;|&nbsp;&nbsp;<a href="https://www.bjd.com.cn" target="_blank">北京日报</a>&nbsp;|&nbsp;&nbsp;<a href="https://www.guancha.cn/" target="_blank">观察者网</a>&nbsp;&nbsp;|&nbsp;<a href="http://www.iceo.com.cn/" target="_blank">中国企业家</a>&nbsp;&nbsp;|&nbsp;<a href="http://www.21jingji.com/" target="_blank">21世纪经济报道</a>&nbsp;&nbsp;|&nbsp;<a href="http://www.nbd.com.cn/" target="_blank">每日经济新闻</a></p>

<p><a href="https://wallstreetcn.com/" target="_blank">华尔街见闻</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.chinatimes.net.cn/" target="_blank">华夏时报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.fortunechina.com/" target="_blank">财富中文网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.ftchinese.com/" target="_blank">FT中文网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.huxiu.com/" target="_blank">虎嗅</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://36kr.com/" target="_blank">36氪</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.geekpark.net/" target="_blank">极客公园</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.pingwest.com/" target="_blank">PINGWEST品玩</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.leiphone.com/" target="_blank">雷锋网</a>&nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://www.kanshangjie.com/" target="_blank">商界</a>&nbsp;&nbsp;| &nbsp;&nbsp;<a href="https://www.yangtse.com/" target="_blank">扬子晚报</a>&nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://www.southcn.com/" target="_blank">南方日报</a></p>

<p><a href="http://www.changjiangtimes.com/" target="_blank">长江商报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.dutenews.com" target="_blank">深圳特区报</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.sina.com.cn/" target="_blank">新浪网</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://weibo.com/" target="_blank">微博</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.toutiao.com" target="_blank">今日头条</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.uc.cn/" target="_blank">UC浏览器</a> &nbsp;|&nbsp;<a href="https://news.qq.com/" target="_blank">腾讯</a>&nbsp;&nbsp;|&nbsp;<a href="http://news.baidu.com/" target="_blank">百度</a>&nbsp;&nbsp;|&nbsp;<a href="http://news.sohu.com/" target="_blank">搜狐</a>&nbsp;&nbsp;|&nbsp;<a href="https://www.eastmoney.com/" target="_blank">东方财富</a>&nbsp;&nbsp;</p>
</div>
</div>
      
    </footer>
    <footer class="footer">
    <center>
    <div class="footer-inner">
    <div class="footer-container" style="height:40px">
    <p><a href="../admin/index2.php"><img  src="../picc/head.png" style="width:100px;height:40px;" /></a><p>指南新闻 版权所有 </p></p></div></div>
    </center>
    </footer>
  </body>
</html>
