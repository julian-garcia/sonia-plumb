import './_modal';
import './_slider';
import './_stage-form';
import './_calendar';
import './_timeline';
import './_menu';
import './_accordion';
import './_newsletter';

document.addEventListener('DOMContentLoaded', () => {
  const postListing = document.getElementById('postListing');

  if (
    postListing &&
    window.location.href.includes('?category') &&
    window.location.pathname.includes('partnerships')
  ) {
    postListing.scrollIntoView();
  }
});

let resizeTimer;
window.addEventListener('resize', () => {
  document.body.classList.add('notransition');
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    document.body.classList.remove('notransition');
  }, 400);
});
