const popup = document.getElementById('hire-popup');

function togglePopup() {
  popup.classList.toggle('modal-hire-popup--show');
}

popup.addEventListener('click', (event) => {
  if (event.target === popup) {
    togglePopup();
  }
});
