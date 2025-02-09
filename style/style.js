
// navbar

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');
    const body = document.body;
    const header = document.querySelector('#header');

    menuToggle.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent click event from propagating to the document
        // Toggle the visibility of the navigation links
        navLinks.classList.toggle('show');
        body.classList.toggle('nav-open');

        // Change the menu icon based on visibility of the navbar
        if (navLinks.classList.contains('show')) {
            menuToggle.innerHTML = '<i class="fa-solid fa-x"></i>'; // Close icon
        } else {
            menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>'; // Bars icon
        }
    });

    // Close the menu if clicked outside of the navbar
    document.addEventListener('click', (e) => {
        if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
            navLinks.classList.remove('show');
            body.classList.remove('nav-open');
            menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>'; // Bars icon
        }
    });

    // Close the navbar on scroll
    window.addEventListener('scroll', () => {
        if (navLinks.classList.contains('show')) {
            navLinks.classList.remove('show');
            body.classList.remove('nav-open');
            menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>'; // Bars icon
        }

        // Sticky Navbar Fix
        header.classList.toggle('sticky', window.scrollY > 100);
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

