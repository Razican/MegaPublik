<?php echo $head; ?>
	<div class="content">
	<?php echo lang('ingame.wellcome').' '.$user->username; ?><?php echo br(); ?>
		<?php echo lang('ingame.data'); ?>:<?php echo br(3); ?>
		<?php echo lang('ingame.location'); ?>: <?php echo $country->name; ?><?php echo br(); ?>
	</div>
<?php echo $footer; ?>