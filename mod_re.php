<?php
	require("connect.php");
	$id = $_GET['id'];
	$result=mysql_query("select*from guest where guestID='$id'");
	$query=mysql_query("select*from reply where guestID='$id'");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>顯示內容</title>
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
		padding-left:500px;
		margin-top:50px;			
	}
</style>
</head>
<body>
  <h2 align="center">顯示內容</h2>
  <form>
	<div id="container1">
    <?php while($rs=mysql_fetch_array($result))
	{
	?>
    	<table  border=1>
    	 	<input type="hidden" name="id" value="<? echo $id?>"/>
         	<tr>
         		<td style="width: 100px">編號：</td>
            	<td style="width: 300px"><?php echo $rs['guestID']?></td>
         	</tr>
   		 	<tr>
         		<td style="width: 100px">暱稱：</td>
            	<td style="width: 300px"><?php echo $rs['guestName']?></td>
         	</tr>
         	<tr>
         		<td style="width: 100px">留言主題：</td>
            	<td style="width: 300px"><?php echo $rs['guestSubject']?></td>
         	</tr>
  		 	<tr>
         		<td style="width: 100px">留言內容：</td>
            	<td style="width: 300px"><?php echo $rs['guestContent']?></td>
         	</tr>
         </table>
         <a href="reply2.php?id=<? echo $rs['guestID'] ?>">回覆</a>
    </div>
    <?php
		}
	 ?>
    <div id="container2"><br>    
	 <?php
	 while($row=mysql_fetch_array($query))
	 {
	 ?>

     <?php 
	 if( $row['content'] != "" )
	 {
	 ?>
     	<table border=1>
            <tr>
            	<td style="width: 400px">暱稱:</td>
            </tr>
        	<tr>
            	<td style="width: 400px"><?php echo $row['name']?></td>
            </tr>
    		<tr>
         		留言內容：<br><br>
                <textarea id="guestContent" name="guestContent" rows="8" cols="30">
					<? echo $rs['guestContent']?>
				</textarea><br><br>
            </tr>
        	<tr>
            	<td style="width: 400px"><?php echo $row['content']?></td>
            </tr>
     		<tr>
            	<td style="width: 400px">時間:<?php echo $row['replytime']?></td>
            </tr>
            <a href="reply2.php?id=<? echo $row['guestID'] ?>">修改</a>
        </table><br>        
      <?php }?> 
      <?php
		}
	  ?>
    </div>
 </form>
 <script>
function Check()
{
	if(!confirm("是否刪除?")) return false;
	else return true;		
}
 </script>
</body>
</html>