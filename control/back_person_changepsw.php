<?php 
	require_once "conn.php";
	$username=$_COOKIE['username'];
		
	$person_old_psw=$_POST['person_old_psw'];
	$person_new_psw1=$_POST['person_new_psw1'];
	$person_new_psw2=$_POST['person_new_psw2'];
	
	$sql="select password from user where username='$username'";
	$result=mysql_query($sql,$conn);
	$row=mysql_fetch_array($result);
	$psw=$row['password'];
	
	if($psw!==$person_old_psw){
		echo "<script>alert('原密码不正确');return false;</script>";
	}else{
		if($person_new_psw1!==$person_new_psw2){
			echo "<script>alert('新密码输入不一致');return false</script>";
		}else{
			$up="update user set password='$person_new_psw2' where username='$username'";
			$res=mysql_query($up,$conn);
		}
	}
	
	$url='back_person.php';
	echo "<script>windows.location.href='$url'</script>";
	
	
	
	
	
	
	
	
?>