<?php
$conn=mysql_connect("本機端","db帳號","db密碼");
mysql_select_db("留言板資料庫",$conn) or die("error!Disconnection!");
mysql_query("set names utf8");
 ?>
