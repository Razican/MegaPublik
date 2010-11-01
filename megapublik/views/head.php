<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->lang->lang(); ?>">
<head>
	<title><?php echo lang('overal.title'); ?></title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<meta name="robots" content="noindex,nofollow,noarchive,noodp,nosnippet,noydir" /> 
	<link rel="shortcut icon" href="<?php echo site_url("images/favicon.ico"); ?>" />
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo site_url("css/format.css"); ?>" />
	<!-- <link rel="stylesheet" media="handheld" type="text/css" href="css/format_movile.css" />
	<link href="http://www.megapublik.com/" title="<?php echo lang('overal.title'); ?>" rel="index" /> -->
	<meta name="description" content="<?php echo lang('overal.description'); ?>" />
	<meta name="keywords" content="juego online, online game, estrategia, strategy, simulacion, simulation, megapublik, gratis, free, economia, economy, politica, politics, vida real, real life" />
	<!-- <link rel="canonical" href="http://www.megapublik.com/" /> -->
	<?php if (defined('AJAX')) : ?>
	<script charset="utf-8" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<?php echo $script; ?>
	<?php endif; ?>
</head>
<body>
<div class="head">
	<div class="logo"><a href="<?php echo base_url(); ?>"><img alt="MegaPublik Logo" src="<?php echo site_url("images/logo.png"); ?>" /></a></div>
	<?php if (defined('INGAME')) : ?><div class="help"><?php echo $help; ?></div><?php endif; ?>
	<div class="menu"><?php //echo $menu; ?></div>
	<?php if (defined('INGAME')) : ?><div class="panel"><?php //echo $panel; ?></div><?php endif; ?>
</div>