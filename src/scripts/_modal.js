const galleryImages = document.querySelectorAll('.gallery-image');

if (galleryImages) {
  const modal = document.querySelector('.modal');
  const modalImage = document.querySelector('.modal .modal-image');

  galleryImages.forEach((image) => {
    image.addEventListener('click', () => {
      modal.classList.add('show');
      modalImage.style.backgroundImage =
        'url(' + image.getAttribute('data-image') + ')';
    });
  });

  if (modal) {
    modal.addEventListener('click', () => {
      modal.classList.remove('show');
    });
  }
}
