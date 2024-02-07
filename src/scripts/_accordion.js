const accordionTitles = document.querySelectorAll(
  '.accordion > h2.wp-block-heading'
);
const accordionBodies = document.querySelectorAll('.accordion .wp-block-group');

accordionTitles &&
  accordionTitles.forEach((accordionTitle) => {
    accordionTitle.addEventListener('click', () => {
      const isShowing =
        accordionTitle.nextElementSibling.classList.contains('show');
      accordionBodies.forEach((body) => body.classList.remove('show'));
      accordionTitles.forEach((title) => title.classList.remove('open'));
      if (isShowing) {
        accordionTitle.nextElementSibling.classList.remove('show');
        accordionTitle.classList.remove('open');
      } else {
        accordionTitle.nextElementSibling.classList.add('show');
        accordionTitle.classList.add('open');
      }
    });
  });
