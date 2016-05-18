<?php
		if(!isset($_COOKIE['username'])){
		$url='../index.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
		}
		
		require_once "conn.php";
		$username=$_COOKIE['username'];
		$title=$_POST['title'];
		$content=$_POST['content'];
		$column=$_POST['column'];
		$time=date("Y-m-d");
		$sql="insert into passage (title,content,username,columns,time) values ('$title','$content','$username','$column','$time')";
		mysql_query($sql,$conn);



 ?>