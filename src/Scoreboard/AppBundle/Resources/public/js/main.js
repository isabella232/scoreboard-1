$(function() {
	$('a').mouseover(function()  {
		$($(this).attr('class').split(' ')).each(function() {
			var cl = this.split('group-');
			if(cl[1]) {
				$('.group-' + cl[1]).addClass('hover');
			}
		});
	});
	$('a').mouseout(function()  {
		$($(this).attr('class').split(' ')).each(function() {
			var cl = this.split('group-');
			if(cl[1]) {
				$('.group-' + cl[1]).removeClass('hover');
			}
		});
	});

	$('.widget-score').mouseover(function(){
		$(this).addClass('well');
		$(this).addClass('well-sm');
	}).mouseout(function() {
		$(this).removeClass('well');
		$(this).removeClass('well-sm');
	});
});