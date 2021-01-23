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
        icon.style.background = "#ddd";
        icon.style.color = "black";
    });  
    
    icon.addEventListener("mouseout", function () {
        icon.style.background = "black";
        icon.style.color = "black";
    });    
}

openCloseBT();