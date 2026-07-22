const signUp = document.getElementById('signUp');
const signUpForm = document.getElementById('signUpForm');

signUp &&
  signUp.addEventListener('click', () => {
    signUpForm.classList.toggle('show');
  });

document.addEventListener('click', (e) => {
  if (e.target.id !== 'signUp' && !e.target.closest('#signUpForm')) {
    signUpForm.classList.remove('show');
  }
});
