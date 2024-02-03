const timelineNext = document.getElementById('timelineNext');
const timelineBack = document.getElementById('timelineBack');
const timeLine = document.querySelector('.timeline');

timelineNext &&
  timelineNext.addEventListener('click', () => {
    timeLine.scrollLeft += 250;
  });

timelineBack &&
  timelineBack.addEventListener('click', () => {
    timeLine.scrollLeft -= 250;
  });
