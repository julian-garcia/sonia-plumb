const calendar = document.getElementById('calendar');

if (calendar) {
  const dayNums = document.querySelectorAll('.day_num');
  const noEvents = document.getElementById('noEvents');
  const noEventsMonth = document.getElementById('noEventsMonth');
  const eventDescriptions = document.querySelectorAll('.event-description');

  dayNums.forEach((day) => day.classList.remove('selected'));

  calendar.addEventListener('click', (e) => {
    eventIds = e.target.getAttribute('data-event-ids').split(',');
    if (!eventIds[0]) {
      noEvents.classList.remove('hidden');
      noEventsMonth && noEventsMonth.classList.add('hidden');
      eventDescriptions.forEach((desc) => desc.classList.add('hidden'));
    } else {
      noEvents.classList.add('hidden');
    }
    eventIds.forEach((eventId) => {
      const description = document.getElementById('event' + eventId);
      const dayNum = document.querySelector(
        `.day_num[data-event-ids='${eventIds}']`
      );
      if (description) {
        description.classList.remove('hidden');
        dayNum.classList.add('selected');
      }
    });
  });
}
