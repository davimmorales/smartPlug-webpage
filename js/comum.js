$('.barra').hide();
$(document).ready(function () {
    $('.barra').css("opacity", 1);
    $('.barra').slideDown(1000, "swing");
});

$(function () {
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');
    // Will also work for relative and absolute hrefs
    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('active');

    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().parent().parent().addClass('active');
});
