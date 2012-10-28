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
	<script charset="UTF-8" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script type="text/javascript">
	<!--
		if(typeof jQuery==='undefined'){
			document.write(unescape('<scri'+'pt src="<?php echo site_url('js/jquery-1.8.2.min.js'); ?>" type="text/javascript"></scri'+'pt>'));
		}
	//-->
	</script>
	<?php echo $script; ?>
	<?php endif; ?>
</head>
<body>
<header>
	<a href="<?php echo base_url(); ?>"><figure class="logo"></figure></a>
	<nav class="language">
		<?php if($this->lang->lang() !== 'es')
			echo anchor($this->lang->switch_uri('es'),img(array('src' => 'images/countries/es.png', 'alt' => 'Español', 'title' => 'Español', 'height' => '15', 'width' => '20'))); ?>
		<?php if($this->lang->lang() !== 'en')
			echo anchor($this->lang->switch_uri('en'),img(array('src' => 'images/countries/gb.png', 'alt' => 'English', 'title' => 'English', 'height' => '15', 'width' => '20'))); ?>
		<?php if($this->lang->lang() !== 'eu')
			echo anchor($this->lang->switch_uri('eu'),img(array('src' => 'images/countries/eu.png', 'alt' => 'Euskara', 'title' => 'Euskara', 'height' => '15', 'width' => '20'))); ?>
	</nav>

	<nav class="lang-select">
		<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
			<option <?php if($this->lang->lang() === 'es') echo 'selected '; ?>value="<?php echo site_url($this->lang->switch_uri('es')); ?>">Español</option>
			<option <?php if($this->lang->lang() === 'en') echo 'selected '; ?>value="<?php echo site_url($this->lang->switch_uri('en')); ?>">English</option>
			<option <?php if($this->lang->lang() === 'eu') echo 'selected '; ?>value="<?php echo site_url($this->lang->switch_uri('eu')); ?>">Euskara</option>
		</select>
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