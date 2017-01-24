$(document).ready(function() {
	function resize() {
		var windowWidth = $(window).width();
		if (windowWidth < 340) {
			$(".recaptcha").css("transform", "scale(0.84)");
			$(".recaptcha").css("margin", "0 0 0 -24px");
			//$(" iframe[name='undefined'] ").contents().find("body").css("transform", "scale(0.77)");
		} else {
			$(".recaptcha").css("transform", "scale(1)");
			$(".recaptcha").css("margin", "10px auto");
		}
		
		if (windowWidth < 570) {
			$("footer").css("text-align", "center");
			$("footer a").css("display", "block");
		} else {
			$("footer").css("text-align", "left");
			$("footer a").css("display", "inline");
		}
	}
	function updateLabel(elem, type) {
		var file;
		var glyph;
		var get = window.location.href;
		
		if (get.indexOf("?") === -1) {
			get = "";
		} else {
			get = get.slice( get.indexOf("?") );
		}
		
		switch(type) {
			case "likes":
				file = "/php/inc_likes.php" + get;
				glyph = "glyphicon-thumbs-up";
				break;
			case "dislikes":
				file = "/php/inc_dislikes.php" + get;
				glyph = "glyphicon-thumbs-down";
				break;
			default:
				console.log("Error: Misuse of updateLabel(). Ignore the message to the left, that's for our monkey dev team @_@");
				return 0;
		}
		console.log(file);
		$.post(file,
		{
			id: elem.closest("article").attr('id')	//possible security issue: since this script looks at the id of the article, user can change the id via browser settings...
		},
		function(data, status) {
			if (data === "activate_d.php" || data === "activate_l.php") {
				window.location.href = data;
			} else {
				var string = "<span class='glyphicon " + glyph + "'></span>&nbsp;" +
							 "<span class='badge'>" + data + "</span>";
				elem.html(string);
			}
		});
	}	
	function rearrange(type) {
		var file;
		$.post("/php/disp_idea.php", 
		{
			sortType: type,
		},
		function(data, status) {
			$("#posts").html(data);
			$("#posts").animate({opacity:1}, "slow");
		});
	}
	
	resize();
	
	$("#posts").on("click", "article", function() {
		$(this).children("div.content").slideToggle("slow");
	});
	/*Prevents form close/expand from triggering when buttons are clicked*/
	$("#posts").on("click", "article button", function(e) {
		e.stopPropagation();
		e.preventDefault();
	});
	
	
	
	$("#posts").on("click", ".likes", function() {
		updateLabel($(this), "likes");
	});
	$("#posts").on("click", ".dislikes", function() {
		updateLabel($(this), "dislikes");
	});
	$("#posts").on("click", ".report", function() {
		
	});
	

	$(".sortRecent").on("click", function() {
		$(this).addClass("active");
		$(this).siblings().removeClass("active");
		$("#posts").animate({opacity:0}, "slow", function() {
			rearrange("recent");
		});
	});
	$(".sortLikes").on("click", function() {
		$(this).addClass("active");
		$(this).siblings().removeClass("active");
		$("#posts").animate({opacity:0}, "slow", function() {
			rearrange("likes");
		});
	});
	$(".sortDislikes").on("click", function() {
		$(this).addClass("active");
		$(this).siblings().removeClass("active");
		$("#posts").animate({opacity:0}, "slow", function() {
			rearrange("dislikes");
		});
	});
	$('form').on('submit', function(e) {
		if(grecaptcha.getResponse() == "") {
			e.preventDefault();
			$('#modalCaptcha').modal('show');
		}
	});
	
	$("#decline").on("click", function() {
		window.location.href = "index.php?activated=false";		//local
	});
	
	$(window).resize(function() {
		resize();
	});
});