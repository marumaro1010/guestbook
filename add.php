<?php
	require("connect.php");
	$guestName=$_POST['guestName'];
	$guestSubject=$_POST['guestSubject'];
	$guestContent=nl2br($_POST['guestContent']);
	$guestTime=date("Y:m:d H:i:s",time()+28800);
	
	if( $guestName!= "" && $guestSubject != "" && $guestContent != "" && $guestTime != "0000-00-00 00:00:00" )
	{
		mysql_query("insert into guest 	value('','$guestName','$guestSubject','$guestContent','$guestTime','','','','0')");
	}
	else 
	{
		header("Location:add_message.php");
	}
	header("Location:index.php");
	mysql_close($conn);
?>