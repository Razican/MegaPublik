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
<table class="market_table" >
	<tbody>
	<tr>
		<td><?php echo lang('market.company'); ?></td>
		<td><?php echo lang('market.price'); ?></td>
		<td><?php echo lang('market.amount'); ?></td>
		<td><?php echo lang('market.buy'); ?></td>
	</tr>
	<?php foreach ($content->result() as $content): ?>
		<tr>
			<td><?php $company	= $user->data($content->company_id, 'companies');
						echo $company->name; ?></td>
			<td><?php echo $content->price; ?></td>
			<td><?php echo $content->amount; ?></td>
			<td><?php echo lang('market.buy'); ?></td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
<?php echo $pagination; ?>