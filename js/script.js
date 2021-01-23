//controlli form


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
    }); 

    icon.addEventListener("mouseover", function () {
        x.style.background = "#ddd";
        x.style.color = "black";
    }); 
    
}

openCloseBT();