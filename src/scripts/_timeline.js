const timelineNext = document.getElementById('timelineNext');
const timelineBack = document.getElementById('timelineBack');
const timeLine = document.querySelector('.timeline');
const timeLineOddEvents = document.querySelectorAll(
  '.timeline .timeline-event:nth-child(odd) .timeline-text'
);
const timeLineEvents = document.querySelectorAll('.timeline .timeline-event');

timelineNext &&
  timelineNext.addEventListener('click', () => {
    timeLine.scrollLeft += 330;
  });

timelineBack &&
  timelineBack.addEventListener('click', () => {
    timeLine.scrollLeft -= 330;
  });

if (timeLineEvents) {
  let maxHeight = 0;
  timeLineOddEvents.forEach((t) => {
    if (t.children[0].offsetHeight > maxHeight)
      maxHeight = t.children[0].offsetHeight;
  });

  timeLineOddEvents.forEach((t) => {
    t.style.height = `${maxHeight + 32}px`;
  });

  timeLineEvents.forEach((t) => {
    t.style.gridTemplateRows = `${maxHeight + 32}px 2rem auto 1fr`;
  });
}
