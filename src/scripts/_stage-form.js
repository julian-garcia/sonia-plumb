const stageForm = document.getElementById('stageForm');

if (stageForm) {
  const options = stageForm.querySelectorAll("input[type='radio']");
  options.forEach((option) => {
    option.addEventListener('change', () => {
      stageForm.submit();
    });
  });
}
