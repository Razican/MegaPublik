<script type="text/javascript" charset="utf-8">
<!--
	$(function(){
		$('#pagination a').click(function(event){
			event.preventDefault();
			$('#market_content').html('');
			$('#market_content').html('<div class="loading"><?php echo img($img); ?></div>').load($(this).attr('href'));
		});
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
			<div class="market_cell"><?php echo form_open('market/buy/'.$content->id);?></form>
			</div>
		</div>
	<?php endforeach;?>
</div>
<?php echo $pagination; ?>