<?php echo $head; ?>
	<div class="log_reg">
		<?php echo form_open('registration/register'); ?>
	<?php echo lang('reg.username'); ?>: <input id="username" type="text" name="username" /><div id="user_result" class="result"></div><?php echo br(2); ?>
			<?php echo lang('reg.password'); ?>: <input id="password" type="password" name="password" /><div id="pass_result" class="result"></div><?php echo br(2); ?>
			<?php echo lang('reg.passconf'); ?>: <input id="pass_conf" type="password" name="passconf" /><div id="passconf_result" class="result"></div><?php echo br(2); ?>
			<?php echo lang('reg.email'); ?>: <input id="email" type="text" name="email" /><div id="email_result" class="result"></div><?php echo br(2); ?>
			<?php echo lang('reg.country'); ?>: <select name="country">
					<?php echo $countries; ?>
			</select><?php echo br(2); ?>
			<input id="submit" type="submit" value="<?php echo lang('reg.submit'); ?>" name="submit" />
		</form>
	</div>
<?php echo $footer; ?>