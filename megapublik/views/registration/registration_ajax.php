$(function(){

	correct_img		= '<?php echo img($correct); ?>';
	compare_img		= '<?php echo $comp_img; ?>';
	wrong_img		= '<?php echo img($wrong); ?>';

	$('#submit').attr('disabled', true);

	$('#username').focus(function() {

		$('#user_result').html('');

	});

	$('#username').blur(function() {

		$('#user_result').html(correct_img);

		
	});

	$('#password').focus(function() {

		$('#pass_result').html('');

	});

	$('#password').blur(function() {

		$('#pass_result').html(correct_img);

		var password		= $(this).val(),
			pass_conf		= $('#pass_conf').val();
		
		if(password == pass_conf && password && pass_conf) {

			$('#passconf_result').html(correct_img);

		}
	});

	$('#pass_conf').blur(function() {

		var password		= $('#password').val(),
			pass_conf		= $(this).val();

		if(password == pass_conf && password && pass_conf) {

			$('#passconf_result').html(correct_img);

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

		if($("#user_result").html() != compare_img || $("#pass_result").html() != compare_img || $("#passconf_result").html() != compare_img || $("#email_result").html() != compare_img) {

			$('#submit').attr('disabled', true);

			alert($("#user_result").html()+' | '+$("#pass_result").html()+' | '+$("#passconf_result").html()+' | '+$("#email_result").html()+' |C| '+correct_img);

		}
		else
		{

			$('#submit').removeAttr('disabled');

		}

	});

	$('#submit').submit(function() {

		$('#submit').attr('disabled', true);

	});
});