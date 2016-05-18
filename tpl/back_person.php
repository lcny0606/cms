<?php
require_once "../control/conn.php";
require_once 'backstage.php';
if (!isset($_COOKIE['username'])) {
	$url = '../index.php';
	echo "<script  type='text/javascript'>window.location.href='$url';</script>";
} else {
	$username = $_COOKIE['username'];
	$sql = "select * from user where username='$username'";
	$result = mysql_query($sql, $conn);
	$row = mysql_fetch_array($result);
}
$jur = $row['jur'];
switch ($jur) {
	case "3" :
		$role = "订阅者";
		break;
	case "2" :
		$role = "投稿者";
		break;
	case "1" :
		$role = "作者";
		break;
	case "0" :
		$role = "管理员";
		break;
}
?>

	<div class="peoson_midlle">
		<table>
			<tr>
				<td>
					<div class="avatar">
					<?php 
						if($row['avatar']==0){ ?>
							<a href="javascript:">
								<img src="../images/touxiang.png">
							</a>
						<?php }else{ ?>
							<a href="javascript:">
								<img src="../images/avatar/<?php echo $row['avatar'] ?>">
							</a>
						<?php } ?>
					</div>
				</td>
			</tr>
		<form method="post" action="../control/back_person_upload.php" >
			<tr>
				<td height="30px" ><span>用户名</span></td>
				<td>
					<?php echo "<div class='person_name'>".$username."</div>" ?>
					<input type="hidden" value="<?php echo $row["id"] ?>" name="person_id">
				</td>
			</tr>
			<tr>
				<td><span>邮 箱</span></td>
				<td height="30px"><input type="text" value="<?php echo $row['mail']; ?>" name="mail"></td>
			</tr>
			<tr> 
				<td><span>年 龄</span></td>
				<td height="30px"><input type="text" value="<?php echo $row['age']; ?>" name="age"></td>
			</tr>
			<tr>
				<td height="30px">角 色</td>
				<td height="30px"><p class="person_role"><?php echo $role; ?></p></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="确认更改" id="person_change"></td>
			</tr>
		</form>
		</table>
	</div>
