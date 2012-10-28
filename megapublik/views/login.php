<?php echo $head; ?>
	<section class="outgame input">
		<?php echo form_open('login'); ?>
			<h2>Login:</h2>
			<div class="field">
				<label for="username"><?php echo lang('login.username'); ?></label>:
				<input type="text" name="username" id="username">
			</div>
			<div class="field">
				<label for="password"><?php echo lang('login.password'); ?></label>:
				<input type="password" name="password" id="password">
			</div>
			<div class="field">
				<label for="remember"><?php echo lang('login.remember'); ?></label>:
				<input type="checkbox" name="remember" id="remember">
			</div>
			<div class="field"><input type="submit" value="<?php echo lang('login.submit'); ?>" name="submit"></div>
		</form>
	</section>
<?php echo $footer; ?>