<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>修改留言</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<style>
	#container{
 		position: absolute;
  		top: 0;
  		left: 250px;
  		right: 50px;
 		bottom:450px;
  		width:400px;
		height:50px;
  		margin:auto;
	}
</style>
</head>
<?php
require("connect.php");
$id = $_GET['id'];
$result=mysql_query("select*from guest where guestID='$id'");
while($rs=mysql_fetch_array($result)){
?>
<body>
<h2 align="center">修改留言</h2>
<div id="container">
	<form method="POST" action="mod.php" onsubmit="return checkout()">
		<input type="hidden" name="id" value="<? echo $id?>"/><br><br>
   	 	編號：<? echo $rs['guestID']?><br><br>
		暱稱：<input type="text" id="guestName" name="guestName" value="<? echo $rs['guestName']?>"/><br><br>
		留言主題： <input type="text" id="guestSubject" name="guestSubject" value="<? echo $rs['guestSubject']?>"/><br><br>
		留言內容：<br><br><textarea id="guestContent" name="guestContent" rows="8" cols="30"><? echo $rs['guestContent']?>
		</textarea><br><br>
		<input type="submit" name="submit" value="修改"/>
	</form>
</div>
<?php } mysql_close($conn)?>
<script>
function checkout(form){
	if( guestSubject.value == "" )
	{
		alert("未填寫主題");
		return false;	
	}
	else if( guestName.value == "" )
	{
		alert("未填寫暱稱");
		return false;	
	}
	else if( guestContent.value == "" )
	{
		alert("未填寫內容");
		return false;	
	}
	else{return true;}						
	}
</script>
</body>
</html>