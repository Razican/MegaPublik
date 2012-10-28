<?php echo $head; ?>
	<div class="outgame input">
		<div id="test"></div>
		<?php echo form_open('register/signup'); ?>
			<div class="field">
				<label for="username"><?php echo lang('reg.username'); ?></label>:
				<input id="username" type="text" name="username">
			</div>
			<div class="field">
				<label for="password"><?php echo lang('reg.password'); ?></label>:
				<input id="password" type="password" name="password">
			</div>
			<div class="field">
				<label for="passconf"><?php echo lang('reg.passconf'); ?></label>:
				<input id="passconf" type="password" name="passconf">
			</div>
			<div class="field">
				<label for="email"><?php echo lang('reg.email'); ?></label>:
				<input id="email" type="email" name="email">
			</div>
			<div class="field">
				<label for="country"><?php echo lang('reg.country'); ?></label>:
				<select id="country" name="country">
					<option value=""><?php echo lang('reg.select_country'); ?></option>
					<?php echo $countries; ?>
				</select>
			</div>
			<div class="field">
				<label for="state"><?php echo lang('reg.state'); ?></label>:
				<select id="state" name="state" disabled>
					<option value=""><?php echo lang('reg.select_state'); ?></option>
				</select>
			</div>
			<div class="field"><input id="submit" type="submit" value="<?php echo lang('reg.submit'); ?>" name="submit" disabled></div>
		</form>
	</div>
<?php echo $footer; ?>