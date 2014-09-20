jQuery(document).ready(function($){
	$('.js-infobox-vote-topic').poshytip('destroy');
	$('.js-infobox-vote-topic').poshytip({
		content: function() {
			var id = $(this).attr('id').replace('vote_area_topic_','showvote-info-topic-');
			return $('#'+id).html();
		},
		className: 'infobox-topic',
		alignTo: 'target',
		alignX: 'center',
		alignY: 'top',
		offsetX: 2,
		offsetY: 5,
		liveEvents: true,
		showTimeout: 100
	});
});