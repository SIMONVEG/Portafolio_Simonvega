// script.js
window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    document.body.style.backgroundPositionY = `${scrollPosition * 0.7}px`;
});

// Cambiar imágenes de fondo al recargar la página
const images = ['Principal1.png', 'Principal2.png', 'Principal3.png', 'Principal4.png'] ;
const carouselSlide = document.querySelector('.carousel-slide');

// Elegir una imagen al azar al cargar la página
function changeBackground() {
    const randomIndex = Math.floor(Math.random() * images.length);
    carouselSlide.style.backgroundImage = `url('${images[randomIndex]}')`;
}

// Llamar a la función al cargar la página
changeBackground();