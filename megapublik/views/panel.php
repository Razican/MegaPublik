<time><?php echo lang('overal.day').': '.current_day().'<br>'.lang('overal.time').': '.date('H:i', now($user->timezone)); ?></time>
<figure class="avatar">
	<?php echo avatar($user->avatar, $user->username); ?>
</figure>
<div class="level"><?php echo lang('overal.level').': '.$user->level; ?></div>
<div class="experience"><meter max="<?php echo $exp['max']; ?>" min="<?php echo $exp['min']; ?>" value="<?php echo $user->experience; ?>"><span><?php echo $user->experience.'/'.$exp['max']; ?></span></meter></div>
<div class="money">MP: <?php echo number_format(isset($user->money['MP']) ? $user->money['MP'] : 0, 2, $l18n['decimal'], $l18n['thousand']); ?></div>
<div class="money"><?php echo $currency; ?>: <?php echo number_format(money($user->money, $currency), 2, $l18n['decimal'], $l18n['thousand']); ?></div>
<div id="wellness"><?php echo lang('overal.panel.wellness'); ?>: <meter min="0" max="100" high="100" low="50" optimum="100" value="<?php echo $user->wellness; ?>" ></meter></div>
<div id="happiness"><?php echo lang('overal.panel.happiness'); ?>: <meter min="0" max="100" high="100" low="50" optimum="100" value="<?php echo $user->happiness; ?>" ></meter></div>
<div id="productivity"><?php echo lang('overal.panel.productivity'); ?>: <meter min="0" max="100" high="100" low="50" optimum="100" value="<?php echo $user->productivity; ?>" ></meter></div>
