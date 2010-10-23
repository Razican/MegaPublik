<?php echo $head; ?>
		<div class="content">
		<?php echo form_open('login'); ?>
			<h1>Login:</h1>
			<div class="login-input"><label><?php echo lang('login.username'); ?>:</label> <input type="text" name="username" /></div>
			<div class="login-input"><label><?php echo lang('login.password'); ?>:</label> <input type="password" name="password" /></div>
			<div class="login-input"><label><?php echo lang('login.remember'); ?>:</label> <input type="checkbox" name="remember" /></div>
			<div class="login-input"><input type="submit" value="<?php echo lang('login.submit'); ?>" name="submit" /></div>
		</form>
		<?php echo anchor('registration', lang('login.register')); ?>
		</div>
<?php echo $footer; ?>