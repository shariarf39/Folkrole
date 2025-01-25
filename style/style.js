let slideIndex = 0;
const slides = document.querySelector('.slides');
const dots = document.querySelectorAll('.dot');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');

function showSlide(index) {
    const totalSlides = slides.children.length;

    if (index < 0) slideIndex = totalSlides - 1;
    else if (index >= totalSlides) slideIndex = 0;
    else slideIndex = index;

    slides.style.transform = `translateX(-${slideIndex * 100}%)`;

    dots.forEach(dot => dot.classList.remove('active'));
    dots[slideIndex]?.classList.add('active');
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => showSlide(index));
});

function changeSlide(direction) {
    showSlide(slideIndex + direction);
}

prevButton.addEventListener('click', () => changeSlide(-1));
nextButton.addEventListener('click', () => changeSlide(1));
setInterval(() => changeSlide(1), 3000);








// navbar

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');

    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('show');
        document.body.classList.toggle('nav-open');
        menuToggle.innerHTML = navLinks.classList.contains('show')
            ? '<i class="fa-solid fa-x"></i>' 
            : '<i class="fa-solid fa-bars"></i>';
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









// Gallery Section
const gallery = document.querySelector('.gallerys');
const gallerySlides = document.querySelectorAll('.gallery_slide');
const totalImages = 5;
const imagesPerSlide = 4;
let galleryIndex = 0;

function showGallerySlide(index) {
    if (!gallery) return;
    const offset = -(index * 100) / imagesPerSlide;
    gallery.style.transform = `translateX(${offset}%)`;
}

function nextGallerySlide() {
    galleryIndex = (galleryIndex + 1) % totalImages;
    showGallerySlide(galleryIndex);
}


setInterval(nextGallerySlide, 3000);

function changeGallerySlide(dir) {
    galleryIndex += dir;


    if (galleryIndex >= totalImages) {
        galleryIndex = 0;
    } else if (galleryIndex < 0) {
        galleryIndex = totalImages - 1;
    }

    showGallerySlide(galleryIndex);
}
