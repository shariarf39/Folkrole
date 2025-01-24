let slideIndex = 0;
let direction = 1;
const slides = document.querySelector('.slides');
const dots = document.querySelectorAll('.dot');

function showSlide(index) {
    const totalSlides = slides?.children.length || 0;

    if (!slides || index < 0 || index >= totalSlides) return;

    slides.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach(dot => dot.classList.remove('active'));
    dots[index]?.classList.add('active');
}

function nextSlide() {
    const totalSlides = slides?.children.length || 0;

    if (totalSlides === 0) return;

    slideIndex += direction;

    if (slideIndex >= totalSlides - 1) {
        direction = -1;
    }

    if (slideIndex <= 0) {
        direction = 1;
    }

    showSlide(slideIndex);
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        slideIndex = index;
        direction = index === 0 ? 1 : -1;
        showSlide(slideIndex);
    });
});

setInterval(nextSlide, 3000);

function changeSlide(dir) {
    direction = dir;
    nextSlide();
}


const prevSlideButton = document.querySelector('.prev');
const nextSlideButton = document.querySelector('.next');

prevSlideButton?.addEventListener('click', () => changeSlide(-1)); 
nextSlideButton?.addEventListener('click', () => changeSlide(1));


const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

hamburger?.addEventListener('click', () => {
    navLinks?.classList.toggle('active');
});










// Auto Slide
const autoSlides = document.querySelector('.auto_slides');
const prevButtonAuto = document.querySelector('.previi');
const nextButtonAuto = document.querySelector('.nextii');
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

const prevGalleryButton = document.querySelector('.previi');
const nextGalleryButton = document.querySelector('.nextii');

prevGalleryButton?.addEventListener('click', () => changeGallerySlide(-1));
nextGalleryButton?.addEventListener('click', () => changeGallerySlide(1));
