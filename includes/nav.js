$(document).ready(function() {
    console.log('hi, nav.js working');
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-185px";
        }
        prevScrollpos = currentScrollPos;
    };
});

