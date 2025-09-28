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