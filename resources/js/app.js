import './bootstrap';
import AOS from 'aos';
import 'preline';
import Animate from 'animate';
import JOS from "jos-animation";
import Swiper from 'swiper/bundle';
// import 'swiper/css/bundle';
// import 'owl.carousel';

import SimpleLightbox from "simplelightbox";

window.AOS = AOS;
AOS.init();

window.Animate = Animate;
// Animate.init();

window.JOS = JOS;
JOS.init();
window.Swiper = Swiper;

window.SimpleLightbox = SimpleLightbox;

// window.Owl = Owl;






"use strict";

// ::::: GLobal Javascript ::::
// ================================Animate Interaction on Scroll ==================================
JOS.init({
  // disable: false, // Disable JOS gloabaly | Values :  'true', 'false'
  // debugMode: true, // Enable JOS debug mode | Values :  'true', 'false'
  passive: false, // Set the passive option for the scroll event listener | Values :  'true', 'false'

  once: true, // Disable JOS after first animation | Values :  'true', 'false' || Int : 0-1000
  animation: "fade-up", // JOS global animation type | Values :  'fade', 'slide', 'zoom', 'flip', 'fade-right', 'fade-left', 'fade-up', 'fade-down', 'zoom-in-right', 'zoom-in-left', 'zoom-in-up', 'zoom-in-down', 'zoom-out-right', 'zoom-out-left', 'zoom-out-up', 'zoom-out-down', 'flip-right', 'flip-left', 'flip-up', 'flip-down, spin, revolve, stretch, "my-custom-animation"
  // animationInverse: "static", // Set the animation type for the element when it is scrolled out of view | Values :  'fade', 'slide', 'zoom', 'flip', 'fade-right', 'fade-left', 'fade-up', 'fade-down', 'zoom-in-right', 'zoom-in-left', 'zoom-in-up', 'zoom-in-down', 'zoom-out-right', 'zoom-out-left', 'zoom-out-up', 'zoom-out-down', 'flip-right', 'flip-left', 'flip-up', 'flip-down, spin, revolve, stretch, "my-custom-animation"
  timingFunction: "ease", // JOS global timing function | Values :  'ease', 'ease-in', 'ease-out', 'ease-in-out', 'linear', 'step-start', 'step-end', 'steps()', 'cubic-bezier()', 'my-custom-timing-function'
  //mirror : false, // Set whether the element should animate back when scrolled out of view | Values :  'true', 'false'
  threshold: 0, // Set gloabal the threshold for the element to be visible | Values :  0-1
  delay: 0.5, // Set global the delay for the animation to start | Values :  0,1,2,3,4,5
  duration: 0.7, // Set global the duration for the animation playback | Values :  flota : 0-1 & int : 0,1,2,3,4,5

  // startVisible: "true", // Set whether the element should animate when the page is loaded | Values :  'true', 'false' || MS : 0-10000
  scrollDirection: "down", // Set the scroll direction for the element to be visible | Values :  'up', 'down', 'none'
  //scrollProgressDisable: true // disable or enable scroll callback function | Values :  'true', 'false'
  // intersectionRatio: 0.4, // Set the intersection ratio between which the element should be visible | Values :  0-1 (automaticaly set)
  // rootMargin_top: "0%", // Set by which percent the element should animate out (Recommended value between 10% to -30%)
  // rootMargin_bottom: "-50%", // Set by which percent the element should animate out (Recommended value between -10% to -60%)
  rootMargin: "0% 0% 15% 0%", // Set the root margin for the element to be visible | Values :  _% _% _% _%  (automaticaly set)
});

// ======================================== Accordion ======================================
let accordions = document.querySelectorAll(".accordion-item");
accordions.forEach((item) => {
  let label = item.querySelector(".accordion-header");
  label.addEventListener("click", () => {
    accordions.forEach((accordionItem) => {
      accordionItem.classList.remove("active");
    });
    item.classList.toggle("active");
  });
});

//:::::::::::::::::::::::::::::::::::::::::: Template JavaScript ::::::::::::::::::::::::::::::::::

// ========================TF-1 : Brand Slider================================
var brandSlider = new Swiper(".brand-slider", {
  slidesPerView: 2,
  spaceBetween: 30,
  speed: 1200,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,

  },
  breakpoints: {
    480: {
        slidesPerView: 2,
        spaceBetween: 50,
      },
    768: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 60,
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 70,
    },
  },
});

window.brandSlider;

// ========================TF-2 : Brand Slider================================
var brandSlider = new Swiper(".brand-slider-2", {
  slidesPerView: 2,
  spaceBetween: 90,
  speed: 1200,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
    1400: {
      slidesPerView: 6,
    },
  },
});
// ========================TF-3 : Testimonial Slider================================
var testimonialOne = new Swiper(".testimonial-one", {
  navigation: {
    nextEl: ".slider-nav-btn-next",
    prevEl: ".slider-nav-btn-prev",
  },
});

// Get all tab buttons and content sections
const tabButtons = document.querySelectorAll(".tab-button");
const tabContents = document.querySelectorAll(".tab-content");

// Add click event listeners to tab buttons
tabButtons.forEach((button) => {
  button.addEventListener("click", () => {
    // Remove 'active' class from all tab buttons and hide all tab content
    tabButtons.forEach((btn) => {
      btn.classList.remove("active");
    });
    tabContents.forEach((content) => {
      content.classList.add("hidden");
    });

    // Get the data-tab attribute of the clicked button
    const tabId = button.getAttribute("data-tab");
    const correspondingTab = document.getElementById(tabId);

    // Add 'active' class to the clicked button and show the corresponding tab content
    button.classList.add("active");
    correspondingTab.classList.remove("hidden");
  });
});

// ========================TF-1 : Testimonial Slider================================
const testimonialSlider = new Swiper('.testimonial-slider', {
  // Optional parameters
  slidesPerView: 1,
  loop: true,
  spaceBetween: 30,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});


const swiperProductsNav = new Swiper(".js-vv-product-swiper-nav",{
    spaceBetween: 20,
    slidesPerView: 3,
    watchSlidesProgress: !0,
    breakpoints: {
        576: {
            slidesPerView: 3
        },
        768: {
            spaceBetween: 18,
            slidesPerView: 4
        },
        992: {
            spaceBetween: 20,
            slidesPerView: 5
        }
    }
})
  , swiperProducts = new Swiper(".js-vv-product-swiper",{
    thumbs: {
        swiper: swiperProductsNav
    }
})
  , swiperPlaylists = new Swiper(".js-vv-playlist-swiper",{
    slidesPerView: 1,
    spaceBetween: 0,
    centeredSlides: !0,
    loop: !0,
    breakpoints: {
        576: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 2
        },
        992: {
            slidesPerView: 3
        },
        1210: {
            slidesPerView: 4
        }
    },
    navigation: {
        nextEl: ".vv-playlist-swiper-btn-next",
        prevEl: ".vv-playlist-swiper-btn-prev"
    }
})
  , swiperLatestVideos = new Swiper(".js-vv-latest-videos-swiper",{
    slidesPerView: 1,
    spaceBetween: 30,
    loop: !0,
    breakpoints: {
        576: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        992: {
            slidesPerView: 4
        },
        1210: {
            slidesPerView: 5
        }
    },
    navigation: {
        nextEl: ".js-vv-latest-videos-swiper-btn-next",
        prevEl: ".js-vv-latest-videos-swiper-btn-prev"
    }
})
  , swiperFeaturedGaming = new Swiper(".js-vv-videos-swiper",{
    slidesPerView: 1,
    spaceBetween: 30,
    loop: !0,
    breakpoints: {
        576: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        992: {
            slidesPerView: 4
        },
        1210: {
            slidesPerView: 5
        }
    },
    navigation: {
        nextEl: ".js-vv-videos-swiper-btn-next",
        prevEl: ".js-vv-videos-swiper-btn-prev"
    }
})
  , swiperFeaturedVideos = new Swiper(".js-vv-videos-featured-swiper",{
    slidesPerView: 1,
    spaceBetween: 30,
    loop: !0,
    breakpoints: {
        576: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 5
        },
        992: {
            slidesPerView: 4
        },
        1210: {
            slidesPerView: 7
        }
    },
    navigation: {
        nextEl: ".js-vv-videos-featured-swiper-btn-next",
        prevEl: ".js-vv-videos-featured-swiper-btn-prev"
    }
})
  , swiperChannelInfo = new Swiper(".js-vv-channel-info-swiper",{
    slidesPerView: 1,
    loop: !0,
    parallax: !0,
    speed: 1e3,
    navigation: {
        nextEl: ".js-vv-channel-info-swiper-btn-next",
        prevEl: ".js-vv-channel-info-swiper-btn-prev"
    }
})
  , swiperHeroSlider = new Swiper(".js-vv-hero-swiper",{
    slidesPerView: 1,
    loop: !0,
    loopedSlides: 3,
    centeredSlides: !0,
    spaceBetween: 20,
    speed: 500,
    autoplay: {
        delay: 1e4,
        disableOnInteraction: !1
    },
    navigation: {
        nextEl: ".js-vv-hero-swiper-btn-next",
        prevEl: ".js-vv-hero-swiper-btn-prev"
    },
    on: {
        slideChange: function() {
            var e = this.realIndex;
            const s = this.slides[e];
            s.classList.add("vv-slide-played")
        }
    }
});

// JS Toggle Button
function toggleSwitch() {
  var month = document.querySelectorAll(".month");
  var annual = document.querySelectorAll(".annual");
  for (var i = 0; i < month.length; i++) {
    if (document.getElementById("toggle").checked == true) {
      month[i].classList.add("hidden");
      annual[i].classList.remove("hidden");
    } else {
      month[i].classList.remove("hidden");
      annual[i].classList.add("hidden");
    }
  }
}

// Sticky Menu
window.addEventListener('scroll', function() {
  let header = document.querySelector('nav');
  header.classList.toggle('scrolling', window.scrollY > 0);
});
