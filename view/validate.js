

// 1. call the validateFn function for fieldElem
	// 2. find the sibling element span
	// 3. if result of function call is true, update span to "Okay"
	// if result of function call is false, update span to = infoMessage 


var validateField = function(fieldElem, infoMessage, validateFn) {
	console.log("in validateField");
	var span = $(fieldElem).siblings()[0];
	
	if(validateFn($(fieldElem).val())){
		span.innerHTML = "OK";
		$(span).removeClass();
		$(span).addClass("ok");
		return true;
	}
	else{
		span.innerHTML = infoMessage;
		$(span).addClass("error");
		return false;
	}
}



//check each field elt

//The name ﬁeld must contain only alphabetical 
//characters (first and last name). 
var validateName = function (elem){
	var regex = /^[a-z ,.'-]+$/i;

// regex.test(elem);
	return true;
};


var validatePhone = function (elem) {
	return true;
}

var validateCarrier = function (elem) {
	return true;
}

var validateEmail = function (elem) {
	var regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

	return true;
}



function validateForm(form) {
	console.log("in validate form");

	// if(!(validateName($('#name').val()))){ 
	// 	alert('enter valid name');

	// 	 return false;
	// }
	// else if (!validatePhone($('#phone').val())) {
	// 	alert("enter valid phone number");

	// 	 return false;
	// }
	// else if (!validateEmail($('#email').val())) {
	// 	alert("enter valid email");

	// 	 return false;
	// }
	// else if (!validateCarrier($('#carrier').val())){
	// 	alert("enter valid carrier");

	// 	 return false;
	// }

	return true;
}










$(document).ready(function() {
	//Use validateField to validate form fields on the page.

	console.log("calling ready function");

	$('#name').on("focusout", function() {
		validateField($('#name'), 'Error: please enter a valid name (a-z characters)', validateName);
	});
	$('#phone').on("focusout", function() {
		validateField($('#phone'), 'Error: please enter a valid number (xxx xxx xxxx)', validatePhone);
	});

	$('#email').on("focusout", function() {
		validateField($('#email'), 'Error: please enter a valid email address', validatePW);
	});

	$('#carrier').on("focusout", function() {
		validateField($('#carrier'), 'Error: please enter a valid carrier', validateEmail);
	});

 });