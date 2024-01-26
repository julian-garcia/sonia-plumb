const calendar = document.getElementById('calendar');
const dayNums = document.querySelectorAll('.day_num');

if (calendar) {
  dayNums.forEach((day) => day.classList.remove('selected'));
  calendar.addEventListener('click', (e) => {
    eventIds = e.target.getAttribute('data-event-ids').split(',');
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
