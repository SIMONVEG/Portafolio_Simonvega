// script.js
window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    document.body.style.backgroundPositionY = `${scrollPosition * 2}px`;
});

