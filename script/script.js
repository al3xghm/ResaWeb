// dans #slider-wrapper, checker les inputs radio s1, s2, s3, s4 toutes les 5 secondes et revenir a s1 après s4

var s1a = document.getElementById("Slide1-about");
var s2a = document.getElementById("Slide2-about");
var s3a = document.getElementById("Slide3-about");
var s4a = document.getElementById("Slide4-about");
var i = 0;

function checkRadioAbout() {
    if (i == 0) {
        s1a.checked = true;
        i++;
    } else if (i == 1) {
        s2a.checked = true;
        i++;
    } else if (i == 2) {
        s3a.checked = true;
        i++;
    } else if (i == 3) {
        s4a.checked = true;
        i = 0;
    }
}

setInterval(checkRadioAbout, 3500);

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



