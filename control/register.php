<?php 
	require_once "conn.php";
	
	$res_username=$_POST["res_username"];
	$mail=$_POST["mail"];
	$res_password=$_POST["res_password"];
	$sql="insert into user (username,mail,password) values ('$res_username','$mail','$res_password')";
	mysql_query($sql,$conn);
	
	$url='../tpl/login.php';
	echo "<script language='script' type='text/javascript'>
	window.location.href='$url';
	</script>
";

?>