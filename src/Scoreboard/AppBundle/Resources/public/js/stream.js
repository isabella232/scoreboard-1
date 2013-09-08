$(function() {
	$('.button-score-add').click(function() {
		$.fancybox( $(this).attr('href'), {
			maxWidth	: 800,
			maxHeight	: 600,
			minWidth	: 300,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			type		: 'iframe'
		});
	});

   $( "#points-slider" ).slider({
      value:1,
      min: -3,
      max: 3,
      slide: function( event, ui ) {
      	$( "#points-label").html(ui.value);
        $( "#points" ).val(ui.value);
      }
    }).css('width', '175px');

    $( "#user" ).autocomplete({
		source: $('#user').data('href'),
		minLength: 3
    });

});

	// DEPRACTED
	// $('.button-sign-of-points').click(function() {
	// 	if($('#points-sign').val() == 1) {
	// 		$('#points-sign').val(-1);
	// 		$('.button-sign-of-points:first span:first, .button-sign-of-points:eq(1) span:first').hide();
	// 		$('.button-sign-of-points:first span:eq(1), .button-sign-of-points:eq(1) span:eq(1)').show();
	// 	} else {
	// 		$('#points-sign').val(1);
	// 		$('.button-sign-of-points:first span:first, .button-sign-of-points:eq(1) span:first').show();
	// 		$('.button-sign-of-points:first span:eq(1), .button-sign-of-points:eq(1) span:eq(1)').hide();
	// 	}
	// });

	// $('#input-points').blur(function(){
	// 	if( ! $.isNumeric($(this).val())) {
	// 		$(this).val('');
	// 		return;
	// 	}

	// 	if( $(this).val() > 3) {
	// 		$(this).val(3);
	// 	}

	// 	$(this).val(Math.abs($(this).val()));
	// });
