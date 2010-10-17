<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->lang->lang(); ?>">
<head>
	<title><?php echo lang('overal.title'); ?></title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<meta name="robots" content="noindex,nofollow,noarchive,noodp,nosnippet,noydir" /> 
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo site_url("css/format.css"); ?>" />
	<!-- <link rel="stylesheet" media="handheld" type="text/css" href="css/format_movile.css" />
	<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script>
	<link href="http://www.megapublik.com/" title="<?php echo lang('overal.title'); ?>" rel="index" /> -->
	<meta name="description" content="<?php echo lang('overal.description'); ?>" />
	<meta name="keywords" content="juego online, online game, estrategia, strategy, simulacion, simulation, megapublik, gratis, free, economia, economy, politica, politics, vida real, real life" />
	<!-- <link rel="canonical" href="http://www.megapublik.com/" /> -->
</head>
<body>
<div class="head">
	<div class="logo"><img alt="MegaPublik Logo" src="images/logo.png" /></div>
	<?php if (defined('INGAME')) : ?><div class="help"><?php echo $help; ?></div><?php endif; ?>
	<div class="menu"></div>
</div>