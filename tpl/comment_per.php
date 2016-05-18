<?php
	require_once '../control/conn.php';
	require_once 'backstage.php';
	$username=$_COOKIE['username'];
	$sql_mycom="select * from comment where username='$username' order by id desc ";
	$res_mycom=mysql_query($sql_mycom);
	$row_mycom=mysql_fetch_array($res_mycom);
	$title=$row_mycom['title'];
	$sql_id="select id from passage where title='$title'";
	$res_id=mysql_query($sql_id);
	$row_id=mysql_fetch_array($res_id);
?>
<div class="comment_per">
	<h2>评论</h2>
	<table >
		<tr>
			<td width="60px">作者</td>
			<td  style="text-align: center;padding-bottom: 10px;">评论</td>
			<td style="display: inline-block;width: 343px;">文章</td>
			<td style="text-align: left;display: inline-block;">时间</td>
		</tr>
		<?php 
			while($row_mycom=mysql_fetch_array($res_mycom)){
		?>
		<tr>
			<td><?php echo $row_mycom['username']; ?></td>
			<td><span  class="mycomment" ><?php echo $row_mycom['comment']; ?></span></td>
			<td class="mycom_title"><a href="content.php?id=<?php echo $row_id['id'] ?>"><?php echo $row_mycom['title']; ?></a></td>
			<td class="mycom_time"><?php echo $row_mycom['time']; ?></td>
		</tr>
		<?php } ?>
	</table>
	
</div>
