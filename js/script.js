//controlli form


//menu mobile
function openCloseMenu() {
    var x = document.getElementById("OpenCloseBT");

    x.addEventListener("click", function () {
		if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
	});    
}

openCloseMenu();