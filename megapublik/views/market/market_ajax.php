$(function(){
	$('#selector a').click(function(event){
		event.preventDefault();
		$('#market_content').remove();
		$('#market_content_p').html('<div id="market_content"></div>');
		$('#market_content').html('<div class="loading"><img src="<?php echo base_url(); ?>images/loading.gif" alt="<?php echo lang('market.loading'); ?>" /></div>').load($(this).attr('href'));
	})
})