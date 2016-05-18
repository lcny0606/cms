<?php 
	require_once "conn.php";
	$username=$_COOKIE['username'];
	//$sel_time=$_POST['sel_time'];
	$sel_time='alltime';
	$sel_col='0';
	//$sel_col=$_POST['sel_col'];
	if($sel_time="alltime"){
		$sql="select * from passage where username='$username'";
		$result=mysql_query($sql,$conn);
		while($row=mysql_fetch_array($result)){
			$arr['rs'][]=array(
				'title' => $row['title'],
				//'columns' => $row['colunms'],
			);
		}
		//echo json_encode($arr);
		print_r(mysql_fetch_array($result));
		
	}
	
	
?>