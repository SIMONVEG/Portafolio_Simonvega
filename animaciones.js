let indice = 0; // Índice de la imagen actual

function mostrarImagenes() {
    const carrusel = document.querySelector('.carousel');
    const totalImagenes = document.querySelectorAll('.carousel img').length;

    // Controlar que el índice no sea mayor que el número de imágenes
    if (indice >= totalImagenes) {
        indice = 0; // Reinicia el índice para que vuelva a la primera imagen
    }
    if (indice < 0) {
        indice = totalImagenes - 1; // Si se va a negativo, vuelve a la última imagen
    }

    // Mover el carrusel
    carrusel.style.transform = `translateX(${-indice * 100}%)`;
}

function moverCarrusel(direccion) {
    indice += direccion; // Aumenta o disminuye el índice según la dirección
    mostrarImagenes();
}

// Función para mover el carrusel automáticamente cada 5 segundos en bucle
function iniciarCarruselAutomatico() {
    setInterval(() => {
        indice++;
        mostrarImagenes();
    }, 5000); // Cambiar cada 5 segundos (5000 ms)
}

// Iniciar el carrusel
mostrarImagenes();
iniciarCarruselAutomatico(); // Llamar a la función que lo mueve automáticamente
