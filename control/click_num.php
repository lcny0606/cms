<?php 
	require_once 'conn.php';	
	$passage_id=$_POST['id'];
	$sql="select click_num from passage where id='$passage_id'";
	$res_click=mysql_query($sql,$conn);
	$row_click=mysql_fetch_array($res_click);
	$click_t=$row_click['click_num']++;
	$click_up="upadate passage set click_num='$click_t' where id='$passage_id'";
	mysql_query($click_up);
	
?>