const signUp = document.getElementById('signUp');
const signUpForm = document.getElementById('mc-embedded-subscribe-form');

signUp &&
  signUp.addEventListener('click', () => {
    signUpForm.classList.toggle('show');
  });

document.addEventListener('click', (e) => {
  if (
    e.target.id !== 'signUp' &&
    !e.target.closest('#mc-embedded-subscribe-form')
  ) {
    signUpForm.classList.remove('show');
  }
});
