	
$(function(){
	//login.php
	$("#click_in").click(function(){
		$(this).css("color","#3291d9");
		$("#click_res").css("color","#FFF");
		$(".login_in_lo").css("display","block");
		$(".login_in_res").css("display","none");
		$(".navs-slider-bar").css("left","79px");
	})
	$("#click_res").click(function(){
		$(this).css("color","#3291d9");
		$("#click_in").css("color","#FFF");
		$(".login_in_res").css("display","block");
		$(".login_in_lo").css("display","none");
		$(".navs-slider-bar").css("left","180px");
	})
	$("#login_submit").click(function(){
		var login_user=$("#login_username").val();
		var login_psw=$("#login_psw").val();
		if(login_user==""){
			alert("请输入用户名");
			return false;
		}else{
			if(login_psw==""){
				alert("请输入密码");
			return false;
			}
		}
	})
	$("#res_submit").click(function(){
		var res_username=$("#res_username").val();
		var res_mail=$("#res_mail").val();
		var res_psw=$("#res_psw").val();
		if(res_username==""){
			alert("请输入用户名");
			return false;
		}else{
			if(res_psw==""){
				alert("请输入密码");
			return false;
			}
		}
	})
	
	//backstage.php
	$(".meun_name").click(function(){
		$('.back_meun li ul').css('display','none');
		$(this).siblings('ul').css('display','block');
		
	})
	
	$(".shrink_meun").click(function(){
			$(this).removeClass('shrink_meun').addClass('openmeun');
			$(".back_left").animate({width:'80px'},600);
			$('.openmeun a').html('展开菜单');	
	})
	
	$('.openmeun').click(function(){
		$(this).removeClass('openmeun').addClass('shrink_meun');
		$(".back_left").animate({width:'180px'},600);
		//$(".back_left").css('width','180px');
		$('.shrink_meun a').html('收起菜单');	
	})
	
	//publishpassage.php
	var sel_time=$("#passage_time option:selected").val();
	var sel_col=$("#columns option:selected").val();
	$("#sel_time").click(function(){
		$.ajax({
			type:"post",
			url:"../control/back_passage.php",
			datatype:"json",
			data:{"sel_time":sel_time,"sel_col":sel_col},

			success:function(data){
				passage_time=eval("("+data+")");
				$(".pub_passage_tr").html(passage_time.rs.title+""+passage_time.rs.columns);
			}
			
		});
		
		
	})
	
	
	
	
})







