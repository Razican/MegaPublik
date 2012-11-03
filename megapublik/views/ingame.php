<?php echo $head; ?>
	<section class="content">
	<?php echo lang('ingame.wellcome').' '.$user->name; ?>!<?php echo br(); ?>
		<?php echo lang('ingame.data'); ?>:<?php echo br(3); ?>
		<?php echo lang('ingame.location'); ?> <?php echo $user->state['name'].', '.$user->country_name; ?><?php echo br(); ?>
	</section>
<?php echo $footer; ?>