$(document).ready(function() {				
	//Date picker
	$( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
		
	//inar-details
	$(".feedback").magnificPopup({
  		type:'inline',
  		midClick: true 
	});
	
	//home
	$(".ad_btn").click(function(){
		$('.ad_search').slideToggle();
	});


//Tab
		$('.tc:first').show();	
		$('.tmenu li:first a').addClass('active');
		$('.tmenu li a').click(function(){
			$('.tc').hide();
			$('.tmenu li a').removeClass('active');
			$(this).addClass('active');
			if($('.tc#'+$(this).attr('deta-name')).length)
				$('.tc#'+$(this).attr('deta-name')).fadeIn('slow');
			return false;
		})

//pop slide thumb
	//$(".thumb_slide").wrap('<div class="slid"></div>');
	//$('.slid').prepend('<div id="tbanner"></div>');

	var l=$(".pop_thumbs li:first a").attr('href');
	$("#tbanner").html('<img src="'+l+'" alt="image" />');
	
	$(".pop_thumbs li a").click(function(){
		var newbanner=$("#tbanner").html('<img src="' + $(this).attr('href') + '" alt="image" />').hide();	
		$(newbanner).fadeIn();
	
		
		
		return false;
	})


	

	//common
	$(".top_menu li>a").click(function(){
		if($(this).next('.t_sub').hasClass('active')){
			$(this).next('.t_sub').removeClass('active');
			$(this).next('.t_sub').slideUp();
		}else{
			$(this).next('.t_sub').addClass('active');
			$(this).next('.t_sub').slideDown();		
		}
	});

	$('.i_box >a').click(function(){
		$(this).next('.tool').fadeToggle();
		
		setTimeout(function(){
		  $('.tool').fadeOut();
		}, 2000);
		return false;
	});	
	
	$('.i_box >a').click(function(){
		
		$(this).next('.m_box').fadeToggle();
		return false;
	});	
		
	$('.m_box .close').click(function(){
		$('.m_box').fadeOut();
		return false;
	});	
	
	
	
	$('.dl-submenu').prev('a').addClass('r_arrow');	
	
	$('.r_arrow').click(function(){
		$(this).parent('li').siblings().find('.dl-submenu').slideUp();	
		$(this).next('.dl-submenu').slideToggle();
	});	
	
	
	
	// responsive navbar
/*	$('.navbar-toggle').click(function(e){
	$('.top_menu > ul').slideToggle("1000");
	});
	//
	$('.myaccount').click(function() {
		$('.myacc-panel').toggle("slow");
	});*/
	//	



//listing page	
	$(".Sort_p > span").click(function(){
		$(this).siblings().removeClass('active up down');
		//$(this).addClass('active down');
		if($(this).hasClass('active down')){
			$(this).removeClass('active down').addClass('active up');
		}else{
			$(this).removeClass('active up').addClass('active down');
		}
		

	});
	
	$(".list_v").click(function(){
		$('.rc').removeClass('active');
		$(this).addClass('active');
		$('.view').html('List View');
		$('.l_box').removeClass('v_grid').addClass('v_list');
			$('.l_pan').removeClass('close_P').addClass('open_p');
			$('.r_pan').removeClass('one_cole').addClass('two_col');		
	});
	$(".grid_v").click(function(){
		$('.rc').removeClass('active');
		$(this).addClass('active');
		$('.view').html('Grid View');
		$('.l_box').removeClass('v_list').addClass('v_grid');
		
			$('.l_pan').removeClass('open_p').addClass('close_P');
			$('.r_pan').removeClass('two_col').addClass('one_cole');		
	});	
	
//list left panel	
	$(".list_filter_mn").click(function(){
		if($('.l_pan').hasClass('close_P')){
			$(this).children('.list_filter_handelar').html('<i class="fa fa-arrow-right"></i>');
			$('.l_pan').removeClass('close_P').addClass('open_p');
			$('.r_pan').removeClass('one_cole').addClass('two_col');			
		}else{
			$(this).children('.list_filter_handelar').html('<i class="fa fa-arrow-left"></i>');
			$('.l_pan').removeClass('open_p').addClass('close_P');
			$('.r_pan').removeClass('two_col').addClass('one_cole');
		}
	});	
	

//Listing Details

$('.more').click(function(){
	if($(this).parent().find('.exp').hasClass('min')){
		$(this).parent().find('.exp').removeClass('min');
		$(this).html('More -');
	}else{
		$(this).parent().find('.exp').addClass('min');
		$(this).html('More +');
	}
	return false;
});

$('.dt_menu li a').click(function(){
	$("html, body").animate({
		scrollTop: $($(this).attr('href')).offset().top-150}, 2000);
	return false;
});

/*	$(".dt_menu li a").click(function() {
		//alert($(this).attr('data-type'));
		$(".dt_menu li a").removeClass('active');
		$(this).addClass('active');
		$('html, body').animate({
			scrollTop: $('#'+$(this).attr('data-type')).offset().top-150
		}, 2000);
	});*/	

$('#goToTop').click(function(){
	$("html, body").animate({scrollTop: 0}, 2000)
});
//Timeline	
	$('.timeline >li a').click(function(){
		$('.timeline >li a').removeClass('active');
		$(this).addClass('active');
		
		$("html, body").animate({scrollTop: $($(this).attr('href')).offset().top-195}, 2000);
		
		return false;
	});
	
	$('.a_title').click(function(){
		if(!$(this).hasClass('active')){
			$(this).addClass('active');
			$(this).next('.a_con').slideUp();
		}else{
			$(this).removeClass('active');
			$(this).next('.a_con').slideDown();
			
		}
	});
	
	tmenu();

	$(".toggle_menu").click(function(){
		$('.top_menu').slideToggle();
	});	
		
	}); // Document ready Close
	
$(window).resize(function(){
	
	tmenu();
})
	

$(window).scroll(function() {   

//detail top fixd	
    if ($(window).scrollTop() > 190 ) {
        $("body").addClass("fixed_p");
		$('.dt_menu li:first a').addClass('active');
    }else{
		$('.dt_menu li:first a').removeClass('active');
		$("body").removeClass("fixed_p");
	}

	
	$('section').each(function(index, element) {
		var window_top = $(window).scrollTop();
		var div_top = $('#'+$(this).attr('id')).offset().top-190;
		
		if (window_top > div_top) {
			$('.dt_menu ul li a').removeClass('active');
			$('.dt_menu ul li a[href=#'+$(this).attr('id')+']').addClass('active');
		} else {
			
			$('.dt_menu ul li a[href=#'+$(this).attr('id')+']').removeClass('active');
		}        
    });



	var w_top = $(window).scrollTop();
	var sc_bottom = $('.sedule_con').height()-100;
	var sc_top = $('.sedule_con').offset().top-260;
	var s_bottom =sc_top+sc_bottom;
	
	if (w_top > sc_top && w_top< s_bottom) {
		$('.timeline').addClass('strick');
	}else{
		$('.timeline').removeClass('strick');
	}	
	
	
	
	$('.sedule_con h4').each(function(index, element) {
		var ws_top = $(window).scrollTop();
		var h_top = $('#'+$(this).attr('id')).offset().top-300;
		
		if (ws_top > h_top) {
			$('.timeline li a').removeClass('active');
			$('.timeline li a[href=#'+$(this).attr('id')+']').addClass('active');
		} else {
			
			$('.timeline li a[href=#'+$(this).attr('id')+']').removeClass('active');
		}        
    });	
	
	
}); 

function tmenu(){
	if($(window).width()<500){
		$('.t_sub').hide();
			
	}else{
		
		$('.top_menu').removeAttr('style');
		$('.t_sub').removeAttr('style');
	
	}
}



	//Owl Slider
	$('.home-slider').owlCarousel({
	loop:true,	
    animateOut: 'fadeOut',
    items:1,
	autoplay:true,
	autoplayTimeout:5000
	})


	//Owl Slider package	
	$('.package').owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
	});	
	

$('.owl-carousel-p').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
	navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	
	
	// Select box		
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
	if($(selector).length>0)	
		
      $(selector).chosen(config[selector]);
    }	