<?php
	require_once "../control/conn.php";
	require_once "backstage.php";
	$username=$_COOKIE['username'];	
	$sql="select * from passage where username='$username' order by id ";
	$res=mysql_query($sql,$conn);
?>
	<div class="publish">
		<h2>文章</h2>
		<div class="pub_passage">
			<div class="bulk">
				<select>
					<option value="del">删除</option>
					<option value="edit">编辑</option>
				</select>
				<input type="submit" name="" id="" value="批量操作" />
			</div>
			<div class="passage_sel">
					<select id="passage_time" >
						<option value="alltime" selected>全部日期</option>
						<option value="fivemonth">2016.06.01-2016.06.30</option>
						<option value="fivemonth">2016.05.01-2016.05.31</option>
						<option value="fourmonth">2016.04.01-2016.04.30</option>
					</select>
					<select id="columns">
						<option value="0" selected>所以栏目</option>
						<option value="web">网页基础</option>
						<option value="lastly">实时新闻</option>
						<option value="swnews">申威新闻</option>
						<option value="technews">科技新闻</option>
					</select>
					<input type="button" name="" id="sel_time" value="筛选" />
			</div>
			<table class="pub_passage_tb">
				<tr>
					<td><input type="checkbox" name="" id="" value="" /></td>
					<td>标题</td>
					<td>作者</td>
					<td>栏目</td>
				</tr>
				<?php 
				
					$sql_passage="select * from passage where username='$username' order by id desc";
					$res_passage=mysql_query($sql_passage);
					while($row_passage=mysql_fetch_array($res_passage)){
				 ?>
				<tr class="pub_passage_tr">
					<td><input type="checkbox" name="bulk"  value="<?php echo $row_passage['id'] ?>" /></td> 
				 	<td>
				 		<a href="content.php?id=<?php echo $row_passage['id'] ?>"><?php echo $row_passage['title'] ?></a>
				 	</td>
				 	<td><?php echo $row_passage['username'] ?></td>
				 	<td><?php echo $row_passage['columns'] ?></td>
				</tr>
				 <?php } ?>
				
			</table>
			
		</div>
		
	</div>