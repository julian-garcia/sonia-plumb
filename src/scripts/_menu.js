const mainMenu = document.getElementById('mainMenu');
const menuToggle = document.getElementById('menuToggle');

mainMenu &&
  menuToggle &&
  menuToggle.addEventListener('click', () => {
    mainMenu.classList.toggle('show');
  });

document.addEventListener('click', function (event) {
  if (event.target.closest('#menuToggle')) return;
  mainMenu.classList.remove('show');
});
