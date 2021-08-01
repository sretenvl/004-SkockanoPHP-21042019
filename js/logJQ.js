$(document).ready(function(){
	$('#registracija').click(function(){
		$('.login-page').css({opacity: "1"}, "slow");
	});
	$('.message a').click(function(){
		$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});
});