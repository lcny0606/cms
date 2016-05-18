<!DICTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/cms.js"></script>
</head>
<body class="login_body">
	<div class="login">
		<div class="login_header">
			<div class="login_icon"></div>
			<p>与世界分享你的知识、经验和见解</p>
		</div>
		<div class="login_middle">
			<div class="login_nav">
				<span class="login_nav_reg" id="click_in">登录</span>
				<span class="login_nav_reg" id="click_res">注册</span>
				<span class="navs-slider-bar"></span>
			</div>
			<div class="login_in">
				<div class="login_in_lo" >
					<form method="post"  action="../control/login_in.php">
						<div class="form_all">
							<input type="text" placeholder="请输入用户名" name="login_username" id="login_username">
							<input type="password" placeholder="请输入密码" name="login_psw" id="login_psw">
							<input type="submit" value="登 录" name="form_login" id="login_submit">
						</div>
					</form>
				</div>
				<div class="login_in_res">
					<form method="post" action="../control/register.php" >
						<div class="form_all">
							<input type="text" placeholder="请输入用户名" name="res_username" id="res_username">
							<input type="text" placeholder="请输入邮箱" name="mail" id="res_mail">
							<input type="password" placeholder="请输入密码" name="res_password" id="res_psw">
							<input type="submit" value="注 册" name="form_login" id="res_submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="login_footer">
		<span>版权所有 xx·  ICP 备 1000 号 · 公网安备 110号</span>
	</div>
	

</body>
</html>