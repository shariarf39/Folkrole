function typeWriter(elementId, text, speed, callback) {
    const element = document.getElementById(elementId);
    let index = 0;

    function type() {
        if (index < text.length) {
            element.innerHTML += text[index];
            index++;
            setTimeout(type, speed);
        } else if (callback) {
            callback();
        }
    }

    type();
}

document.addEventListener("DOMContentLoaded", function () {
    typeWriter("welcome-text", "Welcome To Folklore", 50, function () {
        typeWriter("community-heading", "Community Development", 50, function () {
            setTimeout(() => {
                typeWriter("Empower-heading", "Empower Rural Youth", 50, function () {
                    setTimeout(() => {
                        typeWriter("Education-heading", "Education for All", 50);
                    }, 500);
                });
            }, 500);
        });
    });
});

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

setInterval(() => {
    changeSlide(1);
}, 5000);
