import './_modal';
import './_slider';
import './_stage-form';
import './_calendar';
import './_timeline';
import './_menu';
import './_accordion';

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
