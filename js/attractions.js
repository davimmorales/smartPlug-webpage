var h = window.innerHeight -50;
$(".jumbotron").hide();
$(".secao").hide();
$(".footer").hide();
$(".jumbotron").css("height", h);
$(".caixa").css("top",h+35);
$(".conheca").css("top",Math.round(0.2 * h )-35);
$(".cinza").css("top",Math.round(0.35 * h)-35);
$(document).ready(function(){
	$(".jumbotron").css("opacity", 1);	
	$(".jumbotron").delay(1500).fadeIn(800);
	$(".cinza").hide();
	$(".conheca").hide();
	$(".cinza").delay(3000).fadeIn(800);
	$(".conheca").delay(3000).fadeIn(800);
	$(".secao").delay(4000).fadeIn(1200);
	$(".footer").delay(5500).fadeIn(2000);
})
