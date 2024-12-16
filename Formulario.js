// Cambiar imágenes de fondo al recargar la página
const images = ['Formulario.png', 'Formulario1.png', 'Formulario2.png', 'Formulario.png'] ;
const carouselSlide = document.querySelector('.carousel-slide');

// Elegir una imagen al azar al cargar la página
function changeBackground() {
    const randomIndex = Math.floor(Math.random() * images.length);
    carouselSlide.style.backgroundImage = `url('${images[randomIndex]}')`;
}

// Llamar a la función al cargar la página
changeBackground();
