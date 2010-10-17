<?php echo $head; ?>
		<?php echo form_open('login'); ?>
			Login: <br />
			<?php echo lang('login.username'); ?>: <input type="text" name="username" /><br />
			<?php echo lang('login.password'); ?>: <input type="password" name="password" /><br /><br />
			<?php echo lang('login.remember'); ?>: <input type="checkbox" name="remember" />
			<input type="submit" value="<?php echo lang('login.submit'); ?>" name="submit" />
		</form><?php echo br(2); ?>
		<?php echo anchor('registration', 'Regístrate'); ?>
<?php echo $footer; ?>