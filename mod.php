<?php
	require("connect.php");
	$id = $_POST['id'];
	$name=$_POST['guestName'];
	$subject = $_POST['guestSubject'];
	$content = $_POST['guestContent'];
	$modtime =date("Y:m:d H:i:s",time()+28800);
	
	if( $id!="" && $name!="" && $subject!="" && $content!="" && $modtime!= "0000-00-00 00:00:00" )
	{
 		$query = "update guest set 
			  	  guestSubject = '$subject',
			  	  guestName='$name',
		          guestContent = '$content',
		          guestModTime='$modtime' 
		          where guestID ='$id'";
		mysql_query($query);
	}
	else header("Location:mod_message.php"); 
	
	header("Location:index.php");
	mysql_close($conn);
?>