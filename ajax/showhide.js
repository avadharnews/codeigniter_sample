function showprofileinfo(){
    $("#sec1").fadeIn();
    $("#sec2").hide();
    $("#sec3").hide();
    $("#menu1").css("color", "red");
    $("#menu2").css("color", "black");
    $("#menu3").css("color", "black");
}

function manageaddressinfo(){
    $("#sec1").hide();
    $("#sec2").fadeIn();
    $("#sec3").hide();
    $("#menu1").css("color", "black");
    $("#menu2").css("color", "red");
    $("#menu3").css("color", "black");
}

function managepin(){
    $("#sec1").hide();
    $("#sec2").hide();
    $("#sec3").fadeIn();
    $("#menu1").css("color", "black");
    $("#menu2").css("color", "black");
    $("#menu3").css("color", "red");
}
