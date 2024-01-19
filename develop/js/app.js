document.addEventListener('DOMContentLoaded', function () {
  // Initialize ScrollReveal for another set of elements with a simple fade
  initScrollReveal('.scroll-fade', {
    opacity: 0
  });
  initScrollReveal('.scroll-fade-right', {
    opacity: 0,
    origin: 'right',
    distance: '100px',
    mobile: false,
  });
  initScrollReveal('.scroll-fade-left', {
    opacity: 0,
    origin: 'left',
    distance: '100px',
    mobile: false,
  });

  // Image slider
  var imageSwiper = new Swiper('.image-slider', {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    direction: 'horizontal',
    loop: true,
    autoplay: {
      delay: 5000 // Auto-scroll after 5 seconds (5000 milliseconds)
    }
  });

  // Testimonial slider
  var testimonialSwiper = new Swiper('#testimonial-slider', {
    touchEventsTarget: 'wrapper',
    touchStartPreventDefault: false,
    touchStartForcePreventDefault: false,
    touchReleaseOnEdges: true,
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    direction: 'horizontal',
    loop: true,
    autoplay: {
      delay: 5000 // Auto-scroll after 5 seconds (5000 milliseconds)
    },

    speed: 1000,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });

  window.addEventListener('scroll', function () {
    var header = document.getElementById('masthead');
    if (window.scrollY > 300) {
      header.classList.remove('lg:bg-transparent');
      header.classList.add('lg:bg-midnight-blue');
    } else {
      header.classList.remove('lg:bg-midnight-blue');
      header.classList.add('lg:bg-transparent');
    }
  });

   /*Scroll to top button*/
 var scrollToTopBtn = document.getElementById("to-top-button");
  
 function scrollToTop() {
   document.body.scrollTop = 0; // For Safari
   document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
 }
 scrollToTopBtn.addEventListener("click", scrollToTop);
 
// Halve spacer height on mobile 
 function adjustSpacerHeight() {
  var spacers = document.querySelectorAll('.spacer-component');
  if (window.innerWidth <= 600) {
      spacers.forEach(function(spacer) {
          var height = spacer.style.height.replace('px', '');
          spacer.style.height = (height / 2) + 'px';
      });
  } else {
      spacers.forEach(function(spacer) {
          var originalHeight = spacer.getAttribute('data-original-height');
          if (originalHeight) {
              spacer.style.height = originalHeight + 'px';
          }
      });
  }
}

// Call the function when the document is ready
adjustSpacerHeight();

// Call the function every time the window is resized
window.addEventListener('resize', adjustSpacerHeight);


  
}); // DOMContentLoaded end

// Function to initialize ScrollReveal with a given selector and options
function initScrollReveal(selector, revealOptions = {}, scrollOptions = {}) {
  // Initialize ScrollReveal
  const sr = ScrollReveal({
    duration: 2000,
    // Animation duration
    distance: '0px',
    // Distance of the reveal animation
    delay: 1000,
    // Delay between each column animation
    reset: false,
    // Resets the animation after scrolling out of the viewport
    
    
    ...scrollOptions // Spread additional options into the configuration
  });

  const rows = document.querySelectorAll('.row');

  rows.forEach((row) => {
    const elements = row.querySelectorAll(selector);
    elements.forEach((element, index) => {
      sr.reveal(element, {
        ...revealOptions,
        delay: revealOptions.delay ? revealOptions.delay * index : 200 * index
      });
    });
  });
}



    function updateCountdown(eventData) {
        const sectionId = eventData.dataset.sectionId;
        const section = document.getElementById(sectionId);
        const countdown = section.querySelector('.countdown');
        const eventButton = section.querySelector('.register-button span');
        const targetDate = new Date(eventData.dataset.date).getTime();
        const changeTextTime = parseInt(eventData.dataset.changeTextTime, 10);
        const buttonTextChange = eventData.dataset.buttonTextChange;

        let isButtonUpdated = false;

        const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const totalMinutes = (days * 24 * 60) + (hours * 60) + minutes;

            countdown.querySelector('.days').textContent = days < 10 ? '0' + days : days;
            countdown.querySelector('.hours').textContent = hours < 10 ? '0' + hours : hours;
            countdown.querySelector('.minutes').textContent = minutes < 10 ? '0' + minutes : minutes;
            countdown.querySelector('.seconds').textContent = seconds < 10 ? '0' + seconds : seconds;

            if (eventButton && totalMinutes < changeTextTime && !isButtonUpdated) {
                eventButton.textContent = buttonTextChange;
                isButtonUpdated = true;
            }

            if (distance > 0) {
                section.classList.remove('hidden');
            }

            if (distance < 0) {
                clearInterval(x);
                section.classList.add('hidden');
            }
        }, 1000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const eventDates = document.querySelectorAll('.event-date');
        eventDates.forEach(eventData => {
            updateCountdown(eventData);
        });
    });
