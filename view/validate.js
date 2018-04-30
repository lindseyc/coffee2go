var usernameRequirements = "At least 3 alpha characters";
var emailReq = "Formatted in ***@***.edu/gov/com/org";
var phoneReq = "Numbers only, no spaces or punctuation.";

var validateField = function(fieldElem, infoMessage, validateFn) {
	var text = $(fieldElem).val();
	console.log(text);
    var status = validateFn(text);
    if (status===true){
        $(fieldElem).removeClass("info");
        $(fieldElem).removeClass("error");
        $(fieldElem).addClass("ok");
        $(fieldElem).next("span").replaceWith("<span style='color:green;'>OK</span>");
        return true;
    }
    else if (status===false){
        $(fieldElem).removeClass("ok");
        $(fieldElem).addClass("error");
        $(fieldElem).next("span").replaceWith("<span style='color:red;'>Error</span>");
        return false;
    }
    else { // empty case, clear everything
        $(fieldElem).removeClass("ok");
        $(fieldElem).removeClass("error");
        $(fieldElem).removeClass("info");
        $(fieldElem).next("span").replaceWith("<span></span>");
        return false;
    }
};

$(document).ready(function() {
    $("#name").focus(function(){info(this, usernameRequirements);});
    $("#name").keyup(function(){validateField(this, usernameRequirements, usernameFn);});
    $("#name").blur(function(){validateField(this, usernameRequirements, usernameFn);});

    $("#email").focus(function(){info(this,emailReq);});
    $("#email").keyup(function(){validateField(this,emailReq, email);});
    $("#email").blur(function(){validateField(this,emailReq, email);});

    $("#phone").focus(function(){info(this,phoneReq);});
    $("#phone").keyup(function(){validateField(this,phoneReq, phone);});
    $("#phone").blur(function(){validateField(this,phoneReq, phone);});

    $("#submit").click(function(){validateAll();});
});

var info = function infoAppend (fieldElem, infoMessage){
    $(fieldElem).removeClass("ok");
    $(fieldElem).removeClass("error");
    $(fieldElem).addClass("info");
    $(fieldElem).next("span").replaceWith("<span style='color: gray;'>" + infoMessage + "</span>");
};
var usernameFn = function usernameValidate(text){
    if (text===""){ return "empty";}
    if (text.match(/^[A-Za-z\s]{3,}$/)) {return true;}
    else { return false;}
};

var stateFn = function stateValidate(text){
    if (text===""){ return "empty";}
    if (text.match(/^[A-Z]{2}$/)) {return true;}
    else { return false;}
};

var phone = function Phone(text){
    if (text===""){ return "empty";}
    if (text.match(/^[0-9]{3}[0-9]{3}[0-9]{4}$/)){return true;}
    else { return false; }
};

var email = function Email(text){
    if (text===""){ return "empty";}
    if (text.match(/^[a-zA-Z0-9]*@[a-zA-Z]*\.(gov|com|edu|org)$/)){
        return true;}
    else { return false; }
};

var selected = function Selected(errorElem, type, minimum){
    var selectionLength = $("input[type=" + type + "]:checked");
    if (selectionLength.length >= minimum){
        $(errorElem).hide();
        return true;}
    else {
        $(errorElem).show();
        return false;}
};

var validateAll = function Submit(){
    //username = validateField(":text:first", usernameRequirements, name);
    var username = validateField("#inputusername", usernameRequirements, usernameFn);
    var emailStatus = validateField("#inputemail", emailReq, email);
    var phoneStatus = validateField("#inputphone", phoneReq, phone);
    if (!(username && addressStatus && cityStatus && stateStatus && zipStatus && emailStatus && phoneStatus && troopStatus && gsStatus)){
        $("#submiterror").show();
        event.preventDefault();
    }
};
