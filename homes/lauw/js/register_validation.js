


//Firstname Validierungs-Skript
$('input[id="firstname"').on('input', function () {
	var namePattern = /^[A-Z]+[a-zA-ZäöüÄÖÜ]{2,50}$/;
	if (namePattern.test($(this).val())) {
		$(this).css('background-color', '#66FF66')
		firstname = true;

	} else {
		$(this).css('background-color', '#fbe5ee');
		$(this).css('color', '#000');
		firstname = false;
	}
});



//Surname Validierungs-Skript
$('input[id="surname"').on('input', function () {
	var namePattern = /^[A-Z]+[a-zA-ZäöüÄÖÜ]{2,50}$/;
	if (namePattern.test($(this).val())) {
		$(this).css('background-color', '#66FF66') //grün
		surname = true;
	} else {
		$(this).css('background-color', '#fbe5ee'); //rot
		$(this).css('color', '#000');		    //schwarz
		surname = false;
	}
});



//Username Validierungs-Skript
$('input[id="username"').on('input', function () {
	var namePattern = /^[a-zA-Z0-9_äöüÄÖÜ]{2,50}$/;
	if (namePattern.test($(this).val())) {
		$(this).css('background-color', '#66FF66')
		username = true;
	} else {
		$(this).css('background-color', '#fbe5ee');
		$(this).css('color', '#000');
		username = false;
	}
});



//Email Validierungs-Skript
$('input[type="email"').on('input', function () {
	var mailPattern = /^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,3}$/;
	if (mailPattern.test($(this).val())) {
		$(this).css('background-color', '#66FF66')
		email_registration = true;
	} else {
		$(this).css('background-color', '#fbe5ee');
		$(this).css('color', '#000');
		email_registration = false;
	}
});



//Passwort Validierungs-Skript
$('input[id="password_registration"').on('input', function () {
	var passPattern = /^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
	if (passPattern.test($(this).val())) {
		$(this).css('background-color', '#66FF66')
		password_registration = true;
	} else {
		$(this).css('background-color', '#fbe5ee');
		$(this).css('color', '#000');
		password_registration = false;
	}
});



//Passwort Vergleichungs-Skript
$('#password_registration, #password_conformation_registration').on('keyup', function () {
	if ($('#password_registration').val() == $('#password_conformation_registration').val() && $('#password_conformation_registration').val() != "") {
		$('#password_conformation_registration').css('background-color', '#66FF66')
		password_conformation_registration = true;
	} else {
		$('#password_conformation_registration').css('background-color', '#fbe5ee');
		$('#password_conformation_registration').css('color', '#000');
		password_conformation_registration = false;
	}
});



$(document).ready(function () {

	$('#register_button').prop('disabled', true);
	$('#check_username_button').prop('disabled', true);	
	
	$('input').on('keyup', function () {
		
		validateForm_Registration();
	});


});

