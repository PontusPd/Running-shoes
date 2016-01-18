$(document).ready(function(){	
	$(".slides").slice(1).hide();
	$('.slides:first-child').addClass('first');
	$('.slides:last-child').addClass('last');
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() { 
	  $('#slideshow > div:first').fadeOut(1000).next().fadeIn(1000).end().appendTo('#slideshow');
	},  3000);
});