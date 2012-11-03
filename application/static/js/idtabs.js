$(document).ready(function() {
    curr_location = window.location.href.split('/')[5];
    location_string = "http://localhost/ci/index.php/" + curr_location
    $('a[href$="' + location_string + '"]').toggleClass("active");


});
