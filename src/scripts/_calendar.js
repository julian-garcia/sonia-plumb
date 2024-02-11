const calendar = document.getElementById('calendar');

if (calendar) {
  const dayNums = document.querySelectorAll('.day_num');
  const noEvents = document.getElementById('noEvents');
  const noEventsMonth = document.getElementById('noEventsMonth');
  const eventDescriptions = document.querySelectorAll('.event-description');
  const selectButton = document.getElementById('selectButton');
  const selectDropdown = document.getElementById('selectDropdown');
  const selectArrow = document.getElementById('selectArrow');
  const selectedValue = document.getElementById('selectedValue');
  const eventsMonth = document.querySelectorAll('[data-event-category]');
  const inputFilters = document.querySelectorAll(
    'input[name="event-category"]'
  );

  dayNums.forEach((day) => day.classList.remove('selected'));

  calendar.addEventListener('click', (e) => {
    dayNums.forEach((day) => day.classList.remove('selected'));
    eventDescriptions.forEach((desc) => desc.classList.add('hidden'));

    const eventIds = e.target.getAttribute('data-event-ids')?.split(',') || [];
    if (!eventIds[0]) {
      noEvents.classList.remove('hidden');
      noEventsMonth && noEventsMonth.classList.add('hidden');
      e.target.closest('.day_num').classList.add('selected');
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
    selectedValue.textContent = 'Filter';
    const el = document.getElementsByName('event-category');
    for (let i = 0; i < el.length; i++) el[i].checked = false;
    selectDropdown.classList.remove('active');
    selectArrow.classList.remove('active');
  });

  selectButton &&
    selectButton.addEventListener('click', () => {
      selectDropdown.classList.toggle('active');
      selectArrow.classList.toggle('active');
      selectButton.setAttribute(
        'aria-expanded',
        selectButton.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'
      );
    });

  inputFilters &&
    inputFilters.forEach((inputFilter) => {
      inputFilter.addEventListener('click', () => {
        selectedValue.textContent = inputFilter.id;
        selectDropdown.classList.toggle('active');
        selectArrow.classList.toggle('active');
        const events = document.querySelectorAll(
          `[data-event-category="${inputFilter.value}"]`
        );
        eventsMonth &&
          eventsMonth.forEach((event) => {
            event.classList.add('hidden');
          });
        if (inputFilter.id === 'All events') {
          eventsMonth &&
            eventsMonth.forEach((event) => {
              event.classList.remove('hidden');
            });
        } else {
          events &&
            events.forEach((event) => {
              event.classList.remove('hidden');
            });
        }
        dayNums.forEach((day) => day.classList.remove('selected'));
        noEvents.classList.add('hidden');
      });
    });
}
