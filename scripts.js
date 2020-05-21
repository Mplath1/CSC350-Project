
function displaySliderValues () {
	var value1 = parseInt($('#priceslidermin').val(),10);
	var value2 = parseInt($('#priceslidermax').val(),10);
	if (value1 > value2) {
		var temp = value1;
		value1 = value2
		value2 = temp;
	}
	$('#currentpricemin').html(value1);
	$('#currentpricemax').html(value2);
	displaySliderRange(value1, value2)
}

function displaySliderRange (min, max) {
	$('#pricesliderrange').css("left", min/5 + "%");
	$('#pricesliderrange').css("width", max/5 - min/5 + "%");
}

function correctSliderValues () {
	var value1 = parseInt($('#priceslidermin').val(),10);
	var value2 = parseInt($('#priceslidermax').val(),10);
	if (value1 <= value2) {
		$('#priceslidermin').val(value1);
		$('#priceslidermax').val(value2);
	} else {
		$('#priceslidermin').val(value2);
		$('#priceslidermax').val(value1);
	}
}

$( document ).ready(function() {
	displaySliderValues();
});

$(document).on('input', '#priceslidermin', function() {
	displaySliderValues();
});

$(document).on('input', '#priceslidermax', function() {
	displaySliderValues();
});

$("#priceslidermin").change(function(){
	correctSliderValues();
}); 

$("#priceslidermax").change(function(){
	correctSliderValues();
}); 


