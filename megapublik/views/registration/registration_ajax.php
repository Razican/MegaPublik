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
	loading			= '<?php echo img($loading); ?>';
	$('#state').attr('disabled', true);
	$('#submit').attr('disabled', true);

	$('input').focus(function()
	{
		$('#submit').attr('disabled', true);
		$('#form_result').html('');
		$('#user_notes').html('');
		$('#email_notes').html('');
	});

	$('input').bind('blur keyup', function()
	{
		$('#form_result').html(loading);
		var token	= $('input[name=MP_csrf]').val(),
			name	= $(this).attr('name'),
			value	= $(this).val();

		switch(name)
		{
			case 'password':
			alert('EHHH');
				var password		= $(this).val(),
					pass_conf		= $('#pass_conf').val();

				$('#percent').width(pass_strenght(password)+'%');

			/*	if((password != pass_conf) OR ( ! password) OR ( ! pass_conf)) {
					$('#form_result').html('');
				}*/
			break;
			case 'passconf':
				//execute code block 2
			break;
			case 'email':
				//execute code block 2
			break;
			default:
				$.post("<?php echo site_url('registration/request'); ?>", { 'MP_csrf': token, name: name, value: value }, function(data)
				{
					alert(data);
					//$('#form_result').html(data);
				});
			break;
		}
	});


// A Partir de aquí no cambia nada, se está reescribiendo... //

/*

	$('#username').focus(function() {
		$('#user_result').html('');
		$('#user_notes').html('');
	});

	$('#username').bind('blur keyup',function() {
		if ($(this).val() != '')
		{
			$('#user_notes').html(loading_img).load(post_url + "/user/" + $(this).val(), function()
			{
				if($('#user_notes').html() != '')
				{
					$('#user_result').html(wrong_img);
				}
				else
				{
					$('#user_result').html(correct_img);
				}
			});
		}
		else
		{
			$('#user_result').html(wrong_img);
		}
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
		if(pattern.test($(this).val()) && $(this).val() != '')
		{
			alert($(this).val().replace('@', '~'));
			$('#email_notes').html(loading_img).load(post_url + "/email/" + $(this).val().replace('@', '~'), function()
			{
				if($('#email_notes').html() != '')
				{
					$('#email_result').html(wrong_img);
				}
				else
				{
					$('#email_result').html(correct_img);
				}
			});
		}
		else
		{
		$('#email_result').html(wrong_img);
		}
	});*/
});