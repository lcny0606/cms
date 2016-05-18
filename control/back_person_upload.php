<?php 
	require_once "conn.php";
	$id=$_POST['person_id'];
	$mail=$_POST['mail'];
	$age=$_POST['age'];
	$sql="update  user set mail='$mail' , age='$age' where id='$id'";
	mysql_query($sql,$conn);
	
	$url='../tpl/back_person.php';
	echo "<script  type='text/javascript'>window.location.href='$url';</script>";
	
	


?>