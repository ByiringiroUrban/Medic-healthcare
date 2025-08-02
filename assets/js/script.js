document.addEventListener('DOMContentLoaded', function () {

    // 1. Testimonials Slider (using Swiper.js)
    // ------------------------------------------------
    const testimonialsSlider = new Swiper('.testimonials-slider', {
        // Optional parameters
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 768px
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            }
        },

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Autoplay
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });


    // 2. FAQ Accordion
    // ------------------------------------------------
    const accordionItems = document.querySelectorAll('.accordion-item');

    accordionItems.forEach(item => {
        const header = item.querySelector('.accordion-header');

        header.addEventListener('click', () => {
            const currentlyActive = document.querySelector('.accordion-item.active');
            
            // If there is an active item and it's not the one we just clicked, close it
            if (currentlyActive && currentlyActive !== item) {
                currentlyActive.classList.remove('active');
            }
            
            // Toggle the active class on the clicked item
            item.classList.toggle('active');
        });
    });

});
