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
let autoSlideInterval;

function getTotalSlides() {
    return document.querySelectorAll('.lgpa-slide').length;
}

function initSlider() {
    showSlide(currentSlideIndex);
    startAutoSlide();
}

function showSlide(n) {
    const slides = document.querySelectorAll('.lgpa-slide');
    const dots = document.querySelectorAll('.lgpa-dot');
    const counter = document.querySelector('.lgpa-counter .current');
    const totalSlides = getTotalSlides();

    if (n > totalSlides) currentSlideIndex = 1;
    if (n < 1) currentSlideIndex = totalSlides;

    slides.forEach((slide, index) => {
        slide.classList.remove('active');
        if (index !== currentSlideIndex - 1) {
            slide.style.backgroundSize = '120%';
        }
    });
    dots.forEach(dot => dot.classList.remove('active'));

    const currentSlide = slides[currentSlideIndex - 1];
    currentSlide.classList.add('active');
    if (dots[currentSlideIndex - 1]) {
        dots[currentSlideIndex - 1].classList.add('active');
    }

    setTimeout(() => {
        currentSlide.style.backgroundSize = '100%';
    }, 50);

    if (counter) {
        counter.textContent = String(currentSlideIndex).padStart(2, '0');
    }

    restartProgress();
}

function nextSlide() {
    currentSlideIndex++;
    showSlide(currentSlideIndex);
    resetAutoSlide();
}

function prevSlide() {
    currentSlideIndex--;
    showSlide(currentSlideIndex);
    resetAutoSlide();
}

function currentSlide(n) {
    currentSlideIndex = n;
    showSlide(currentSlideIndex);
    resetAutoSlide();
}

function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 5000);
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

function restartProgress() {
    const progress = document.querySelector('.lgpa-progress');
    if (!progress) return;
    progress.style.animation = 'none';
    progress.offsetHeight; 
    progress.style.animation = 'slideProgress 5s linear infinite';
}

document.addEventListener('DOMContentLoaded', initSlider);
