<div class="market_table">
	<div class="market_row">
		<div class="market_cell" style="min-width: 30%;"><?php echo lang('market.company'); ?></div>
		<div class="market_cell" style="min-width: 20%;"><?php echo lang('market.price'); ?></div>
		<div class="market_cell" style="min-width: 20%;"><?php echo lang('market.amount'); ?></div>
		<div class="market_cell"><?php echo lang('market.buy'); ?></div>
	</div>
	<?php foreach ($bank_list as $id => $data): ?>
		<div class="bank_row">
			<div class="bank_cell"><?php echo anchor('bank/'.$id, avatar($data['avatar'], $data['name'])); ?></div>
			<div class="bank_cell"><?php echo anchor('bank/'.$id, $data['name']); ?></div>
			<div class="bank_cell"><?php echo number_format($data['cred_int'], 2, $l18n->decimal, $l18n->thousand); ?></div>
			<div class="bank_cell"><?php echo number_format($data['inv_int'], 2, $l18n->decimal, $l18n->thousand); ?></div>
			<div class="bank_cell"><?php echo number_format($data['clients'], 0, $l18n->decimal, $l18n->thousand); ?></div>
		</div>
	<?php endforeach;?>
</div>
<?php echo $pagination; ?>
