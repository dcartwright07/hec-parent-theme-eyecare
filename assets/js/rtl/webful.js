// JavaScript Document
(function($) {
    "use strict";
	
	//calling foundation js
	$(document).foundation();
	
	//Saying page loaded
	$(window).on("load",function(){
        $("body").addClass("loaded");
		$(".preloader").html("");
		$(".preloader").css("display", "none");
     });
	
	//scroll effect
	$("#top").on("click",function () {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});        
	
	$("#top").on("click",function (event) {
		event.stopPropagation();                
		var idTo = $(this).attr("data-atr");                
		var Position = $("[id='" + idTo + "']").offset();
		$("html, body").animate({ scrollTop: Position }, "slow");
		return false;
	});

	$(window).on("scroll",function() { 
		if($(this).scrollTop() > 1000) { 
			$("#top").fadeIn();
		} else { 
			$("#top").fadeOut();
		}
	});
	
	//User Profile mouse over action
	$(".doctor").on("mouseenter", function() { 
		var animationEnd = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
		$(this).children(".doctor-thumb").children(".button").addClass("animated fadeInUp").on(animationEnd, function() {
			$(this).removeClass("animated fadeInUp");
		});
	});
	
	//calling Brand Crousel
	$(".teams-wrapper").owlCarousel({
		slideBy:2,
		loop:true,
		margin:30,
		responsiveClass:true,
		rtl:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			600:{
				items:2,
				nav:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			1000:{
				items:2,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				loop:true
			}
		}
	});
	
	//calling Brand Crousel
	$(".services-carousel").owlCarousel({
		loop:true,
		margin:30,
		autoplay:false,
		responsiveClass:true,
		rtl:true,
		dots:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				dots:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:3,
				nav:false,
			}
		}
	});
	
	//calling Brand Crousel
	$(".testimonials-carousel").owlCarousel({
		loop:true,
		margin:0,
		autoplay:3000,
		responsiveClass:true,
		rtl:true,
		dots:true,
		responsive:{
			0:{
				items:1,
				nav:false
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:1,
				nav:false,
			}
		}
	});

	//calling Brand Crousel
	$(".brand-carousel").owlCarousel({
		loop:true,
		margin:60,
		responsiveClass:true,
		rtl:true,
		responsive:{
			0:{
				items:1,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			600:{
				items:3,
				nav:false,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
			},
			1000:{
				items:5,
				nav:true,
				navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				loop:true
			}
		}
	});
	
})(jQuery); //jQuery main function ends strict Mode on