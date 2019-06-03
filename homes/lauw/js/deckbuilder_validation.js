$(document).ready(function () {

	$('#filter').prop('disabled', true);


	$('select[id="select_type1"').on('change', function () {

		if ($(this).val() == 0) {
			$(this).css('background-color', '');		
			select_type1 = false;
		}
		if($(this).val() <= 10 && $(this).val() >=1 ){
			$(this).css('background-color', '#66FF66');
			select_type1 = true;
		}

		validateForm_Deckbuilder();

	});

	$('select[id="select_deck"').on('change', function () {

		if ($(this).val() == 0) {					
			select_deck = false;
		}
		if($(this).val() >=1 ){			
			select_deck = true;
		}

		validateSelect_Deck();

	});

	$('.card_checkbox').change(function(){
		validateSelect_Deck();
	});

// 	$('#filter').click(function(){
		
// 		if($('input[id="subtype1"').val() == ''){
// 			$('input[id="subtype1"').css('background-color', '#ff0000');
// 		}
// 		if($('input[id="subtype1"').val() != ''){
// 			$('input[id="subtype1"').css('background-color', '#66FF66');
// 		}
// 	 });

});

