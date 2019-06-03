var firstname = false;
var surname = false;
var username = false;
var email_registration = false;
var password_registration = false;
var password_conformation_registration = false;
var checkbox = false;


var select_type1 = false;
var select_type2 = false;
var subtype1 = false;
var subtype2 = false;

var select_deck = false;
var select_card = false;


function validateForm_Registration() {

    var allRequired = true;


    if (!firstname || !surname || !username || !email_registration || !password_registration || !password_conformation_registration || (document.getElementById('cb').checked == false)) {
        allRequired = false;

    }

    if (firstname == true && surname == true && username == true && email_registration == true && password_registration == true && password_conformation_registration == true && document.getElementById('cb').checked == true) {
        allRequired = true;
    }

    if(username == true){
        $('#check_username_button').prop('disabled', false);
    }


    if (allRequired == true) {
        $('#register_button').prop('disabled', false);
    }
    else {
        $('#register_button').prop('disabled', true);
    }

};

function checkPassword() {
    var passPattern = /^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
    return passPattern.test($('input[id="password_registration"]').val());
}

function checkMail() {
    var mailPattern = /^(\w+|\w+[\.\-]\w+)@(\w+|\w+[\.\-]\w+)\.\w{2,}$/;
    return mailPattern.test($('input[type="email"]').val());
}

function checkUsername() {
    var namePattern = /^[a-zA-Z0-9_äöüÄÖÜ]{2,50}$/;
    return namePattern.test($('input[id="username"]').val());
}

function checkSurname() {
    var namePattern = /^[A-Z]+[a-zA-ZäöüÄÖÜ]{2,50}$/;
    return namePattern.test($('input[id="surname"]').val());
}

function checkFirstname() {
    var namePattern = /^[A-Z]+[a-zA-ZäöüÄÖÜ]{2,50}$/;
    return namePattern.test($('input[id="firstname"]').val());
}

function validateForm_Deckbuilder() {

    var allRequired = true;

    if (!select_type1 || !select_type2 || !subtype1 || !subtype2 ) {
        allRequired = false;
    }

    if (select_type1 == true) {
        allRequired = true;
    }


    if (allRequired == true) {
        $('#filter').prop('disabled', false);
    }
    else {
        //$('#filter').prop('disabled', true);
    }
    $('#filter').prop('disabled', false); //SORRY WINNIE HA MÖSSE BASTLE
};

function validateSelect_Deck() {

    var allRequired = true;

    if (!select_deck || (document.getElementById('karte').checked == false)) {
        $('#add_cards').prop('disabled', true);
    }

    if (select_deck == true && (document.getElementById('karte').checked == true)) {
        $('#add_cards').prop('disabled', false);
    }

};
