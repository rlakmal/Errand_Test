
    let currentSlide = 0;
    const sliderImages = document.querySelectorAll('.slider-image');
    const imageSlider = document.querySelector('.image-slider');

    function nextSlide() {
        currentSlide = (currentSlide + 1) % sliderImages.length;
        updateSlider();
    }

    function updateSlider() {
        const translateXValue = -currentSlide * 100 + '%';
        imageSlider.style.transform = `translateX(${translateXValue})`;
    }

    setInterval(nextSlide, 3000); // Change slide every 3 seconds
