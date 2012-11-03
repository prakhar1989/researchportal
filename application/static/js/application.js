$(document).ready(function() {
	$("#VerColMenu > li > a").not(":first").find("+ ul").slideUp(1);
	$("#VerColMenu > li > a").click(function() {
		$(this).find("+ ul").slideToggle("fast");
	});

});
