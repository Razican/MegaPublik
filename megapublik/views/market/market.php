<?php echo $head; ?>
	<div class="content">
		<div id="selector">
			<?php if($is_society): ?>
				<a href="<?php echo site_url('market/request/3'); ?>"><?php echo lang('market.iron'); ?></a> | 
				<a href="<?php echo site_url('market/request/4'); ?>"><?php echo lang('market.wood'); ?></a> | 
				<a href="<?php echo site_url('market/request/5'); ?>"><?php echo lang('market.stone'); ?></a> | 
				<a href="<?php echo site_url('market/request/7'); ?>"><?php echo lang('market.oil'); ?></a> | 
				<a href="<?php echo site_url('market/request/10'); ?>"><?php echo lang('market.plane'); ?></a> | 
			<?php endif; ?>
			<a href="<?php echo site_url('market/request/1'); ?>"><?php echo lang('market.food'); ?></a> | 
			<a href="<?php echo site_url('market/request/2'); ?>"><?php echo lang('market.weapon'); ?></a> | 
			<a href="<?php echo site_url('market/request/6'); ?>"><?php echo lang('market.house'); ?></a> | 
			<a href="<?php echo site_url('market/request/8'); ?>"><?php echo lang('market.petrol'); ?></a> | 
			<a href="<?php echo site_url('market/request/9'); ?>"><?php echo lang('market.car'); ?></a> | 
			<a href="<?php echo site_url('market/request/11'); ?>"><?php echo lang('market.ticket'); ?></a> | 
			<a href="<?php echo site_url('market/request/12'); ?>"><?php echo lang('market.appliance'); ?></a> | 
			<a href="<?php echo site_url('market/request/13'); ?>"><?php echo lang('market.boat'); ?></a>
		</div>
		<div id="market_content">
		</div>
	</div>
<?php echo $footer; ?>