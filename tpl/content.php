<?php
require_once "../control/conn.php";
require_once "header.php";
$id = $_GET['id'];
echo "<input type='hidden' id='passage_id_1' value='". $id."' />";
$sql = "select * from passage where id='$id'";
$result = mysql_query($sql, $conn);
$row = mysql_fetch_array($result);
?>

 <?php 
 session_start();                                   //用于在$_SESSION中获取验证码的值
?>


<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title><?php echo $row['title']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function(){
		var passage_id=$("#passage_id_1").val();
		  $.ajax({
		  	type:"post",
		  	url:"../control/click_num.php",
		  	data:{'id':passage_id};
	  });
	}) 
	 
	
</script>
</head>
<body>
	
	
	<div class="content">
		<div class="content_title">
			<span class="content_time"><?php echo $row["time"]; ?></span>
			<div class="title_navigation">
				<a href="../index.php">返回首页</a>>>
				<a href="javascript:">新闻中心</a>>>
				<a href="#" style="text-decoration:none;">正文</a>
			</div>
			<h1><?php echo $row['title']; ?> </h1>
			
		</div>
		<div class="content_txt">
				<?php echo $row['content']; ?>
		</div>
	
		<div class="content_next clearfix">
			<?php
			$up = "select * from passage where id< $id order by id desc limit 0,1";
			$down = "select * from passage where id>$id order by id asc limit 0,1";
			$resup = mysql_query($up, $conn);
			$resdown = mysql_query($down, $conn);
			$row_up = mysql_fetch_array($resup);
			$row_down = mysql_fetch_array($resdown);
			?>
			<span class="content_next_up">
				上一篇：
				<?php if(mysql_num_rows($resup)){ ?>
				<a href="content.php?id=<?php echo $row_up['id']; ?>"><?php echo $row_up['title']; ?></a>
			<?php
					}else{echo "<a href='javascript:'>已经是第一篇</a>";}
			?>
			</span>
			<span class="content_next_down">
				下一篇:
				<?php if(mysql_num_rows($resdown)){ ?>
				<a href="content.php?id=<?php echo $row_down['id']; ?>"><?php echo $row_down['title']; ?></a>
			    <?php }else{echo "<a href='javascript:'>已经是最后一篇</a>"; } ?>
			</span>
		</div>
		<div class="recommend_2">
			<p>相关推荐 </p>
			<ul>
				<?php  
					$rcm="select * from passage order by rand() limit 5";
					$res_rcm=mysql_query($rcm,$conn);
					while($row_rcm=mysql_fetch_array($res_rcm)){
				?>
				<li>
					<a href="content.php?id=<?php echo $row_rcm['id']; ?>">
						<span id="rcm_title"><?php echo $row_rcm['title']; ?></span>
						<span id="rcm_time"><?php echo $row_rcm['time']; ?></span>	
					</a>
				</li>	
				<?php }?>
			</ul>
		</div>
		<div class="comment">
			<h2>评论</h2>
			<div class="comment_middle">
				<ul>
					<?php 
						$i=1;
						$com_title=$row["title"];
						$sql_com="select * from comment where title='$com_title'";
						$result_com=mysql_query($sql_com,$conn);
						if(mysql_num_rows($result_com)){
						while($row_com=mysql_fetch_array($result_com)){
					?>
						<li>
							<?php echo	"<span class='floor'>".'#'.$i."</span><a href='backstage.php' id='person'>".$row['username']."</a><span class='comment_time'>".$row_com['time']."</span><p>".$row_com['comment']."</p>";
								$i++; 
							 ?>
						</li>
					<?php }}else{echo "<p class='no_com'>**还没有评论，赶紧来发表意见吧！</p>";} ?>
				</ul>
				<form action="../control/comment_insert.php" method="post">
					<textarea name="comment" rows="8" cols="122"></textarea>
					<input type="text" id="checkCode">
					<img src="ValidationCode.class.php" id="checkImg">
					<input type="hidden" name="title" value="<?php echo $row['title'];  ?>" />
					<input type="submit" value="发表评论" id="publish_cmt"/>
				</form>
			</div>
		</div>
	</div>


<script type="text/JavaScript">
	 window.onload=function() {
	  var xmlHttp = false;
	  if (window.XMLHttpRequest) {      //Mozilla、Safari等浏览器
	   xmlHttp = new XMLHttpRequest();
	  } 
	  else if (window.ActiveXObject) {    //IE浏览器
	   try {
	    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
	   } catch (e) {
	    try {
	     xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	      } catch (e) {}
	   }
	  }
	  var checkImg=document.getElementById("checkImg");
	  var checkCode=document.getElementById("checkCode");
	  checkImg.onclick=function() {
	   checkImg.src="ValidationCode.class.php?num="+Math.random();  //以下用于单击验证码时重新加载验证码图片
	   //需要加num=Math.random()以防止图片在本地缓存，单击图片时不刷新显示
	  }
	  checkCode.onblur=function(){
	   //alert("Hello");
	   xmlHttp.open("POST","checkCode.php",true);
	   xmlHttp.onreadystatechange=function () {
	   	$("#publish_cmt").click(function(){
	   	
		    if(xmlHttp.readyState==4 && xmlHttp.status==200) {
		     var msg=xmlHttp.responseText;    //设置标志用于表示验证码是否正确
		     if(msg=='1')
		        //在这可以设置其中间显示一张图片
		       
		     else{
		      
		      alert("验证码错误");return false;}
		    }window.location.reload();
	    })
	   }
	   xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	   xmlHttp.send("validateCode="+checkCode.value);
	  } 
	  

	 }
	

	 
</script>
</body>
</html>