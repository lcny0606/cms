<?php
	require_once "../control/conn.php";
	require_once "backstage.php";
	if(!isset($_COOKIE['username'])){
		$url='../index.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
	}else{
		$username=$_COOKIE['username'];
		$sql="select * from user where username='$username'";
		$result=mysql_query($sql,$conn);
		$row=mysql_fetch_array($result);
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
								<form method="post" action="../control/back_person_avatat.php" enctype="multipart/form-data">
								<div class="clearfix">
									<input type="file" name="file" id="file"  class="file"/> 
									<input type="hidden" name="username" value="<?php echo $username ;?>">
									<input type="submit" value="确认修改" class="change_ar"/>
								</div>
							</form>
							<?php }else{ ?>
							<form method="post" action="../control/back_person_avatat.php" enctype="multipart/form-data">
								<a href="javascript:">
									<img src="../images/avatar/<?php echo $row['avatar'] ?>" >
								</a>
								<div>
									<input type="file" name="file" id="file" class="file" >
									<input type="hidden" name="username" value="<?php echo $username ;?>">
									<input type="submit" value="确认修改" class="change_ar" />
								</div>
							</form>
							<?php } ?>
						
					</div>
				</td>
			</tr>
		<form method="post" action="../control/back_person_changepsw.php" >
			<tr>
				<td height="30px" ><span>原密码</span></td>
				<td>
					<input type="text"  name="person_old_psw">
				</td>
			</tr>
			<tr>
				<td><span>新密码</span></td>
				<td height="30px">
					<input type="text"  name="person_new_psw1">
				</td>
			</tr>
			<tr> 
				<td><span>重复新密码</span></td>
				<td height="30px">
					<input type="text"  name="person_new_psw2">
				</td>
			</tr>
			<tr>
				
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="确认更改" id="person_change"></td>
			</tr>
		</form>
		</table>
	</div>
