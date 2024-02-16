import Swiper from 'swiper';
import {
  Navigation,
  Autoplay,
  EffectFade,
  Pagination,
  Scrollbar,
} from 'swiper/modules';

export const swiper = new Swiper('.swiper-slides', {
  modules: [Navigation, Autoplay, EffectFade, Pagination],
  loop: true,
  spaceBetween: 5,
  speed: 1200,
  effect: 'fade',
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 6000,
    disableOnInteraction: false,
  },
  on: {
    afterInit: (sw) => hoverEffect(sw),
    slideChange: (sw) => hoverEffect(sw),
    tap: (sw) => sw.slideNext(),
  },
});

export const swiperWorks = new Swiper('.swiper-works', {
  modules: [Navigation, Autoplay, Pagination],
  loop: true,
  spaceBetween: 50,
  speed: 1200,
  centeredSlides: true,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

export const swiperTestimonials = new Swiper('.swiper.testimonials', {
  modules: [Navigation, Autoplay, Pagination],
  loop: true,
  spaceBetween: 50,
  speed: 1200,
  centeredSlides: true,
  slidesPerView: 1,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 6000,
    disableOnInteraction: false,
  },
});

export const swiperEventsFuture = new Swiper('.swiper.events.future', {
  modules: [Pagination, EffectFade],
  loop: true,
  spaceBetween: 5,
  speed: 1200,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  centeredSlides: true,
  slidesPerView: 1,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    renderBullet: function (index) {
      return `<span class="swiper-pagination-bullet">${index}
      <span class="dlm">/</span></span>`;
    },
  },
});

export const swiperEventsPast = new Swiper('.swiper.events.past', {
  modules: [Pagination, EffectFade],
  loop: true,
  spaceBetween: 5,
  speed: 1200,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  centeredSlides: true,
  slidesPerView: 1,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    renderBullet: function (index) {
      return `<span class="swiper-pagination-bullet">${index}
      <span class="dlm">/</span></span>`;
    },
  },
});

export const swiperGallery = new Swiper('.swiper-gallery', {
  modules: [Navigation, Autoplay, Scrollbar],
  loop: true,
  spaceBetween: 32,
  speed: 1200,
  centeredSlides: true,
  slidesPerView: 1,
  scrollbar: { draggable: true, el: '.swiper-scrollbar', hide: false },
  breakpoints: {
    600: {
      slidesPerView: 2,
    },
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

function hoverEffect(sw) {
  const nextIndex =
    sw.activeIndex == sw.slides.length - 1 ? 0 : sw.activeIndex + 1;
  const hoverImage = document.querySelector(
    '.swiper-slide-visible #hoverImage'
  );
  hoverImage.style.backgroundImage =
    sw.slides[nextIndex].firstElementChild.style.backgroundImage;

  if (hoverImage) {
    document.addEventListener('mousemove', function (e) {
      hoverImage.style.left = e.pageX - 100 + 'px';
      hoverImage.style.top = e.pageY - 140 + 'px';
      hoverImage.style.backgroundPositionX = -e.pageX + 100 + 'px';
      hoverImage.style.backgroundPositionY = -e.pageY + 140 + 'px';
    });
  }
}
