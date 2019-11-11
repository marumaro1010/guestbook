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
<?php
	require("connect.php");
	$id = $_GET['id'];
	$result=mysql_query("select*from guest where guestID='$id'");
	while($rs=mysql_fetch_array($result))
	{
?>
<body>
  <h2 align="center">顯示內容</h2>
  <form>
	<div id="container1">
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
    </div>
    <?php
		$id = $_GET['id'];
    	$result=mysql_query("select*from reply where guestID='$id'");
	
	?>
    <div id="container2"><br>
     <?php 
	 if( $rs['guestReply'] != "" )
	 {
	 ?>
     	<table border=1>
    		<tr>
            	<td style="width: 400px">回覆內容:</td>
            </tr>
        	<tr>
            	<td style="width: 400px"><?php echo $rs['guestReply']?></td>
            </tr>
     		<tr>
            	<td style="width: 400px">時間:<?php echo $rs['guestReplyTime']?></td>
            </tr>
        </table><br>
      <?php
	  }
	  ?>
      <?php
		}
	  ?>
      <?php 
	  if($rs['guestReply']=="")
	  { 
	  ?>
	  	<a href="reply.php?id=<?php echo $rs['guestID'] ?>">回覆</a>
 	  <?php 
	  } 
	  else 
	  { 
	  ?>
 	  	<a href="reply.php?id=<? echo $rs['guestID'] ?>">修改</a>
 	  <?php 
	  } 
	  ?>
      	<a href="index.php">回上一頁</a>
    </div>
 </form>
</body>
</html>