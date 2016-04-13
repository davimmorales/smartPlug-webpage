


$(window).resize(function () {

	var maxHeight = -1;
	function atualiza() {
		$('.dia').each(function () {
			maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
		});

		$('.dia').each(function () {
			$(this).height(maxHeight);
		});
		maxHeight = -1;
	}

});

/*
$(document).ready(function () {






	$(".btn-primary").on("click", function () {
		switch ($("#opcoes").val()) {
			/*case "main":
				$(".btn-primary").toggleClass("btn-success");
				break;///fim do comentario
			default:
				$(".wrapper").effect("shake", "swing");

				break;
		}


	});

	$(".calendario").click(function (event) {
		event.preventDefault();
		$(".menu").slideToggle("slow", function () {

			if ($(this).is(":visible")) { //Check to see if element is visible then scroll to it
				$('html,body').animate({ //animate the scroll
					scrollTop: $(".calendario").offset().top - 10 // the - 25 is to stop the scroll 25px above the element
				}, "slow")
			}
		});
		return false; //This works similarly to event.preventDefault(); as it stops the default link behavior
	});

});

*/