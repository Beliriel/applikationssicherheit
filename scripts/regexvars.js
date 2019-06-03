
var emailpattern = "[a-zA-Z0-9]+@[a-zA-Z0-9]+\\.[a-zA-Z0-9]+";
var pw_lower_pattern = ".*[a-z]+.*";
var pw_upper_pattern = ".*[A-Z]+.*";
var pw_number_pattern = ".*[0-9]+.*"
var pw_special_pattern = ".*[\?\$\.\!&_-]+.*";
var pw_length_pattern = ".{8,}";


var l_emailpassed = false;
var l_passwordpassed = false;

var r_emailpassed = false;
var r_passwordpassed = false;
var r_pw_match = false;

function l_isEmail(){
	var benfield = document.getElementById("benutzernamefeld").value;
	if( benfield.match(emailpattern) )
	{
		l_emailpassed = true;
		$("#login_email_info").hide();
	} else {
		l_emailpassed = false;
		$("#login_email_info").show();
	}
	return l_emailpassed;
}

function r_isEmail(){
	var benfield = document.getElementById("benreg").value;
	if( benfield.match(emailpattern) )
	{
		r_emailpassed = true;
		$("#no_email").hide();
		$("#yes_email").show();
	} else {
		r_emailpassed = false;
		$("#no_email").show();
		$("#yes_email").hide();
	}
	return r_emailpassed;
}

function l_isValidPassword(){
	var pwf = document.getElementById("loginpwfeld").value;
	if( pwf.match(pw_length_pattern) )
	{
		l_passwordpassed = true;
		$("#login_pwd_info").hide();

	} else {
		l_passwordpassed = false;
		$("#login_pwd_info").show();
	}
	return l_passwordpassed;
}

function r_isValidPassword(){
	var pwf = document.getElementById("passwd_reg").value;
	if( pwf.match(pw_lower_pattern) && pwf.match(pw_upper_pattern)  && pwf.match(pw_length_pattern) && pwf.match(pw_number_pattern) && pwf.match(pw_special_pattern) )
	{
		r_passwordpassed = true;
		$(".vorgaben").hide();
		$("#stimmt").show();
		console.log("yassyyyyy")
	}else {
		r_passwordpassed = false;
		$(".vorgaben").show();
		$("#stimmt").hide();
	}
	return r_passwordpassed;
}

function displaypwdinfo(){
	$("#reg_pwdinfo").show();
}
function hidepwdinfo(){
	$("#reg_pwdinfo").hide();
}

function displayrepinfo(){
	$("#reg_pwd_rep_info").show();
}
function hiderepinfo(){
	$("#reg_pwd_rep_info").hide();
}

function displayemailinfo(){
	$("#reg_email_info").show();
}
function hideemailinfo(){
	$("#reg_email_info").hide();
}


function r_passwords_match(){
	var pwd_pattern = document.getElementById("passwd_reg").value;
	var pwd_rep_string = document.getElementById("passwd_reg_rep").value;

	if( pwd_rep_string === pwd_pattern ){
		r_pw_match = true;
		$("#pwd_no_correlation").hide();
		$("#pwd_yes_correlation").show();
	} else {
		r_pw_match = false;
		$("#pwd_no_correlation").show();
		$("#pwd_yes_correlation").hide();
	}

	return r_pw_match;
}

function check_and_activate(){
	l_isEmail();
	l_isValidPassword();

	if(l_passwordpassed && l_emailpassed){
		$("#loginbtn").prop('disabled',false);
	} else {
		$("#loginbtn").prop('disabled',true);
	}
}

function check_registration(){
	r_isEmail();
	r_isValidPassword();
	r_passwords_match();
	if(r_passwordpassed && r_emailpassed && r_pw_match){
		$("#reg_btn").prop('disabled',false);
	} else {
		$("#reg_btn").prop('disabled',true);
		console.log(r_passwordpassed, r_emailpassed, r_pw_match);
	}
}
