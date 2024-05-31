function validateFormpass() {
    var oldpass = document.getElementById('oldpass').value;
    var newpass = document.getElementById('newpass').value;
    var confirmpass = document.getElementById('confirmpass').value;

    if (newpass !== confirmpass) {
        alert("Passwords do not match.");
        return false;
    }
    if (newpass === oldpass) {
        alert("New password cannot be the same as the old password.");
        return false;
    }
    return true;
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}
function currentSlide(n) {
    showSlides(slideIndex = n);
}
function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}




// Path: Website/js/functions.js