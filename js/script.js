//controlli form
function checkPasswordEqual(password, passwordConfirm) {
	var p1 = document.getElementById(password);
	var p2 = document.getElementById(passwordConfirm);
	var result = (p1.value === p2.value);
	notifyError(result, passwordConfirm, "La password inserita non combacia");
	return result;
}

function checkNotEmpty(e, length){
	var test = document.getElementById(e).value;
	var regex = new RegExp("^.{1," + length +"}$");
	alert("^.{1," + length +"}$");
    result = !(test === "") && (regex.test(test));
	notifyError(result, e, "Il campo non puo' essere vuoto");
	return result;
}

function checkImageExt(img){
	var test = document.getElementById(img).value.toLowerCase();
	var regex = new RegExp("^(.*\.((jpg|jpeg)$))?[^.]*$");
    result = (regex.test(test));
	notifyError(result, img, "Viene accettato solo il formato .jpg o .jpeg");
	return result;
}

function checkPass(pass) {
    var test = document.getElementById(pass).value;
    result = !(test === "") && test.length !== 0;
	notifyError(result, pass, "La password non puo' essere vuota");
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

function checkDay(day){
	var num = parseInt(document.getElementById(day).value);
    result = (num < 32 && num > 0);
	notifyError(result, day, "Valori accettati tra 1 e 31");
	return result;
}

function checkMonth(Month){
	var num = parseInt(document.getElementById(Month).value);
    result = (num < 13 && num > 0);
	notifyError(result, Month, "Valori accettati tra 1 e 12");
	return result;
}

function checkYear(year){
	var num = parseInt(document.getElementById(year).value);
    result = (num > 1970);
	notifyError(result, year, "Metti un anno maggiore di 1970");
	return result;
}

function loginCheck(user) { 
	return checkNotEmpty(user, 30);
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
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }
	});
}

//pagina login
var login = document.getElementById("form-accesso");
if (login) {
	login.addEventListener("submit", function (event) {
		if (!(loginCheck("login-email"))) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }
	});
}

//cancellazione account
var canc = document.getElementById("eliminazione-account");
if (canc) {
	canc.addEventListener("submit", function (event) {
		if (!(checkPass("eliminazione-password"))) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }
	});
}

//modifica account
var modify = document.getElementById("form-modifica-utente");
if (modify) {
	modify.addEventListener("submit", function (event) {
        var name = checkName("registrazione-nome");
        var surname = checkSurname("registrazione-cognome");
        var email = checkEmail("registrazione-email");
        var passOK = checkPass("registrazione-password1");
        var pass12Eq = checkPasswordEqual("registrazione-password1", "registrazione-password2");
        if (!(name && surname && email && passOK && pass12Eq)) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }
	});
}

//aggiungi articolo
var artic = document.getElementById("form-new-articolo");
if (artic) {
	artic.addEventListener("submit", function (event) {
		alert("inizio");
		titoloGioco = checkNotEmpty("aggiungi-gioco", 64);
		alert("gioco");
		titoloArt = checkNotEmpty("aggiungi-titolo", 128);
		alert("titolo");
		sommario = checkNotEmpty("aggiungi-sommario", 512);
		alert("sommario");
		testo = checkNotEmpty("aggiungi-recensione", 65535);
		alert("testo");
		immagine = checkImageExt("aggiungi-immagine");
		alert("immagine");
		day = checkDay("aggiungi-giorno-publicazione");
		alert("d");
		month = checkMonth("aggiungi-mese-publicazione");
		alert("m");
		year = checkYear("aggiungi-anno-publicazione");
		alert("yy");
		if (!(titoloGioco && titoloArt && sommario && testo && immagine && day && month && year)) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }
	});
}