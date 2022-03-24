let slideIndex = 1
showSlides(slideIndex)

// commande des bouttons suivant et précedent
function plusSlides(n) {
  showSlides(slideIndex += n)
}

// contrôle des images
function currentSlide(n) {
  showSlides(slideIndex = n)
}

// fonction qui affiche les images
function showSlides(n) {
  let i
  let slides = document.getElementsByClassName("slide");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"
  }
  
  slides[slideIndex-1].style.display = "block"
}