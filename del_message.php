<?php
	require("connect.php");
	$data=mysql_query('select * from guest order by guestTime desc');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
<style>
	table 
	{
		border-collapse: collapse;
	}
	#container
	{
  		left: 250px;
  		right: 50px;
 		bottom:450px;
  		width:400px;
		height:50px;
  		margin-bottom:150px;
		padding-left:500px;
	}	
</style>
</head><body>
	<h2 align="center">刪除留言</h2>
	<a href="index.php">
    	<h3 align="center">回首頁</h3>
    </a><br><br>
    <?php
	 for($i=1;$i<=mysql_num_rows($data);$i++)
	 {
 		$rs=mysql_fetch_assoc($data);
	?> 
    <?php 
	if($rs['flag']==1)
	{ 
 	?>
    <div id="container">
    	<table border="1">
        	<tr>
            	<br>
            </tr>
            <tr>
            	<td style="width: 100px">編號</td>
            	<td style="width: 300px"><?php echo $rs['guestID']?></td>
            </tr>
        	<tr>
            	<td>留言主題</td>
            	<td style="width: 300px"><?php echo $rs['guestSubject']?></td>
            </tr>
            <tr>
            	<td>暱稱</td>
            	<td style="width: 300px"><?php echo $rs['guestName']?></td>
            </tr>
            <tr>
            	<td>留言內容</td>
            	<td style="width: 300px"><?php echo $rs['guestContent']?></td>
            </tr>
            <tr>
            	<td>留言時間</td>
            	<td style="width: 300px"><?php echo $rs['guestTime']?></td>
            </tr>
            <tr>
            	<td>修改時間</td>
            	<td style="width: 300px"><?php echo $rs['guestModTime']?></td>
            </tr>
        </table><br>
    </div>
    <?php 
	 } 
	?>
</body>
<?php
} 
?>
<?php 
mysql_close($conn) 
?>
</html>