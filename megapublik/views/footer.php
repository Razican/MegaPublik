		<footer>
		<?php if(empty($email)) : ?><div class="online_users"><?php echo lang('overal.total_users').': '.$this->user->online(); ?></div><?php endif; ?>
			<div class="copyright">
				<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.<?php echo $this->lang->lang(); ?>"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png"></a><br>
				<span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/InteractiveResource" property="dct:title" rel="dct:type">MegaPublik</span> por <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.razican.com/" property="cc:attributionName" rel="cc:attributionURL">Razican</a> se encuentra bajo una <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.<?php echo $this->lang->lang(); ?>">Licencia Creative Commons Atribución-CompartirIgual 3.0 Unported</a>.<br>
				Basada en una obra en <a xmlns:dct="http://purl.org/dc/terms/" href="https://github.com/Razican/MegaPublik" rel="dct:source">GitHub</a>.
			</div>
		</footer>
	</body>
</html>
