$(function(){
	$('#selector a').click(function(event){
		event.preventDefault();
		$('#market_content').html('');
		$('#market_content').html('<div class="loading"><?php echo img($img); ?></div>').load($(this).attr('href'));
	});
});