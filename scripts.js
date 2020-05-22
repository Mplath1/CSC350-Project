$(document).ready(function() {

var slider_width = 16;
var slider_value_max = 500;
var slider_pressed = null;
var slider_mouseoffset = 0;
var slider_min = $('#priceslidermin');
var slider_max = $('#priceslidermax');
$(slider_min).css('left', $(slider_min).val()/slider_value_max*$('#pricesliderdiv').width() - slider_width/2);
$(slider_max).css('left', $(slider_max).val()/slider_value_max*$('#pricesliderdiv').width() - slider_width/2);

function displaySliderValues () {
	$('#currentpricemin').html($(slider_min).val());
	$('#currentpricemax').html($(slider_max).val());
	displaySliderRange($('#priceslidermin').val(), $('#priceslidermax').val())
}

function displaySliderRange (min, max) {
	$('#pricesliderrange').css("left", min/5 + "%");
	$('#pricesliderrange').css("width", max/5 - min/5 + "%");
}

displaySliderValues();

$(slider_min).on("mousedown", function(e) { // "e" is intentional
	slider_mouseoffset = $(slider_min).position().left - e.pageX;
	slider_pressed = $(slider_min);
});

$(slider_max).on("mousedown", function(e) { // "e" is intentional
	slider_mouseoffset = $(slider_max).position().left - e.pageX;
	slider_pressed = $(slider_max);
});

$(document).on('mouseup', function() {
	slider_pressed = null;
})

$(document).on('mousemove', function(e) { // "e" is intentional
	if (slider_pressed != null){
		var clamp_left = -slider_width/2;
		var clamp_right = $('#pricesliderdiv').width() - slider_width/2;
		var x = e.pageX + slider_mouseoffset;
		var offset;
		if ($(slider_min).position().left + slider_width > $(slider_max).position().left)
		{
			if (slider_pressed.is($(slider_min))) {
				x = $(slider_max).position().left - slider_width;
			} else {
				x = $(slider_min).position().left + slider_width;
			}
		}
		if (x < clamp_left){
			x = clamp_left;
		}
		if (x > clamp_right){
			x = clamp_right;
		}
		$(slider_pressed).css({
			left:  x
		});
		$(slider_pressed).val(Math.round((x-clamp_left)/(clamp_right-clamp_left)*slider_value_max));
		displaySliderValues();
	}
});

});