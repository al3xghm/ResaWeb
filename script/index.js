document.addEventListener('DOMContentLoaded', function() {

// dans #slider-wrapper, checker les inputs radio s1, s2, s3, s4 toutes les 5 secondes et revenir a s1 après s4

var s1r = document.getElementById("Slide1-review");
var s2r = document.getElementById("Slide2-review");
var s3r = document.getElementById("Slide3-review");
var s4r = document.getElementById("Slide4-review");
var j = 0;

function checkRadioReview() {
    if (j == 0) {
        s1r.checked = true;
        j++;
    } else if (j == 1) {
        s2r.checked = true;
        j++;
    } else if (j == 2) {
        s3r.checked = true;
        j++;
    } else if (j == 3) {
        s4r.checked = true;
        j = 0;
    }
}

setInterval(checkRadioReview, 3500);


});