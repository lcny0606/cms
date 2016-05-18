<?php
	require_once "../control/conn.php";
	$username=$_COOKIE['username'];
	if(!isset($_COOKIE['username'])){
		$url='login.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
	}else{
		$sql="select * from user where username='$username'";
		$result=mysql_query($sql,$conn);
		$row=mysql_fetch_array($result);
		$jur=$row['jur'];
		$mail=$row['mail'];
		if($jur>2){
			$url='../index.php';
			echo "<script  type='text/javascript'>window.location.href='$url';</script>";
		}
		
	}
	
?>

<!DICTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/cms.js"></script>
</head>
<body>
	<div class="back_top clearfix">
		<div class="back_top_per">
			<?php 
			switch ($jur){
				case "2":
					echo "<div class='back_wel'>欢迎投稿者".$username."</div>";
					break;
				case "1":
					echo "<div class='back_wel'>欢迎作者".$username."</div>";
					break;
				case "0":
					echo "<div class='back_wel'>欢迎管理员".$username."</div>";
					break;
			}
			?>
		</div>
		<a href="../index.php"> 返回首页→</a>
	</div>
	<div class="back_middle clearfix">
		<div class="back_left">
			<ul class="back_meun">
				<li>
					<div class="meun_name">
						<a href="javasrcipt:" style="margin-left:25px" >个人</a>
					</div>
					<ul>
						<li><a href="javascript:" class="back_person" id="back_person">个人资料</a></li>
						<li><a href="javascript:" id="back_person_change" >修改头像和密码</li>
					</ul>
				</li>
				<li>
					<div class="meun_name">
						<a href="javasrcipt:">文章</a>
					</div>
					<ul>
						<li><a href="javascript:">已发表文章</a></li>
						<li><a href="javascript:" id="back_write">写文章</li>
					</ul>
				</li>
				<li>
					<div class="meun_name">
						<a href="javasrcipt:">评论</a>
					</div>
					<ul>
						<li><a href="javascript:">我的评论</a></li>
						<li><a href="javascript:">我的文章评论</li>
					</ul>
				</li>
				<li>
					<div class="meun_name">
						<a href="javasrcipt:">收起菜单</a>
					</div>
				</li>
			</ul>
		</div>
		<div class="back_right">
			<iframe src="back_person.php" width="100%" height="100%" scrolling="no"  id="frame_person"></iframe>
			<iframe src="back_person_change.php" width="100%" height="100%" scrolling="no" style="display:none" id="frame_person_change"></iframe>
			<iframe src="back_write.php" width="100%" height="100%" scrolling="no" style="display:none" id="frame_write"></iframe>
		
		</div>
	</div>
</body>
</html>