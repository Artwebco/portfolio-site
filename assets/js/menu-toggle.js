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


const profileImage = document.querySelector('.profile-image');
const noProjects = document.querySelector('.no-projects');
const expYears = document.querySelector('.exp-years');

let direction = -1; 
let maxOffset = 20;
let maxOffsetNoProjects = -10;
let speed = 0.15; 
let offset = 0;

// box-shadow animation variables
let alpha = 0.3;
let blur = 30;
let alphaDirection = 1;
let blurDirection = 1;

function animate() {
    offset += speed * direction;

    if (offset <= -maxOffset) direction = 1;
    if (offset >= 0) direction = -1;

    // Move elements
    profileImage.style.transform = `translateY(${offset}px)`;
    noProjects.style.transform = `translateY(${-offset * (maxOffsetNoProjects / maxOffset)}px)`;
    expYears.style.transform = `translateY(${offset}px)`;

    // Animate box-shadow (slower)
    alpha += alphaDirection * 0.003;  // slower alpha change
    if (alpha > 0.6) alphaDirection = -1;
    if (alpha < 0.3) alphaDirection = 1;

    blur += blurDirection * 0.05;     // slower blur change
    if (blur > 40) blurDirection = -1;
    if (blur < 20) blurDirection = 1;

    profileImage.style.boxShadow = `rgba(22, 162, 73, ${alpha}) 0px 0px ${blur}px 0px`;

    requestAnimationFrame(animate);
}

animate();
