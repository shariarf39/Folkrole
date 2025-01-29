
// navbar

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');

    menuToggle.addEventListener('click', () => {
        // Toggle the visibility of the navigation links
        navLinks.classList.toggle('show');
        document.body.classList.toggle('nav-open');

        // Check if the nav-links has the "show" class to determine the icon
        if (navLinks.classList.contains('show')) {
            menuToggle.innerHTML = '<i class="fa-solid fa-x"></i>'; // Close icon
        } else {
            menuToggle.innerHTML = '<i class="fa-solid fa-bars menu-toggle" id="menu-toggle"></i>'; // Bars icon
        }
    });
});










// Auto Slide
const autoSlides = document.querySelector('.auto_slides');
const totalItems = 7;
const itemsPerSlide = 4;
let currentIndex = 0;

function updateAutoSlider() {
    if (!autoSlides) return;
    const offset = -(currentIndex * 100) / itemsPerSlide;
    autoSlides.style.transform = `translateX(${offset}%)`;
}


function autoSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    updateAutoSlider();
}


let autoSlideInterval = setInterval(autoSlide, 3000);

nextButtonAuto?.addEventListener('click', () => {
    clearInterval(autoSlideInterval);
    currentIndex = (currentIndex + 1) % totalItems;
    updateAutoSlider();
    autoSlideInterval = setInterval(autoSlide, 3000);
});

prevButtonAuto?.addEventListener('click', () => {
    clearInterval(autoSlideInterval);
    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
    updateAutoSlider();
    autoSlideInterval = setInterval(autoSlide, 3000);
});

