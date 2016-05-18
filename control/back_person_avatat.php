<?php 
	require_once "../control/conn.php";
	if(!isset($_COOKIE['username'])){
		$url='../index.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
	}

	$user=$_POST['username'];
	$file=$_FILES['file'];
	$name=$file['name'];
	$type=substr($name,strrpos($name,'.')+1);
	$size=$file['size'];
	if(!is_uploaded_file($file['tmp_name'])){
  //如果不是通过HTTP POST上传的
	return ;
	}
	$upload_path="../images/avatar/";
	$allow_type=array('jpg','png','gif');
	if(in_array($type,$allow_type)){
		
		if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
			$sql="update user set avatar='$name' where username='$user'";
			mysql_query($sql,$conn);

			echo "<script language='javascript'>window.location.href='../tpl/back_person.php';</script>";
		}else{
			return;
			}
				
	}else{
		return;
	}






?>