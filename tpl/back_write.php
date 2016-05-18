<?php 
		if(!isset($_COOKIE['username'])){
		$url='../index.php';
		echo "<script  type='text/javascript'>window.location.href='$url';</script>";
		}
		require_once "backstage.php";
		require_once "../control/conn.php";
?>

		<div class="passage_left">
		<h2>新文章</h2>		
			<div class="passage_title">
				<input type="text" name="passage_title" id="passage_title" placeholder="请输入标题" >
			</div>
			<div class="passage_writebox">
				    <!-- 加载编辑器的容器 -->
					<script id="container" name="content" type="text/plain">						
					</script>
					<!-- 配置文件 -->
					<script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
					<!-- 编辑器源码文件 -->
					<script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
					<!-- 实例化编辑器 -->
					<script type="text/javascript">
						var ue = UE.getEditor('container');
					</script>		
			</div>
		</div>
		<div class="passage_right">
			<div class="submitdiv">
				<h3>发布</h3>
				<div class="passage_inside">
					<div class="inside_state">
						<span>状态:</span>
						<span>草稿</span>	
						
					</div>
					<div class="inside_pub">
						<span>公开度:</span>
						<span>公开</span>
					</div>
					<div class="inside_column">
						<span>栏目：</span>
						<select id="column_sel">
							<option value="web" selected>网页基础</option>
							<option value="lastly">实时新闻</option>
							<option value="swnews">申威新闻</option>
							<option value="technews">科技新闻</option>
						</select>
					</div>
				</div>
				<div class="passage_btn clearfix" >
					<input type="button" name="save_draft" id="save_draft" value="存为草稿">
					<input type="submit" name="save_pub" id="save_pub" value="发 布">
				</div>
			</div>
		</div>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/transport.js"></script>
		

