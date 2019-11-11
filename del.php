<?php
	require("connect.php");
	$id = $_GET['id'];
    $query = "update guest set flag=1 where guestID ='$id'";
	mysql_query($query);
	mysql_close($conn);
?>