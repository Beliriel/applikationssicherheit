/*$(document).ready(
    function(){
        $("#reg_activate_btn").onclick(
            function(){
                $("#Registrierung").style.display = "block";
            }
        );
    }
);*/
var loginVisible = true;

function changereg(){
    loginVisible = !loginVisible;
    switchlogin();
}

function switchlogin(){
    if(loginVisible){
        document.getElementById("Anmeldung").style.display = "block";
        document.getElementById("Registrierung").style.display = "none";
    }

    if(!loginVisible){
        document.getElementById("Registrierung").style.display = "block";
        document.getElementById("Anmeldung").style.display = "none";

    }
    check_registration();
}

function showbigpicture(idnumber){
     var smallid = "blog_image_small_";
     var bigid = "blog_image_big_";
     var small = smallid.concat(idnumber);
     var big = bigid.concat(idnumber);
     document.getElementById(small).style.display = "none";
     document.getElementById(big).style.display = "block";
}

function showsmallpicture(idnumber){
     var smallid = "blog_image_small_";
     var bigid = "blog_image_big_";
     var small = smallid.concat(idnumber);
     var big = bigid.concat(idnumber);
     document.getElementById(small).style.display = "block";
     document.getElementById(big).style.display = "none";
}

function loadJava(){
    resize_func();
    check_and_activate();
    r_isEmail();
    console.log("loadJava executed");
}


function focusclicks(){
    $("#benutzernamelabel").click(
	    function(){
		    $("#benutzernamefeld").focus();
	    }
	);
    $("#loginpwlabel").click(
	    function(){
		    $("#loginpwfeld").focus();
	    }
	);
    /*------------------------------------*/
	$("#reg_benutzer_label").click(
	    function(){
		    $("#benreg").focus();
	    }
	);
	$("#reg_pwd_label").click(
	    function(){
		    $("#passwd_reg").focus();
	    }
	);
	$("#reg_pwd_rep_label").click(
	    function(){
		    $("#passwd_reg_rep").focus();
	    }
	);

}

function focusfunctions(){

}


$(document).ready(
    function(){
	 focusclicks();

	 $("#benutzernamefeld").keyup(
		 	function(){
				check_and_activate();
			}
	 );
     $("#loginpwfeld").keyup(
         function(){
            check_and_activate();
        }
     );


	 $("#benreg").keyup(
 		function(){
 			r_isEmail();
 		}
 	);

	 $("#passwd_reg").keyup(
		 function(){
			 r_isValidPassword();
		 }
	 );

	 $("#passwd_reg_rep").keyup(
		 function(){
			 r_passwords_match();
		 }
	 );

      $("#benreg").keyup( function(){check_registration()} );
      $("#passwd_reg").keyup( function(){check_registration()} );
      $("#passwd_reg_rep").keyup( function(){check_registration()} );

    }
);


window.onload = loadJava;
