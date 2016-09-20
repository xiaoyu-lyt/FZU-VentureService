<?php 
	$con = @mysql_connect('127.0.0.1','root','root');
	mysql_query("set names utf8",$con);
	mysql_select_db('test',$con);
	$id = $_POST['id'];
	$name = $_POST['name'];
	$class = $_POST['class'];

	$insert = "insert into `student` (ID,Name,Class) values('$id','$name','$class')";
	if(mysql_query($insert,$con)) 
		echo "successful";

?>