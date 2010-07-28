<html>
	<head>
		<title>MegaPublik</title>
	</head>
	<body>
		<?php echo form_open('registration/register'); ?>
			<?php echo lang('reg.username'); ?>: <input type="text" name="username" /><?php echo br(2); ?>
			<?php echo lang('reg.password'); ?>: <input type="password" name="password" /><?php echo br(2); ?>
			<?php echo lang('reg.passconf'); ?>: <input type="password" name="passconf" /><?php echo br(2); ?>
			<?php echo lang('reg.email'); ?>: <input type="text" name="email" /><?php echo br(2); ?>
			<?php echo lang('reg.country'); ?>: <select name="country">
					<?php echo $countries; ?>
			</select><?php echo br(2); ?>
			<input type="submit" value="<?php echo lang('reg.submit'); ?>" name="submit" />
		</form><?php echo br(2); ?>
	</body>
</html>