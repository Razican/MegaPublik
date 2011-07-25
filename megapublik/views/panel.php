<div id="date"><?php echo lang('overal.day').': '.floor((time()-mktime(0, 0, 0, 11, 10, 2009))/86400).'<br />'.lang('overal.time').': '.date('H:i', $user->time()); ?></div>
<div id="avatar">
	<?php
		if ($user->avatar === 'default')
			echo lang('overal.no_avatar');
		echo avatar($user->avatar, $user->username);
	?>
</div>
<div id="level"><?php echo $user->level; ?></div>
<div id="experience"><div class="percent_box"><div class="box_percent"  style="width: <?php echo $exp_prcnt; ?>%;"></div></div></div>
<div class="money">MP: <?php echo number_format(isset($user->money['MP']) ? $user->money['MP'] : 0, 2, $l18n->decimal, $l18n->thousand); ?></div>
<div class="money"><?php echo $currency; ?>: <?php echo number_format(money($user->money, $currency), 2, $l18n->decimal, $l18n->thousand); ?></div>
<div id="wellness"><?php echo lang('overal.panel.wellness'); ?>: <div class="percent_box"><div class="box_percent"  style="background: <?php echo color($user->wellness); ?>; width: <?php echo $user->wellness; ?>%;"><?php echo $user->wellness; ?>%</div></div></div>
<div id="happiness"><?php echo lang('overal.panel.happiness'); ?>: <div class="percent_box"><div class="box_percent"  style="background: <?php echo color($user->happiness); ?>; width: <?php echo $user->happiness; ?>%;"><?php echo $user->happiness; ?>%</div></div></div>
<div id="productivity"><?php echo lang('overal.panel.productivity'); ?>: <div class="percent_box"><div class="box_percent"  style="background: <?php echo color($user->productivity); ?>; width: <?php echo $user->productivity; ?>%;"><?php echo $user->productivity; ?>%</div></div></div>
