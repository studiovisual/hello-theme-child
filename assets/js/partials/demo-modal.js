const popup = document.getElementById('demo-modal');

function togglePopup() {
  popup.classList.toggle('demo-modal--show');
  document.body.classList.toggle('overflow-hidden', popup.classList.contains('demo-modal--show'));
}

popup.addEventListener('click', (event) => {
  if (event.target === popup) {
    togglePopup();
  }
});
