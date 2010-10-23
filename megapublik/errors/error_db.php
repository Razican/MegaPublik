<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Database Error</title>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<meta name="robots" content="noindex,nofollow,noarchive,noodp,nosnippet,noydir" /> 
<link rel="shortcut icon" href="<?php echo site_url("images/favicon.ico"); ?>" />
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo site_url("css/format.css"); ?>" />
<!-- <link rel="stylesheet" media="handheld" type="text/css" href="css/format_movile.css" />
<link href="http://www.megapublik.com/" title="<?php echo lang('overal.title'); ?>" rel="index" /> -->
<meta name="description" content="<?php echo lang('overal.description'); ?>" />
<meta name="keywords" content="juego online, online game, estrategia, strategy, simulacion, simulation, megapublik, gratis, free, economia, economy, politica, politics, vida real, real life" />
<!-- <link rel="canonical" href="http://www.megapublik.com/" /> -->
<style type="text/css">

body {
background-color:	#fff;
margin:				40px;
font-family:		Lucida Grande, Verdana, Sans-serif;
font-size:			12px;
color:				#000;
}

#content  {
border:				#999 1px solid;
background-color:	#fff;
padding:			20px 20px 12px 20px;
}

h1 {
font-weight:		normal;
font-size:			14px;
color:				#990000;
margin: 			0 0 4px 0;
}
</style>
</head>
<body>
	<div id="content">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
	<div class="footer">
		<div class="copyright">
			<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/"><img alt="<?php echo lang('overal.license_alt'); ?>" src="<?php echo site_url("images/license.png"); ?>" /></a><br />
			<span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">MegaPublik</span> <?php echo lang('overal.by'); ?> <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.megapublik.com/" property="cc:attributionName" rel="cc:attributionURL">MegaPublik Developer Team</a> <?php echo lang('overal.licensed'); ?> <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/"><?php echo lang('overal.license'); ?></a>.<br />
		</div>
	</div>
</body>
</html>