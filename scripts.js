
var slider = document.getElementById("priceslider");
var currentprice = document.getElementById("currentprice");
currentprice.innerHTML = slider.value;

slider.oninput = function(){
	currentprice.innerHTML = this.value;
}