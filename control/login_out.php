<?php 
	if(isset($_COOKIE['username'])){
		setcookie('username','',time()-24*3600,'/');
		$url='../tpl/login.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
	}
?>