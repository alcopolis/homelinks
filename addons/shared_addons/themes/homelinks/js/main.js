// JavaScript Document

$(document).ready(function() {
	
	// ====================================== Main Menu Setting =======================================//
		
		$('ul#main-menu > li').mouseenter(function(){
			$(this).children('ul.dropdown').slideDown(400)
		})
		
		$('ul#main-menu > li').mouseleave(function(){
			$(this).children('ul.dropdown').slideUp(150)
		})
		
		$('ul#main-menu li.no-click > a').click(function(e){
			e.preventDefault();
		})
		
		
		$(document).scroll(function(){
			console.log($(this).scrollTop());
			if($(this).scrollTop() > 40){
				$('header').css({'box-shadow':'0 1px 10px #999', 'background-color':'rgba(255,255,255,0.9)'});	
			}else{
				$('header').css({'box-shadow':'none', 'background-color':'rgba(255,255,255,0)'});	
			}
		})
		
	// ====================================== Orbit Slider ======================================= //
		
		$('.orbit-slider').orbit({
			 animation: 'fade',  
			 animationSpeed: 800,   
			 timer: true, 			
			 advanceSpeed: 8000, 		
			 directionalNav: false, 		 
			 captions: true, 			 
			 captionAnimation: 'fade', 		 
			 captionAnimationSpeed: 800, 	 
			 bullets: true,			 
			 bulletThumbs: true,
			 fluid:true
		});
		
		centerOrbitNav();
		
		
		
		//-------------------------- Content Tabs ---------------------------------------------//
		$('#tab-nav li').first().addClass('active');
		$('.tab-container').first().addClass('curr-tab').css({'display':'block'});
		$('.tab-container').last().addClass('clearfix');
        $('.curr-tab').css({'opacity':'1'});
		
		
		$('ul#tab-nav li a').click(function(e){
			e.preventDefault();
			var id = $(this).attr('href');
			
			$('li.active').removeClass('active');			
			$('.curr-tab').removeClass('curr-tab').css('display','none');
			
			$(this).parent().addClass('active');
			$(id).addClass('curr-tab').fadeIn(100);
		})
		
});


$(window).resize(function(){
	centerOrbitNav();
})


function centerOrbitNav(){
	//Centering orbit bullets position
	winW = $(window).width();
	bulW = $('.orbit-bullets').width();
	
	var bulLeft = (winW - bulW)/2 + 'px';
	$('.orbit-bullets').css({'left': bulLeft, 'margin':'0'});
	//console.log(bulLeft);
}
