$ ->
	check_repetition = (pLen, str) ->
		for element in str
			repeated = true
			`for (j=0;j < pLen && (j+i+pLen) < str.length;j++)
			{
				repeated = repeated && (str.charAt(j+i)==str.charAt(j+i+pLen));
			}`
			repeated = false if (j<pLen)
			if (repeated)
				i+=pLen-1
				repeated=false
			else
				res+=str.charAt(i);
		res

	pass_strenght = (password) ->
		score = 0

		if (password.length >= 6 && (/\d/.test(password)))
			score += (password.length-6) * 4;
			score += (check_repetition(1,password).length - password.length) * 1
			score += (check_repetition(2,password).length - password.length) * 1
			score += (check_repetition(3,password).length - password.length) * 1
			score += (check_repetition(4,password).length - password.length) * 1

		score += 5 if (password.match(/(.*[0-9].*[0-9].*[0-9])/))
		score += 5 if (password.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/))
		score += 7 if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
		score += 10 if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
		score += 10 if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([0-9])/))
		score += 10 if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([a-zA-Z])/))
		score -= 10 if (password.match(/^\w+$/) || password.match(/^\d+$/))

		if (score > 100)
			score = 100
		else if (score < 0)
			score = 0

		score

	validate_form = ->
		$.post(
			'register/request'
			$('form').serialize()
			(data) ->
				is_ok = true
				$.each(
					data
					(key, value) ->
						if value
							style = "correct"
						else
							style = "incorrect"
							is_ok = false

						$('#' + key).next('figure').remove()
						$('#' + key).after(
							$(
								'<figure>'
								{class: style + ' result'}
							)
						)
				)

				if is_ok
					$('#submit').prop("disabled", false)
				else
					$('#submit').prop("disabled", true)

			'json'
		)

	get_states = (country) ->
		$('#state').html(states)
		$.post(
			'register/request'
			{get_states: country}
			(data) ->
				$.each(
					data
					(key, value) ->
						$('#state').append(
							$(
								'<option>'
								{value: key}
							).text(value)
						)
				)

				$('#state').prop("disabled", false)
			'json'
		)

	$('input').bind(
		'blur keyup'
		->
			validate_form()
	)

	states = $('#state').html()

	$('#country').change(
		->
			$('#state').prop("disabled", true)
			if $(this).val() > 0
				get_states($(this).val())
			else
				$('#state').html(states)
			validate_form()
	)

	$('#state').change(
		->
			validate_form()
	)