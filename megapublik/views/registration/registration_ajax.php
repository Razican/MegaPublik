$(function(){

	correct_img		= '<?php echo img($correct); ?>';
	wrong_img		= '<?php echo img($wrong); ?>';

	alert(correct_img);

	$(document).ready(function(){

		$('#submit').attr('disabled', 'disabled');

	});

	$('#username').focus(function() {

		$('#user_result').html('');

	});

	$('#username').blur(function() {

		$('#user_result').html(correct_img);

		if($("#user_result").html() == correct_img && $("#pass_result").html() == correct_img && $("#passconf_result").html() == correct_img && $("#email_result").html() == correct_img) {

			$(#submit).removeAttr('disabled')

		}
	});

	$('#password').focus(function() {

		$('#pass_result').html('');

	});

	$('#password').blur(function() {

		$('#pass_result').html(correct_img);

		var password		= $(this).val(),
			pass_conf		= $('#pass_conf').val();
		
		if(password == pass_conf) {
			$('#passconf_result').html(correct_img);

			if($("#user_result").html() == correct_img && $("#pass_result").html() == correct_img && $("#passconf_result").html() == correct_img && $("#email_result").html() == correct_img) {

				$(#submit).removeAttr('disabled')

			}
		}
	});

	$('#pass_conf').focus(function() {

		$('#passconf_result').html('');

	});

	$('#pass_conf').blur(function() {

		var password		= $('#password').val(),
			pass_conf		= $(this).val();

		if(password == pass_conf) {
			$('#passconf_result').html(correct_img);

			if($("#user_result").html() == correct_img && $("#pass_result").html() == correct_img && $("#passconf_result").html() == correct_img && $("#email_result").html() == correct_img) {

				$(#submit).removeAttr('disabled')

			}
		}
		else
		{
			$('#passconf_result').html(wrong_img);
		}

	});

	$('#email').focus(function() {

		$('#email_result').html('');

	});

	$('#email').blur(function() {

		$('#email_result').html(correct_img);

		if($("#user_result").html() == correct_img && $("#pass_result").html() == correct_img && $("#passconf_result").html() == correct_img && $("#email_result").html() == correct_img) {

			$(#submit).removeAttr('disabled')

		}
	});

	$('#submit').submit(function() {

		$(#submit).attr('disabled','disabled');

	});
});