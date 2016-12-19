function toggleFormControls(formID){
	// Grab all Tag Elements within form
	var formElements = document.getElementById(formID).getElementsByTagName('*');
	// Itirate through each element to toggle
	for (var i = formElements.length - 1; i >= 0; i--) {
		if (!(formElements[i].className.indexOf('disable-immune') >= 0)){
			if (formElements[i].getAttribute('disabled') == null) {
				formElements[i].setAttribute('disabled','');
			}else{
				formElements[i].removeAttribute('disabled');
			};
		};
	};
}

function toggleTextContent(textID,textOptionOne,textOptionTwo){
	if(document.getElementById(textID).innerHTML == textOptionOne){
		document.getElementById(textID).innerHTML = textOptionTwo;
	} else {
		document.getElementById(textID).innerHTML = textOptionOne;
	}
}

function resetFileImage(id){
	      $(id).val('');
        $('#image-type').text('Current Image');
  			$("#software-image").fadeIn("fast").attr('src',origIMG);
}

function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');   
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {    
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                pars.splice(i, 1);
            }
        }

        url= urlparts[0]+'?'+pars.join('&');
        return url;
    } else {
        return url;
    }
}

function getURLParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};