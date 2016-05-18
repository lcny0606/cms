<?php 
	require_once "conn.php";
	
	$username=$_POST["login_username"];
	$psw=$_POST["login_psw"];
	$sql="select username,password from user where username='$username' and password='$psw'";
	$result=mysql_query($sql,$conn);
	$num=mysql_num_rows($result);
	if($num==0){
		echo "<script type='text/javascript'>alert('用户名密码不正确');history.go(-1);</script>" ;
	}
	if($num==1){
		$row=mysql_fetch_array($result);
		setcookie("username",$row['username'], time()+3600,'/');
		//echo $_COOKIE['username'];
		//exit;
		$time=strtotime('now');
		$sql_time="update user set time='$time' where username='$username'";
		mysql_query($sql_time,$conn);
		
	$url='../index.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
	}
	

?>