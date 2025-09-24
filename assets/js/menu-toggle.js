document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('.main-navigation');

  if (hamburger && nav) {
    hamburger.addEventListener('click', () => {
      hamburger.classList.toggle('open');
      nav.classList.toggle('active');
    });
  }
});
