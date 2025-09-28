/*------------------------------------------------------
Animated Counters
------------------------------------------------------*/
function initCounters() {
  document.querySelectorAll(".single-counter").forEach(function (item) {
    let target = parseInt(item.getAttribute("data-number"));
    let current = 0,
        duration = 1500,
        interval = 10,
        steps = duration / interval;
    let increment = target / steps;

    let stop = setInterval(function () {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(stop);
      }
      item.textContent = Math.floor(current) + "+";
    }, interval);
  });
}

initCounters();

  /*------------------------------------------------------
  Testimonial Carousel (Swiper)
  ------------------------------------------------------*/
jQuery(window).on('elementor/frontend/init', function() {

    // Add frontend hook for all widgets
    elementorFrontend.hooks.addAction('frontend/element_ready/testimonial_widget.default', function($scope, $){
        
        // Initialize Swiper for this testimonial widget only
        var swiperTestimonial = new Swiper($scope.find('.testimonalCarrousel')[0], {
            loop: true,
            slidesPerView: 1,
            speed: 600,
            spaceBetween: 30,
            effect: "slide",
            navigation: {
                nextEl: $scope.find(".swiper-button-next-custom")[0],
                prevEl: $scope.find(".swiper-button-prev-custom")[0],
            },
            autoplay: { delay: 5000, disableOnInteraction: false },
            on: {
                slideChange: function () {
                    const realIndex = this.realIndex;
                    $scope.find('.testimonial-img-wrapper .testimonial-img').each(function(idx, img){
                        img.classList.toggle('active', idx === realIndex);
                    });
                }
            }
        });

    });

});

/**
 * Hero Slider JS
 */

let currentSlideIndex = 1;
const totalSlides = 3;
let autoSlideInterval;

// Initialize slider
function initSlider() {
    showSlide(currentSlideIndex);
    startAutoSlide();
}

// Show specific slide
function showSlide(n) {
    const slides = document.querySelectorAll('.lgpa-slide');
    const dots = document.querySelectorAll('.lgpa-dot');
    const counter = document.querySelector('.lgpa-counter .current');
    
    if (n > totalSlides) currentSlideIndex = 1;
    if (n < 1) currentSlideIndex = totalSlides;
    
    // Remove active class from all slides and dots
    slides.forEach((slide, index) => {
        slide.classList.remove('active');
        // Reset background size for zoom effect
        if (index !== currentSlideIndex - 1) {
            slide.style.backgroundSize = '110%';
        }
    });
    dots.forEach(dot => dot.classList.remove('active'));
    
    // Add active class to current slide and dot
    const currentSlide = slides[currentSlideIndex - 1];
    currentSlide.classList.add('active');
    dots[currentSlideIndex - 1].classList.add('active');
    
    // Trigger zoom out effect
    setTimeout(() => {
        currentSlide.style.backgroundSize = '100%';
    }, 50);
    
    // Update counter
    counter.textContent = String(currentSlideIndex).padStart(2, '0');
    
    // Restart progress bar
    restartProgress();
}

// Next slide
function nextSlide() {
    currentSlideIndex++;
    showSlide(currentSlideIndex);
    resetAutoSlide();
}

// Previous slide
function prevSlide() {
    currentSlideIndex--;
    showSlide(currentSlideIndex);
    resetAutoSlide();
}

// Go to specific slide
function currentSlide(n) {
    currentSlideIndex = n;
    showSlide(currentSlideIndex);
    resetAutoSlide();
}

// Auto slide functionality
function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 5000);
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

// Restart progress bar
function restartProgress() {
    const progress = document.querySelector('.lgpa-progress');
    progress.style.animation = 'none';
    progress.offsetHeight; // Trigger reflow
    progress.style.animation = 'slideProgress 5s linear infinite';
}

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') prevSlide();
    if (e.key === 'ArrowRight') nextSlide();
});

// Touch/swipe support
let startX = 0;
let endX = 0;

document.addEventListener('touchstart', (e) => {
    startX = e.changedTouches[0].screenX;
}, { passive: true });

document.addEventListener('touchend', (e) => {
    endX = e.changedTouches[0].screenX;
    handleSwipe();
}, { passive: true });

function handleSwipe() {
    const swipeThreshold = 50;
    const diff = startX - endX;
    
    if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
            nextSlide();
        } else {
            prevSlide();
        }
    }
}

// Pause on hover
const sliderContainer = document.querySelector('.lgpa-slider-container');

sliderContainer.addEventListener('mouseenter', () => {
    clearInterval(autoSlideInterval);
    document.querySelector('.lgpa-progress').style.animationPlayState = 'paused';
});

sliderContainer.addEventListener('mouseleave', () => {
    startAutoSlide();
    document.querySelector('.lgpa-progress').style.animationPlayState = 'running';
});

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initSlider);