// Generated by CoffeeScript 1.3.3
(function() {

  $(function() {
    var check_repetition, get_states, pass_strenght, states, validate_form;
    check_repetition = function(pLen, str) {
      var element, repeated, _i, _len;
      for (_i = 0, _len = str.length; _i < _len; _i++) {
        element = str[_i];
        repeated = true;
        for (j=0;j < pLen && (j+i+pLen) < str.length;j++)
			{
				repeated = repeated && (str.charAt(j+i)==str.charAt(j+i+pLen));
			};

        if (j < pLen) {
          repeated = false;
        }
        if (repeated) {
          i += pLen - 1;
          repeated = false;
        } else {
          res += str.charAt(i);
        }
      }
      return res;
    };
    pass_strenght = function(password) {
      var score;
      score = 0;
      if (password.length >= 6 && (/\d/.test(password))) {
        score += (password.length - 6) * 4;
        score += (check_repetition(1, password).length - password.length) * 1;
        score += (check_repetition(2, password).length - password.length) * 1;
        score += (check_repetition(3, password).length - password.length) * 1;
        score += (check_repetition(4, password).length - password.length) * 1;
      }
      if (password.match(/(.*[0-9].*[0-9].*[0-9])/)) {
        score += 5;
      }
      if (password.match(/(.*[!,@,#,$,%,^,&,*,?,_,~].*[!,@,#,$,%,^,&,*,?,_,~])/)) {
        score += 5;
      }
      if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        score += 7;
      }
      if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
        score += 10;
      }
      if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([0-9])/)) {
        score += 10;
      }
      if (password.match(/([!,@,#,$,%,^,&,*,?,_,~])/) && password.match(/([a-zA-Z])/)) {
        score += 10;
      }
      if (password.match(/^\w+$/) || password.match(/^\d+$/)) {
        score -= 10;
      }
      if (score > 100) {
        score = 100;
      } else if (score < 0) {
        score = 0;
      }
      return score;
    };
    validate_form = function() {
      return $.post('register/request', $('form').serialize(), function(data) {
        var is_ok;
        is_ok = true;
        $.each(data, function(key, value) {
          var style;
          if (value) {
            style = "correct";
          } else {
            style = "incorrect";
            is_ok = false;
          }
          $('#' + key).next('figure').remove();
          return $('#' + key).after($('<figure>', {
            "class": style + ' result'
          }));
        });
        if (is_ok) {
          return $('#submit').prop("disabled", false);
        } else {
          return $('#submit').prop("disabled", true);
        }
      }, 'json');
    };
    get_states = function(country) {
      $('#state').html(states);
      return $.post('register/request', {
        get_states: country
      }, function(data) {
        $.each(data, function(key, value) {
          return $('#state').append($('<option>', {
            value: key
          }).text(value));
        });
        return $('#state').prop("disabled", false);
      }, 'json');
    };
    $('input').bind('blur keyup', function() {
      return validate_form();
    });
    states = $('#state').html();
    $('#country').change(function() {
      $('#state').prop("disabled", true);
      if ($(this).val() > 0) {
        get_states($(this).val());
      } else {
        $('#state').html(states);
      }
      return validate_form();
    });
    return $('#state').change(function() {
      return validate_form();
    });
  });

}).call(this);
