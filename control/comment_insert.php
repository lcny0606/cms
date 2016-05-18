<?php 
	if(!isset($_COOKIE['username'])){
		$url='../index.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
		}else{
			$username=$_COOKIE['username'];
		}
	require_once "../control/conn.php";
	$title=$_POST['title'];
	$comment=$_POST['comment'];
	$time=date("Y-m-d h:i:sa");
	$sql="insert into comment (title,username,comment,time) values ('$title','$username','$comment','$time')";
	mysql_query($sql,$conn);
	echo "<script type='text/javascript'>history.go(-1);</script>";
	
?>