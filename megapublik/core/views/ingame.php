<html>
	<head>
		<title>MegaPublik</title>
	</head>
	<body>
	<?php echo lang('ingame.wellcome'); ?> MegaPublik!<?php echo br(); ?>
	<?php echo lang('ingame.data'); ?>:<?php echo br(3); ?>
	<?php echo lang('ingame.username'); ?>: <?php echo $user->username; ?><?php echo br(); ?>
	<?php echo lang('ingame.location'); ?>: <?php echo $country->name; ?><?php echo br(); ?>
	<?php echo lang('ingame.money'); ?>: <?php echo $user->money_MP; ?><?php echo br(); ?>
	<?php echo lang('ingame.currency'); ?>: <?php echo $country->currency; ?><?php echo br(); ?>
	</body>
</html>