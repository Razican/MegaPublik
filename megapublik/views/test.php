<?php echo $head; ?>
	<div class="content">
	Wellcome <?php echo $user->username; ?>!<?php echo br(); ?>
		Data:<?php echo br(3); ?>
		Location: <?php echo $user->country; ?><?php echo br(); ?>
		Time: <?php echo date('d/m/Y - H:i:s', $user->time()); ?>
	</div>
<?php echo $footer; ?>