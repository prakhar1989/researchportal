$(document).ready(function() {
    // set tabs
    $("#tabbar ul").idTabs();

    // get url
    loc_string = window.location.href.split('/');
    location_string = loc_string[loc_string.length - 1]
    
    // set active link
    $('a[href$="' + location_string + '"]').toggleClass("active");

    if (document.location.pathname.match(/\/Conf_.*/igm)) { 
        $('#bars li a:eq(1)').click()
     } else {
     $('#bars li a:eq(0)').click()
    }

});
