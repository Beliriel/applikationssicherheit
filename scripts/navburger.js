
var NavigationVisible = true;


function setnav()
{
    if(NavigationVisible) {
        document.getElementById("nav").style.display = "block";
    } else {
        document.getElementById("nav").style.display = "none";
    }
}

function switchnav() {
    NavigationVisible = !NavigationVisible;
    setnav();
}


function resize_func() {
    var burgericon = document.getElementById("burgericon");
    if(window.innerWidth < 1000){
        NavigationVisible = false;
        burgericon.style.display = "block";
    } else {
        NavigationVisible = true;
        burgericon.style.display = "none";
    }
    setnav();
}


window.onresize = resize_func;
