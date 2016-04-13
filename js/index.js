$(".jumbotron").hide();
$(".pagina").hide();
$('.formularios').hide();

var h = window.innerHeight - 50;
$(".jumbotron").css("height", h);
$(".caixa").css("top", h + 35);
$(".grupo").css("top", Math.round(0.7 * h) - 50);
$(".jumbotron").css("opacity", 1);




$(document).ready(function () {
    $(".barraindex").delay(500).slideUp(2000, "swing");
    $(".jumbotron").delay(1500).fadeIn(800);
    $(".pagina").delay(3000).fadeIn(1200);
    $('.formularios').hide();

    $("#contato").click(function (event) {
        event.preventDefault();
        $(".formularios").slideToggle("slow", function () {
            if ($(this).is(":visible")) { //Check to see if element is visible then scroll to it
                $('html,body').animate({ //animate the scroll
                    scrollTop: $("#contato").offset().top - 80 // the - 25 is to stop the scroll 25px above the element
                }, "slow")
            }
        });
        return false; //This works similarly to event.preventDefault(); as it stops the default link behavior
    });

});
