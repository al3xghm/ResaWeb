// dans #slider-wrapper, checker les inputs radio s1, s2, s3, s4 toutes les 5 secondes et revenir a s1 après s4

var s1 = document.getElementById("Slide1");
var s2 = document.getElementById("Slide2");
var s3 = document.getElementById("Slide3");
var s4 = document.getElementById("Slide4");
var i = 0;

function checkRadio() {
    if (i == 0) {
        s1.checked = true;
        i++;
    } else if (i == 1) {
        s2.checked = true;
        i++;
    } else if (i == 2) {
        s3.checked = true;
        i++;
    } else if (i == 3) {
        s4.checked = true;
        i = 0;
    }
}

setInterval(checkRadio, 5000);




