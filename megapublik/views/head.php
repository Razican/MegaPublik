<?php	header ('Content-type: application/xhtml+xml; charset=utf-8');
		echo doctype('xhtml+RDFa11'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->lang->lang(); ?>">
<head>
	<title><?php echo lang('overal.title'); ?></title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<link rel="shortcut icon" href="<?php echo site_url("images/favicon.ico"); ?>" />
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo site_url("css/format.css"); ?>" />
	<!-- <link rel="stylesheet" media="handheld" type="text/css" href="css/format_movile.css" />
	<link href="http://www.megapublik.com/" title="<?php echo lang('overal.title'); ?>" rel="index" /> -->
	<meta name="description" content="<?php echo lang('overal.description'); ?>" />
	<meta name="keywords" content="juego online, online game, estrategia, strategy, simulacion, simulation, megapublik, gratis, free, economia, economy, politica, politics, vida real, real life" />
	<!-- <link rel="canonical" href="<?php echo base_url(); ?>" /> -->
	<?php if (defined('AJAX')) : ?>
	<script charset="utf-8" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8">
	<!--
		if(typeof jQuery==='undefined'){
			document.write(unescape('<scri'+'pt src="<?php echo base_url(); ?>javascript/jquery-1.6.4.min.js" type="text/javascript" charset="utf-8"></scri'+'pt>'));
		}
	//-->
	</script>
	<script type="text/javascript" charset="utf-8">
	<!--
		<?php echo $script; ?>
	//-->
	</script><?php endif; ?>
</head>
<body>
<div class="head">
	<div class="logo"><a href="<?php echo base_url(); ?>"><img alt="MegaPublik Logo" src="<?php echo site_url("images/logo.png"); ?>" /></a></div>
	<div id="lang_bar">
		<?php if($this->lang->lang() != 'es')
			echo anchor($this->lang->switch_uri('es'),img(array('src' => 'images/countries/es.png', 'alt' => 'Español', 'title' => 'Español'))); ?>
		<?php if($this->lang->lang() != 'en')
			echo anchor($this->lang->switch_uri('en'),img(array('src' => 'images/countries/gb.png', 'alt' => 'English', 'title' => 'English'))); ?>
		<?php if($this->lang->lang() != 'eu')
			echo anchor($this->lang->switch_uri('eu'),img(array('src' => 'images/countries/eu.png', 'alt' => 'Euskara', 'title' => 'Euskara'))); ?>
	</div>
	<?php if (defined('INGAME')) : ?><div class="help">
		<?php echo $help; ?>
	</div><?php endif; ?>
	<?php if(empty($email)) : ?><div class="menu">
		<?php echo $menu; ?>
	</div><?php endif; ?>
		<?php if (defined('INGAME')) : ?><div class="panel">
			<?php echo $panel; ?>
		</div><?php endif; ?>
</div>
