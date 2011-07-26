<?php echo $head; ?>
	<div class="content">
	Wellcome <?php echo $user->username; ?>!<?php echo br(); ?>
		Data:<?php echo br(3); ?>
		Location: <?php echo $user->country; ?><?php echo br(); ?>
		Time: <?php echo date('d/m/Y - H:i:s', $user->time()); ?><?php echo br(2); ?>
		Money changed?<br />
		<?php foreach($user->money as $currency => $money){ echo $currency.': '.$money.br(); } ?>
	</div>
<?php echo $footer; ?>
