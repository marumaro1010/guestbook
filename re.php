<?php
	require("connect.php");
	$id=$_POST['id'];
	if(isset($_POST['guestreply']))
	{
 		$Reply=$_POST['guestreply'];
 		$time=date("Y:m:d H:i:s",time()+28800);
 		mysql_query("update guest set guestReply='$Reply',guestReplyTime = '$time' where guestID = '$id'");
		header("Location:view_message.php?id=$id");
    	mysql_close($conn);
	}
?>