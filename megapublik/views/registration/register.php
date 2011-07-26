<?php echo $head; ?>
	<div class="outgame-content">
		<?php echo form_open('registration/register'); ?>
			<div class="reg-container"><div class="reg-input"><label><?php echo lang('reg.username'); ?></label>: <input id="username" type="text" name="username" /></div><div id="user_result" class="result"></div><div id="user_notes" class="notes"></div></div>
			<div class="reg-container"><div class="reg-input"><label><?php echo lang('reg.password'); ?></label>: <input id="password" type="password" name="password" /></div><div id="pass_result" class="result"></div></div>
			<div class="reg-container"><div class="reg-input"><div id="pass_strenght"><?php echo lang('reg.strenght'); ?>:<div class="percent_box"><div id="percent" style="width: 0%" class="box_percent"></div></div></div></div></div>
			<div class="reg-container"><div class="reg-input"><label><?php echo lang('reg.passconf'); ?></label>: <input id="pass_conf" type="password" name="passconf" /></div><div id="passconf_result" class="result"></div></div>
			<div class="reg-container"><div class="reg-input"><label><?php echo lang('reg.email'); ?></label>: <input id="email" type="text" name="email" /></div><div id="email_result" class="result"></div><div id="email_notes" class="notes"></div></div>
			<div class="reg-container"><div class="reg-input"><label><?php echo lang('reg.country'); ?></label>: <select id="country" name="country">
				<option value=""><?php echo lang('reg.select_country'); ?></option>
				<?php echo $countries; ?>
			</select></div></div>
			<div class="reg-container"><div class="reg-input"><label><?php echo lang('reg.state'); ?></label>: <div id="state_selector"><select id="state" name="state">
				<option value=""><?php echo lang('reg.select_state'); ?></option>
				</select></div></div></div>
			<div class="reg-container"><div class="reg-input"><input id="submit" type="submit" value="<?php echo lang('reg.submit'); ?>" name="submit" /></div></div>
		</form>
	</div>
<?php echo $footer; ?>
