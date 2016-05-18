<?php 
	require_once '../control/conn.php';
	require_once 'header.php';
	$search_box=$_POST['search_box'];
	$search_sel=$_POST['search_sel'];
	$sql="select * from passage where title like '%$search_box%' ";
	$res=mysql_query($sql,$conn);		
	$num=mysql_num_rows($res);
	?>
	<!doctype html>
	<html>
	<head>
		<meta charset="UTF-8" />
		<title>搜索</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	</head>
	<body>
		<div class="search_content">
			<div class="search_content_top">
				<h2>结果:找到"<?php echo '<a>'.$search_box.'</a>' ?>"相关内容<?php echo $num ?>个</h2>
			</div>
			<ul>
				<?php if($search_sel=='all'){
				
				while($row=mysql_fetch_array($res)){?>
				<li>
					<h3><a href="content.php?id=<?php echo $row['id'] ?>"><?php echo $row['title']?></a></h3>
					<div class="search_content_p"><?php echo $row['content']; ?></div>
				</li>
			<?php }}else{
				$sql_sel="select * from passage where title like '%$search_box%' and columns='$search_sel'";
				$res_sel=mysql_query($sql_sel);
				$row_sel=mysql_fetch_array($res_sel);
				echo $row_sel['content'];
			}
		?>
			</ul>
		</div>
	</body>
	</html>