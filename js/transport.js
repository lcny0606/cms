$(function(){
	$("#save_pub").click(function(){
		var content=ue.getContent();
		var title=$("#passage_title").val();
		var column=$("#column_sel option:selected").val();
		$.ajax({
			type:"post",
			url:"../control/passage_insert.php",
			datatype:"json",
			data:{"title":title,"content":content,"column":column},
			success:function(){
				alert("发布成功");
				console.log(content);
				window.location.reload();
			}
		})
		
		
	})
	
	
	
})