<?php
session_start();

    $DB_HOST	= "localhost";	  //数据库主机位置
	$DB_LOGIN	= "root";	  //数据库的使用账号
	$DB_PASSWORD	= "root";	  //数据库的使用密码
	$DB_NAME	= "login";           //数据库名称
	$conn = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD);
	mysqli_select_db($conn,$DB_NAME);
    mysqli_query($conn,"SET NAMES UTF8");
$Show_sql = "SELECT * FROM userinfo"; 
$ShowResult = mysqli_query($conn,$Show_sql);  
?>

<table align="center">
                <tr>
                    <td>user information</td>
                </tr>
				
            </table>
            <table width="610" border="0" align="center" cellpadding="0" cellspacing="1">
                <tr bgcolor="#da3212">
                    <td width="80" align="center"><font color="#FFFFFF">user name</font></td>
                    <td width="80" align="center"><font color="#FFFFFF">password</font></td>
                    <td width="50" align="center"><font color="#FFFFFF" align="center">operation</font></td>
	                <td width="50" align="center"><font color="#FFFFFF" align="center">operation</font></td>
                </tr>	          
<?php
if(mysqli_num_rows($ShowResult)>0){
    $number = mysqli_num_rows($ShowResult);
    if(!isset($_GET['p'])){
        $p=0;
    }else{
        $p=$_GET['p'];
    }
    $check=$p+10;
    for ($i = 0; $i < $number; $i++) {
        $row = mysqli_fetch_array($ShowResult);
        if ($i >= $p && $i < $check) {
            
            if ($i%2 == 0) 
               echo "<tr bgcolor='#DDDDDD'>";
             else
               echo "<tr>";
               echo "<td width='80'>".$row['username']."</td>";
               echo "<td width='80'>".$row['password']."</td>";
               echo "<td width='50'><a href='Modify.php?username=".$row['username']."'>modify</a></td>";
?>
            <td width='50'><a href="Delete.php?username=<?=$row['username']?>" onClick="return confirm('are you sure you want to delete?')">delete</a></td>
<?php
    echo "</tr>";
    $j= $i+1;
          }}
    }
    echo "</table>"
?>
<table width="400" border="0" align="center">
    <tr bgcolor='#5892hd'>
      <td align="center">
        <a href='mana.php?p=0'>first page</a>
      </td>
      <td align="center">
<?php
	if ($p>9) { 
	  $last = (floor($p/10)*10)-10;
	  echo "<a href='mana.php?p=$last'>previous page</a>";
	}
	else
	  echo "previous page";
?>
      </td>
      <td align="center">
<?php	
	if ($i>9 and $number>$check) 
	  echo "<a href='mana.php?p=$j'>next page</a>";
	else
	  echo "next page";
?>

      </td>
      <td align="center">
<?php	
	if ($i>9) 
	{
	  $final = floor($number/10)*10;
	  echo "<a href='mana.php?p=$final'>last page</a>";
	}
	else
	  echo "last page";
?>
      </td>
    </tr>
</table>
