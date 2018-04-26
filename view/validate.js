

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

// return regex.test(elem);
	return true;
};


var validatePhone = function (elem) {
	var regex = /^\(?([0-9]{3})\)?[ . ]?([0-9]{3})[-. ]?([0-9]{4})$/;
// return regex.test(elem);

	return true;
}

// var validateCarrier = function (elem) {

// 	// return regex.test(elem);

// 	return true;
// }

var validateEmail = function (elem) {
	var regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

// return regex.test(elem);

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
	

	return true;
}


$(document).ready(function() {
	//Use validateField to validate form fields on the page.

	console.log("calling ready function");

	$('#name').on("focus", function() {
		validateField($('#name'), 'Error: please enter a valid name (a-z characters)', validateName);
	});
	$('#phone').on("focus", function() {
		validateField($('#phone'), 'Error: please enter a valid number (xxx xxx xxxx)', validatePhone);
	});

	$('#email').on("focus", function() {
		validateField($('#email'), 'Error: please enter a valid email address', validateEmail);
	});

	// $('#carrier').on("focusout", function() {
	// 	validateField($('#carrier'), 'Error: please enter a valid carrier', validateCarrier);
	// });

 });