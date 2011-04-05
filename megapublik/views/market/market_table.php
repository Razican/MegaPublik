<script type="text/javascript" charset="utf-8">
<!--
	$(function(){
		$('#pagination a').click(function(event){
			event.preventDefault();
			$('#market_content').html('');
			$('#market_content').html('<div class="loading"><?php echo img($img); ?></div>').load($(this).attr('href'));
		});
	});

	$("form").submit(function() {
		$('[id^="result-"]').html('');
		id = $(this).attr('id');
		$('#result-'+id).html('<?php echo img($mini_img); ?>');
		$.post("<?php echo site_url('market/buy').'/'; ?>"+id, $(this).serialize(), function(data) {
			$('#result-'+id).html(data);
		});
		return false;
	});
//-->
</script>
<div class="market_table">
	<div class="market_row">
		<div class="market_cell" style="width: 40%;"><?php echo lang('market.company'); ?></div>
		<div class="market_cell"><?php echo lang('market.price'); ?></div>
		<div class="market_cell"><?php echo lang('market.amount'); ?></div>
		<div class="market_cell"><?php echo lang('market.buy'); ?></div>
	</div>
	<?php foreach ($content->result() as $content): ?>
		<div class="market_row">
			<div class="market_cell"><?php $company	= $user->data($content->company_id, 'companies');
						echo $company->name; ?></div>
			<div class="market_cell"><?php echo $content->price; ?></div>
			<div class="market_cell"><?php echo $content->amount; ?></div>
			<div class="market_cell"><?php echo form_open('market/buy/'.$content->id, array('id' => $content->id)).
												form_input(array('name' => 'amount', 'maxlenght' => '5', 'value' => '0', 'style' => 'width: 50px')).
												form_input(array('name' => 'submit', 'type' => 'submit', 'value' => lang('market.buy'), 'style' => 'width: 75px')).
												form_close();?>
			</div>
			<div class="market_cell" id="result-<?php echo $content->id; ?>"></div>
		</div>
	<?php endforeach;?>
</div>
<?php echo $pagination; ?>