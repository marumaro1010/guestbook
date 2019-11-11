<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新增留言</title>
<style>
	body
	{
		left: 250px;
  		right: 50px;
 		bottom:450px;
  		width:400px;
		height:50px;
  		margin-bottom:30px;
		padding-left:500px;	
	}
</style>
<script>
function checkout(form)
{
	if( guestName.value == "" )
	{
		alert("忘記寫暱稱");
		return false;	
	}	
	else if( guestSubject.value == "" )
	{
		alert("忘記寫主題");
		return false;	
	}
	else if( guestContent.value == "" )
	{
		alert("忘記寫內容");
		return false;	
	}
	else
	{
		return true;
	}							
}
</script>
</head>
<body>
	<h2>新增留言</h2>
   	 <form action="add.php" method="post" onsubmit="return checkout()">
    		暱稱: <input type="text" id="guestName" name="guestName"><br><br>
        	留言主題: <input type="text" id="guestSubject" name="guestSubject"><br><br>
        	留言內容:<br><br>
        	<textarea rows="10" cols="50" id="guestContent" name="guestContent"></textarea><br><br>
  			<input type="submit" value="留言"><br><br>
     </form>
     <a href="index.php"><h4 align="center">上一頁</h4></a>
</body>
</html>