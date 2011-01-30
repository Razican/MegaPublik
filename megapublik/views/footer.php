		<div class="footer">
	<?php if(empty($email)) : ?><div class="online_users"><?php echo lang('overal.total_users').': '.$this->user->online(); ?></div><?php endif; ?>
			<div class="copyright">
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.<?php echo $this->lang->lang(); ?>"><img alt="<?php echo lang('overal.license_alt'); ?>" src="<?php echo site_url("images/license.png"); ?>" /></a><br />
				<span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">MegaPublik</span>, <?php echo lang('overal.by'); ?> <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.megapublik.com/" property="cc:attributionName" rel="cc:attributionURL">MegaPublik Developer Team</a><?php echo lang('overal.by_eu'); ?> <?php echo lang('overal.licensed'); ?> <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.<?php echo $this->lang->lang(); ?>"><?php echo lang('overal.license'); ?></a>.<br />
			</div>
		</div>
	</body>
</html>