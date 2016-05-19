$(function () {
	//$('*').css('border','1px solid #0A0');
    setNavigation();
    // $(window).resize(function(){
    //         var footerHeight = $('.footer').outerHeight();
    //         var stickFooterPush = $('.push').height(footerHeight);
    //         $('.wrapper').css({'marginBottom':'-' + footerHeight + 'px'});
    // });    
    // $(window).resize();

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.selectpicker').selectpicker('mobile');
    }else{
        $('.selectpicker').selectpicker();
    }
});


function setNavigation() {
    var path = location.pathname;
    var pathArray = path.split('/');
    path = pathArray[pathArray.length - 1 ];
    if(path.length == 0 )
    	path = "index.php";
    $(".nav a").each(function () {
	var href = $(this).attr('href');
	if (path.substring(0, href.length) === href) {
		$(this).closest('li').addClass('active');
	}
    });
}
