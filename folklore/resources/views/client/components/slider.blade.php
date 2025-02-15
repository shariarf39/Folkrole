<!-- Home Slider Section -->
 <link rel="stylesheet" href="style/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="slider home" id="home">
    <div class="slides">
        <div class="slide">
            <div class="content">
                <p id="welcome-text"></p><br>
                <h2 id="community-heading"></h2>
                <p>Build a world where all youth are safe, strong, and valued.</p>
                <a href="#" class="btn">Read More</a>
            </div>
            <img src="img/home_slide1.jpg" alt="Community Development">
        </div>

        <div class="slide">
            <div class="content">
                <h2 id="Empower-heading"></h2>
                <p>Enabling sustainable development for rural communities.</p>
                <a href="#" class="btn">Read More</a>
            </div>
            <img src="img/home_slide2.jpg" alt="Empower Rural Youth">
        </div>
        <div class="slide">
            <div class="content">
                <h2 id="Education-heading"></h2>
                <p>Promoting equal opportunities for education worldwide.</p>
                <a href="#" class="btn">Read More</a>
            </div>
            <img src="img/home_slide3.png" alt="Education for All">
        </div>
    </div>

    <div class="controls">
        <span class="dot active" onclick="moveToSlide(0)"></span>
        <span class="dot" onclick="moveToSlide(1)"></span>
        <span class="dot" onclick="moveToSlide(2)"></span>
    </div>

    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="next" onclick="changeSlide(1)">&#10095;</button>
</div>

<script>
    function typeWriter(elementId, text, speed, callback) {
    const element = document.getElementById(elementId);
    if (!element) return;
    element.innerHTML = "";
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
    if (dots[slideIndex]) dots[slideIndex].classList.add('active');
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => showSlide(index));
});

function changeSlide(direction) {
    showSlide(slideIndex + direction);
}

if (prevButton) prevButton.addEventListener('click', () => changeSlide(-1));
if (nextButton) nextButton.addEventListener('click', () => changeSlide(1));

setInterval(() => {
    changeSlide(1);
}, 5000);

</script>



    <script src="style/autotext.js"></script>