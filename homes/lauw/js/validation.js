//Email Validierungs-Skript
$('input[name="email"').on('input' , function() {
	var mailPattern = /^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,}$/;
	if (mailPattern.test($(this).val())) {
		$(this).css('border', 'solid 6px #66FF66')
	} else {
		$(this).css('border', 'solid 6px #FF6666');	
	}
});

$('input[type="submit"]').click(function() {
	if(checkMail()) {
		$('form').submit();
	} else {
		alert("Geben Sie eine gültige Emailadresse an!");
		$('form').submit(function(e){
	        e.preventDefault();
	    });
	}
});

function checkMail() {
	var mailPattern = /^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,}$/;
	return mailPattern.test($('input[name="email"]').val());
}