$(function() {
	$('.button-sign-of-points').click(function() {
		if($('#points-sign').val() == 1) {
			$('#points-sign').val(-1);
			$('.button-sign-of-points:first span:first, .button-sign-of-points:eq(1) span:first').hide();
			$('.button-sign-of-points:first span:eq(1), .button-sign-of-points:eq(1) span:eq(1)').show();
		} else {
			$('#points-sign').val(1);
			$('.button-sign-of-points:first span:first, .button-sign-of-points:eq(1) span:first').show();
			$('.button-sign-of-points:first span:eq(1), .button-sign-of-points:eq(1) span:eq(1)').hide();
		}
	});

	$('#input-points').blur(function(){
		if( ! $.isNumeric($(this).val())) {
			$(this).val('');
			return;
		}

		if( $(this).val() > 3) {
			$(this).val(3);
		}

		$(this).val(Math.abs($(this).val()));
	});

});