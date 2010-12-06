<?php echo $head; ?>
	<div class="log_reg">
		<?php echo form_open('registration/register'); ?>
	<?php echo lang('reg.username'); ?>: <input id="username" type="text" name="username" /><div id="user_result" class="result"></div><div id="user_notes"></div><?php echo br(2); ?>
	<?php echo lang('reg.password'); ?>: <input id="password" type="password" name="password" /><div id="pass_result" class="result"></div><div id="pass_strenght"><?php echo lang('reg.strenght'); ?>:<div class="percent_box"><div id="percent" style="width: 0%" class="box_percent"></div></div></div><?php echo br(2); ?>
			<?php echo lang('reg.passconf'); ?>: <input id="pass_conf" type="password" name="passconf" /><div id="passconf_result" class="result"></div><?php echo br(2); ?>
			<?php echo lang('reg.email'); ?>: <input id="email" type="text" name="email" /><div id="email_result" class="result"></div><div id="email_notes"></div><?php echo br(2); ?>
			<?php echo lang('reg.country'); ?>: <select id="country" name="country">
				<option value=""><?php echo lang('reg.select_country'); ?></option>
				<?php echo $countries; ?>
			</select><?php echo br(2); ?>
			<?php echo lang('reg.state'); ?>: <div id="state_selector"><select id="state" name="state">
				<option value=""><?php echo lang('reg.select_state'); ?></option>
				</select></div><?php echo br(2); ?>
			<input id="submit" type="submit" value="<?php echo lang('reg.submit'); ?>" name="submit" />
		</form>
	</div>
<?php echo $footer; ?>