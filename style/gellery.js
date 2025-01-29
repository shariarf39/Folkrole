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