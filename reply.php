<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>回覆留言</title>
<style>
	table 
	{
		border-collapse: collapse;
	}
	#container1
	{		
		left: 250px;
  		right: 50px;
 		bottom:450px;
  		width:400px;
		height:50px;
  		margin-bottom:30px;
		padding-left:500px;	
	}
	#container2
	{		
		left: 250px;
  		right: 50px;
 		bottom:450px;
  		width:400px;
		height:50px;
		margin-top:130px;
  		margin-bottom:30px;
		padding-left:500px;	
	}	
</style>
<script>
function checkout(form)
{
	if(guestreply.value=="")
	{
		alert("回覆忘記寫了");
		return false;	
	}
	else
	{
		return true;
	}	
}
</script>
</head>
<?php
	require("connect.php");
	$id = $_GET['id'];
	$result=mysql_query("select*from guest where guestID='$id'");
	while($rs=mysql_fetch_array($result))
	{
?>
<body>
<div id="wrapper">
	<h2 align="center">回覆留言</h2>
	<form  action="re.php" method="POST" onsubmit="return checkout()">
	<div id="container1">
		<input type="hidden" name="id" value="<? echo $id?>"/><br><br>
			<table border="1">
				<tr>
                	<td style="width: 100px">編號：</td>
                    <td style="width: 250px"><? echo $rs['guestID']?></td>
                <tr>
				<tr>
                	<td style="width: 100px">暱稱:</td>
                    <td style="width: 250px"><? echo $rs['guestName']?></td>
                <tr>
				<tr>
                	<td style="width: 100px">留言主題：</td>
                    <td style="width: 250px"><? echo $rs['guestSubject']?></td>
                <tr>
				<tr>
                	<td style="width: 100px">留言內容：</td>
                    <td style="width: 250px"><? echo $rs['guestContent']?></td>
                <tr>
			</table>
	</div>
	<div id="container2">
		回覆內容:<br><br>
		<textarea rows=10 cols=50 id="guestreply" name="guestreply"><? echo $rs['guestReply']?></textarea><br><br>
		<input type="submit" value="回覆"></input>
	</div>
</form>
</div>
</body>
<?php
}
mysql_close($conn);
?>
</html>