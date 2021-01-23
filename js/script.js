//controlli form
function checkPasswordEqual(password, passwordConfirm) {
	var p1 = document.getElementById(password);
	var p2 = document.getElementById(passwordConfirm);
	var result = p1.value === p2.value;
	notifyError(result, passwordConfirm, "La password inserita non combacia");
	return result;
}

function checkPass(pass) {
	var test = document.getElementById(pass).value;
	notifyError(!(test === ""), pass, "La password non puo' essere vuota");
	return result;
}

function checkEmail(email) { 
	var regex = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$");
	var textEmail = document.getElementById(email).value.toLowerCase();
	var result = (regex.test(textEmail)) && !(textEmail === "");
	notifyError(result, email, "Email non corretta");
	return result;
}

function checkName(name) {
	var test = document.getElementById(name).value;
	var regex = new RegExp("^[A-Za-z]{1,30}$");
	var result = (regex.test(test)) && !(test === "");
	notifyError(result, name, "Il nome puo' contenere solo lettere e puo' essere lungo da 1 a 30 caratteri");
	return result;
}

function checkSurname(surname) {
	var test = document.getElementById(surname).value;
	var regex = new RegExp("^[A-Za-z]{1,30}$");
	var result = (regex.test(test)) && !(test === "");
	notifyError(result, surname, "Il cognome puo' contenere solo lettere e puo' essere lungo da 1 a 30 caratteri");
	return result;
}

function checkCommento(commento) {
	var testo = document.getElementById("box-commento").value.toString();
	testo = testo.trim();
	var result = (testo.length !== 0) && !(testo === "");
	notifyError(result, commento, "Il commento non puo' essere vuoto");
	return result;
}

function loginCheck(user, pass) {
    var regex = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$");
    var username = document.getElementById(user).value;
    var textEmail = document.getElementById(username).value.toLowerCase();
	var password = document.getElementById(pass).value;
    var result1 = username.toString().length !== 0 && regex.test(textEmail);
    var result2 = password.toString().length !== 0;
    notifyError(result1, username, "Inerito campo vuoto o email scritta non correttamente");
    notifyError(result2, password, "Questo campo non pu&ograve; essere vuoto");    
	return result1 && result2;
}

function notifyError(condition, idElemento, message) {
	idElemento = idElemento.toString() + "-warning";
	if (condition) {
		document.getElementById(idElemento).innerHTML = "";
	} else {
		document.getElementById(idElemento).innerHTML = message;
	}
}

//menu mobile
function openCloseBT() {

    var icon = document.querySelector(".icon");
    var x = document.getElementById("links");

    icon.addEventListener("click", function () {
		if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }

        setTimeout(function(){ 
            icon.style.background = "black";
            icon.style.color = "black";
         }, 100);
        
    });    

    icon.addEventListener("mouseover", function () {
        icon.style.background = "#ddd";
        icon.style.color = "black";
    });  
    
    icon.addEventListener("mouseout", function () {
        icon.style.background = "black";
        icon.style.color = "black";
    });    
}

//da qui i metodi che vengono attivati con il caricamento della pagina
openCloseBT();

//pagina registrazione
var regist = document.getElementById("form-registrazione");
if (regist) {
	regist.addEventListener("submit", function (event) {
        var name = checkName("registrazione-nome");
        var surname = checkSurname("registrazione-cognome");
        var email = checkEmail("registrazione-email");
        var passOK = checkPass("registrazione-password1");
        var pass12Eq = checkPasswordEqual("registrazione-password1", "registrazione-password2");
		if (!(name && surname && email && passOK && pass12Eq)) {
			event.preventDefault();
		}
	});
}

//pagina login
var login = document.getElementById("form-accesso");
if (login) {
	login.addEventListener("submit", function (event) {
		if (!(loginCheck("login-email","login-password"))) {
			event.preventDefault();
		}
	});
}