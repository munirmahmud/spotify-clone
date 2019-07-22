$(document).ready(function(){
	$('#hide-login').click(function(){
		$('.login-form').hide();
		$('.register-form').show();
	});

	$('#hide-register').click(function(){
		$('.register-form').hide();
		$('.login-form').show();
	});
});

