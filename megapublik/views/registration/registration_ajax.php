$(function(){
	function check_repetition(pLen,str)
	{
		var res = "";
		for ( i=0; i<str.length ; i++ ) {
			repeated=true;
			for (j=0;j < pLen && (j+i+pLen) < str.length;j++)
			{
				repeated=repeated && (str.charAt(j+i)==str.charAt(j+i+pLen));
			}
			if (j<pLen) {repeated=false;}
			if (repeated) {
				i+=pLen-1;
				repeated=false;
			}
			else {
				res+=str.charAt(i);
			}
		}
		return res;
	}

	function pass_strenght(password)
	{
		var score = 0;	
		if (password.length < 6 || !(/\d/.test(password))) { return 0; }	
		score += (password.length-6) * 4;
		score += ( check_repetition(1,password).length - password.length ) * 1;
		score += ( check_repetition(2,password).length - password.length ) * 1;
		score += ( check_repetition(3,password).length - password.length ) * 1;
		score += ( check_repetition(4,password).length - password.length ) * 1;

		if (password.match(/(.*[0-9].*[0-9].*[0-9])/)) { score += 5; }
		if (password.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)) { score += 5; }
		if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) { score += 7; }
		if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) { score += 10; }
		if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([0-9])/)) { score += 10; }
		if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([a-zA-Z])/)) { score += 10; }
		if (password.match(/^\w+$/) || password.match(/^\d+$/) ) { score -= 10; }
		if (score > 100) { return 100; }
		if (score < 0) { return 0; }

		return (score);
	}

	correct_img				= '<?php echo img($correct); ?>';
	compare_img				= '<?php echo $comp_img; ?>';
	wrong_img				= '<?php echo img($wrong); ?>';
	loading_img				= '<?php echo img($loading); ?>';
	post_url				= '<?php echo site_url('registration/request'); ?>'
	$('#submit').attr('disabled', true);
	$('#state').attr('disabled', true);

	$('#username').focus(function() {
		$('#user_result').html('');
		$('#user_notes').html('');
	});

	$('#username').bind('blur keyup',function() {
		$('#user_notes').html(loading_img).load(post_url + "/user/" + $(this).val());
		$('#user_result').html(correct_img);
	});

	$('#password').focus(function() {
		$('#pass_result').html('');
	});

	$('#password').bind('blur keyup',function() {

		var password		= $(this).val(),
			pass_conf		= $('#pass_conf').val(),
			username		= $('#username').val();

		$('#percent').width(pass_strenght(password)+'%');		

		if (password.toLowerCase() == username.toLowerCase() || pass_strenght(password) == 0)
		{
			$('#pass_result').html(wrong_img);
		}
		else
		{
			$('#pass_result').html(correct_img);			
		}

		if(password == pass_conf && password && pass_conf) {
			$('#passconf_result').html(correct_img);
		}
	});

	$('#pass_conf').bind('blur keyup',function() {

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
		$('#email_notes').html('');
	});

	$('#email').bind('blur keyup', function() {

		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		if(pattern.test($(this).val()))
		{
			$('#email_result').html(correct_img);
		}
		else
		{
			$('#email_result').html(wrong_img);
		}
	});

	/*$('input').focus(function() {
		$('#submit').attr('disabled', true);
	});*/

	$('input').bind('blur keyup', function() {

		if($("#user_result").html() != compare_img || $("#pass_result").html() != compare_img || $("#passconf_result").html() != compare_img || $("#email_result").html() != compare_img) {

			$('#submit').attr('disabled', true);
		}
		else
		{
			$('#submit').removeAttr('disabled');
		}
	});

	/*$('#submit').submit(function() {
		$('#submit').attr('disabled', true);
	});*/
});