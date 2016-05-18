$(function() {
	var pic_box = $(".pic_box").width();
	var len = $(".picbox li").length;
	var page = 1;
	var page_count = Math.ceil(len / 4);
	$("#img_left").click(function() {
		if ($(".picbox").is(":animated")) {} else {
			if (page == page_count) {
				$(".picbox").animate({
					left: '0px'
				}, 1000);
				page = 1;
			} else {
				$(".picbox").animate({
					left: '-=' + pic_box
				}, 1000)
				page++;
			}
		}
	})
	$("#img_right").click(function() {
		if ($(".picbox").is(":animated")) {} else {
			if (page == 1) {
				$(".picbox").animate({
					right: (page_count - 1) * pic_box
				}, 1000);
				page = page_count;
			} else {
				$(".picbox").animate({
					right: '-=' + pic_box
				}, 1000);
				page--;
			}
		}
	})
	
	var member_a=$('.tab_choose');
	var member_tab=$('.member_table table');
	$(member_a).mouseover(function(){
		var tt=$(this).index();
		member_a.removeClass();
		$(this).addClass('current_right');
		member_tab.css('display','none');
		member_tab.eq(tt).css('display','block');	
	})
	
	
	
	var tab_a=$(".tab_box dt p a");
	var tab_ul=$(".tab_box dd ul");
	$(tab_a).mouseover(function(){
		var t=$(this).index();
		tab_a.removeClass();
		$(this).addClass('current');
		tab_ul.css('display','none');
		tab_ul.eq(t).css('display','block');	
	})
	
	var lastli_tab=$('.member_table_2');
	var settime ;
	 $(lastli_tab).hover(function () {
                clearInterval(settime);
            }, function () {
                settime = setInterval(function () {
                    var $first =$('.lastly_com:first');    
                    var height = $first.find("li:first").height();    
                    $first.animate({ "marginTop": -height + "px" }, 600, function () {
                        $first.css({ marginTop: 0 }).find("li:first").appendTo($first); 
                    });
                }, 1000);
            }).trigger("mouseleave");
	

})