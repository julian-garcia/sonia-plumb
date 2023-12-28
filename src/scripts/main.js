import Swiper from 'swiper';
import { Navigation, Autoplay, EffectFade, Pagination } from 'swiper/modules';

export const swiper = new Swiper('.swiper-performances', {
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
    delay: 60000,
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
