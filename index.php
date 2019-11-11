<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>留言板</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
<?php
   	require("connect.php");
    $sql = "SELECT * FROM guest where flag=1 ORDER BY guestTime desc"; 
    $result = mysql_query($sql,$conn) or die("Error");

    $data_nums = mysql_num_rows($result); 
    $per = 5; 
    $pages = ceil( $data_nums / $per ); 
    if (!isset($_GET["page"])){ 
        $page=1; 
    } else {
        $page = intval($_GET["page"]);
    }
    $start = ( $page - 1 )*$per; 
    $result = mysql_query($sql.' LIMIT '.$start.', '.$per,$conn) or die("Error");
?>
<div id="header" align="center">
	<h2 align="center">留言板</h2>
	<a href="add_message.php" class="text-center"><font size="5">我要留言</font></a> 
    <a href="del_message.php" class="text-center"><font size="5">刪除留言</font></a>
</div>
<?php
while ($rs = mysql_fetch_array ($result))
{ 
?>
<div id="content" class="container-fluid">   
   <table  class="table table-reflow">
   	<tr>
   		<td  class="col-lg-2">編號</td>
   		<td><?php echo $rs['guestID']?></td>
   	</tr>
   	<tr>
   		<td  class="col-lg-2">留言主題</td>
   		<td><?php echo $rs['guestSubject']?></td>
   	</tr>
   	<tr>
   		<td  class="col-lg-2">暱稱</td>
   		<td><?php echo $rs['guestName']?></td>
   	</tr>
   	<tr>
   		<td class="col-lg-2">留言內容</td>
   		<td><?php echo $rs['guestContent']?></td>
   	</tr>
   	<tr>
   		<td class="col-lg-2">留言時間</td>
   		<td><?php echo $rs['guestTime']?></td>
   	</tr>
   	<? if( $rs['guestModTime'] != "0000-00-00 00:00:00" ){?>
   	<tr>
   		<td>修改時間</td>
   		<td><?php echo $rs['guestModTime']?></td>
   	</tr>
<?php }?>
   	<tr>
   		<td>
        	<a href="mod_message.php?id=<? echo $rs['guestID'] ?>">修改</a>
   			<a href="view_message2.php?id=<? echo $rs['guestID'] ?>">顯示內容</a>
        </td>
   	</tr> 
   </table><br>
</div>
<?php
}
?><br/>
<?php
	echo "<div align='center'>";  
    echo "第";
    for( $i=1; $i<=$pages; $i++ )
	{
    	if( $page-3 < $i && $i < $page+3 )
		{
    		echo "<a href=?page=".$i.">".$i."</a> ";
    	}
    }
    echo "頁<br/><br/>";
	echo "</div>";
?>
</body>
</html>