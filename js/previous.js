$(".cidade").hide();
$(".footer").hide();
$(".texto").hide();

$(document).ready(function(){
	$(".jumbotron").css("opacity", 1);	
	$(".rj2").delay(1500).fadeIn(800);
	$(".texto").delay(2000).fadeIn(1200);
	$(".footer").delay(3000).fadeIn(2000);
	/* Anteriores */
	$("#a2015").on("click", function(){
		$(".sa").fadeOut(700);
		$(".rj1").delay(700).fadeIn(800);
	});
	$("#a2014").on("click", function(){
		$(".rj1").fadeOut(700);
		$(".ar").delay(700).fadeIn(800);	
	});
	$("#a2013").on("click", function(){
		$(".ar").fadeOut(700);
		$(".op").delay(700).fadeIn(800);
	});
	$("#a2012").on("click", function(){
		$(".op").fadeOut(700);
		$(".mac").delay(700).fadeIn(800);
	});
	$("#a2011").on("click", function(){
		$(".mac").fadeOut(700);
		$(".gr").delay(700).fadeIn(800);
	});
	$("#a2010").on("click", function(){
		$(".gr").fadeOut(700);
		$(".rj2").delay(700).fadeIn(800);
	});
	$("#a2009").on("click", function(){
		$(".rj2").fadeOut(700);
		$(".ee").delay(700).fadeIn(800);
	});
	$("#a20XX").on("click", function(){
		$(".ee").fadeOut(700);
		$(".sa").delay(700).fadeIn(800);
	});
	/* Proximos */
	$("#p2015").on("click", function(){
		$(".sa").fadeOut(700);
		$(".ee").delay(700).fadeIn(800);
	});
	$("#p2014").on("click", function(){
		$(".rj1").fadeOut(700);
		$(".sa").delay(700).fadeIn(800);
	});
	$("#p2013").on("click", function(){
		$(".ar").fadeOut(700);
		$(".rj1").delay(700).fadeIn(800);
	});
	$("#p2012").on("click", function(){
		$(".op").fadeOut(700);
		$(".ar").delay(700).fadeIn(800);
	});
	$("#p2011").on("click", function(){
		$(".mac").fadeOut(700);
		$(".op").delay(700).fadeIn(800);
	});
	$("#p2010").on("click", function(){
		$(".gr").fadeOut(700);
		$(".mac").delay(700).fadeIn(800);
	});
	$("#p2009").on("click", function(){
		$(".rj2").fadeOut(700);
		$(".gr").delay(700).fadeIn(800);
	});
	$("#p20XX").on("click", function(){
		$(".ee").fadeOut(700);
		$(".rj2").delay(700).fadeIn(800);
	});
});