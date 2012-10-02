<?php	echo doctype('html5'); ?>
<html lang="<?php echo $this->lang->lang(); ?>">
<head>
	<title><?php echo lang('overal.title'); ?></title>
	<meta charset="UTF-8">

	<link rel="icon" href="<?php echo site_url("images/favicon.ico"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url("css/format.css"); ?>">
	<meta name="generator" content="MegaPublik <?php echo config_item('version'); ?>">
	<meta name="author" content="Razican">
	<meta name="application-name" content="MegaPublik">
	<meta name="description" content="<?php echo lang('overal.description'); ?>">
	<meta name="keywords" content="juego online, online game, estrategia, strategy, simulacion, simulation, megapublik, gratis, free, economia, economy, politica, politics, vida real, real life">
	<?php if (defined('AJAX')) : ?>
	<script charset="UTF-8" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
	<!--
		if(typeof jQuery==='undefined'){
			document.write(unescape('<scri'+'pt src="<?php echo base_url(); ?>javascript/jquery-1.8.2.min.js" type="text/javascript"></scri'+'pt>'));
		}
	//-->
	</script>
	<script type="text/javascript">
	<!--
		<?php echo $script; ?>
	//-->
	</script><?php endif; ?>
</head>
<body>
<header>
	<figure class="logo"><a href="<?php echo base_url(); ?>"><img alt="MegaPublik Logo" src="<?php echo site_url("images/logo.png"); ?>" height="130" width="340"></a></figure>
	<nav class="language">
		<?php if($this->lang->lang() != 'es')
			echo anchor($this->lang->switch_uri('es'),img(array('src' => 'images/countries/es.png', 'alt' => 'Español', 'title' => 'Español', 'height' => '15', 'width' => '20'))); ?>
		<?php if($this->lang->lang() != 'en')
			echo anchor($this->lang->switch_uri('en'),img(array('src' => 'images/countries/gb.png', 'alt' => 'English', 'title' => 'English', 'height' => '15', 'width' => '20'))); ?>
		<?php if($this->lang->lang() != 'eu')
			echo anchor($this->lang->switch_uri('eu'),img(array('src' => 'images/countries/eu.png', 'alt' => 'Euskara', 'title' => 'Euskara', 'height' => '15', 'width' => '20'))); ?>
	</nav>
	<?php if (defined('INGAME')) : ?><section class="help">
		<?php echo $help; ?>
	</section><?php endif; ?>
	<?php if(empty($email)) : ?><nav class="menu">
		<?php echo $menu; ?>
	</nav><?php endif; ?>
	<?php if (defined('INGAME')) : ?><section class="panel">
		<?php echo $panel; ?>
	</section><?php endif; ?>
</header>
