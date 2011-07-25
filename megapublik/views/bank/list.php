<div class="table">
	<div class="row">
		<div class="cell" style="min-width: 30%;"><?php echo lang('market.company'); ?></div>
		<div class="cell" style="min-width: 20%;"><?php echo lang('market.price'); ?></div>
		<div class="cell" style="min-width: 20%;"><?php echo lang('market.amount'); ?></div>
		<div class="cell"><?php echo lang('market.buy'); ?></div>
	</div>
	<?php foreach ($bank_list as $id => $data): ?>
		<div class="row">
			<div class="cell"><?php echo anchor('bank/show/'.$id, avatar($data['avatar'], $data['name'])); ?></div>
			<div class="cell"><?php echo anchor('bank/show/'.$id, $data['name']); ?></div>
			<div class="cell"><?php echo percent(number_format($data['cred_int'], 2, $l18n->decimal, $l18n->thousand), $l18n->percent, $l18n->percent_spc); ?></div>
			<div class="cell"><?php echo percent(number_format($data['inv_int'], 2, $l18n->decimal, $l18n->thousand), $l18n->percent, $l18n->percent_spc); ?></div>
			<div class="cell"><?php echo number_format($data['clients'], 0, $l18n->decimal, $l18n->thousand); ?></div>
		</div>
	<?php endforeach;?>
</div>
<?php echo $pagination; ?>
