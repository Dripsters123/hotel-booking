var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].classList.add("hidden");
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].classList.remove("bg-blue-500");
  }
  slides[slideIndex - 1].classList.remove("hidden");
  dots[slideIndex - 1].classList.add("bg-blue-500");
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

function currentSlide(n) {
  if (n > slides.length) {
    n = 1;
  } else if (n < 1) {
    n = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].classList.add("hidden");
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].classList.remove("bg-blue-500");
  }
  slides[n - 1].classList.remove("hidden");
  dots[n - 1].classList.add("bg-blue-500");
}
