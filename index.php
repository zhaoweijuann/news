<?php  
	session_start();	
	$xm=$_SESSION["username"];
	if((($_SESSION["username"])==NULL)&&($_GET[xm]==NULL)){
	?>
<script>alert("先登录");
 window.location.href="../index.php";</script>
<?php }else if($_GET[xm]!=NULL){	
	$xm=@$_GET[xm];
	}else if(($_SESSION["username"])==NULL){
		$xm=@$_GET[xm];
		
		}?>
<head>
<meta charset="utf-8">
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

<script>
var ming='<?php echo $xm; ?>';
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
		}else if(a=="8"){
	var url="dealuser.php?id="+ming;
	window.location.href=url;
		}
	
	}
</script>

 </head>
<body background="../picc/pic.png" style="height:auto; margin:0px;">

<!--菜单栏-->
<div id="headd" style="margin:0px;">

<table  style="background-color:#fcfcfc;float:left">
<tr style="width:1000px" height="50px" align="center" >
<td width="100px"><a href="#"><img src="../picc/head.png" style="width:100px;height:50px;"/></a></td>
	<td width="100px" style=" background-color:#A3F173;" ><a  href="#" style="text-decoration:none;color:#000;">首页</a></td>
	<td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(1)">国内新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(2)">国际新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(3)">娱乐新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(4)">体育新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(5)">校园新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(6)">其他新闻</a></td>
    <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(8)">用户信息</a></td>
     <td width="100px"><a href="#" style="text-decoration:none;color:#000;" onClick="display(7)">退出登录</a></td>

</tr>
</table>
</div>
<div id="content" style="margin-left:5px">
<!--国内新闻-->
<div  style="padding:10px,0px;border:20px,0px;height:200px;width:500px;float:left"> 
<table   style="margin-top:0px;padding:0px;">	
	<tr height="50">		
		<td width="450px" align="left">国内新闻 </td>
        <td width="50px">点击率</td>
	</tr>	
	
<?php
	
    error_reporting(E_ALL);
	include_once("../user/dbConnect/db.php");	
	
	mysql_query("set names UTF8");	
	$sql1="select * from news where newclass='国内新闻'";
	$result1=mysql_query($sql1);
	$amount1=mysql_num_rows($result1);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage1=ceil($amount1/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array1=mysql_fetch_array($result1))
	{
		
		echo
			"<tr align=\"left\">
				<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array1[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array1[title]</a></td>
				<td>$array1[hits]</td>
			</tr>"	;
			
		if($i>=4){
			break;
			}else{
				$i++;}
		
	}	

	
?>
<br/>
</table>
</div>

<!--最新新闻-->
<div style="height:200px;width:450px;float:right;">
<table style="margin-top:0px;padding:0px;">
	
	<tr  height="50">		
		<td width="450px" align="left" style="color:#F00">最热新闻 </td>
	</tr>	
	
<?php
   // error_reporting(E_ALL);
	//include_once("../user/dbConnect/db.php");		
	$sql7="select * from news order by hits desc limit 4";
	$result7=mysql_query($sql7);
	$amount7=mysql_num_rows($result7);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage7=ceil($amount7/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array7=mysql_fetch_array($result7))
	{
		echo
			"<tr align=\"left\">
<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array7[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array7[title]</a></td>
			</tr>"	;
			
		if($i>=4){
			break;
			}else{
				$i++;}
	}	

	
?>
<br/>
</table>
</div>

<!--国际新闻-->
<div style="padding:10px,0px;border:20px,0px;height:200px;width:500px;float:left">
<table  style="margin-top:0px;padding:0px;">
	
	<tr  height="50">		
		<td width="450px" align="left">国际新闻</td>
		<td width="50px">点击率</td>
	</tr>	
	
<?php
   // error_reporting(E_ALL);
	//include_once("../user/dbConnect/db.php");		
	$sql2="select * from news where newclass='国际新闻'";
	$result2=mysql_query($sql2);
	$amount2=mysql_num_rows($result2);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage2=ceil($amount2/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array2=mysql_fetch_array($result2))
	{
		echo
			"<tr align=\"left\">				
				<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array2[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array2[title]</a></td>
				<td>$array2[hits]</td>
			</tr>"	;
			if($i>=4){
			break;
			}else{
				$i++;}
		
	}	

	
?>
<br/>
</table>
</div>
<!--最热新闻-->
<div style="padding:10px,0px;border:20px,0px;height:200px;width:450px; float:right">
<table style="margin-top:0px;padding:0px;">
	
	<tr  height="50">		
		<td width="450px" align="left" style="color:#00F">最新新闻 </td>
	</tr>	
	
<?php
   // error_reporting(E_ALL);
	//include_once("../user/dbConnect/db.php");		
	$sql8="select * from news order by settime desc limit 4";
	$result8=mysql_query($sql8);
	$amount8=mysql_num_rows($result8);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage8=ceil($amount8/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array8=mysql_fetch_array($result8))
	{
		echo
			"<tr align=\"left\">
<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array8[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array8[title]</a></td>
			</tr>"	;
			
		if($i>=4){
			break;
			}else{
				$i++;}
	}	

	
?>
<br/>
</table>
</div>
<!--娱乐新闻-->
<div style="padding:10px,0px;border:20px,0px;height:200px;width:700px;float:left">
<table  style="margin-top:0px;padding:0px;">
	
	<tr  height="50">		
		<td width="450px" align="left">娱乐新闻 </td>
		<td width="50px">点击率</td>
	</tr>	
	
<?php
   // error_reporting(E_ALL);
	//include_once("../user/dbConnect/db.php");		
	$sql3="select * from news where newclass='娱乐新闻'";
	$result3=mysql_query($sql3);
	$amount3=mysql_num_rows($result3);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage3=ceil($amount3/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array3=mysql_fetch_array($result3))
	{
		echo
			"<tr align=\"left\">				
				<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array3[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array3[title]</a></td>
				<td>$array3[hits]</td>
			</tr>"	;
			if($i>=4){
			break;
			}else{
				$i++;}
		
	}	

	
?>
<br/>
</table>
</div>

<!--体育新闻-->
<div style="padding:10px,0px;border:20px,0px;height:200px;width:700px;float:left">
<table style="margin-top:0px;padding:0px;">
	
	<tr height="50">		
		<td width="450px" align="left">体育新闻 </td>
		<td width="50px">点击率</td>
	</tr>	
	
<?php
    //error_reporting(E_ALL);
	//include_once("../user/dbConnect/db.php");		
	$sql4="select * from news where newclass='体育新闻'";
	$result4=mysql_query($sql4);
	$amount4=mysql_num_rows($result4);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage4=ceil($amount4/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array4=mysql_fetch_array($result4))
	{
		echo
			"<tr align=\"left\">				
				<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array4[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array4[title]</a></td>
				<td>$array4[hits]</td>
			</tr>"	;
			if($i>=4){
			break;
			}else{
				$i++;}
		
	}	

	
?>
<br/>
</table>
</div>

<!--校园新闻-->
<div style="padding:10px,0px;border:20px,0px;height:200px;width:700px;float:left">
<table style="margin-top:0px;padding:0px;">
	
	<tr  height="50">		
		<td width="450px" align="left">校园新闻 </td>
		<td width="50px">点击率</td>
	</tr>	
	
<?php
    //error_reporting(E_ALL);
	//include_once("../user/dbConnect/db.php");		
	$sql5="select * from news where newclass='校园新闻'";
	$result5=mysql_query($sql5);
	$amount5=mysql_num_rows($result5);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage5=ceil($amount5/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array5=mysql_fetch_array($result5))
	{
		echo
			"<tr align=\"left\">
<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array5[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array5[title]</a></td>
				<td>$array5[hits]</td>
			</tr>"	;
			
		if($i>=4){
			break;
			}else{
				$i++;}
		
		
	}	

	
?>
<br/>
</table>
</div>

<!--其他新闻-->
<div style="padding:10px,0px;border:20px,0px;height:200px;width:700px;float:left">
<table style="margin-top:0px;padding:0px;">
	
	<tr  height="50">		
		<td width="450px" align="left">其他新闻 </td>
		<td width="50px">点击率</td>
	</tr>	
	
<?php
   // error_reporting(E_ALL);
	//include_once("../user/dbConnect/db.php");		
	$sql6="select * from news where newclass='其他新闻'";
	$result6=mysql_query($sql6);
	$amount6=mysql_num_rows($result6);  //数据库中的记录总数
	
	$page=@$_GET['page'];
	
	$pageSize=4;							//页面大小
	$totalPage6=ceil($amount6/$pageSize);   	//总页数
	if(!isset($page))
	{
		$page=1;
	}	
	$i=1;
	while($array6=mysql_fetch_array($result6))
	{
		echo
			"<tr align=\"left\">
<td height=\"30px\"><a href=\"usernewsdetail.php?id=$array6[id]&&xm=$xm\" style=\"text-decoration:none;color:#000;\">$array6[title]</a></td>
				<td>$array6[hits]</td>
			</tr>"	;
			
		if($i>=4){
			break;
			}else{
				$i++;}
	}	

	
?>
<br/>
</table>
</div>


</div>
<footer class="panel-footer" style="width: 100%; overflow: hidden;margin-left:10px">
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