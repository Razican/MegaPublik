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

	function validate_form()
	{
		/*
		$.post("test.php", { "func": "getNameAndTime" }, //Poner los datos del formulario
			function(data)
			{
				console.log(data.name);
				console.log(data.time);
			}, "json");*/


		var compare_img	= '<?php echo $comp_img; ?>',
			state		= $('#state').val();

		if(	$('#user_result').html() 		=== compare_img	&&
			$('#pass_result').html() 		=== compare_img	&&
			$('#passconf_result').html()	=== compare_img	&&
			$('#email_result').html()		=== compare_img	&&
			state	!= '' && state)
			{
				$('#submit').removeProp('disabled');
			}
	}





	loading				= '<?php echo img($loading); ?>';
	if($('#country').val() === '')
	{
		$('#state').prop('disabled', true);
	}
	$('#submit').prop('disabled', true);

	$('input').focus(function()
	{
		if ($(this).attr('type') != 'submit')
		{
			$('#submit').prop('disabled', true);
		}
		$('#user_notes').html('');
		$('#email_notes').html('');
	});

	$('input').bind('blur keyup', function()
	{
		var token		= $('input[name=<?php echo config_item('csrf_token_name'); ?>]').val(),
			name		= $(this).attr('name'),
			value		= $(this).val(),
			correct_img	= '<?php echo img($correct); ?>',
			wrong_img	= '<?php echo img($wrong); ?>';

		switch(name)
		{
			case 'username':
				$('#user_notes').html(loading);

				$.post("<?php echo site_url('registration/request'); ?>", { <?php echo config_item('csrf_token_name'); ?>: token, name: name, value: value }, function(data)
				{
					if (data != correct_img)
					{
						$('#user_notes').html(data);
						$('#user_result').html(wrong_img);
					}
					else
					{
						$('#user_notes').html('');
						$('#user_result').html(data);
					}
				});

				validate_form();
			break;
			case 'password':
				$('#pass_result').html(loading);
				$('#passconf_result').html(loading);

				var confirmation	= $('#pass_conf').val(),
					username		= $('#username').val();

				$('#percent').width(pass_strenght(value)+'%');

				if (value.toLowerCase() == username.toLowerCase() || pass_strenght(value) == 0)
				{
					$('#pass_result').html(wrong_img);
				}
				else
				{
					$('#pass_result').html(correct_img);
				}

				if(value === confirmation && password) {
					$('#passconf_result').html(correct_img);
				}
				else
				{
					$('#passconf_result').html(wrong_img);
				}

				validate_form();
			break;
			case 'passconf':
				$('#pass_result').html(loading);
				$('#passconf_result').html(loading);

				var password		= $('#password').val(),
					username		= $('#username').val();

				if (password.toLowerCase() == username.toLowerCase() || pass_strenght(password) == 0)
				{
					$('#pass_result').html(wrong_img);
				}
				else
				{
					$('#pass_result').html(correct_img);
				}

				if(password === value && password)
				{
					$('#passconf_result').html(correct_img);
				}
				else
				{
					$('#passconf_result').html(wrong_img);
				}

				validate_form();
			break;
			case 'email':
				$('#email_notes').html(loading);

				var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

				if(pattern.test(value) && value != '')
				{
					$.post("<?php echo site_url('registration/request'); ?>", { <?php echo config_item('csrf_token_name'); ?>: token, name: name, value: value }, function(data)
					{
						if (data != correct_img)
						{
							$('#email_notes').html(data);
							$('#email_result').html(wrong_img);
						}
						else
						{
							$('#email_notes').html('');
							$('#email_result').html(data);
						}
					});
				}
				else
				{
					$('#email_notes').html('');
					$('#email_result').html(wrong_img);
				}

				validate_form();
			break;
		}
	});

	$('#country').change(function()
	{
		//$('#state_selector').html(loading);

		var token		= $('input[name=<?php echo config_item('csrf_token_name'); ?>]').val(),
			name		= 'country',
			value		= $(this).val();

		if (value === '1' || value === '2')
		{
			$.post("<?php echo site_url('registration/request'); ?>", { <?php echo config_item('csrf_token_name'); ?>: token, name: name, value: value }, function(data)
			{
				$('#state').append(data);
			});

			$('#state').removeProp('disabled');
		}

		validate_form();
	});

	$('#state').change(function()
	{
		validate_form();
	});
});