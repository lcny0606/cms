<?php
require_once "control/conn.php";
if (!isset($_COOKIE['username'])) {
	$url = 'tpl/login.php';
	echo "<script  type='text/javascript'>window.location.href='$url';</script>";
} else {
	$user = $_COOKIE['username'];
}
?>
<!DICTYPE html>
<html>
<head>
<title>CMS 0.1</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/picbox.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div class="top">
		<div class="header ">
			<div class="header_center clearfix">
				<span href="javascript:">CMS v0.1</span>
				<div>
					[<a  href="javascript:">设为首页</a>]
					[<a  href="javascript:">加入收藏</a>]
				</div>
			</div>
		</div>
		
		<div class="logo clearfix">
			<div class="logo_img">
				<a href="index.php"><img src="images/logo11.png"></a>
			</div>
			<div class="search">
				<form method="post" action='tpl/search.php'>
					<input type="text" value="请输入搜索内容" id="search_box" name='search_box'>
					<select id="search_sel" name="search_sel">
						<option selected value="all">全部新闻</option>
						<option value="web">网页基础</option>
						<option value="lastly">实时新闻</option>
						<option value="swnews">申威新闻</option>
						<option value="technews">科技新闻</option>
					</select>
					<input type="submit" value="搜索" id="searchsubmit">
				</form>
			</div>
		</div>
		<div class="nav">
			<ul class="clearfix">
				<li>主页</li>
				<li>实时新闻</li>
				<li>申威新闻</li>
				<li>科技新闻</li>
			</ul>
		</div>
	</div>
	<div class="middle clearfix">
		<div class="member">
			<div class="member_top">
				<div class="member_tab">
					<a class="tab_choose current_right" href="javascript:" >个人中心</a>
					<a class="tab_choose" href="javascript:">最近登录</a>
					<a class="tab_choose" href="javascript:">最新评论</a>
				</div>
				<div class="member_table">
					<table style="display: block;" class="member_table_top">
						<tr>
							<td colspan="2">
								<?php
									$res_ar=mysql_query("select * from user where username='$user'");	
									$row_ar=mysql_fetch_array($res_ar);
									if($row_ar['avatar']==''){
										echo "<img src='images/touxiang.png'>";
									}else{
										echo "<img src='images/avatar/".$row_ar["avatar"]."'>";
									}
								?>
								
								
							</td>
						</tr>
						<tr>
							<td><span class="login_index">用户名:</span></td>
							<td><span><?php echo $_COOKIE['username']; ?></span></td>
						</tr>
						<tr>
							<td><span class="login_index">年龄：</span></td>
							<td><span><?php echo $row_ar['age']; ?></span></td>
						</tr>
						<tr>
							<td><span class="login_index">邮箱：</span></td>
							<td><span><?php echo $row_ar['mail']; ?></span></td>
						</tr>
						<tr>
							<td><span class="login_index"><a href="tpl/back_person.php">进入后台</a></span></td>
						</tr>
						<tr>
							<td><a href="control/login_out.php" class="login_index">退出登录</a></td>
						</tr>
						
					</table>
					<table>
						<tr>
							<td>
						<?php 
							$res_last=mysql_query("select avatar,username from user order by time desc limit 6");	
							while($row_last=mysql_fetch_array($res_last)){
						?>
								<p>
									<img src="images/avatar/<?php echo $row_last['avatar']; ?>"><br>
									<a href="javascript:"><?php echo $row_last['username']; ?></a>
								</p>
						
						<?php } ?>
								</td>
						</tr>
					</table>
					<table class="member_table_2">
						<tr>
							<td>
								<ul class="lastly_com">
									<?php
										$res_lastcom=mysql_query("select comment from comment order by id desc limit 13");
										while($row_lastcom=mysql_fetch_array($res_lastcom)){
										?>
									<li><?php echo $row_lastcom['comment']; ?></li>
									<?php } ?>
								</ul>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="member_middle">
				
			</div>
		</div>
		<div class="midleft">
			<div class="lastly">
				<div class="lastly_img">
					<p>图片标题</p>
				</div>
				<div class="lastly_sp">
					<p>特别推荐</p>
					<ul>
						<li><a href="javascript:">111111111111</a><span>04-15</span></li>
						<li><a href="javascript:">111111111111</a><span>04-15</span></li>
						<li><a href="javascript:">111111111111</a><span>04-15</span></li>
						<li><a href="javascript:">111111111111</a><span>04-15</span></li>
						<li><a href="javascript:">111111111111</a><span>04-15</span></li>
						<li><a href="javascript:">111111111111</a><span>04-15</span></li>
					</ul>
				</div>
			</div>
			<div class="rec">
				<div class="rec_title">
					<h2><a href="javascript:">Lcny-CMS v0.1</a></h2>
					<div class="rec_about">
						<p>2017年，新一年，新征程…… 大家庭招募能够共同创业的新伙伴。 首要特点：需要的是创业伙伴，而非普通员工。是一个大家共同的创业平台！繁华浮躁的时代..............[<a href="tpl/content.php?id=48">查看全文</a>]</p>	
					</div>
					<div class="fix-passage clearfix">
						<a href="">完全了解AJAX</a>
						<a href="">JavaScript的9个陷阱及评点</a>
						<a href="">JavaScript基础知识总结</a>
						<a href="">Web2.0十大Ajax安全漏洞以及</a>
					</div>
				</div>
				<div class="recommend">
					<div class="newarticle">
						<ul>
							<?php 
								$sql_last='select id,title from passage order by id desc limit 16';
								$res_last=mysql_query($sql_last,$conn);
								while($row_last=mysql_fetch_array($res_last)){
							 ?>
							<li>
								<a href="tpl/content.php?id=<?php echo $row_last['id']; ?>" target="_blank">
									<?php echo $row_last['title']; ?>
								</a>	
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="mid_img">
			<div class="mid_img_left">
				<a href="javascript:" id="img_left"><img src="images/index_left.png"/></a>
				<a href="javascript:" id="img_right"><img src="images/index_right.png"/></a>
			</div>
			<div class="pic_box">
				<ul class="picbox clearfix">
					<li><a href="javascript:"><img src="images/passage/13274215,1600,900.jpg" /></a></li>
					<li><a href="javascript:"><img src="images/passage/13347073,1600,900.jpg"/></a></li>
					<li><a href="javascript:"><img src="images/passage/13274215,1600,900.jpg" ></a></li>
					<li><a href="javascript:"><img src="images/passage/22323.jpg"/></a></li>
					<li><a href="javascript:"><img src="images/passage/13274215,1600,900.jpg" /></a></li>
					<li><a href="javascript:"><img src="images/passage/13368792,1600,900.jpg"/></a></li>
					<li><a href="javascript:"><img src="images/passage/13274215,1600,900.jpg" ></a></li>
					<li><a href="javascript:"><img src="images/passage/13368792,1600,900.jpg"/></a></li>
					<li><a href="javascript:"><img src="images/passage/13554090,1600,900.jpg" /></a></li>
					<li><a href="javascript:"><img src="images/passage/13554090,1600,900.jpg"/></a></li>
					<li><a href="javascript:"><img src="images/passage/13274215,1600,900.jpg" ></a></li>
					<li><a href="javascript:"><img src="images/passage/13554090,1600,900.jpg"/></a></li>
				</ul>
			</div>
		</div>
		
		<div class="listbox">
			<div class="listbox_box">
				<div class="listbox_top">
					<a href="">网页基础</a>
					<a href="" class="listbox_more">更多...</a>
				</div>
				<ul>
				<?php 
					$sql="select * from passage where columns='web' order by  id desc limit 9";
					$res_web=mysql_query($sql,$conn);
					while($row=mysql_fetch_array($res_web)){
				?>				
					<li>
						<a href="tpl/content.php?id=<?php echo $row['id'] ?>" target='_blank'><?php echo $row['title']; ?></a>	
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="listbox_box">
				<div class="listbox_top">
					<a href="" >实时新闻</a>
					<a href="" class="listbox_more">更多...</a>
				</div>
				<ul>
				<?php 
					$sql="select * from passage where columns='lastly' order by  id desc limit 9";
					$res_web=mysql_query($sql,$conn);
					while($row=mysql_fetch_array($res_web)){
				?>				
					<li>
						<a href="tpl/content.php?id=<?php echo $row['id'] ?>" target='_blank'><?php echo $row['title']; ?></a>	
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="listbox_box">
				<div class="listbox_top">
					<a href="">申威新闻</a>
					<a href="" class="listbox_more">更多...</a>
				</div>
				<ul>
				<?php 
					$sql="select * from passage where columns='swnews' order by  id desc limit 9";
					$res_web=mysql_query($sql,$conn);
					while($row=mysql_fetch_array($res_web)){
				?>				
					<li>
						<a href="tpl/content.php?id=<?php echo $row['id'] ?>" target='_blank'><?php echo $row['title']; ?></a>	
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="listbox_box">
				<div class="listbox_top">
					<a href="">科技新闻</a>
					<a href="" class="listbox_more">更多...</a>
				</div>
				<ul>
				<?php 
					$sql="select * from passage where columns='technews' order by  id desc limit 9";
					$res_web=mysql_query($sql,$conn);
					while($row=mysql_fetch_array($res_web)){
				?>				
					<li>
						<a href="tpl/content.php?id=<?php echo $row['id'] ?>" target='_blank'><?php echo $row['title']; ?></a>	
					</li>
				<?php } ?>
				</ul>
			</div>
			
		</div>
	</div>
	<div class="footer">
		<dl class="tab_box clearfix">
			<dt class="clearfix">
				<span class="tab_title">相关链接</span>
				<p>
					<a href="javascript:" class="current" >综合网站</a>
					<a href="javascript:" >娱乐网站</a>
					<a href="javascript:" >教育网站</a>
					<a href="javascript:" >论坛网站</a>
					<a href="javascript:" >其他网站</a>
				</p>
				<span class="tab_more">
					<a href="javascript:">所有链接</a>
					<a href="javascript:">|申请加入</a>
				</span>
			</dt>
			<dd id="flink_1" class="clearfix" > 
				<ul style="display: block;">
					<li><a href="http://www.baidu.com">百度</a></li>
					<li><a href="http://www.sw64.cn">申威社区</a></li>
					<li><a href="http://www.acfun.tv">科技新闻</a></li>
				</ul>
			</dd>
			<dd id="flink_2" class="clearfix">
				<ul>
					<li><a href="http://www.baidu.com">科技新闻</a></li>
					<li><a href="http://www.baidu.com">科技新闻</a></li>
					<li><a href="http://www.baidu.com">科技新闻</a></li>
					<li><a href="http://www.baidu.com">科技新闻</a></li>	
				</ul>
			</dd>
			
			
		</dl>
	
	</div>
</body>
</html>