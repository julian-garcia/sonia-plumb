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
